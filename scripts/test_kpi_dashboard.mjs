import puppeteer from 'puppeteer';

const BASE = process.argv[2] || 'https://dev.novalxp.co.uk';
const USER = 'demo.user001';
const PASS = 'Finova!2025.';

(async () => {
  const browser = await puppeteer.launch({ headless: true, args: ['--no-sandbox'] });
  const page = await browser.newPage();

  await page.goto(BASE + '/login/index.php', { waitUntil: 'networkidle2' });
  await page.type('#username', USER);
  await page.type('#password', PASS);
  await Promise.all([
    page.waitForNavigation({ waitUntil: 'networkidle2' }),
    page.keyboard.press('Enter'),
  ]);

  const loggedIn = await page.evaluate(() => !document.querySelector('#username'));
  if (!loggedIn) { console.log('FAIL: login failed'); await browser.close(); process.exit(1); }
  console.log('Login: OK');

  const getTitles = async (days) => {
    await page.goto(BASE + '/local/novalxp_execdashboard/index.php?windowdays=' + days, { waitUntil: 'networkidle2' });
    return page.evaluate(() => {
      const titles = [];
      for (const s of document.querySelectorAll('script')) {
        for (const m of s.textContent.matchAll(/"title"\s*:\s*"([^"]+)"/g)) titles.push(m[1]);
      }
      return titles;
    });
  };

  const t30  = await getTitles(30);
  const t90  = await getTitles(90);
  const t7   = await getTitles(7);
  const t365 = await getTitles(365);

  console.log('30 days titles:', t30);
  console.log('90 days titles:', t90);

  const has = (titles, str) => titles.some(t => t.includes(str));

  const results = [
    { label: 'Titles contain "Last 30 days" for windowdays=30',  pass: has(t30,  'Last 30 days') },
    { label: 'Titles contain "Last 90 days" for windowdays=90',  pass: has(t90,  'Last 90 days') },
    { label: 'Titles contain "Last 7 days" for windowdays=7',    pass: has(t7,   'Last 7 days')  },
    { label: 'Titles contain "Last year" for windowdays=365',     pass: has(t365, 'Last year')    },
    { label: 'No "Last 30 days" after switching to 90',           pass: !has(t90, 'Last 30 days') },
    { label: 'All 4 charts labelled for 30 days',                 pass: t30.length === 4          },
  ];

  console.log('\nTest results (' + BASE + '):');
  results.forEach(r => console.log('  [' + (r.pass ? 'PASS' : 'FAIL') + '] ' + r.label));

  const allPass = results.every(r => r.pass);
  await browser.close();
  process.exit(allPass ? 0 : 1);
})();
