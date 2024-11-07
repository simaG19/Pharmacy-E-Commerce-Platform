<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .btn-danger {
            background-color: #f44336;
        }
        .btn-danger:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>

<h2>Orders</h2>

<a href="index.php" class="btn">Logout</a>
<a href="admin_area.php" class="btn">Client Information</a>
<a href="manage_products.php" class="btn">Manage Products</a>
<br><br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Description</th> <!-- Updated to show Description column -->
            <th>Order Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Connect to MySQL database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "farmaci_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch orders from the database
        $sql = "SELECT * FROM orders";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . htmlspecialchars($row["firstname"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["lastname"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["phone"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["address"]) . "</td>";
                echo "<td>" . nl2br(htmlspecialchars($row["description"])) . "</td>"; // Display order description with line breaks
                echo "<td>" . $row["order_date"] . "</td>";
                echo '<td><a href="delete_orders.php?id=' . $row['id'] . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this record?\')">Delete</a></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No orders found.</td></tr>";
        }
        $conn->close();
        ?>
    </tbody>
</table>

</body>
</html>
