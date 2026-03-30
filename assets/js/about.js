// about.js - JavaScript cho trang About
document.addEventListener('DOMContentLoaded', function() {
    // Counter animation
    initCounters();
    
    // Smooth scroll cho anchor links
    initSmoothScroll();
    
    // Lazy load images
    initLazyLoading();
});

function initCounters() {
    const counters = document.querySelectorAll('.counter');
    const duration = 2000; // 2 seconds

    counters.forEach(counter => {
        const target = parseFloat(counter.getAttribute('data-target'));
        const increment = target / (duration / 16);
        let current = 0;
        let hasAnimated = false;

        const updateCounter = () => {
            if (!hasAnimated) {
                current += increment;
                if (current < target) {
                    counter.textContent = current.toLocaleString('vi-VN', {maximumFractionDigits: 1});
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target.toLocaleString('vi-VN', {maximumFractionDigits: 1});
                    hasAnimated = true;
                }
            }
        };

        // Start counter when element is in viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !hasAnimated) {
                    updateCounter();
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });
        
        observer.observe(counter);
    });
}

function initSmoothScroll() {
    // Smooth scroll cho các anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

function initLazyLoading() {
    // Lazy load images nếu browser hỗ trợ
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src || img.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
}

// Thêm hiệu ứng parallax nhẹ cho hero section
function initParallax() {
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const hero = document.querySelector('.hero-section');
        if (hero) {
            const rate = scrolled * -0.5;
            hero.style.transform = `translateY(${rate}px)`;
        }
    });
}

// Tối ưu performance - chỉ chạy parallax trên desktop
if (window.innerWidth > 768) {
    initParallax();
}

// Preload critical images
function preloadImages() {
    const images = [
        '../assets/img/dngv.jpg'
    ];
    
    images.forEach(src => {
        const img = new Image();
        img.src = src;
    });
}

preloadImages();