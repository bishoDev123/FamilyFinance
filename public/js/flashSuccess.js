document.addEventListener('DOMContentLoaded', () => {
    const el = document.getElementById('flash-message');
    if (!el) return;

    setTimeout(() => {
        // Lock current computed values
        const height = el.offsetHeight;
        const marginBottom = getComputedStyle(el).marginBottom;

        el.style.height = height + 'px';
        el.style.marginBottom = marginBottom;

        // Force reflow
        el.offsetHeight;

        // Animate collapse
        el.style.height = '0';
        el.style.opacity = '0';
        el.style.marginBottom = '0';
        el.style.paddingTop = '0';
        el.style.paddingBottom = '0';

        setTimeout(() => el.remove(), 300);
    }, 3000);
});
