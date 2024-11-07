<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #4CAF50;
            color: white;
        }
        .btn-custom:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add Product</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required class="form-control">
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required class="form-control">
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" required class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="type">Product Type:</label>
                <select id="type" name="type" required class="form-control">
                    <option value="" disabled selected>Select product type</option>
                    <option value="baby_products">Baby Products</option>
                    <option value="hair_products">Hair Products</option>
                    <option value="skin_care">Skin Care</option>
                    <option value="suppliment">Health Supplements</option>
                    <option value="First Aid">First Aid</option>
                </select>
            </div>

            <input type="submit" value="Add Product" class="btn btn-custom btn-block">
            <a href="manage_products.php" class="btn btn-secondary btn-block">Manage Products</a>
        </form>

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

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $type = $_POST['type'];
            $description = $_POST['description'];

            // Handle image upload
            $target_dir = "product_images/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check === false) {
                echo "<div class='alert alert-danger'>File is not an image.</div>";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["image"]["size"] > 10000000) {
                echo "<div class='alert alert-danger'>Sorry, your file is too large.</div>";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
                echo "<div class='alert alert-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "<div class='alert alert-danger'>Sorry, your file was not uploaded.</div>";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // File uploaded successfully, insert product data into database
                    $sql = "INSERT INTO products (image, name, price, description, type) 
                            VALUES ('$target_file', '$name', '$price', '$description', '$type')";

                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='alert alert-success'>Product added successfully</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
                }
            }
        }

        // Close connection
        $conn->close();
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
