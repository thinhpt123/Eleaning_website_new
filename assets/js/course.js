// course.js - JavaScript cho trang Khóa học
document.addEventListener('DOMContentLoaded', function() {
    initCourseFilters();
    initSearch();
    initCartButtons();
    initSkeletonLoading();
    initSmoothScroll();
});

function initCourseFilters() {
    const filterTabs = document.querySelectorAll('.filter-tab');
    filterTabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            const filter = this.dataset.filter;
            
            // Active tab
            document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            
            // Filter courses (client-side demo)
            filterCourses(filter);
        });
    });
}

// Filter vẫn hoạt động với clickable cards
function filterCourses(filter) {
    const cards = document.querySelectorAll('.course-card');
    
    cards.forEach(card => {
        const category = card.dataset.category?.toLowerCase() || '';
        const title = card.querySelector('.course-title')?.textContent.toLowerCase() || '';
        const parentLink = card.closest('a');
        
        if (filter === 'all' || category.includes(filter) || title.includes(filter)) {
            card.style.display = 'block';
            if (parentLink) parentLink.style.pointerEvents = 'auto';
        } else {
            card.style.display = 'none';
            if (parentLink) parentLink.style.pointerEvents = 'none';
        }
    });
}
// Prevent filter conflict khi click card
document.querySelectorAll('.course-card').forEach(card => {
    card.addEventListener('click', function(e) {
        if (!e.target.closest('.btn-cart')) {
            // Click card → course_detail (đã xử lý bởi <a> wrapper)
        }
    });
});

function initSearch() {
    const searchInput = document.getElementById('courseSearch');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase();
            const cards = document.querySelectorAll('.course-card');
            
            cards.forEach(card => {
                const title = card.querySelector('.course-title').textContent.toLowerCase();
                const description = card.querySelector('.course-desc').textContent.toLowerCase();
                
                if (title.includes(query) || description.includes(query)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }
}

function initCartButtons() {
    const cartButtons = document.querySelectorAll('.btn-cart');
    cartButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            addToCartFeedback(this);
        });
    });
}

function addToCartFeedback(button) {
    const originalText = button.innerHTML;
    button.innerHTML = '<i class="fa fa-check"></i> Đã thêm!';
    button.classList.add('btn-success');
    
    setTimeout(() => {
        button.innerHTML = originalText;
        button.classList.remove('btn-success');
    }, 2000);
}

function initSkeletonLoading() {
    // Remove skeleton after 1.5s (simulate loading)
    setTimeout(() => {
        const skeletons = document.querySelectorAll('.skeleton');
        skeletons.forEach(skeleton => {
            skeleton.classList.add('loaded');
        });
    }, 1500);
}

function initSmoothScroll() {
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

// Intersection Observer cho animation khi scroll
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.course-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s ease';
        observer.observe(card);
    });
}

// Preload critical resources
function preloadResources() {
    const images = [
        '../assets/img/course-placeholder.jpg'
    ];
    images.forEach(src => {
        const img = new Image();
        img.src = src;
    });
}

// Initialize khi DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        initScrollAnimations();
        preloadResources();
    });
} else {
    initScrollAnimations();
    preloadResources();
}