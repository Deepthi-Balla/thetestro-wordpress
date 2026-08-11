import { chromium } from 'playwright';
import fs from 'fs';

const extractFn = () => {
  const KEYS = [
    'fontSize','fontWeight','fontFamily','lineHeight','letterSpacing','color',
    'backgroundColor','backgroundImage','borderRadius','paddingTop','paddingRight',
    'paddingBottom','paddingLeft','marginTop','marginRight','marginBottom','marginLeft',
    'width','height','maxWidth','gap','display','alignItems','justifyContent',
    'textAlign','boxShadow','opacity','position'
  ];
  const metrics = (el) => {
    if (!el) return null;
    const s = getComputedStyle(el);
    const r = el.getBoundingClientRect();
    const m = {};
    for (const k of KEYS) m[k] = s[k];
    m._w = Math.round(r.width);
    m._h = Math.round(r.height);
    m._text = (el.innerText || '').replace(/\s+/g,' ').trim().slice(0,60);
    m._tag = el.tagName;
    return m;
  };
  const q = (sel) => document.querySelector(sel);
  const qa = (sel) => [...document.querySelectorAll(sel)];
  const cardSel = (root, sels) => {
    if (!root) return [];
    for (const s of sels) {
      const els = [...root.querySelectorAll(s)];
      if (els.length) return els.slice(0,6).map((el,i)=>({i, ...metrics(el)}));
    }
    return [];
  };

  const banner = q('.testro-top-banner') || qa('div').find(d => (d.innerText||'').includes('Boost Testing Efficiency') && (d.innerText||'').length < 220);
  const nav = q('nav');
  const h1 = q('h1');
  const pill = q('.subtitle-pill') || qa('p').find(p => (p.innerText||'').includes('Automate Everything'));
  const heroSub = q('.testro-hero__sub') || (h1 && [...h1.parentElement.querySelectorAll('p')].find(p => (p.innerText||'').length > 40 && p !== pill));
  const heroBtn = q('.testro-hero .primary-button, .testro-hero .testro-btn--primary') ||
    qa('button,a').find(b => /Try theTestRo for free/i.test(b.innerText||'') && !b.closest('nav'));
  const statsSec = q('.testro-stats, .background-blink') || qa('section').find(s => /Projects Successfully/i.test(s.innerText||''));
  const clientsSec = q('.testro-clients, .industry-leaders-container') || qa('section').find(s => /Industry Leaders/i.test(s.innerText||''));
  const svcSec = q('.testro-services') || qa('section').find(s => /Quality services you can count/i.test(s.innerText||''));
  const whySec = q('.testro-why') || q('#why-the-testro')?.closest('section') || qa('section').find(s => /Why Teams Love/i.test(s.innerText||''));
  const featSec = q('.testro-features') || q('#features')?.closest('section') || qa('section').find(s => /Powerful Features/i.test(s.innerText||''));
  const howSec = q('.how-it-works-container, .testro-how') || q('#how-it-works')?.closest('section') || qa('section').find(s => /How theTestRo Works/i.test(s.innerText||''));
  const priceSec = q('.testro-pricing') || q('#pricing')?.closest('section') || qa('section').find(s => /Test Automation for Everyone/i.test(s.innerText||''));
  const testSec = q('.testro-testimonials') || q('#testimonials')?.closest('section') || qa('section').find(s => /What Our Clients/i.test(s.innerText||''));
  const vidSec = q('.testro-videos') || q('#videos')?.closest('section') || qa('section').find(s => /Watch theTestRo in Action/i.test(s.innerText||''));
  const faqSec = q('.testro-faq') || q('#faq')?.closest('section') || qa('section').find(s => /Frequently Asked Questions/i.test(s.innerText||''));
  const contactSec = q('.testro-contact') || q('#contact-form')?.closest('section') || qa('section').find(s => /Talk to Us/i.test(s.innerText||''));
  const footer = q('footer');

  return {
    viewport: { w: innerWidth, scrollH: document.documentElement.scrollHeight },
    banner: metrics(banner),
    bannerText: metrics(banner?.querySelector('.testro-top-banner__text, p, span')),
    bannerCta: metrics(banner?.querySelector('.testro-top-banner__cta, button, a')),
    nav: metrics(nav),
    navLink: metrics(nav?.querySelector('a')),
    navBtn: metrics([...nav?.querySelectorAll('button, a')||[]].find(b => /Try theTestRo|Contact Sales/i.test(b.innerText||''))),
    logo: metrics(nav?.querySelector('img')),
    pill: metrics(pill),
    h1: metrics(h1),
    heroSub: metrics(heroSub),
    heroBtn: metrics(heroBtn),
    stats: {
      section: metrics(statsSec),
      value: metrics(statsSec?.querySelector('.testro-stats__value, h2, h3')),
      label: metrics(statsSec?.querySelector('.testro-stats__label, p')),
      item: metrics(statsSec?.querySelector('.testro-stats__item, .grid > div, [class*=stat]')),
    },
    clients: {
      section: metrics(clientsSec),
      h2: metrics(clientsSec?.querySelector('h2')),
      p: metrics([...clientsSec?.querySelectorAll('p')||[]].find(p => (p.innerText||'').length > 30)),
    },
    services: {
      section: metrics(svcSec),
      h2: metrics(svcSec?.querySelector('h2')),
      card: metrics(svcSec?.querySelector('.testro-services__card') || svcSec?.querySelector('.grid > div, [class*=rounded]')),
      cardTitle: metrics(svcSec?.querySelector('h3')),
    },
    why: {
      section: metrics(whySec),
      h2: metrics(whySec?.querySelector('h2')),
      card: metrics(whySec?.querySelector('.testro-why__card, .testro-why__item') || whySec?.querySelector('.grid > div')),
      cardTitle: metrics(whySec?.querySelector('h3')),
    },
    features: {
      section: metrics(featSec),
      h2: metrics(featSec?.querySelector('h2')),
      tab: metrics(featSec?.querySelector('.testro-features__tab, [role=tab], button')),
    },
    how: {
      section: metrics(howSec),
      h2: metrics(howSec?.querySelector('h2')),
      step: metrics(howSec?.querySelector('.testro-how__step, .testro-how__card') || howSec?.querySelector('.grid > div')),
    },
    pricing: {
      section: metrics(priceSec),
      h2: metrics(priceSec?.querySelector('h2')),
      toggle: metrics(priceSec?.querySelector('.tabs-container, .testro-pricing__toggle')),
      card: metrics(priceSec?.querySelector('.testro-pricing__card') || priceSec?.querySelector('.grid > div')),
      price: metrics(priceSec?.querySelector('.testro-pricing__price, [class*=price]')),
    },
    testimonials: {
      section: metrics(testSec),
      h2: metrics(testSec?.querySelector('h2')),
      card: metrics(testSec?.querySelector('.testro-testimonials__card, .swiper-slide') || testSec?.querySelector('[class*=card]')),
    },
    videos: {
      section: metrics(vidSec),
      h2: metrics(vidSec?.querySelector('h2')),
      card: metrics(vidSec?.querySelector('.testro-videos__card, iframe')?.closest('div') || vidSec?.querySelector('[class*=video]')),
    },
    faq: {
      section: metrics(faqSec),
      h2: metrics(faqSec?.querySelector('h2')),
      item: metrics(faqSec?.querySelector('.testro-faq__item, button')?.closest('div') || faqSec?.querySelector('button')),
    },
    contact: {
      section: metrics(contactSec),
      h2: metrics(contactSec?.querySelector('h2')),
      form: metrics(contactSec?.querySelector('form')),
      input: metrics(contactSec?.querySelector('input')),
      textarea: metrics(contactSec?.querySelector('textarea')),
      label: metrics(contactSec?.querySelector('label')),
      submit: metrics(contactSec?.querySelector('button[type=submit], .primary-button, .testro-btn--primary')),
    },
    footer: {
      section: metrics(footer),
      input: metrics(footer?.querySelector('input')),
      copyright: metrics([...footer?.querySelectorAll('p,div,span')||[]].find(el => /©|Copyright|All rights/i.test(el.innerText||''))),
    },
  };
};

async function capture(url, label) {
  const browser = await chromium.launch({
    headless: true,
    channel: 'chrome',
    args: ['--no-sandbox','--disable-setuid-sandbox']
  });
  const page = await browser.newPage({ viewport: { width: 1440, height: 900 } });
  await page.goto(url, { waitUntil: 'networkidle', timeout: 90000 });
  await page.waitForTimeout(2500);
  try { await page.click('button:has-text("Accept")', { timeout: 1000 }); } catch {}
  const data = await page.evaluate(extractFn);
  await page.screenshot({ path: `${label}-full.png`, fullPage: true });
  // section crops
  const sections = ['hero','stats','services','why','features','how','pricing','testimonials','videos','faq','contact','footer'];
  for (const name of sections) {
    try {
      await page.evaluate((n) => {
        const map = {
          hero: 'h1', stats: '.testro-stats, .background-blink',
          services: '.testro-services', why: '#why-the-testro, .testro-why',
          features: '#features', how: '#how-it-works, .how-it-works-container',
          pricing: '#pricing', testimonials: '#testimonials', videos: '#videos',
          faq: '#faq', contact: '#contact-form', footer: 'footer'
        };
        let el = document.querySelector(map[n]);
        if (!el && n === 'services') el = [...document.querySelectorAll('section')].find(s => /Quality services/i.test(s.innerText||''));
        if (!el && n === 'stats') el = [...document.querySelectorAll('section')].find(s => /Projects Successfully/i.test(s.innerText||''));
        if (!el && n === 'why') el = [...document.querySelectorAll('section')].find(s => /Why Teams Love/i.test(s.innerText||''));
        (el?.closest?.('section') || el)?.scrollIntoView({ block: 'start' });
      }, name);
      await page.waitForTimeout(400);
      await page.screenshot({ path: `${label}-${name}.png`, clip: { x:0, y:0, width:1440, height:900 } });
    } catch (e) { console.log('crop fail', label, name, e.message); }
  }
  await browser.close();
  return data;
}

function diff(a, b, path='') {
  const diffs = [];
  if (a == null && b == null) return diffs;
  if (a == null || b == null) { diffs.push({ path, ours: a, ref: b, note: 'missing' }); return diffs; }
  if (typeof a !== 'object' || typeof b !== 'object') {
    if (String(a) !== String(b)) diffs.push({ path, ours: a, ref: b });
    return diffs;
  }
  if (Array.isArray(a) || Array.isArray(b)) {
    const len = Math.max(a?.length||0, b?.length||0);
    for (let i=0;i<len;i++) diffs.push(...diff(a?.[i], b?.[i], `${path}[${i}]`));
    return diffs;
  }
  const keys = new Set([...Object.keys(a), ...Object.keys(b)]);
  for (const k of keys) {
    if (['_text','_tag','sel','name','backgroundImage','fontFamily'].includes(k)) continue;
    const av = a[k], bv = b[k];
    if (typeof av === 'object' || typeof bv === 'object') {
      diffs.push(...diff(av, bv, path ? `${path}.${k}` : k));
    } else if (String(av) !== String(bv)) {
      const numA = parseFloat(av), numB = parseFloat(bv);
      if (!isNaN(numA) && !isNaN(numB) && Math.abs(numA-numB) <= 2 && /px/.test(String(av)+String(bv))) continue;
      if ((k === '_w' || k === '_h') && Math.abs((numA||0)-(numB||0)) <= 2) continue;
      diffs.push({ path: path ? `${path}.${k}` : k, ours: av, ref: bv });
    }
  }
  return diffs;
}

console.log('Capturing local...');
const ours = await capture('http://localhost/testro/?v=' + Date.now(), 'ours');
console.log('Capturing reference...');
const ref = await capture('https://www.thetestro.com/', 'ref');
const diffs = diff(ours, ref);
const important = diffs.filter(d =>
  /fontSize|fontWeight|lineHeight|letterSpacing|_w|_h|padding|margin|gap|borderRadius|boxShadow|color|width|height|maxWidth/.test(d.path)
);
fs.writeFileSync('pixel-diff.json', JSON.stringify({ summary: { total: diffs.length, important: important.length }, important, ours, ref }, null, 2));
console.log('Total diffs:', diffs.length, 'Important:', important.length);
console.log('\n=== KEY DIFFS ===');
console.log(important.map(d => `${d.path}: ours=${JSON.stringify(d.ours)} ref=${JSON.stringify(d.ref)}`).join('\n'));
