import { chromium } from 'playwright';
const browser = await chromium.launch({ headless:true, channel:'chrome', args:['--no-sandbox','--disable-setuid-sandbox']});
const page = await browser.newPage({ viewport:{width:1440,height:900}});
await page.goto('http://localhost/testro/', { waitUntil:'networkidle', timeout:60000 });
await page.waitForTimeout(2000);
await page.screenshot({ path:'final-desktop.png', fullPage:true });
const seo = await page.evaluate(() => {
  const meta = (n) => document.querySelector(`meta[name="${n}"]`)?.content || document.querySelector(`meta[property="${n}"]`)?.content;
  return {
    title: document.title,
    h1Count: document.querySelectorAll('h1').length,
    h1: document.querySelector('h1')?.innerText,
    desc: meta('description'),
    canonical: document.querySelector('link[rel="canonical"]')?.href,
    ogTitle: meta('og:title'),
    twitter: meta('twitter:card'),
    schemas: [...document.querySelectorAll('script[type="application/ld+json"]')].map(s => {
      try { return JSON.parse(s.textContent)?.['@type'] || Object.keys(JSON.parse(s.textContent)); } catch { return 'bad'; }
    }),
    navText: document.querySelector('nav')?.innerText?.replace(/\s+/g,' ').trim(),
    bannerCTA: document.querySelector('.testro-top-banner__cta')?.innerText,
    sections: ['why-the-testro','features','how-it-works','pricing','testimonials','videos','faq','contact-form'].map(id => ({id, ok:!!document.getElementById(id)})),
    cssOk: !!document.querySelector('link[href*="main.css"]'),
    jsOk: !!document.querySelector('script[src*="main.js"]'),
  };
});
console.log(JSON.stringify(seo,null,2));
// Check legal pages
for (const path of ['/terms-conditions/','/privacy-notice/','/blog/']) {
  const res = await page.goto('http://localhost/testro'+path, {waitUntil:'domcontentloaded'});
  console.log(path, res.status(), await page.title());
}
// robots + sitemap
const r1 = await page.goto('http://localhost/testro/robots.txt');
console.log('robots', r1.status(), (await page.content()).slice(0,400));
const r2 = await page.goto('http://localhost/testro/wp-sitemap.xml');
console.log('sitemap', r2.status(), (await page.content()).slice(0,500));
await browser.close();
