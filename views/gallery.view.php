<?php require('partials/header.php'); ?>
<?php require('partials/banner.php'); ?>

<main>
    <section class="gallery-content" style="background-image: url('assets/images/bg-about-couple.png');">
        <div class="container">
            <div class="inner-wrapper">
                <div class="masonry-gallery">
                    <?php
                    // Example images array. Replace with your own images or dynamic data.
                    $images = [];
                    $galleryDir = dirname(__DIR__) . '/assets/gallery/';
                    $webPath = '/assets/gallery/';
                    if (is_dir($galleryDir)) {
                        $files = scandir($galleryDir);
                        foreach ($files as $file) {
                            if (preg_match('/\.(jpe?g|png|gif|webp)$/i', $file)) {
                                $images[] = $webPath . $file;
                            }
                        }
                    }
                    foreach ($images as $img): ?>
                        <div class="masonry-item">
                            <a href="<?= htmlspecialchars($img) ?>" class="lightbox-link">
                                <img src="<?= htmlspecialchars($img) ?>" alt="Gallery Image">
                            </a>
                        </div>
                    <?php endforeach; ?>

                    <!-- Lightbox Modal -->
                    <div id="lightbox-modal" style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100vw; height:100vh; background:rgba(0,0,0,0.85); align-items:center; justify-content:center;">
                        <span id="lightbox-close" style="position:absolute;top:30px;right:40px;font-size:2.5em;color:#fff;cursor:pointer;">&times;</span>
                        <span id="lightbox-prev" style="position:absolute;top:50%;left:40px;font-size:3em;color:#fff;cursor:pointer;user-select:none;transform:translateY(-50%);display:none;">&#8592;</span>
                        <span id="lightbox-next" style="position:absolute;top:50%;right:80px;font-size:3em;color:#fff;cursor:pointer;user-select:none;transform:translateY(-50%);display:none;">&#8594;</span>
                        <img id="lightbox-img" src="" alt="Large Image" style="max-width:90vw;max-height:90vh;display:block;margin:auto;opacity:0;transition:opacity 0.4s;">
                    </div>
                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const links = document.querySelectorAll('.lightbox-link');
                        const modal = document.getElementById('lightbox-modal');
                        const modalImg = document.getElementById('lightbox-img');
                        const closeBtn = document.getElementById('lightbox-close');
                        const prevBtn = document.getElementById('lightbox-prev');
                        const nextBtn = document.getElementById('lightbox-next');
                        let currentIndex = -1;
                        const imageUrls = Array.from(links).map(link => link.href);

                        // Animation direction state
                        let slideDirection = '';

                        function updateArrows() {
                            if (imageUrls.length <= 1) {
                                prevBtn.style.display = 'none';
                                nextBtn.style.display = 'none';
                            } else {
                                prevBtn.style.display = (currentIndex > 0) ? 'inline' : 'none';
                                nextBtn.style.display = (currentIndex < imageUrls.length - 1) ? 'inline' : 'none';
                            }
                        }

                        function animateImage(direction) {
                            modalImg.classList.remove('slide-in-left', 'slide-in-right', 'slide-out-left', 'slide-out-right');
                            void modalImg.offsetWidth; // force reflow
                            if (direction === 'left') {
                                modalImg.classList.add('slide-out-right');
                            } else if (direction === 'right') {
                                modalImg.classList.add('slide-out-left');
                            }
                        }

                        function showModal(index, direction = '') {
                            if (index < 0 || index >= imageUrls.length) return;
                            slideDirection = direction;
                            if (modal.style.display !== 'flex') {
                                modalImg.style.opacity = 0;
                                modalImg.src = imageUrls[index];
                                modal.style.display = 'flex';
                                currentIndex = index;
                                updateArrows();
                            } else if (direction) {
                                // Animate out current image
                                animateImage(direction);
                                modalImg.addEventListener('animationend', function handler() {
                                    modalImg.removeEventListener('animationend', handler);
                                    modalImg.classList.remove('slide-out-left', 'slide-out-right');
                                    modalImg.style.opacity = 0;
                                    modalImg.src = imageUrls[index];
                                    currentIndex = index;
                                    updateArrows();
                                });
                            } else {
                                modalImg.style.opacity = 0;
                                modalImg.src = imageUrls[index];
                                currentIndex = index;
                                updateArrows();
                            }
                        }

                        modalImg.addEventListener('load', function() {
                            if (slideDirection) {
                                // Animate in new image
                                modalImg.classList.remove('slide-in-left', 'slide-in-right');
                                void modalImg.offsetWidth; // force reflow
                                if (slideDirection === 'left') {
                                    modalImg.classList.add('slide-in-left');
                                } else if (slideDirection === 'right') {
                                    modalImg.classList.add('slide-in-right');
                                }
                                slideDirection = '';
                            }
                            setTimeout(() => {
                                modalImg.style.opacity = 1;
                            }, 50);
                        });

                        links.forEach((link, idx) => {
                            link.addEventListener('click', function(e) {
                                e.preventDefault();
                                showModal(idx);
                            });
                        });

                        closeBtn.addEventListener('click', function() {
                            modal.style.display = 'none';
                            modalImg.src = '';
                            currentIndex = -1;
                        });

                        prevBtn.addEventListener('click', function(e) {
                            e.stopPropagation();
                            if (currentIndex > 0) {
                                showModal(currentIndex - 1, 'left');
                            }
                        });

                        nextBtn.addEventListener('click', function(e) {
                            e.stopPropagation();
                            if (currentIndex < imageUrls.length - 1) {
                                showModal(currentIndex + 1, 'right');
                            }
                        });

                        modal.addEventListener('click', function(e) {
                            if (e.target === modal) {
                                modal.style.display = 'none';
                                modalImg.src = '';
                                currentIndex = -1;
                            }
                        });

                        document.addEventListener('keydown', function(e) {
                            if (modal.style.display === 'flex') {
                                if (e.key === 'Escape') {
                                    modal.style.display = 'none';
                                    modalImg.src = '';
                                    currentIndex = -1;
                                } else if (e.key === 'ArrowLeft') {
                                    if (currentIndex > 0) showModal(currentIndex - 1, 'left');
                                } else if (e.key === 'ArrowRight') {
                                    if (currentIndex < imageUrls.length - 1) showModal(currentIndex + 1, 'right');
                                }
                            }
                        });

                        // Masonry item fade-in animation
                        const masonryItems = document.querySelectorAll('.masonry-item');
                        masonryItems.forEach((item, i) => {
                            item.style.opacity = 0;
                            item.style.transform = 'translateY(30px)';
                            setTimeout(() => {
                                item.style.transition = 'opacity 0.7s cubic-bezier(.4,0,.2,1), transform 0.7s cubic-bezier(.4,0,.2,1)';
                                item.style.opacity = 1;
                                item.style.transform = 'translateY(0)';
                            }, 100 + i * 120);
                        });
                    });
                    </script>
                    <style>
                        .masonry-item {
                            opacity: 0;
                            transform: translateY(30px);
                        }
                        .masonry-item.animated {
                            opacity: 1;
                            transform: translateY(0);
                            transition: opacity 0.7s cubic-bezier(.4,0,.2,1), transform 0.7s cubic-bezier(.4,0,.2,1);
                        }
                        #lightbox-modal {
                            animation: fadeInModal 0.3s;
                        }
                        @keyframes fadeInModal {
                            from { opacity: 0; }
                            to { opacity: 1; }
                        }
                        /* Slider animation */
                        @keyframes slideInLeft {
                            from { opacity: 0; transform: translateX(-80px);}
                            to { opacity: 1; transform: translateX(0);}
                        }
                        @keyframes slideInRight {
                            from { opacity: 0; transform: translateX(80px);}
                            to { opacity: 1; transform: translateX(0);}
                        }
                        @keyframes slideOutLeft {
                            from { opacity: 1; transform: translateX(0);}
                            to { opacity: 0; transform: translateX(-80px);}
                        }
                        @keyframes slideOutRight {
                            from { opacity: 1; transform: translateX(0);}
                            to { opacity: 0; transform: translateX(80px);}
                        }
                        #lightbox-img.slide-in-left {
                            animation: slideInLeft 0.4s;
                        }
                        #lightbox-img.slide-in-right {
                            animation: slideInRight 0.4s;
                        }
                        #lightbox-img.slide-out-left {
                            animation: slideOutLeft 0.4s;
                        }
                        #lightbox-img.slide-out-right {
                            animation: slideOutRight 0.4s;
                        }
                    </style>
                </div>
                <style>
                    .masonry-gallery {
                        column-count: 3;
                        column-gap: 1em;
                        margin-top: 2em;
                    }
                    .masonry-item {
                        break-inside: avoid;
                        margin-bottom: 1em;
                        background: #fff;
                        border-radius: 8px;
                        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
                        overflow: hidden;
                    }
                    .masonry-item img {
                        width: 100%;
                        display: block;
                        border-radius: 8px;
                    }
                    @media (max-width: 900px) {
                        .masonry-gallery { column-count: 2; }
                    }
                    @media (max-width: 600px) {
                        .masonry-gallery { column-count: 1; }
                    }
                </style>
            </div>
        </div>
    </section>
</main>

<?php require('partials/footer.php'); ?>
