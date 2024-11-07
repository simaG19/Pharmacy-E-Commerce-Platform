<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Additional styling for the product list */
        .product {
            margin-bottom: 20px;
        }
        .product img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Admin Area - Product List</h1>
        <div class="mb-3 text-right">
            <a href="/" class="btn btn-secondary">Logout</a>
            <a href="/admin_area" class="btn btn-secondary">Client Information</a>
            <a href="/show_orders" class="btn btn-secondary">Manage Orders</a>
            <a href="/add_product" class="btn btn-primary">New Product</a>
        </div>

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

        // Fetch products from the database
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        // Display products
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4">'; // Use Bootstrap's grid to make three columns
                echo '<div class="product card">';
                echo '<img src="' . htmlspecialchars($row['image']) . '" class="card-img-top" alt="' . htmlspecialchars($row['name']) . '">';
                echo '<div class="card-body">';
                echo '<h2 class="card-title">' . htmlspecialchars($row['name']) . '</h2>';
                echo '<p class="card-text"><strong>Price:</strong> $' . htmlspecialchars($row['price']) . '</p>';
                echo '<p class="card-text"><strong>Description:</strong> ' . htmlspecialchars($row['description']) . '</p>';
                echo '<a href="edit_product.php?id=' . $row['id'] . '" class="btn btn-warning">Edit</a>';
                echo '<a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this record?\')">Delete</a>';
                echo '</div>'; // End card-body
                echo '</div>'; // End product card
                echo '</div>'; // End column
            }
        } else {
            echo "<p class='text-center'>No products found.</p>";
        }

        // Close connection
        $conn->close();
        ?>
        </div> <!-- End row -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
