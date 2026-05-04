<?php
session_start();

// Only allow admin users to access this page
if (!isset($_SESSION['userRole']) || $_SESSION['userRole'] !== 'admin') {
    header("Location: index.php");
    exit();
}
function getOrdersData()
{
    $filePath = 'orders.json'; // Path to the orders.json file

    if (file_exists($filePath)) {
        // Get the contents of the orders.json file
        $jsonData = file_get_contents($filePath);

        // Decode the JSON data into a PHP array
        $orders = json_decode($jsonData, true);

        return $orders;
    } else {
        // If the file doesn't exist or can't be read
        return [];
    }
}
// Fetch the orders data
$orders = getOrdersData();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Orders</title>
    <link rel="stylesheet" href="admin_style.css"> <!-- Optional for styling -->
</head>

<body>
    <h1>Admin Dashboard - Orders</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Items</th>
                <th>Total Amount</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($orders)): ?>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo isset($order['id']) ? $order['id'] : 'N/A'; ?></td>
                        <td><?php echo isset($order['name']) ? $order['name'] : 'N/A'; ?></td>
                        <td>
                            <ul>
                            <td>
    <ul>
        <?php if (isset($order['cart']) && !empty($order['cart'])): ?>
            <?php foreach ($order['cart'] as $item): ?>
                <?php
                // Skip the item if productName, quantity, or price are null or empty
                if (empty($item['name']) || empty($item['quantity']) || empty($item['price'])) {
                    continue; // Skip to the next item in the loop
                }
                ?>
                <li>
                    <?php
                    $productName = $item['name'];
                    $quantity = $item['quantity'];
                    $price = number_format($item['price'], 2);
                    ?>
                    <?php echo $productName; ?> 
                    (Quantity: <?php echo $quantity; ?>, 
                    Price: $<?php echo $price; ?>)
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No items found</li>
        <?php endif; ?>
    </ul>
</td>


                        </ul>
                        </td>
                        <td>$<?php echo isset($order['totalPrice']) ? $order['totalPrice'] : '0.00'; ?></td>
                        <td><?php echo isset($order['orderDate']) ? $order['orderDate'] : 'N/A'; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No orders found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>