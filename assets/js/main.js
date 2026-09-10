const menuToggle = document.getElementById('menuToggle');
const mainNav = document.getElementById('mainNav');
const siteHeader = document.getElementById('siteHeader');

function closeMenu() {
  if (!menuToggle || !mainNav) return;
  menuToggle.classList.remove('open');
  mainNav.classList.remove('open');
  if (siteHeader) siteHeader.classList.remove('menu-open');
  menuToggle.setAttribute('aria-expanded', 'false');
  menuToggle.setAttribute('aria-label', 'Open navigation');
  document.body.style.overflow = '';
}

if (menuToggle && mainNav) {
  menuToggle.addEventListener('click', () => {
    const open = mainNav.classList.toggle('open');
    menuToggle.classList.toggle('open', open);
    if (siteHeader) siteHeader.classList.toggle('menu-open', open);
    menuToggle.setAttribute('aria-expanded', String(open));
    menuToggle.setAttribute('aria-label', open ? 'Close navigation' : 'Open navigation');
    document.body.style.overflow = open ? 'hidden' : '';
  });

  mainNav.querySelectorAll('a').forEach(link => link.addEventListener('click', closeMenu));
  document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && mainNav.classList.contains('open')) {
      closeMenu();
      menuToggle.focus();
    }
  });
  window.addEventListener('resize', () => {
    if (window.innerWidth > 820) closeMenu();
  });
}

const billInput = document.getElementById('monthlyBill');
const billOutput = document.getElementById('billOutput');
const systemOutput = document.getElementById('systemOutput');
const savingOutput = document.getElementById('savingOutput');
const hiddenEstimate = document.getElementById('estimatedSystem');

function updateEstimate() {
  if (!billInput) return;

  const bill = Number(billInput.value);
  const estimatedMonthlyKwh = bill / 1.35;
  const systemKw = Math.max(2, Math.min(30, estimatedMonthlyKwh / 135));
  const roundedSystem = Math.round(systemKw * 10) / 10;
  const saving = Math.round(Math.min(78, 52 + systemKw * 1.4));

  if (billOutput) billOutput.textContent = `${bill.toLocaleString()} DH / month`;
  if (systemOutput) systemOutput.textContent = `${roundedSystem.toFixed(1)} kWp`;
  if (savingOutput) savingOutput.textContent = `Up to ${saving}%`;
  if (hiddenEstimate) hiddenEstimate.value = `${roundedSystem.toFixed(1)} kWp — up to ${saving}% estimated offset`;
}

if (billInput) {
  billInput.addEventListener('input', updateEstimate);
  updateEstimate();
}

const yearTargets = document.querySelectorAll('[data-year]');
yearTargets.forEach(target => target.textContent = new Date().getFullYear());
