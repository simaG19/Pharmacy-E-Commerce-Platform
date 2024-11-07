<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmaci_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $userIdToDelete = $_GET['id'];

    // Perform the deletion
    $deleteQuery = "DELETE FROM products WHERE id = $userIdToDelete";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    // Check if the deletion was successful
    if ($deleteResult) {
        header('Location: manage_products.php'); 
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>