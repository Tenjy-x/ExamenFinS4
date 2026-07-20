// Micro-interactions for fee estimation
        const amountInput = document.getElementById('transfer-amount');
        const feeDisplay = document.getElementById('fee-display');

        amountInput.addEventListener('input', (e) => {
            const amount = parseFloat(e.target.value) || 0;
            if (amount <= 0) {
                feeDisplay.innerText = "0.00 EUR";
                return;
            }
            
            // Logic: 0.1% fee with a minimum of 2.50 EUR for the "luxe" feel
            const fee = Math.max(2.5, amount * 0.001);
            
            // Animate number count for premium feel
            animateValue(feeDisplay, parseFloat(feeDisplay.innerText), fee, 300);
        });

        function animateValue(obj, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const current = (progress * (end - start) + start).toFixed(2);
                obj.innerText = current + " EUR";
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        // Form submission simple feedback
        document.getElementById('transfer-form').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Transfert initié avec succès. Vous allez recevoir une notification de confirmation.');
        });
