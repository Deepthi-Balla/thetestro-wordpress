import { chromium } from 'playwright';

const url = process.argv[2] || 'http://127.0.0.1:8099/products/ai-test-automation/';
const out = process.argv[3] || '/tmp/shots';
const width = Number(process.argv[4] || 1440);
const height = Number(process.argv[5] || 1000);
const prefix = process.argv[6] || 'desktop';

const browser = await chromium.launch();
const page = await browser.newPage({ viewport: { width, height }, deviceScaleFactor: 1 });

const errors = [];
page.on('console', (m) => {
  if (m.type() === 'error') errors.push(m.text());
});
page.on('pageerror', (e) => errors.push(String(e)));

await page.goto(url, { waitUntil: 'networkidle' });

// Trigger every scroll-reveal observer by walking to the true bottom.
for (let i = 0; i < 400; i++) {
  const done = await page.evaluate(() => {
    const max = document.documentElement.scrollHeight - window.innerHeight;
    if (window.scrollY >= max - 2) return true;
    window.scrollTo(0, Math.min(max, window.scrollY + 400));
    return false;
  });
  await page.waitForTimeout(90);
  if (done) break;
}
await page.waitForTimeout(1200);
await page.evaluate(() => window.scrollTo(0, 0));
await page.waitForTimeout(900);

const unrevealed = await page.evaluate(
  () => document.querySelectorAll('[data-reveal]:not(.is-revealed)').length
);

await page.screenshot({ path: `${out}/${prefix}-full.png`, fullPage: true });

const sections = [
  ['hero', '.testro-prod-hero'],
  ['ai-native', '#ai-native-automation'],
  ['engine', '#intelligent-automation-engine'],
  ['execution', '#enterprise-test-execution'],
  ['lifecycle', '#autonomous-test-lifecycle'],
  ['analytics', '#quality-intelligence'],
  ['architecture', '#enterprise-architecture'],
  ['pipeline', '#devops-continuous-quality'],
  ['comparison', '#ai-vs-legacy'],
  ['outcomes', '#enterprise-outcomes'],
  ['cta', '#get-started'],
];

for (const [name, sel] of sections) {
  const el = await page.$(sel);
  if (!el) {
    console.log(`MISSING ${name} (${sel})`);
    continue;
  }
  await el.screenshot({ path: `${out}/${prefix}-${name}.png` });
}

// Horizontal overflow check.
const overflow = await page.evaluate(
  () => document.documentElement.scrollWidth - document.documentElement.clientWidth
);

console.log(
  JSON.stringify({ prefix, width, overflowPx: overflow, unrevealed, consoleErrors: errors }, null, 2)
);

await browser.close();
