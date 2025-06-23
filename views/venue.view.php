<?php require('partials/header.php'); ?>
<?php require('partials/banner.php'); ?>

<main>
    <section class="ceremony-and-reception" style="background-image: url('assets/images/bg-about-couple.png');">
        <div class="container">
            <div class="inner-wrapper">
                <div class="ceremony">
                    <div class="left-wrapper">
                        <div class="slider">
                            <div class="slide active" style="background-image: url('assets/images/chapel-on-the-hill.webp');"></div>
                            <div class="slide" style="background-image: url('assets/images/chapel-on-the-hill-2.webp');"></div>
                            <div class="slide" style="background-image: url('assets/images/chapel-on-the-hill-3.webp');"></div>
                            <div class="slide" style="background-image: url('assets/images/chapel-on-the-hill-4.webp');"></div>
                        </div>
                    </div>
                    <div class="right-wrapper details-wrapper">
                        <div class="details">
                            <div class="time">1:00 PM - Ceremony</div>
                            <div class="address">Chapel on the Hill, 3R4P+XCP, Balutao Road, Calaca, Batangas</div>
                        </div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3870.3338341088365!2d120.8334992750959!3d14.057453686367056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd9c26637ae0a1%3A0x469e957a8a28f790!2sDon%20Bosco%20Chapel%20on%20the%20Hill!5e0!3m2!1sen!2sph!4v1750573598609!5m2!1sen!2sph" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
                    </div>
                </div>
                <div class="reception">
                    <div class="left-wrapper">
                        <div class="slider">
                            <div class="slide active" style="background-image: url('assets/images/hacienda-solange-1.jpg');"></div>
                            <div class="slide" style="background-image: url('assets/images/hacienda-solange-2.jpeg');"></div>
                            <div class="slide" style="background-image: url('assets/images/hacienda-solange-3.webp');"></div>
                            <div class="slide" style="background-image: url('assets/images/hacienda-solange-4.webp');"></div>
                        </div>
                    </div>
                    <div class="right-wrapper details-wrapper">
                        <div class="details">
                            <div class="time">4:30PM - Reception</div>
                            <div class="address">Hacienda Solange Tagaytay, Brgy. 047 Aguinaldo - Alfonso Rd, Alfonso, Cavite</div>
                        </div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.3168736179273!2d120.87320747509696!3d14.117453286313632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd9d47d1e89481%3A0xe031168a76d5712!2sHacienda%20Solange%20Private%20Events%20Place!5e0!3m2!1sen!2sph!4v1750575105251!5m2!1sen!2sph" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>  
        </div>
    </section>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // For each slider on the page
        document.querySelectorAll('.slider').forEach(function(slider) {
            const slides = slider.querySelectorAll('.slide');
            const prevBtn = slider.querySelector('.slider-btn.prev');
            const nextBtn = slider.querySelector('.slider-btn.next');
            let current = 0;
            let startX = 0;
            let isDragging = false;
            let autoplayInterval = null;
            const AUTOPLAY_DELAY = 3000;

            // Create dots container OUTSIDE the slider
            const dotsContainer = document.createElement('div');
            dotsContainer.className = 'slider-dots';
            slides.forEach((slide, i) => {
                const dot = document.createElement('button');
                dot.className = 'slider-dot';
                dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
                if (i === 0) dot.classList.add('active');
                dot.addEventListener('click', function() {
                    current = i;
                    showSlide(current);
                    stopAutoplay();
                });
                dotsContainer.appendChild(dot);
            });

            // Insert dotsContainer after the slider
            if (slider.parentNode) {
                slider.parentNode.insertBefore(dotsContainer, slider.nextSibling);
            }

            const dots = dotsContainer.querySelectorAll('.slider-dot');

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.toggle('active', i === index);
                });
                dots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === index);
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

            if (prevBtn && nextBtn) {
                prevBtn.addEventListener('click', function() {
                    prevSlide();
                    stopAutoplay();
                });

                nextBtn.addEventListener('click', function() {
                    nextSlide();
                    stopAutoplay();
                });
            }

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
                        prevSlide();
                    } else {
                        nextSlide();
                    }
                    isDragging = false;
                }
            });

            slider.addEventListener('touchend', function() {
                isDragging = false;
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
                        prevSlide();
                    } else {
                        nextSlide();
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
    });
</script>
<style>
.slider-dots {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 10px;
    position: static;
    z-index: 3;
}
.slider-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: none;
    background: var(--pink-lt);
    opacity: 0.5;
    cursor: pointer;
    transition: opacity 0.2s, background 0.2s;
    outline: none;
}
.slider-dot.active {
    background: var(--pink-dk);
    opacity: 1;
}
</style>
<style>
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
        border: none;
        cursor: pointer;
        z-index: 2;
        margin: 0;
        padding: 0;
        background: transparent;
    }
    .slider-btn.prev { 
        left: 10px;
        position: relative;
    }
    .slider-btn.prev::before {
        content: '\f104'; /* FontAwesome left arrow */
        font-family: var(--fa-free);
        font-weight: 900;
        font-size: 30px;
        color: white;
        background-color: var(--pink);
        padding: 10px 15px;
        border-radius: 25px;
    }
    .slider-btn.next { 
        right: 10px;
        position: relative; 
    }
    .slider-btn.next::before {
        content: '\f054'; /* FontAwesome left arrow */
        font-family: var(--fa-free);
        font-weight: 900;
        font-size: 30px;
        color: white;
        background-color: var(--pink);
        padding: 10px 15px;
        border-radius: 25px;
    }
</style>

<?php require('partials/footer.php'); ?>
