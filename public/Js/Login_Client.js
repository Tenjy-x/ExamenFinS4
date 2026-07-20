function simulateLogin() {
        const btn = document.getElementById("submitBtn");
        const originalContent = btn.innerHTML;

        // Start Loading State
        btn.disabled = true;
        btn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Chargement...
            `;

        // Just for visual effect
        setTimeout(() => {
            btn.innerHTML = `<span aria-hidden="true">✓</span> Connecté`;
          btn.classList.replace("bg-primary", "bg-tertiary-container");
          btn.classList.add("text-on-tertiary-container");

          setTimeout(() => {
            alert(
              "Simulation de connexion réussie pour le numéro: " +
                document.getElementById("phone").value,
            );
            btn.disabled = false;
            btn.innerHTML = originalContent;
            btn.classList.replace("bg-tertiary-container", "bg-primary");
            btn.classList.remove("text-on-tertiary-container");
          }, 1000);
        }, 1500);
      }

      // Minimalist input mask logic or hover effect
      const input = document.getElementById("phone");
      input.addEventListener("focus", () => {
        input.parentElement.classList.add("scale-[1.01]");
      });
      input.addEventListener("blur", () => {
        input.parentElement.classList.remove("scale-[1.01]");
      });
