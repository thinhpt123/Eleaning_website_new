// course-detail.js - JavaScript cho trang Chi tiết khóa học
document.addEventListener('DOMContentLoaded', function() {
    initTabs();
    initProgressBar();
    initCartButtons();
    initReviews();
    initScrollSpy();
    initImageZoom();
});

function initTabs() {
    const tabs = document.querySelectorAll('.course-tab');
    tabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Active tab
            document.querySelectorAll('.course-tab').forEach(t => {
                t.classList.remove('active');
                const targetPane = document.querySelector(t.getAttribute('href'));
                if (targetPane) targetPane.classList.remove('active');
            });
            
            this.classList.add('active');
            const targetPane = document.querySelector(this.getAttribute('href'));
            if (targetPane) targetPane.classList.add('active');
        });
    });
}

function initProgressBar() {
    const progressBars = document.querySelectorAll('.progress-fill');
    progressBars.forEach(bar => {
        const targetWidth = bar.dataset.progress;
        setTimeout(() => {
            bar.style.width = targetWidth;
        }, 500);
    });
}

function initCartButtons() {
    const cartBtn = document.getElementById('addToCartBtn');
    const buyNowBtn = document.getElementById('buyNowBtn');
    
    if (cartBtn) {
        cartBtn.addEventListener('click', function() {
            addToCartFeedback(this, 'Đã thêm vào giỏ hàng!');
        });
    }
    
    if (buyNowBtn) {
        buyNowBtn.addEventListener('click', function() {
            buyNowFeedback(this);
        });
    }
}

function addToCartFeedback(button, message) {
    const originalText = button.innerHTML;
    button.innerHTML = `<i class="fa fa-check me-2"></i>${message}`;
    button.classList.add('btn-success');
    button.disabled = true;
    
    setTimeout(() => {
        button.innerHTML = originalText;
        button.classList.remove('btn-success');
        button.disabled = false;
    }, 2000);
}

function buyNowFeedback(button) {
    button.innerHTML = '<i class="fa fa-spinner fa-spin me-2"></i>Đang xử lý...';
    button.disabled = true;
    
    // Simulate checkout
    setTimeout(() => {
        window.location.href = 'checkout.php';
    }, 1500);
}

function initReviews() {
    const reviewForm = document.getElementById('reviewForm');
    if (reviewForm) {
        reviewForm.addEventListener('submit', function(e) {
            e.preventDefault();
            submitReview();
        });
    }
}

function submitReview() {
    const rating = document.querySelector('input[name="rating"]:checked');
    const comment = document.getElementById('reviewComment').value;
    
    if (rating && comment.trim()) {
        // Simulate review submission
        const newReview = {
            name: 'Học viên mới',
            rating: rating.value,
            comment: comment,
            date: new Date().toLocaleDateString('vi-VN')
        };
        
        addReviewToDOM(newReview);
        document.getElementById('reviewForm').reset();
    }
}

function addReviewToDOM(review) {
    const reviewsContainer = document.getElementById('reviewsContainer');
    const reviewHtml = `
        <div class="testimonial-card mb-4 p-4">
            <div class="d-flex align-items-start mb-3">
                <div class="flex-shrink-0">
                    <div class="bg-primary bg-opacity-20 p-2 rounded-circle">
                        <i class="fa-solid fa-user fa-lg text-primary"></i>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <div class="d-flex justify-content-between align-items-start mb-1">
                        <h6 class="mb-1">${review.name}</h6>
                        <div class="text-warning">
                            ${'★'.repeat(review.rating)}${'☆'.repeat(5 - review.rating)}
                        </div>
                    </div>
                    <small class="text-muted">${review.date}</small>
                </div>
            </div>
            <p class="mb-0">${review.comment}</p>
        </div>
    `;
    reviewsContainer.insertAdjacentHTML('afterbegin', reviewHtml);
}

function initScrollSpy() {
    const sections = document.querySelectorAll('.course-section');
    const navLinks = document.querySelectorAll('.course-nav-link');
    
    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (scrollY >= (sectionTop - 200)) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    });
}

function initImageZoom() {
    const courseImage = document.querySelector('.course-image-large');
    if (courseImage) {
        courseImage.addEventListener('click', function() {
            const modal = document.createElement('div');
            modal.className = 'image-modal';
            modal.innerHTML = `
                <div class="image-modal-content">
                    <span class="image-modal-close">&times;</span>
                    <img src="${this.src}" alt="Course image">
                </div>
            `;
            document.body.appendChild(modal);
            
            modal.querySelector('.image-modal-close').onclick = () => {
                document.body.removeChild(modal);
            };
            
            modal.onclick = (e) => {
                if (e.target === modal) document.body.removeChild(modal);
            };
        });
    }
}

// Smooth scroll cho nav (không cần scroll spy)
document.querySelectorAll('.course-nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetSection = document.querySelector(targetId);
        
        if (targetSection) {
            targetSection.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
            
            // Active nav tạm thời
            document.querySelectorAll('.course-nav-link').forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        }
    });
});