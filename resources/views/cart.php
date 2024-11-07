<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Your Cart - WellMed Pharmacy</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@400;500&family=Raleway:wght@400;500&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

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
            top: 20px; /* Adjust vertical positioning */
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

        body {
            background-color: #f8f9fa; /* Light background for the whole page */
            font-family: Arial, sans-serif; /* Set a readable font */
        }

        .container {
            background-color: #ffffff; /* White background for the container */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            padding: 20px; /* Padding around the content */
            margin-top: 20px; /* Space above the container */
        }

        h2 {
            color: #007bff; /* Blue color for the heading */
        }

        .table {
            margin-top: 20px; /* Space above the table */
            border-radius: 8px; /* Rounded corners for the table */
            overflow: hidden; /* Ensure no overflow */
        }

        .table th {
            background-color: #007bff; /* Blue background for table header */
            color: white; /* White text for the header */
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2; /* Light gray for odd rows */
        }

        .table-hover tbody tr:hover {
            background-color: #e9ecef; /* Light gray on hover */
        }

        .total-amount {
            margin-top: 20px; /* Space above the total amount */
            font-weight: bold; /* Bold text for the total */
        }

        .btn {
            margin-top: 10px; /* Space above buttons */
        }
    </style>
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
                    <li><a href="/">Home<br></a></li>
                    <li><a href="/shop">Shop <span class="sr-only">(current)</span></a></li>
                    <li><a href="/concelt">Consultation</a></li>
                    <li><a href="/about">About</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="cta-btn d-none d-sm-block" href="/upload">Upload Prescription</a>

            <!-- Cart Icon with Badge -->
            <div class="cart-icon position-relative ms-3">
                <a href="cart.php" class="d-flex align-items-center">
                    <i class="bi bi-cart" style="font-size: 1.5rem;"></i>
                    <span class="cart-badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <span id="cart-count">
                            <?php 
                            // Display number of items in the cart
                            echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; 
                            ?>
                        </span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</header>

<div class="container mt-4">
    <h2 class="mb-4">Your Shopping Cart</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Product Name</th>
                    <th>Price (Birr)</th>
                    <th>Quantity</th>
                    <th>Total (Birr)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php
            // Check if the cart exists
            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                echo "<tr><td colspan='5' class='text-center'>Your cart is empty.</td></tr>";
            } else {
                $totalAmount = 0; // Initialize total amount

                // Ensure cart items are in the expected array format
                foreach ($_SESSION['cart'] as $item) {
                    // Make sure $item is an array and has the necessary keys
                    if (is_array($item) && isset($item['id'], $item['name'], $item['price'], $item['quantity'])) {
                        // Decode the product name
                        $productName = urldecode($item['name']);
                        
                        $total = $item['price'] * $item['quantity']; // Calculate total for each item
                        $totalAmount += $total; // Add to total amount

                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($productName) . '</td>'; // Use the decoded name here
                        echo '<td>' . htmlspecialchars(number_format($item['price'], 2)) . ' Birr</td>'; // Format price to 2 decimal places
                        echo '<td>' . htmlspecialchars($item['quantity']) . '</td>';
                        echo '<td>' . htmlspecialchars(number_format($total, 2)) . ' Birr</td>'; // Format total to 2 decimal places
                        echo '<td><a href="remove_from_cart.php?id=' . htmlspecialchars($item['id']) . '" class="btn btn-danger btn-sm">Remove</a></td>'; // Link to remove item
                        echo '</tr>';
                    } else {
                        echo '<tr><td colspan="5" class="text-center">Invalid cart item.</td></tr>';
                    }
                }

                echo '</tbody>';
                echo '</table>';

                // Display the total amount for the cart
                echo '<h3 class="total-amount">Total Amount: ' . htmlspecialchars(number_format($totalAmount, 2)) . ' Birr</h3>'; // Format total amount
                echo '<a href="/checkout" class="btn btn-success">Proceed to Checkout</a>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
