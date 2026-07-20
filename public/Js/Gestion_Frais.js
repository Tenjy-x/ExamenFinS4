// Micro-interaction for table rows
        document.querySelectorAll('tr').forEach(row => {
            row.addEventListener('click', () => {
                row.classList.add('scale-[0.995]', 'bg-surface-container-high');
                setTimeout(() => {
                    row.classList.remove('scale-[0.995]', 'bg-surface-container-high');
                }, 150);
            });
        });

        // Simple prefix add logic simulation
        const addBtn = document.querySelector('button.bg-secondary-container');
        const input = document.querySelector('input[placeholder="ex: 032"]');
        addBtn.addEventListener('click', () => {
            if(input.value) {
                console.log('Prefix added:', input.value);
                input.value = '';
                // Logic to update DOM would go here
            }
        });
