<?php
session_start();
include("user/connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serene Elegance</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="image/Logo.png" type="image/icon">

    <!-- bootstrap links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!-- icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!-- navbar top -->
    <div class="container">
        <div class="navbar-top">
            <div class="social-link">
                <img src="image/Logo.png" alt="">
            </div>
            <div class="logo">
                <h3>Serene Elegance</h3>
            </div>
            <div class="icons">
                <i><a href="user/logout.php"><img src="image/user.png" alt="">Logout</a></i>
            </div>
        </div>
    </div>

    <!-- main content -->
    <div class="main-content">
        <nav class="navbar navbar-expand-md" id="navbar-color">
            <div class="container">
                <!-- Toggler/collapsible Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span><i><img src="image/menu.png" alt="" width="30px"></i></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="categories.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- User Information -->
        <h1 style="text-align: center; padding-top: 30px;">
            Welcome
            <!-- php -->
            <?php
            if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
                $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
                while ($row = mysqli_fetch_array($query)) {
                    echo $row['firstName'] . ' ' . $row['lastName'];
                }
            }
            ?>
            <!-- php -->
        </h1>
        <br><br>
    </div>
    <h1 style="text-align:center;">My Orders</h1>

    <?php
    // Get logged-in user's name (replace with actual session data)
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $query = mysqli_query($conn, "SELECT firstName, lastName FROM users WHERE email='$email'");
        $userRow = mysqli_fetch_assoc($query);
        $loggedInUser = $userRow['firstName'] . ' ' . $userRow['lastName'];

        // Read the orders from the JSON file
        $file_path = 'orders.json';
        if (file_exists($file_path)) {
            $orders = json_decode(file_get_contents($file_path), true);
        } else {
            $orders = [];
        }

        // Filter orders by the logged-in user
        $userOrders = array_filter($orders, function ($order) use ($loggedInUser) {
            return $order['name'] == $loggedInUser;
        });
        ?>


        <?php if (!empty($userOrders)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>Total Quantity</th>
                        <th>Total Price</th>
                        <th>Address</th>
                        <th>Products</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($userOrders as $order): ?>
                        <tr>
                            <td><?php echo $order['orderDate']; ?></td>
                            <td><?php echo isset($order['totalQuantity']) ? $order['totalQuantity'] : 'N/A'; ?></td>
                            <td><?php echo isset($order['totalPrice']) ? $order['totalPrice'] : 'N/A'; ?></td>
                            <td><?php echo $order['address'] . ', ' . $order['city'] . ', ' . $order['country']; ?></td>
                            <td>
                                <ul>
                                    <?php
                                    // Check if 'cart' exists and is an array
                                    if (isset($order['cart']) && is_array($order['cart'])) {
                                        foreach ($order['cart'] as $product):
                                            // Set default values if attributes are missing
                                            $productName = isset($product['name']) ? $product['name'] : 'Unknown Product';
                                            $productQuantity = isset($product['quantity']) ? $product['quantity'] : 'N/A';
                                            $productPrice = isset($product['price']) ? '₹' . $product['price'] : 'N/A';

                                            // Only display product details if they are not missing
                                            if ($productName !== 'Unknown Product' && $productQuantity !== 'N/A' && $productPrice !== 'N/A') {
                                                echo "<li>{$productName} (Quantity: {$productQuantity}, Price: {$productPrice})</li>";
                                            } else {
                                                // Optional: Log or handle missing product details
                                                error_log("Missing product details: " . json_encode($product));
                                            }
                                        endforeach;
                                    } else {
                                        echo "No products in the order.";
                                    }
                                    ?>
                                </ul>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="text-align:center;">No orders found.</p>
        <?php endif; ?>
    <?php } ?>

    <!-- main content -->

    <!-- footer -->
    <footer id="footer">
        <h1 class="text-center">Furniture</h1>
        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab?</p>
        <div class="icons text-center">
            <a href="https://www.twitter.com/"><i class="bx bxl-twitter"></i></a>
            <a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a>
            <a href="https://www.gmail.com/"><i class="bx bxl-google"></i></a>
            <a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a>
        </div>
        <div class="copyright text-center">
            &copy; Copyright <strong><span>Serene Elegance</span></strong>. All Rights Reserved
        </div>
    </footer>
    <!-- footer -->

</body>

</html>