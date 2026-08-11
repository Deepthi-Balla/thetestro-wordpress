import { chromium } from 'playwright';
const browser = await chromium.launch({
  headless: true,
  channel: 'chrome',
  args: ['--no-sandbox','--disable-setuid-sandbox','--disable-gpu']
});
const page = await browser.newPage({ viewport: { width: 1440, height: 900 } });
await page.goto('https://www.thetestro.com/', { waitUntil: 'networkidle', timeout: 90000 });
await page.waitForTimeout(4000);
const html = await page.content();
await page.screenshot({ path: 'home-desktop.png', fullPage: true });
import fs from 'fs';
fs.writeFileSync('rendered.html', html);
const styles = await page.evaluate(() => {
  const pick = (sel) => {
    const el = document.querySelector(sel);
    if (!el) return null;
    const cs = getComputedStyle(el);
    return {
      fontSize: cs.fontSize, fontFamily: cs.fontFamily, fontWeight: cs.fontWeight,
      color: cs.color, background: cs.backgroundImage || cs.backgroundColor,
      padding: cs.padding, margin: cs.margin, lineHeight: cs.lineHeight,
      text: (el.innerText||'').slice(0,200), tag: el.tagName
    };
  };
  // section order
  const sections = [...document.querySelectorAll('section, [id]')].map(el => ({
    id: el.id, tag: el.tagName, class: el.className?.toString?.().slice(0,80),
    text: (el.innerText||'').slice(0,80).replace(/\s+/g,' ')
  }));
  return {
    h1: pick('h1'),
    gradient: pick('.gradient-text'),
    sub: pick('.sub-text'),
    pill: pick('.subtitle-pill'),
    btn: pick('.primary-button'),
    nav: pick('nav'),
    body: { fontFamily: getComputedStyle(document.body).fontFamily, bg: getComputedStyle(document.body).backgroundColor },
    sections: sections.slice(0,40),
    title: document.title
  };
});
fs.writeFileSync('computed.json', JSON.stringify(styles,null,2));
await page.setViewportSize({ width: 390, height: 844 });
await page.waitForTimeout(1000);
await page.screenshot({ path: 'home-mobile.png', fullPage: true });
console.log('DONE', html.length);
console.log(JSON.stringify(styles, null, 2).slice(0, 3000));
await browser.close();
