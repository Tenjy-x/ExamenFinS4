// Simple micro-interaction for the submit button
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = this.querySelector('button');
            const originalContent = btn.innerHTML;
            
            btn.disabled = true;
            btn.innerHTML = '<span class="animate-spin material-symbols-outlined">progress_activity</span> Authentification...';
            
            setTimeout(() => {
                btn.innerHTML = '<span class="material-symbols-outlined">check_circle</span> Bienvenue';
                btn.classList.remove('bg-primary');
                btn.classList.add('bg-tertiary-container', 'text-on-tertiary-container');
                
                // Simulate redirect
                setTimeout(() => {
                    alert('Connexion réussie ! Redirection vers le tableau de bord opérateur.');
                    btn.innerHTML = originalContent;
                    btn.disabled = false;
                    btn.classList.add('bg-primary');
                    btn.classList.remove('bg-tertiary-container', 'text-on-tertiary-container');
                }, 1000);
            }, 1500);
        });
