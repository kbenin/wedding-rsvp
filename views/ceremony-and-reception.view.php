<?php require('partials/header.php'); ?>
<?php require('partials/banner.php'); ?>

<main>
    <section class="ceremony-and-reception">
        <div class="container">
            <div class="inner-wrapper">
                <div class="left-wrapper">
                    <div class="slider">
                        <div class="slide active" style="background-image: url('assets/images/chapel-on-the-hill.webp');"></div>
                        <div class="slide" style="background-image: url('assets/images/chapel-on-the-hill-2.webp');"></div>
                        <div class="slide" style="background-image: url('assets/images/chapel-on-the-hill-3.webp');"></div>
                        <div class="slide" style="background-image: url('assets/images/chapel-on-the-hill-4.webp');"></div>
                        <div class="slide" style="background-image: url('assets/images/chapel-on-the-hill-5.webp');"></div>
                        <button class="slider-btn prev">&#10094;</button>
                        <button class="slider-btn next">&#10095;</button>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const slides = document.querySelectorAll('.slider .slide');
                        const prevBtn = document.querySelector('.slider-btn.prev');
                        const nextBtn = document.querySelector('.slider-btn.next');
                        const slider = document.querySelector('.slider');
                        let current = 0;
                        let startX = 0;
                        let isDragging = false;
                        let autoplayInterval = null;
                        const AUTOPLAY_DELAY = 3000;

                        function showSlide(index) {
                            slides.forEach((slide, i) => {
                                slide.classList.toggle('active', i === index);
                            });
                        }

                        function nextSlide() {
                            current = (current + 1) % slides.length;
                            showSlide(current);
                        }

                        function prevSlide() {
                            current = (current - 1 + slides.length) % slides.length;
                            showSlide(current);
                        }

                        function startAutoplay() {
                            if (autoplayInterval) return;
                            autoplayInterval = setInterval(nextSlide, AUTOPLAY_DELAY);
                        }

                        function stopAutoplay() {
                            clearInterval(autoplayInterval);
                            autoplayInterval = null;
                        }

                        prevBtn.addEventListener('click', function() {
                            prevSlide();
                            stopAutoplay();
                        });

                        nextBtn.addEventListener('click', function() {
                            nextSlide();
                            stopAutoplay();
                        });

                        // Keyboard controls
                        slider.setAttribute('tabindex', '0');
                        slider.addEventListener('keydown', function(e) {
                            if (e.key === 'ArrowLeft') {
                                prevSlide();
                                stopAutoplay();
                                e.preventDefault();
                            } else if (e.key === 'ArrowRight') {
                                nextSlide();
                                stopAutoplay();
                                e.preventDefault();
                            }
                        });

                        // Touch events
                        slider.addEventListener('touchstart', function(e) {
                            startX = e.touches[0].clientX;
                            isDragging = true;
                            stopAutoplay();
                        });

                        slider.addEventListener('touchmove', function(e) {
                            if (!isDragging) return;
                            let diff = e.touches[0].clientX - startX;
                            if (Math.abs(diff) > 50) {
                                if (diff > 0) {
                                    prevBtn.click();
                                } else {
                                    nextBtn.click();
                                }
                                isDragging = false;
                            }
                        });

                        slider.addEventListener('touchend', function() {
                            isDragging = true;
                            startAutoplay();
                        });

                        // Mouse events
                        slider.addEventListener('mousedown', function(e) {
                            startX = e.clientX;
                            isDragging = true;
                            stopAutoplay();
                        });

                        slider.addEventListener('mousemove', function(e) {
                            if (!isDragging) return;
                            let diff = e.clientX - startX;
                            if (Math.abs(diff) > 50) {
                                if (diff > 0) {
                                    prevBtn.click();
                                } else {
                                    nextBtn.click();
                                }
                                isDragging = false;
                            }
                        });

                        slider.addEventListener('mouseup', function() {
                            isDragging = false;
                            startAutoplay();
                        });

                        slider.addEventListener('mouseleave', function() {
                            isDragging = false;
                            startAutoplay();
                        });

                        // Pause autoplay on hover or focus
                        slider.addEventListener('mouseenter', stopAutoplay);
                        slider.addEventListener('mouseleave', startAutoplay);
                        slider.addEventListener('focusin', stopAutoplay);
                        slider.addEventListener('focusout', startAutoplay);

                        // Start autoplay initially
                        showSlide(current);
                        startAutoplay();
                    });
                </script>
                <style>
                    .left-wrapper {
                        position: relative;
                        width: 350px;
                        min-height: 500px;
                        overflow: hidden;
                        border-radius: 10px;
                    }
                    .slider {
                        width: 100%;
                        height: 500px;
                        position: relative;
                    }
                    .slide {
                        position: absolute;
                        width: 100%;
                        height: 100%;
                        background-size: cover;
                        background-position: center;
                        opacity: 0;
                        transition: opacity 0.5s;
                    }
                    .slide.active {
                        opacity: 1;
                        z-index: 1;
                    }
                    .slider-btn {
                        position: absolute;
                        top: 50%;
                        transform: translateY(-50%);
                        background: rgba(255,255,255,0.7);
                        border: none;
                        font-size: 1.5rem;
                        cursor: pointer;
                        z-index: 2;
                        padding: 0 10px;
                        border-radius: 50%;
                    }
                    .slider-btn.prev { left: 10px; }
                    .slider-btn.next { right: 10px; }
                </style>
                <div class="right-wrapper">
                    <h3 class="time">1:00 PM - Ceremony</h3>
                    <div class="address">Chapel on the Hill, 3R4P+XCP, Balutao Road, Calaca, Batangas</div>
                </div>
            </div>  
        </div>
    </section>
</main>

<?php require('partials/footer.php'); ?>
