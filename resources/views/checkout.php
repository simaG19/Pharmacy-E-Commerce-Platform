<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
    <script src="https://js.stripe.com/v3/"></script> <!-- Load Stripe.js -->
</head>
<body>
    <div class="container">
        <h1>Checkout</h1>
        <p>Please provide your information:</p>
        <form id="checkout-form">
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" class="form-control" rows="4" required></textarea>
            </div>

            <h3>Order Summary:</h3>
            <ul class="list-group mb-4">
                <?php
                $totalAmount = 0;
                $description = "";

                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $item) {
                        if (is_array($item) && isset($item['name'], $item['price'], $item['quantity'])) {
                            $productName = urldecode($item['name']);
                            $productPrice = number_format($item['price'], 2);
                            $quantity = $item['quantity'];
                            $total = $item['price'] * $quantity;
                            $totalAmount += $total;

                            $description .= $productName . ' (x' . $quantity . ') - ' . $productPrice . ' Birr<br>';

                            echo '<li class="list-group-item d-flex justify-content-between">';
                            echo htmlspecialchars($productName) . ' (x' . htmlspecialchars($quantity) . ')';
                            echo '<span>' . htmlspecialchars($productPrice) . ' Birr</span>';
                            echo '</li>';
                        }
                    }

                    echo '<li class="list-group-item d-flex justify-content-between">';
                    echo '<strong>Total Amount</strong>';
                    echo '<span>' . htmlspecialchars(number_format($totalAmount, 2)) . ' Birr</span>';
                    echo '</li>';
                } else {
                    echo '<li class="list-group-item">Your cart is empty.</li>';
                }
                ?>
            </ul>

            <input type="hidden" name="description" value="<?php echo htmlspecialchars($description); ?>">

            <!-- Stripe Payment Button -->
            <button type="button" id="checkout-button" class="btn btn-primary btn-block">
                Pay with Stripe
            </button>
        </form>
    </div>

    <script type="text/javascript">
        const stripe = Stripe("pk_test_51QI9OoLz7iWgQZmPRaYmdXRPXIhay4bMI24UxYtldbRro8EIgwNslgcNrq7p0UU0Y5gRRS2bHieglIKxdLGbQLoM00uJxgJEea"); // Replace with your publishable key

        document.getElementById("checkout-button").addEventListener("click", () => {
    fetch("{{ url('/create-checkout-session') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            totalAmount: {{ $totalAmount }}, // Pass total amount
            description: "{{ htmlspecialchars($description) }}" // Order description
        })
    })
    .then(response => response.json())
    .then(data => {
        return stripe.redirectToCheckout({ sessionId: data.sessionId });
    })
    .then(result => {
        if (result.error) {
            alert(result.error.message);
        }
    })
    .catch(error => console.error("Error:", error));
});

    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
