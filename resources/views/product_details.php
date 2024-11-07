<?php
session_start();

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmaci_db";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product details based on ID
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productId = $conn->real_escape_string($_GET['id']);
    $sql = "SELECT * FROM products WHERE id = '$productId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "<p>Product not found.</p>";
        exit;
    }
} else {
    echo "<p>Invalid product ID.</p>";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo htmlspecialchars($product['name']); ?> - Product Details</title>
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="det/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="det/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="det/assets/css/plugins/magnific-popup/magnific-popup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="det/assets/css/style.css">
</head>

<header>
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo on the left -->
        <div class="logo">
        <img src="https://assets.zyrosite.com/AoPvGVjbgMc2pORR/wellmed-pharmacy-logo-01-mjEv9p7526U5JzjY.png"
       alt=""
       style="width: 150px; height: auto;">
        </div>

        <!-- Top menu on the right -->
        

        <!-- Cart on the right -->
        <div class="cart-icon position-relative ms-3" style="display: inline-block;">
    <a href="cart.php" class="d-flex align-items-center" style="text-decoration: none;">
        <!-- Cart icon with inline styles to make it visible -->
        <i class="bi bi-cart" style="font-size: 3rem; color: #007bff; line-height: 1;"></i>  <!-- Blue cart icon -->
        
        <!-- Cart badge showing the count -->
        <span class="cart-badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" 
              style="font-size: 1rem; padding: 0.2rem 0.6rem; top: -10px; right: -10px; color: white;">
            <span id="cart-count">
                <?php 
                echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; 
                ?>
            </span>
        </span>
    </a>
</div>
</div><!-- End .container -->
</header>


<body>

<div class="product-details-top" style="display: flex; gap: 10px; align-items: flex-start;">
    <div class="row" style="width: 100%;">
        <!-- Product Image -->
        <div class="col-md-6" style="flex: 1; max-width: 50%; padding: 0;">
            <div class="product-gallery" style="display: flex; justify-content: center;">
                <figure class="product-main-image" style="margin: 0; position: relative;">
                    <!-- Display product image from the database -->
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" 
                         alt="<?php echo htmlspecialchars($product['name']); ?>" 
                         id="featured-image" 
                         style="width: 100%; max-width: 400px; height: auto; display: block; border-radius: 5px;">
                    
                    <a href="#" id="btn-product-gallery" class="btn-product-gallery" style="position: absolute; bottom: 10px; right: 10px;">
                        <i class="icon-arrows"></i>
                    </a>
                </figure>
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6" style="flex: 1; max-width: 50%; padding: 0;">
    <div class="product-details" style="padding: 10px;">
        <h1 class="product-title" style="font-size: 28px; margin-bottom: 10px; font-weight: bold; color: #333;">
            Name: <span style="color: orange;"><?php echo htmlspecialchars($product['name']); ?></span>
        </h1>

        <h2 class="product-title" style="font-size: 26px; margin-bottom: 10px; font-weight: normal; color: #333;">
            Type: <span style="color: orange;"><?php echo htmlspecialchars($product['type']); ?></span>
        </h2>

        <h2 class="product-title" style="font-size: 26px; margin-bottom: 10px; font-weight: normal; color: #333;">
            Brand: <span style="color: orange;"><?php echo htmlspecialchars($product['brand']); ?></span>
        </h2>

        <div class="ratings-container" style="margin-bottom: 10px; display: flex; align-items: center;">
            <div class="ratings" style="display: flex; align-items: center;">
                <!-- Empty stars (gray) -->
                <i class="fa fa-star" style="color: #ddd; font-size: 18px;"></i>
                <i class="fa fa-star" style="color: #ddd; font-size: 18px;"></i>
                <i class="fa fa-star" style="color: #ddd; font-size: 18px;"></i>
                <i class="fa fa-star" style="color: #ddd; font-size: 18px;"></i>
                <i class="fa fa-star" style="color: #ddd; font-size: 18px;"></i>
                <!-- Filled stars (yellow) based on rating percentage -->
                <div class="ratings-val" style="position: absolute; width: 80%; height: 100%; overflow: hidden;">
                    <i class="fa fa-star" style="color: #ffc107; font-size: 18px;"></i>
                    <i class="fa fa-star" style="color: #ffc107; font-size: 18px;"></i>
                    <i class="fa fa-star" style="color: #ffc107; font-size: 18px;"></i>
                    <i class="fa fa-star" style="color: #ffc107; font-size: 18px;"></i>
                    <i class="fa fa-star" style="color: #ffc107; font-size: 18px;"></i>
                </div>
            </div>
            <a class="ratings-text" href="#product-review-link" style="font-size: 14px; color: #999; text-decoration: none; margin-left: 10px;">(2 Reviews)</a>
        </div>

        <div class="product-price" style="font-size: 28px; color: #333; margin-bottom: 10px; font-weight: bold;">
            $<?php echo number_format($product['price'], 2); ?>
        </div>

        <div class="product-details-action">
    <form action="add_to_cart.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
        <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>">
        <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
        <input type="hidden" name="product_image" value="<?php echo $product['image']; ?>">

        <!-- Use your existing quantity input here -->
        <div class="product-details-quantity">
            <input type="number" name="quantity" value="1" min="1" max="10" step="1" required 
                   style="width: 60px; padding: 5px; font-size: 16px; text-align: center;">
        </div>

        <button type="submit" class="btn-product btn-cart" style="background-color: #ff8000; color: white; padding: 10px 20px; font-size: 18px; text-decoration: none; border-radius: 5px;">
            <span>Add to Cart</span>
        </button>
    </form>
</div>


       
    </div>
</div>
    </div>
</div>

<div class="product-details-tab">
    <ul class="nav nav-pills justify-content-center" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab">Description</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab">Reviews (2)</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel">
            <div class="product-desc-content">
                <h3>Product Information</h3>
                <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
            </div>
        </div>
        <div class="tab-pane fade" id="product-review-tab" role="tabpanel">
            <div class="reviews">
                <h3>Reviews (2)</h3>
                <!-- Review content here -->
            </div>
        </div>
   
    </div>
    
</div>

</body>
<!-- JS Files -->
<script src="det/assets/js/jquery.min.js"></script>
<script src="det/assets/js/bootstrap.bundle.min.js"></script>
<script src="det/assets/js/owl.carousel.min.js"></script>
<script src="det/assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/main.js"></script>


</html>
