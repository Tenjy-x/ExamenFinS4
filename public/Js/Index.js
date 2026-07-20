// Simple interactive effects for the bento cards
        document.querySelectorAll('.glass-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.borderColor = 'rgba(6, 78, 59, 0.4)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.borderColor = 'rgba(226, 232, 240, 0.8)';
            });
        });

        // Search Bar Focus Effect
        const searchInput = document.querySelector('input[type="text"]');
        if(searchInput) {
            searchInput.addEventListener('focus', () => {
                searchInput.parentElement.classList.add('scale-105');
            });
            searchInput.addEventListener('blur', () => {
                searchInput.parentElement.classList.remove('scale-105');
            });
        }
