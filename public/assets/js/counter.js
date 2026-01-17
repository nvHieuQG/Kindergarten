// Animated Counter for Stats
function animateCounter() {
    const counters = document.querySelectorAll('.counter');
    const speed = 200; // Lower = faster

    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        const increment = target / speed;

        const updateCount = () => {
            const count = +counter.innerText;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 10);
            } else {
                counter.innerText = target;
            }
        };

        updateCount();
    });
}

// Trigger animation when stats section is in view
document.addEventListener('DOMContentLoaded', function () {
    const statsSection = document.querySelector('.counter');
    if (statsSection) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        observer.observe(statsSection.closest('.container-fluid'));
    }
});
