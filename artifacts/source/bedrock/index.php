<?php
require(__DIR__ . '/../../config.php');
require_login();

use Aws\BedrockRuntime\BedrockRuntimeClient;

// Hard‑code your courseid
$courseid = 2;

// Get the first Page activity in this course
$mod = $DB->get_record('modules', ['name' => 'page'], '*', MUST_EXIST);
$cm  = $DB->get_record('course_modules', ['course' => $courseid, 'module' => $mod->id], '*', MUST_EXIST);
$page = $DB->get_record('page', ['id' => $cm->instance], '*', MUST_EXIST);
$course = $DB->get_record('course', ['id' => $courseid], '*', MUST_EXIST);

$context = context_course::instance($course->id);
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/bedrock/index.php'));
$PAGE->set_title('Bedrock Quiz Generator');
$PAGE->set_heading('Bedrock Quiz Generator');

echo $OUTPUT->header();
echo html_writer::tag('h3', 'AI‑Generated Quiz Questions');

// Use the Page content as training text
$overviewcontent = strip_tags($page->content);

// Add a random variation seed
$variation = rand(1000, 9999);

// Build the prompt
$prompt = "Variation seed: $variation

From the following training content, generate 5 quiz questions in Moodle GIFT format:
- 2 multiple-choice (include the question, all choices, and mark the correct answer with '=')
- 2 true/false
- 1 short-answer
Output ONLY valid GIFT syntax. Do not include explanations, reasoning, headers, or any extra text.

Content:
" . $overviewcontent;

try {
    $client = new BedrockRuntimeClient([
        'region'  => 'eu-west-2',   // London region
        'version' => 'latest'
    ]);

    $result = $client->invokeModel([
        'modelId'     => 'openai.gpt-oss-120b-1:0',
        'contentType' => 'application/json',
        'accept'      => 'application/json',
        'body'        => json_encode([
            "model" => "openai.gpt-oss-120b-1:0",
            "messages" => [
                ["role" => "system", "content" => "You are an assistant that outputs ONLY Moodle GIFT quiz questions. No commentary, no reasoning, no headers."],
                ["role" => "user", "content" => $prompt]
            ],
            // 🔥 Increased limits
            "max_completion_tokens" => 2000,
            "temperature" => 0.8,
            "top_p" => 0.9
        ])
    ]);

    $response = json_decode((string) $result['body'], true);

    echo html_writer::tag('h4', 'Generated Quiz (GIFT format):');

    if (!empty($response['choices'][0]['message']['content'])) {
        $raw = trim($response['choices'][0]['message']['content']);

        // Strip out <reasoning> blocks if present
        $clean = preg_replace('/<reasoning>.*?<\/reasoning>/is', '', $raw);

        // Split into lines and number questions
        $lines = explode("\n", $clean);
        $numbered = [];
        $qnum = 1;
        $inquestion = false;

        foreach ($lines as $line) {
            $trim = trim($line);
            if ($trim === '') continue;

            $start = (strpos($trim, '{') !== false) && !preg_match('/^[~=#]/', $trim);
            if ($start && !$inquestion) {
                $numbered[] = $qnum . '. ' . $trim;
                $qnum++;
                $inquestion = true;
            } else {
                $numbered[] = $trim;
            }

            if (strpos($trim, '}') !== false) {
                $inquestion = false;
            }
        }

        $quiz = implode("\n", $numbered);
        echo nl2br(htmlspecialchars($quiz));
    } else {
        echo nl2br(htmlspecialchars(print_r($response, true)));
    }

} catch (Exception $e) {
    echo html_writer::tag('p', 'Error calling Bedrock: ' . htmlspecialchars($e->getMessage()));
}

echo $OUTPUT->footer();

