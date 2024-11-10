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

// Check if the form is submitted for deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['client_id'])) {
    $client_id = $_POST['client_id'];

    // Delete prescription from the database
    $sqlDelete = "DELETE FROM klient_info WHERE id = ?";
    $stmt = $conn->prepare($sqlDelete);
    $stmt->bind_param("i", $client_id);

    if ($stmt->execute()) {
        $successMessage = "Prescription removed successfully.";
    } else {
        $errorMessage = "Error removing prescription: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch data from the database
$sql = "SELECT * FROM klient_info";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Area</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <a class="navbar-brand" href="#">Admin Area</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link" href=".php"  style="color:black;">Client Prescription</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/manage_products"  style="color:black;">Manage Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="show_orders.php"  style="color:black;">Manage Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="color:black;">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5">Client Prescribtion</h1>

        <?php if (isset($successMessage)): ?>
            <div class="alert alert-success">
                <?php echo $successMessage; ?>
            </div>
        <?php elseif (isset($errorMessage)): ?>
            <div class="alert alert-danger">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>

        <div class="container">

    <!-- End of Navbar -->
</div>


        <?php if ($result->num_rows > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['phone']) ?></td>
                            <td>
                                <img src="<?= htmlspecialchars($row['image']) ?>" width="100" alt="Prescription" onclick="openModal('<?= htmlspecialchars($row['image']) ?>')" style="cursor: pointer;">
                            </td>
                            <td>
                                <form method="POST" action="">
                                    <input type="hidden" name="client_id" value="<?= htmlspecialchars($row['id']) ?>">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this prescription?');">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No data available</p>
        <?php endif; ?>

        <!-- The Modal for image zoom -->
        <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Prescription Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="modalImage" class="img-fluid" src="" alt="Prescription">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Function to open modal
        function openModal(imageSrc) {
            const modalImage = document.getElementById("modalImage");
            modalImage.src = imageSrc;
            $('#imageModal').modal('show'); // Bootstrap method to show the modal
        }
    </script>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
