<?php
// PHP section if needed (you can remove it if it's empty)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation</title>
    <style>
        /* Style to make iframe full page */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }
        .iframe-container {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 70vh; /* Full height of the viewport */
        }
        .full-page-iframe {
            width: 100%; /* Adjust width as needed */
            height: 70vh; /* Adjust height as needed */
            border: none;
        }
    </style>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Concelt</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Medilab
    * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
    * Updated: Aug 07 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body class="index-page">

<header id="header" class="header sticky-top">

    <!-- <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">

        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div>End Top Bar -->

    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <img src="https://assets.zyrosite.com/AoPvGVjbgMc2pORR/wellmed-pharmacy-logo-01-mjEv9p7526U5JzjY.png"
                     alt=""
                     style="width: 150px; height: auto;">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/" >Home<br></a></li>
                    <li><a href="/shop">Shop</a></li>
                    <li><a href="/concelt" class="active">Consultation</a></li>
                    <li><a href="/about">About</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <style>
                /* Center the navmenu container */
                #navmenu {
                    display: flex;
                    justify-content: center;
                }

                /* Remove any default padding or margin from ul */
                #navmenu ul {
                    display: flex;
                    list-style-type: none;
                    padding: 0;
                    margin: 0;
                }

                /* Space out each list item */
                #navmenu ul li {
                    margin: 0 15px; /* Adjust the spacing between menu items */
                }

                /* Optional: Style for links */
                #navmenu ul li a {
                    text-decoration: none;
                    color: inherit;
                    font-weight: bold;
                }

                /* Mobile nav toggle button positioning */
                .mobile-nav-toggle {
                    position: absolute;
                    right: 20px; /* Position to the right side */
                    top: 20px;   /* Adjust vertical positioning */
                }
            </style>

            <a class="cta-btn d-none d-sm-block" href="/upload">Upload Prescription</a>

        </div>
    </div>

</header>

<div class="iframe-container">
    <iframe src="https://tawk.to/chat/6728b5704304e3196adcd4ec/1ibrg9gsp" class="full-page-iframe"></iframe>
</div>






</body>
</html>
