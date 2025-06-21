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
<body>
    <div>
        <div class="header-desktop">
            <?php require('nav.php'); ?>
        </div>
        <div class="header-mobile">
            <div class="left-wrapper">
                <div class="logo">LOGO</div>
            </div>
            <div class="right-wrapper">
                <button id="btnMobileMenu">Toggle</button>
            </div>
        </div>
        <aside class="mobile-menu" id="mobileMenu">
            <?php require('nav.php'); ?>
        </aside>
        <script>
            document.getElementById("btnMobileMenu").addEventListener("click", showMobileMenu);

            const mobileMenuToggle = document.getElementById("mobileMenu");
            function showMobileMenu() {
                if (mobileMenuToggle.style.display === "flex") {
                    mobileMenuToggle.style.display = "none";
                } else {
                    mobileMenuToggle.style.display = "flex";
                }
            }
        </script>