#!/usr/bin/env bash
# Apply SEO server files that the theme cannot write (owned by www-data/nobody).
# Run from the WordPress root, e.g.:
#   sudo bash wp-content/themes/testro/bin/apply-seo-server-files.sh
set -euo pipefail

ROOT="$(cd "$(dirname "$0")/../../../.." && pwd)"
THEME="$(cd "$(dirname "$0")/.." && pwd)"

echo "WordPress root: $ROOT"
echo "Theme: $THEME"

if [[ ! -f "$ROOT/wp-config.php" ]]; then
  echo "ERROR: wp-config.php not found at $ROOT — run from theme bin/ or pass correct path."
  exit 1
fi

# --- robots.txt ---
# Prefer WordPress dynamic robots_txt (testro_robots_txt) with absolute
# Sitemap URLs. A physical file overrides that filter.
if [[ -f "$ROOT/robots.txt" ]]; then
  # Empty (do not delete if owned by another user / may be recreated).
  : > "$ROOT/robots.txt" 2>/dev/null && echo "Emptied $ROOT/robots.txt (dynamic WP robots preferred)" \
    || echo "WARN: could not empty $ROOT/robots.txt — delete it manually so testro_robots_txt can run"
else
  echo "No physical robots.txt — theme filter testro_robots_txt will serve absolute Sitemap URLs"
fi

# --- .htaccess performance block ---
if ! grep -q 'BEGIN TestRo Performance' "$ROOT/.htaccess" 2>/dev/null; then
  printf '\n' >> "$ROOT/.htaccess"
  cat "$THEME/assets/htaccess-performance.snippet" >> "$ROOT/.htaccess"
  echo "Appended TestRo Performance block to .htaccess"
else
  echo ".htaccess already contains TestRo Performance block — skipped"
fi

echo "Done."
