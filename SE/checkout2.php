<?php
session_start();
include 'db_connection.php';  // Include your database connection file

// Ensure user is logged in
if (!isset($_SESSION['email'])) {
    die('Please log in to place an order.');
}

// Retrieve user ID from session
$user_id = $_SESSION['user_id'];

// Retrieve cart data and total price from form POST data
$cart = $_POST['cart'];  // Assuming cart is passed as JSON string
$total_price = $_POST['total_price'];

// Insert the order into the 'orders' table
$sql = "INSERT INTO orders (user_id, product_details, total_price) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $user_id, $cart, $total_price);

if ($stmt->execute()) {
    echo "Order placed successfully!";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
