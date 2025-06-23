<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding RSVP</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>
<?php
    // Get the current request URI
    $requestUri = $_SERVER['REQUEST_URI'];

    // Remove any query string parameters
    $path = strtok($requestUri, '?');

    // Remove leading/trailing slashes and explode the path into segments
    $segments = array_filter(explode('/', trim($path, '/')));

    // Get the last segment as the potential slug
    $slug = end($segments);

    // Sanitize the slug for use as a CSS class
    // Remove any characters that aren't valid in CSS class names
    $cleanSlug = preg_replace('/[^a-zA-Z0-9-]/', '', $slug); 
    $bodyClass = '';

    if (!empty($cleanSlug)) {
        $bodyClass = 'page-' . $cleanSlug; // Prefix with 'page-' for clarity
    } else {
        // If no slug, it might be the homepage or a default page
        $bodyClass = 'page-home'; 
    }
?>
<body class="<?php echo $bodyClass; ?>"> 
    <div>
        <div class="header-desktop">
            <div class="container">
                <div class="inner-wrapper">
                    <div class="logo-wrapper">
                        <?php require('logo.php'); ?>
                    </div>
                    <div class="menu-wrapper">
                        <?php require('nav.php'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mobile" style="position:fixed;top:0;left:0;width:100%;z-index:1100;background:white;">
            <div class="left-wrapper">
            <?php require('logo.php'); ?>
            </div>
            <div class="right-wrapper">
            <button id="btnMobileMenu" aria-label="Open mobile menu" style="background:none;border:none;outline:none;cursor:pointer;">
            <span id="iconOpen" style="display:inline;">
            <!-- Hamburger icon SVG -->
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
            </span>
            <span id="iconClose" style="display:none;">
            <!-- Close icon SVG -->
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </span>
            </button>
            </div>
        </div>
        <aside class="mobile-menu" id="mobileMenu" aria-hidden="true">
            <div class="inner-wrapper" style="background-image: url('../assets/images/bg-about-couple.png')">
            <?php require('nav.php'); ?>
            </div>
        </aside>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
            const btnMobileMenu = document.getElementById("btnMobileMenu");
            const mobileMenu = document.getElementById("mobileMenu");
            const iconOpen = document.getElementById("iconOpen");
            const iconClose = document.getElementById("iconClose");
            const headerMobile = document.querySelector('.header-mobile');

            function toggleMobileMenu() {
            const isOpen = mobileMenu.classList.contains("open");
            if (isOpen) {
            mobileMenu.classList.remove("open");
            mobileMenu.setAttribute('aria-hidden', 'true');
            iconOpen.style.display = "inline";
            iconClose.style.display = "none";
            document.body.style.overflow = ""; // Enable scroll
            } else {
            mobileMenu.classList.add("open");
            mobileMenu.setAttribute('aria-hidden', 'false');
            iconOpen.style.display = "none";
            iconClose.style.display = "inline";
            document.body.style.overflow = "hidden"; // Disable scroll
            }
            }

            if (btnMobileMenu && mobileMenu) {
            btnMobileMenu.addEventListener("click", toggleMobileMenu);
            }

            // Add this CSS for sliding and fading animation, and prevent overlap with header
            const style = document.createElement('style');
            style.innerHTML = `
            .header-mobile {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1100;
            background: white;
            }
            .mobile-menu {
            position: fixed;
            top: var(--header-mobile-height, 56px);
            right: 0;
            width: 100%;
            height: calc(100vh - var(--header-mobile-height, 56px));
            box-shadow: -2px 0 8px rgba(0,0,0,0.1);
            transform: translateX(100%);
            opacity: 0;
            pointer-events: none;
            transition: transform 0.3s cubic-bezier(0.4,0,0.2,1), opacity 0.3s cubic-bezier(0.4,0,0.2,1);
            display: flex;
            flex-direction: column;
            z-index: 1000;
            }
            .mobile-menu.open {
            transform: translateX(0);
            opacity: 1;
            pointer-events: auto;
            }
            @media (min-width: 768px) {
            .header-mobile, .mobile-menu { display: none !important; }
            }
            body {
            padding-top: var(--header-mobile-height, 56px);
            }
            `;
            document.head.appendChild(style);

            // Dynamically set --header-mobile-height CSS variable
            function setHeaderMobileHeight() {
            if (headerMobile) {
            const height = headerMobile.offsetHeight;
            document.documentElement.style.setProperty('--header-mobile-height', height + 'px');
            }
            }
            setHeaderMobileHeight();
            window.addEventListener('resize', setHeaderMobileHeight);
            });
        </script>