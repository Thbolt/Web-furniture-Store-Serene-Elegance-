<?php
session_start();

// Get posted form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$country = $_POST['country'];
$cart = isset($_POST['cart']) ? json_decode($_POST['cart'], true) : [];
$totalQuantity = isset($_POST['totalQuantity']) ? $_POST['totalQuantity'] : 0;
$totalPrice = isset($_POST['totalPrice']) ? $_POST['totalPrice'] : 0;

// Prepare order details
$order = [
    'name' => $name,
    'phone' => $phone,
    'address' => $address,
    'city' => $city,
    'country' => $country,
    'totalQuantity' => $totalQuantity,
    'totalPrice' => $totalPrice,
    'cart' => $cart,
    'orderDate' => date('Y-m-d'),
    'id' => uniqid() // Generates a unique ID for the order
];

// Save the order in orders.json
$file_path = 'orders.json';
$orders = json_decode(file_get_contents($file_path), true);
$orders[] = $order; // Add the new order
// Proceed to save
file_put_contents('orders.json', json_encode($orders, JSON_PRETTY_PRINT));

// Redirect to the invoice page and then auto-redirect to the home page
echo '
    <script>
        window.location.href = "invoice.php?orderID=' . $order['id'] . '"; // Correctly concatenate the variable
        setTimeout(function(){
            window.location.href = "index.php";
        }, 5000); // Redirect to home page after 5 seconds
    </script>
    <body style="background:#ffdbac;">
        <h1 style="text-align:center; padding: top 50px;">Order Placed Successfully!!</h1> 
        <br> 
        <h2 style="text-align:center;"><a href="index.php">Go to Home Page</a></h2>
    </body>
';
?>