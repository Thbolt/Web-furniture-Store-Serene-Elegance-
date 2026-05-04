<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serene Elegance</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="image/Logo.png" type="image/icon">
    </li>
    <!-- bootstrap link -->
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

    <!-- bootstrap link -->

    <!-- icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- icons -->


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
                <a href="profile.php" style="color: black; text-decoration: none;"><i><img src="image/user.png" alt=""></i>
                    <p class="username"><!-- php -->
                        <?php
                        session_start();
                        include("user/connect.php");
                        if (isset($_SESSION['email'])) {
                            $email = $_SESSION['email'];
                            $query = mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
                            while ($row = mysqli_fetch_array($query)) {
                                echo $row['firstName'];
                            }
                        }
                        ?>
                        <!-- php -->
                    </p>
                </a>
            </div>
        </div>
    </div>
    <!-- navbar top -->

    <!-- main content -->
    <div class="main-content">
        <nav class="navbar navbar-expand-md" id="navbar-color">
            <div class="container">
                <!-- Toggler/collapsibe Button -->
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
        <div class="about">
            <div>
                <div>
                    <h1>All About Us</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda
                        dolore neque, nam suscipit, provident enim aliquam vel minus magnam
                        obcaecati tempora repellendus. Asperiores ad iste, odio labore optio
                        ipsa quibusdam similique? Illo, eaque saepe tempore officiis temporibus
                        placeat nulla accusamus reprehenderit aspernatur error. Natus earum a
                        dolorem voluptatibus vel qui culpa laboriosam exercitationem nihil
                        obcaecati odio, aut, quaerat necessitatibus beatae accusamus quisquam.
                        Hic, aperiam perferendis. Quae blanditiis voluptatem, ipsum totam quas
                        vel repudiandae vero cupiditate beatae laboriosam ad hic amet delectus
                        sapiente? Id ducimus voluptatum saepe, esse earum sequi officia commodi
                        quam possimus tempora aperiam doloribus magni, nam non debitis!</p>

                </div>

            </div>
        </div>
    </div>

    


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

    <script src="app.js"></script>
    <script src="cart_and_checkout-main/checkout.js"></script>

</body>

</html>