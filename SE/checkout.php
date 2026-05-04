<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="container">
        <div class="checkoutLayout">


            <div class="returnCart">
                <!-- <a href="/">keep shopping</a> -->
                <h1>List Product in Cart</h1>
                <div class="list">



                </div>
            </div>


            <div class="right">
                <h1>Checkout</h1>
                <form action="save_order.php" id="checkout-form" method="POST">
                    <div class="form">
                        <div class="group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <div class="group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" id="phone" required>
                        </div>

                        <div class="group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" required>
                        </div>

                        <div class="group">
                            <label for="country">Country</label>
                            <select name="country" id="country">
                                <option value="default"></option>
                                <option value="UK">United Kingdom</option>
                                <option value="India">India</option>
                            </select>
                        </div>

                        <div class="group">
                            <label for="city">City</label>
                            <select name="city" id="city">
                                <option value="default"></option>
                                <option value="London">London</option>
                                <option value="Mumbai">Mumbai</option>
                            </select>
                        </div>
                    </div>
                    <div class="return">
                        <div class="row">
                            <div>Total Quantity</div>
                            <div class="totalQuantity">70</div>
                            <!-- This value will be dynamically set in JavaScript -->
                        </div>
                        <div class="row">
                            <div>Total Price</div>
                            <div class="totalPrice">₹900</div> <!-- This value will be dynamically set in JavaScript -->
                        </div>
                    </div>

                    <!-- Hidden inputs for totalQuantity and totalPrice -->
                    <input type="hidden" name="cart" id="cart-data">
                    <input type="hidden" name="totalQuantity" id="totalQuantity-data"> <!-- Hidden field for total quantity -->
                    <input type="hidden" name="totalPrice" id="totalPrice-data"> <!-- Hidden field for total price -->

                    <button type="submit" class="buttonCheckout">CHECKOUT</button>
                </form>

            </div>
        </div>
    </div>
    <script src="checkout.js"></script>

</body>

</html>