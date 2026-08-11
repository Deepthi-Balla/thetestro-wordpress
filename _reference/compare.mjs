import { chromium } from 'playwright';
const browser = await chromium.launch({
  headless: true,
  channel: 'chrome',
  args: ['--no-sandbox','--disable-setuid-sandbox','--disable-gpu']
});
const page = await browser.newPage({ viewport: { width: 1440, height: 900 } });
await page.goto('http://localhost/testro/', { waitUntil: 'networkidle', timeout: 60000 });
await page.waitForTimeout(2500);
await page.screenshot({ path: 'ours-desktop.png', fullPage: true });
await page.setViewportSize({ width: 390, height: 844 });
await page.waitForTimeout(800);
await page.screenshot({ path: 'ours-mobile.png', fullPage: true });
// section checklist
const check = await page.evaluate(() => {
  const ids = ['why-the-testro','features','how-it-works','pricing','testimonials','videos','faq','contact-form'];
  return {
    title: document.title,
    h1: [...document.querySelectorAll('h1')].map(e=>e.innerText),
    ids: Object.fromEntries(ids.map(id => [id, !!document.getElementById(id)])),
    sections: [...document.querySelectorAll('section')].map(s => s.className.slice(0,60)),
    errors: performance.getEntriesByType?.('resource')?.filter(r=>r.name.includes('testro')&&r.transferSize===0).length
  };
});
console.log(JSON.stringify(check,null,2));
await browser.close();
