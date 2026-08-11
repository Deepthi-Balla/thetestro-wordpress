import { chromium } from 'playwright';
async function audit(url, label) {
  const browser = await chromium.launch({ headless:true, channel:'chrome', args:['--no-sandbox','--disable-setuid-sandbox']});
  const page = await browser.newPage({ viewport:{width:1440,height:900}});
  await page.goto(url, {waitUntil:'networkidle', timeout:60000});
  await page.waitForTimeout(2000);
  const data = await page.evaluate(() => {
    const cs = (el) => el ? getComputedStyle(el) : null;
    const pick = (sel) => {
      const el = document.querySelector(sel);
      if (!el) return null;
      const s = cs(el); const r = el.getBoundingClientRect();
      return { sel, text:(el.innerText||'').slice(0,80).replace(/\s+/g,' '),
        w:Math.round(r.width), h:Math.round(r.height), top:Math.round(r.top),
        fontSize:s.fontSize, fontWeight:s.fontWeight, color:s.color,
        bg:s.backgroundImage!=='none'?s.backgroundImage.slice(0,80):s.backgroundColor,
        radius:s.borderRadius, position:s.position, display:s.display };
    };
    return {
      banner: pick('.testro-top-banner, [class*=banner]') || pick('body > div > div'),
      nav: pick('nav'),
      h1: pick('h1'),
      pill: pick('.subtitle-pill'),
      btn: pick('.primary-button, .testro-btn--primary, button.primary-button'),
      stats: pick('.testro-stats, .background-blink'),
      how: pick('.how-it-works-container, .testro-how'),
      pricingToggle: pick('.tabs-container, .testro-pricing__toggle'),
    };
  });
  // crop hero
  await page.screenshot({path:`${label}-hero.png`, clip:{x:0,y:0,width:1440,height:900}});
  await page.evaluate(() => window.scrollTo(0, document.querySelector('#pricing')?.offsetTop-80 || 2000));
  await page.waitForTimeout(500);
  await page.screenshot({path:`${label}-pricing.png`, clip:{x:0,y:0,width:1440,height:900}});
  await browser.close();
  return data;
}
const ours = await audit('http://localhost/testro/', 'ours');
const ref = await audit('https://www.thetestro.com/', 'ref');
import fs from 'fs';
fs.writeFileSync('audit.json', JSON.stringify({ours, ref}, null, 2));
console.log(JSON.stringify({ours, ref}, null, 2));
