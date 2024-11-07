<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Additional styling for the form */
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            margin-top: 10px;
        }
        .btn-custom:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Product</h1>
        
        <?php
        // Check if product ID is provided
        if (isset($_GET['id'])) {
            $product_id = $_GET['id'];

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

            // Fetch product details from the database
            $sql = "SELECT * FROM products WHERE id=$product_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                // Display form to edit product details
                echo '<form action="update_product.php" method="POST">';
                echo '<input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">';
                
                echo '<div class="form-group">';
                echo '<label for="name">Name:</label>';
                echo '<input type="text" id="name" name="name" class="form-control" value="' . htmlspecialchars($row['name']) . '" required>';
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label for="price">Price:</label>';
                echo '<input type="number" id="price" name="price" class="form-control" value="' . htmlspecialchars($row['price']) . '" step="0.01" required>';
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label for="description">Description:</label>';
                echo '<textarea id="description" name="description" class="form-control" rows="4" required>' . htmlspecialchars($row['description']) . '</textarea>';
                echo '</div>';
                
                echo '<input type="submit" value="Update Product" class="btn btn-custom">';
                echo '<a href="manage_products.php" class="btn btn-secondary">Manage Products</a>';
                echo '</form>';
            } else {
                echo "<div class='alert alert-warning' role='alert'>Product not found.</div>";
            }

            // Close connection
            $conn->close();
        } else {
            echo "<div class='alert alert-danger' role='alert'>Product ID not provided.</div>";
        }
        ?>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
