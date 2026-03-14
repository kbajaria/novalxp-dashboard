<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace local_novalxp_execdashboard\local;

defined('MOODLE_INTERNAL') || die();

/**
 * Minimal AWS Cost Explorer client using SigV4-signed requests.
 */
class aws_cost_client {
    /** @var string */
    protected const ENDPOINT = 'https://ce.us-east-1.amazonaws.com/';
    /** @var string */
    protected const HOST = 'ce.us-east-1.amazonaws.com';
    /** @var string */
    protected const REGION = 'us-east-1';
    /** @var string */
    protected const SERVICE = 'ce';
    /** @var string */
    protected const TARGET = 'AWSInsightsIndexService.GetCostAndUsage';

    /**
     * Whether live AWS billing is enabled.
     *
     * @return bool
     */
    public static function enabled(): bool {
        return (bool)get_config('local_novalxp_execdashboard', 'awsbillingenabled');
    }

    /**
     * Whether the minimum AWS credentials are configured.
     *
     * @return bool
     */
    public static function has_credentials(): bool {
        if (self::useec2role()) {
            return true;
        }

        $accesskey = (string)get_config('local_novalxp_execdashboard', 'awsaccesskeyid');
        $secretkey = (string)get_config('local_novalxp_execdashboard', 'awssecretaccesskey');

        return $accesskey !== '' && $secretkey !== '';
    }

    /**
     * Whether to use the EC2 instance role via IMDSv2.
     *
     * @return bool
     */
    public static function useec2role(): bool {
        return (bool)get_config('local_novalxp_execdashboard', 'awsuseec2role');
    }

    /**
     * Return configured linked account filter.
     *
     * @return string
     */
    public static function linked_account(): string {
        return trim((string)get_config('local_novalxp_execdashboard', 'awslinkedaccount'));
    }

    /**
     * Return configured AI service filters.
     *
     * @return array<int,string>
     */
    public static function ai_services(): array {
        $raw = trim((string)get_config('local_novalxp_execdashboard', 'awsaicostservices'));
        if ($raw === '') {
            return [];
        }

        $services = array_map('trim', explode(',', $raw));
        $services = array_values(array_filter($services, static function(string $service): bool {
            return $service !== '';
        }));

        return array_unique($services);
    }

    /**
     * Fetch a month-to-date unblended cost value.
     *
     * @param array<int,string> $services Optional AWS service names.
     * @param string $linkedaccount Optional linked account ID.
     * @return array{ok:bool,amount?:float,unit?:string,error?:string}
     */
    public static function month_to_date_cost(array $services = [], string $linkedaccount = ''): array {
        $start = new \DateTimeImmutable('first day of this month 00:00:00', new \DateTimeZone('UTC'));
        $end = new \DateTimeImmutable('tomorrow 00:00:00', new \DateTimeZone('UTC'));

        $payload = [
            'TimePeriod' => [
                'Start' => $start->format('Y-m-d'),
                'End' => $end->format('Y-m-d'),
            ],
            'Granularity' => 'MONTHLY',
            'Metrics' => ['UnblendedCost'],
        ];

        $filter = self::build_filter($services, $linkedaccount);
        if ($filter) {
            $payload['Filter'] = $filter;
        }

        $response = self::request($payload);
        if (!$response['ok']) {
            return $response;
        }

        $result = $response['body']['ResultsByTime'][0]['Total']['UnblendedCost'] ?? null;
        if (!is_array($result) || !isset($result['Amount'])) {
            return [
                'ok' => false,
                'error' => 'AWS Cost Explorer response did not include an UnblendedCost total.',
            ];
        }

        return [
            'ok' => true,
            'amount' => (float)$result['Amount'],
            'unit' => (string)($result['Unit'] ?? 'USD'),
        ];
    }

    /**
     * Build an AWS Cost Explorer filter expression.
     *
     * @param array<int,string> $services Optional AWS service names.
     * @param string $linkedaccount Optional linked account ID.
     * @return array<string,mixed>
     */
    protected static function build_filter(array $services, string $linkedaccount): array {
        $clauses = [];

        if ($linkedaccount !== '') {
            $clauses[] = [
                'Dimensions' => [
                    'Key' => 'LINKED_ACCOUNT',
                    'Values' => [$linkedaccount],
                ],
            ];
        }

        if ($services) {
            $clauses[] = [
                'Dimensions' => [
                    'Key' => 'SERVICE',
                    'Values' => array_values($services),
                ],
            ];
        }

        if (!$clauses) {
            return [];
        }

        if (count($clauses) === 1) {
            return $clauses[0];
        }

        return ['And' => $clauses];
    }

    /**
     * Execute a signed GetCostAndUsage request.
     *
     * @param array<string,mixed> $payload
     * @return array{ok:bool,body?:array<string,mixed>,status?:int,error?:string}
     */
    protected static function request(array $payload): array {
        $timeout = max(5, (int)get_config('local_novalxp_execdashboard', 'awstimeout'));
        $credentials = self::resolve_credentials($timeout);

        if (!$credentials['ok']) {
            return $credentials;
        }
        $accesskey = $credentials['accesskey'];
        $secretkey = $credentials['secretkey'];
        $sessiontoken = $credentials['sessiontoken'];

        $body = json_encode($payload, JSON_UNESCAPED_SLASHES);
        if ($body === false) {
            return [
                'ok' => false,
                'error' => 'Failed to encode AWS Cost Explorer request payload.',
            ];
        }

        $amzdate = gmdate('Ymd\THis\Z');
        $datestamp = gmdate('Ymd');
        $payloadhash = hash('sha256', $body);

        $headers = [
            'content-type' => 'application/x-amz-json-1.1',
            'host' => self::HOST,
            'x-amz-date' => $amzdate,
            'x-amz-target' => self::TARGET,
        ];
        if ($sessiontoken !== '') {
            $headers['x-amz-security-token'] = $sessiontoken;
        }

        ksort($headers);
        $canonicalheaders = '';
        foreach ($headers as $name => $value) {
            $canonicalheaders .= $name . ':' . trim($value) . "\n";
        }
        $signedheaders = implode(';', array_keys($headers));

        $canonicalrequest = "POST\n/\n\n"
            . $canonicalheaders . "\n"
            . $signedheaders . "\n"
            . $payloadhash;
        $credentialscope = $datestamp . '/' . self::REGION . '/' . self::SERVICE . '/aws4_request';
        $stringtosign = "AWS4-HMAC-SHA256\n"
            . $amzdate . "\n"
            . $credentialscope . "\n"
            . hash('sha256', $canonicalrequest);
        $signature = hash_hmac(
            'sha256',
            $stringtosign,
            self::signature_key($secretkey, $datestamp),
            false
        );

        $requestheaders = [
            'Content-Type: application/x-amz-json-1.1',
            'Host: ' . self::HOST,
            'X-Amz-Date: ' . $amzdate,
            'X-Amz-Target: ' . self::TARGET,
            'Authorization: AWS4-HMAC-SHA256 Credential=' . $accesskey . '/' . $credentialscope
                . ', SignedHeaders=' . $signedheaders
                . ', Signature=' . $signature,
        ];
        if ($sessiontoken !== '') {
            $requestheaders[] = 'X-Amz-Security-Token: ' . $sessiontoken;
        }

        $ch = curl_init(self::ENDPOINT);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $requestheaders);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        $raw = curl_exec($ch);
        $errno = curl_errno($ch);
        $error = curl_error($ch);
        $status = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($errno) {
            return [
                'ok' => false,
                'status' => 0,
                'error' => 'AWS Cost Explorer cURL error: ' . $error,
            ];
        }

        $decoded = json_decode((string)$raw, true);
        if (!is_array($decoded)) {
            $decoded = [];
        }

        if ($status < 200 || $status >= 300) {
            $message = (string)($decoded['message'] ?? $decoded['Message'] ?? ('HTTP ' . $status));
            return [
                'ok' => false,
                'status' => $status,
                'error' => 'AWS Cost Explorer request failed: ' . $message,
            ];
        }

        return [
            'ok' => true,
            'status' => $status,
            'body' => $decoded,
        ];
    }

    /**
     * Derive the SigV4 signing key.
     *
     * @param string $secretkey
     * @param string $datestamp
     * @return string
     */
    protected static function signature_key(string $secretkey, string $datestamp): string {
        $kdate = hash_hmac('sha256', $datestamp, 'AWS4' . $secretkey, true);
        $kregion = hash_hmac('sha256', self::REGION, $kdate, true);
        $kservice = hash_hmac('sha256', self::SERVICE, $kregion, true);
        return hash_hmac('sha256', 'aws4_request', $kservice, true);
    }

    /**
     * Resolve credentials from config or the EC2 instance metadata service.
     *
     * @param int $timeout
     * @return array{ok:bool,accesskey?:string,secretkey?:string,sessiontoken?:string,error?:string}
     */
    protected static function resolve_credentials(int $timeout): array {
        if (self::useec2role()) {
            return self::credentials_from_instance_metadata($timeout);
        }

        $accesskey = (string)get_config('local_novalxp_execdashboard', 'awsaccesskeyid');
        $secretkey = (string)get_config('local_novalxp_execdashboard', 'awssecretaccesskey');
        $sessiontoken = (string)get_config('local_novalxp_execdashboard', 'awssessiontoken');

        if ($accesskey === '' || $secretkey === '') {
            return [
                'ok' => false,
                'error' => 'AWS access key and secret key are required.',
            ];
        }

        return [
            'ok' => true,
            'accesskey' => $accesskey,
            'secretkey' => $secretkey,
            'sessiontoken' => $sessiontoken,
        ];
    }

    /**
     * Resolve temporary credentials from IMDSv2.
     *
     * @param int $timeout
     * @return array{ok:bool,accesskey?:string,secretkey?:string,sessiontoken?:string,error?:string}
     */
    protected static function credentials_from_instance_metadata(int $timeout): array {
        $tokenresponse = self::metadata_request(
            'PUT',
            'http://169.254.169.254/latest/api/token',
            ['X-aws-ec2-metadata-token-ttl-seconds: 21600'],
            '',
            $timeout
        );
        if (!$tokenresponse['ok']) {
            return [
                'ok' => false,
                'error' => 'Failed to get IMDSv2 token: ' . $tokenresponse['error'],
            ];
        }

        $token = trim((string)$tokenresponse['body']);
        $headers = ['X-aws-ec2-metadata-token: ' . $token];

        $roleresponse = self::metadata_request(
            'GET',
            'http://169.254.169.254/latest/meta-data/iam/security-credentials/',
            $headers,
            '',
            $timeout
        );
        if (!$roleresponse['ok']) {
            return [
                'ok' => false,
                'error' => 'Failed to get EC2 instance role name: ' . $roleresponse['error'],
            ];
        }

        $rolename = trim((string)$roleresponse['body']);
        if ($rolename === '') {
            return [
                'ok' => false,
                'error' => 'No EC2 instance role was returned from instance metadata.',
            ];
        }

        $credsresponse = self::metadata_request(
            'GET',
            'http://169.254.169.254/latest/meta-data/iam/security-credentials/' . rawurlencode($rolename),
            $headers,
            '',
            $timeout
        );
        if (!$credsresponse['ok']) {
            return [
                'ok' => false,
                'error' => 'Failed to get EC2 instance role credentials: ' . $credsresponse['error'],
            ];
        }

        $decoded = json_decode((string)$credsresponse['body'], true);
        if (!is_array($decoded)) {
            return [
                'ok' => false,
                'error' => 'IMDS returned invalid JSON for EC2 instance role credentials.',
            ];
        }

        $accesskey = (string)($decoded['AccessKeyId'] ?? '');
        $secretkey = (string)($decoded['SecretAccessKey'] ?? '');
        $sessiontoken = (string)($decoded['Token'] ?? '');
        if ($accesskey === '' || $secretkey === '' || $sessiontoken === '') {
            return [
                'ok' => false,
                'error' => 'IMDS response was missing temporary AWS credentials.',
            ];
        }

        return [
            'ok' => true,
            'accesskey' => $accesskey,
            'secretkey' => $secretkey,
            'sessiontoken' => $sessiontoken,
        ];
    }

    /**
     * Make an IMDS request.
     *
     * @param string $method
     * @param string $url
     * @param array<int,string> $headers
     * @param string $body
     * @param int $timeout
     * @return array{ok:bool,body?:string,error?:string,status?:int}
     */
    protected static function metadata_request(
        string $method,
        string $url,
        array $headers,
        string $body,
        int $timeout
    ): array {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        if ($body !== '') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        }

        $raw = curl_exec($ch);
        $errno = curl_errno($ch);
        $error = curl_error($ch);
        $status = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($errno) {
            return [
                'ok' => false,
                'status' => 0,
                'error' => 'cURL error: ' . $error,
            ];
        }

        if ($status < 200 || $status >= 300) {
            return [
                'ok' => false,
                'status' => $status,
                'error' => 'HTTP ' . $status,
            ];
        }

        return [
            'ok' => true,
            'status' => $status,
            'body' => (string)$raw,
        ];
    }
}
