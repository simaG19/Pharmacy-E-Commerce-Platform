<p?php
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Medilab Bootstrap Template</title>
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

    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <img src="https://assets.zyrosite.com/AoPvGVjbgMc2pORR/wellmed-pharmacy-logo-01-mjEv9p7526U5JzjY.png" alt="" style="width: 150px; height: auto;">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.php">Home<br></a></li>
                    <li><a href="shop.php"class="active">Shop <span class="sr-only">(current)</span></a></li>
                    <li><a href="concelt.php">Consultation</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="cta-btn d-none d-sm-block" href="upload.php">Upload Prescription</a>

            <!-- Cart Icon with Badge -->
<!-- Cart Icon with Badge -->
<div class="cart-icon position-relative ms-3">
    <a href="cart.php" class="d-flex align-items-center">
        <i class="bi bi-cart" style="font-size: 1.5rem;"></i>
        <span class="cart-badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            <span id="cart-count">
                <?php 
                // Start the session
                session_start();
                echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; 
                ?>
            </span>
        </span>
    </a>
</div>



        </div>
    </div>

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

        /* Style for cart icon */
        .cart-icon {
            position: relative;
            margin-left: 20px; /* Space between nav items and cart icon */
        }

        .cart-badge {
            color: white;
            font-size: 0.75rem; /* Adjust font size for the badge */
        }
    </style>

</header>


  <main class="main">

  <section class="health_section layout_padding">
  <h2 class="text-uppercase text-center mb-4">Products</h2>

  <!-- Search Form -->
  <div class="container mb-4">
  <form method="GET" action="">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Search for a product" 
                 value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </div>
    </div>
  </form>
</div>

  <!-- HTML for Filter Buttons -->
<div class="container mb-4">
  <div class="row d-flex justify-content-center">
    <ul id="product-filters" class="list-inline">
      <li class="list-inline-item">
        <a href="?filter=all" class="btn btn-outline-primary <?php echo (!isset($_GET['filter']) || $_GET['filter'] == 'all') ? 'active' : ''; ?>">All</a>
      </li>
      <li class="list-inline-item">
        <a href="?filter=baby_products" class="btn btn-outline-primary <?php echo (isset($_GET['filter']) && $_GET['filter'] == 'baby_products') ? 'active' : ''; ?>">Baby Products</a>
      </li>
      <li class="list-inline-item">
        <a href="?filter=hair_products" class="btn btn-outline-primary <?php echo (isset($_GET['filter']) && $_GET['filter'] == 'hair_products') ? 'active' : ''; ?>">Hair Products</a>
      </li>
      <li class="list-inline-item">
        <a href="?filter=skin_care" class="btn btn-outline-primary <?php echo (isset($_GET['filter']) && $_GET['filter'] == 'skin_care') ? 'active' : ''; ?>">Skin Care</a>
      </li>
      <li class="list-inline-item">
        <a href="?filter=suppliment" class="btn btn-outline-primary <?php echo (isset($_GET['filter']) && $_GET['filter'] == 'suppliment') ? 'active' : ''; ?>">Suppliment</a>
      </li>
    </ul>
  </div>
</div>

<div class="container">
  <div class="row">
      
    <?php
      // Database connection parameters
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "farmaci_db";
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Handle search query and filter type
      $searchQuery = "";
      if (isset($_GET['search']) && !empty($_GET['search'])) {
          $searchTerm = $conn->real_escape_string($_GET['search']);
          $searchQuery .= "WHERE name LIKE '%$searchTerm%'";
      }

      // Handle product type filter
      $filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
      if ($filter != 'all') {
          $productType = $conn->real_escape_string($filter);
          $searchQuery .= ($searchQuery ? " AND" : " WHERE") . " type = '$productType'";
      }

      // Fetch products from the database with search filter
      $sql = "SELECT * FROM products $searchQuery";
      $result = $conn->query($sql);

      // Display products
     // Display products
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
      echo '<div class="col-md-4 mb-4 d-flex align-items-stretch">';
      echo '  <div class="card shadow-sm">';
      // Wrap the image in a link
      echo '    <a href="product_details.php?id=' . $row['id'] . '">';
      echo '      <img src="' . $row['image'] . '" alt="' . $row['name'] . '" class="card-img-top img-fluid" style="width: 400px; height: 300px; object-fit: cover;">';
      echo '    </a>';
      echo '    <div class="card-body">';
      // Wrap the title in a link
      echo '      <h5 class="card-title"><a href="product_details.php?id=' . $row['id'] . '">' . $row['name'] . '</a></h5>';
      echo '      <p class="card-text"><strong>Price:</strong> ' . $row['price'] . ' Birr</p>';
      
      // Start form for adding to cart
      echo '      <form action="/add_to_cart" method="POST">';
      echo '          <input type="hidden" name="product_id" value="' . $row['id'] . '">';
      echo '          <input type="hidden" name="product_name" value="' . urlencode($row['name']) . '">';
      echo '          <input type="hidden" name="product_price" value="' . $row['price'] . '">';
      
      // Add a quantity input field
      echo '          <div class="mb-3 d-flex align-items-center">';
      echo '              <label for="quantity" class="form-label me-2">Quantity:</label>';
      echo '              <button type="button" class="btn btn-outline-secondary me-1" id="decrease-quantity">-</button>';
      echo '              <input type="number" name="quantity" value="1" min="1" class="form-control me-1" id="quantity" style="width: 60px;">';
      echo '              <button type="button" class="btn btn-outline-secondary" id="increase-quantity">+</button>';
      echo '          </div>';
     
      echo '     <a href="/product_details?id=' . $row['id'] . '"> <p>view more</p></a>';
      echo '          <button type="submit" class="btn btn-primary w-100">Add to cart</button>';
      echo '      </form>'; // End of form
  
      echo '    </div>';
      echo '  </div>';
      echo '</div>';
  }
} else {
  echo "<p class='text-center'>No products found.</p>";
}

    
    // Close connection
    $conn->close();
?>      
<script>
document.getElementById('increase-quantity').addEventListener('click', function() {
    var quantityInput = document.getElementById('quantity');
    var currentValue = parseInt(quantityInput.value);
    quantityInput.value = currentValue + 1; // Increase the quantity by 1
});

document.getElementById('decrease-quantity').addEventListener('click', function() {
    var quantityInput = document.getElementById('quantity');
    var currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1; // Decrease the quantity by 1, but not below 1
    }
});
</script>

  </div>
</div>

  </div>
</section>


  </main>

  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">WellMed</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p> Addis Ababa, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+251-929190911</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Conceltation</a></li>
            <li><a href="#">Upload Precribtion</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Delivery</a></li>
            <li><a href="#">Conceltation</a></li>
            <li><a href="#">shoping</a></li>
            
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Hic solutasetp</h4>
          <ul>
            <li><a href="#">Molestiae accusamus iure</a></li>
            <li><a href="#">Excepturi dignissimos</a></li>
            <li><a href="#">Suscipit distinctio</a></li>
            <li><a href="#">Dilecta</a></li>
            <li><a href="#">Sit quas consectetur</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Nobis illum</h4>
          <ul>
            <li><a href="#">Ipsam</a></li>
            <li><a href="#">Laudantium dolorum</a></li>
            <li><a href="#">Dinera</a></li>
            <li><a href="#">Trodelas</a></li>
            <li><a href="#">Flexo</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Nana Digita Ads</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
      
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>