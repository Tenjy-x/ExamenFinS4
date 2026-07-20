// Micro-interactions for glass cards on hover
        document.querySelectorAll('.glass-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-2px)';
                card.style.transition = 'transform 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0px)';
            });
        });

        // Simple mock for notification toggle
        const notifyBtn = document.querySelector('header button');
        notifyBtn.addEventListener('click', () => {
            notifyBtn.classList.toggle('text-primary');
            console.log('Notifications clicked');
        });
