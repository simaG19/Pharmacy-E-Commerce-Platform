<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Prepare data for updating
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Update product details in the database
    $sql = "UPDATE products SET name='$name', price='$price', description='$description' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: manage_products.php');
    } else {
        echo "Error updating product: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Invalid request";
}
?>
