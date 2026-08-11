#!/usr/bin/env node
/**
 * Generate AVIF siblings from assets/images/webp/*.webp (or PNG fallbacks).
 * Requires: npm i sharp (run from theme or use npx).
 *
 * Usage: node bin/generate-avif.js
 */
const fs = require('fs');
const path = require('path');

const root = path.join(__dirname, '..');
const webpDir = path.join(root, 'assets/images/webp');
const pngDir = path.join(root, 'assets/images');
const outDir = path.join(root, 'assets/images/avif');

async function main() {
  let sharp;
  try {
    sharp = require('sharp');
  } catch (e) {
    console.error('sharp not installed. Run: npm i --no-save sharp');
    process.exit(1);
  }

  fs.mkdirSync(outDir, { recursive: true });

  const sources = [];
  if (fs.existsSync(webpDir)) {
    for (const f of fs.readdirSync(webpDir)) {
      if (/\.webp$/i.test(f)) sources.push(path.join(webpDir, f));
    }
  }
  if (!sources.length && fs.existsSync(pngDir)) {
    for (const f of fs.readdirSync(pngDir)) {
      if (/\.(png|jpe?g)$/i.test(f)) sources.push(path.join(pngDir, f));
    }
  }

  let ok = 0;
  for (const src of sources) {
    const base = path.basename(src).replace(/\.(webp|png|jpe?g)$/i, '');
    const dest = path.join(outDir, base + '.avif');
    try {
      await sharp(src).avif({ quality: 55, effort: 4 }).toFile(dest);
      console.log('AVIF', path.basename(dest), fs.statSync(dest).size, 'bytes');
      ok++;
    } catch (err) {
      console.error('Failed', src, err.message);
    }
  }
  console.log(`Generated ${ok}/${sources.length} AVIF files`);
}

main();
