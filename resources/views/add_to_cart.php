<?php
session_start(); // Start the session

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the required POST variables are set
    if (isset($_POST['product_id'], $_POST['product_name'], $_POST['product_price'], $_POST['quantity'])) {
        // Retrieve product details
        $productId = $_POST['product_id'];
        $productName = $_POST['product_name'];
        $productPrice = $_POST['product_price'];
        $quantity = $_POST['quantity'];

        // Create a new cart item
        $cartItem = [
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => $quantity
        ];

        // Check if the cart already exists in the session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = []; // Initialize cart if it doesn't exist
        }

        // Add the item to the cart
        $_SESSION['cart'][] = $cartItem;

        // Redirect back to the product page or cart page
        header('Location: shop.php'); // Change to your desired redirect page
        exit();
    } else {
        echo "Required product information is missing.";
    }
} else {
    echo "Invalid request method.";
}
?>
