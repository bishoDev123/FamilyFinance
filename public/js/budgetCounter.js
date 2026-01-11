document.addEventListener("DOMContentLoaded", () => {
   const budget = document.getElementById("budget");
   if (!budget) return;

   const target = parseInt(budget.dataset.target, 10);
   const duration = 1500;
   const startTime = performance.now();

   function update(currentTime) {
       const elapsed = currentTime - startTime;
       const progress = Math.min(elapsed / duration, 1);

       const value = Math.floor(progress * target);
       budget.textContent = `$${value.toLocaleString()}`;

       if (progress < 1) requestAnimationFrame(update);
   }

   requestAnimationFrame(update);
});
