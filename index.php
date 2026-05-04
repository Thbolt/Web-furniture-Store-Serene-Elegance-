<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serene Elegance</title>
    <!--title icon-->
    <link rel="icon" href="image/Logo.png" type="image/icon">
    </li>


    <link rel="stylesheet" href="style.css">
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
    <script src="app.js"></script>

    <!-- bootstrap link -->

    <!-- icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- icons -->


</head>

<body class="body">
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
                <a href="profile.php" style="color: black; text-decoration: none;">
                    <i>
                        <img src="./image/user.png" alt="">
                    </i>
                    <p class="username">
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
                    <span><i><img src="./image/menu.png" alt="" width="30px"></i></span>
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


        <div class="content">
            <h1>Make Your Home
                <br> Modern Design.
            </h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus minus modi illum cumque velit
                consectetur?</p>
            <div id="btn1"><a href="categories.php"><button>Shop Now</button></a></div>
        </div>

    </div>
    <!-- main content -->

    <!-- services -->
    <div class="container">
        <h3 class="text-center" style="padding-top: 30px;">SERVICES WE OFFER</h3>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="image/c1.png" alt="" class="card image-top" height="200px">
                    <div class="card-body">
                        <h5 class="card-titel text-center">CUSTOM MENUS</h5>
                        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam ipsam
                            vitae facere eius modi iure possimus, soluta ea inventore. Omnis!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="image/c2.png" alt="" class="card image-top" height="200px">
                    <div class="card-body">
                        <h5 class="card-titel text-center">SMARTEST WAY</h5>
                        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam ipsam
                            vitae facere eius modi iure possimus, soluta ea inventore. Omnis!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="image/c3.png" alt="" class="card image-top" height="200px">
                    <div class="card-body">
                        <h5 class="card-titel text-center">USER FRIENDLEY</h5>
                        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam ipsam
                            vitae facere eius modi iure possimus, soluta ea inventore. Omnis!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- services -->

    <!-- best products -->
    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card" id="tpc">
                    <img src="image/products_images/ch.png" alt="" class="card image-top">
                    <div class="card-img-overlay">
                        <h4 class="card-titel">Best Chair</h4>
                        <p class="card-text">Lorem ipsum dolor.</p>
                        <div id="btn2"><a href="categories.php"><button>View More</button></a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card" id="tpc">
                    <img src="image/sf.png" alt="" class="card image-top">
                    <div class="card-img-overlay">
                        <h4 class="card-titel">Sofa</h4>
                        <p class="card-text">Lorem ipsum dolor.</p>
                        <div id="btn2"><a href="categories.php"><button>View More</button></a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card" id="tpc">
                    <img src="image/products_images/work desk.png" alt="" class="card image-top">
                    <div class="card-img-overlay">
                        <h4 class="card-titel">Work Desk</h4>
                        <p class="card-text">Lorem ipsum dolor.</p>
                        <div id="btn2"><a href="categories.php"><button>View More</button></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- best products -->

    <!-- card3 -->
    <div class="container">
        <h3 class="text-center" style="margin-top: 50px;">TREANDLY PRODUCTS</h3>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-3 py-3 py-md-0">
                <div class="card" id="c">
                    <img src="image/products_images/card1.png" alt="" class="card image-top">
                    <div class="card-body">
                        <h3 class="card-titel text-center">Best Sofa</h3>
                        <p class="card-text text-center">₹15000</p>
                        <div id="btn3"><a href="categories.php"><button>Shop Now</button></a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-3 py-md-0">
                <div class="card" id="c">
                    <img src="image/products_images/card2.png" alt="" class="card image-top">
                    <div class="card-body">
                        <h3 class="card-titel text-center">Sofa Chair</h3>
                        <p class="card-text text-center">₹10000</p>
                        <div id="btn3"><a href="categories.php"><button>Shop Now</button></a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-3 py-md-0">
                <div class="card" id="c">
                    <img src="image/products_images/card3.png" alt="" class="card image-top">
                    <div class="card-body">
                        <h3 class="card-titel text-center">New Chair</h3>
                        <p class="card-text text-center">₹7000</p>
                        <div id="btn3"><a href="categories.php"><button>Shop Now</button></a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-3 py-md-0">
                <div class="card" id="c">
                    <img src="image/products_images/card4.png" alt="" class="card image-top">
                    <div class="card-body">
                        <h3 class="card-titel text-center">Modern Chair</h3>
                        <p class="card-text text-center">₹8000</p>
                        <div id="btn3"><a href="categories.php"><button>Shop Now</button></a></div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row" style="margin-top: 50px;">
            <div class="col-md-3 py-3 py-md-0">
                <div class="card" id="c">
                    <img src="image/products_images/card5.png" alt="" class="card image-top">
                    <div class="card-body">
                        <h3 class="card-titel text-center">Best Chair</h3>
                        <p class="card-text text-center">₹6800</p>
                        <div id="btn3"><a href="categories.php"><button>Shop Now</button></a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-3 py-md-0">
                <div class="card" id="c">
                    <img src="image/products_images/card6.png" alt="" class="card image-top">
                    <div class="card-body">
                        <h3 class="card-titel text-center">Modern Sofa</h3>
                        <p class="card-text text-center">₹20000</p>
                        <div id="btn3"><a href="categories.php"><button>Shop Now</button></a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-3 py-md-0">
                <div class="card" id="c">
                    <img src="image/products_images/card7.png" alt="" class="card image-top">
                    <div class="card-body">
                        <h3 class="card-titel text-center">Vintage Chair</h3>
                        <p class="card-text text-center">₹5000</p>
                        <div id="btn3"><a href="categories.php"><button>Shop Now</button></a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-3 py-md-0">
                <div class="card" id="c">
                    <img src="image/products_images/card8.png" alt="" class="card image-top">
                    <div class="card-body">
                        <h3 class="card-titel text-center">Hanging Chair</h3>
                        <p class="card-text text-center">₹13000</p>
                        <div id="btn3"><a href="categories.php"><button>Shop Now</button></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- card3 -->

    <!-- about -->
    <div class="container">
        <h1 class="text-center" style="margin-top: 50px;">ABOUT</h1>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-6 py-3 py-md-0">
                <div class="card">
                    <img src="image/about.png" alt="">
                </div>
            </div>
            <div class="col-md-6 py-3 py-md-0">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum, saepe possimus quo, quasi animi
                    natus nulla beatae neque soluta pariatur id ducimus eum, sed quis enim minima? Fugiat delectus quo
                    optio nemo voluptatem ullam officiis neque exercitationem tenetur eum corporis quas in esse
                    blanditiis, quasi animi nam eos! Tempora deleniti eligendi magni ex voluptatum ut dicta nemo et
                    consequuntur distinctio quae atque porro inventore assumenda, nihil odio iusto accusamus libero
                    error nam aut, at praesentium cum reiciendis. Possimus consequatur obcaecati at illum in dolores
                    earum vero ipsum. Ipsam vitae adipisci corrupti totam vel consequuntur fugiat. Perferendis fuga
                    doloremque tempora, in eos, voluptates iure, optio qui modi ex ea saepe. Eum perspiciatis,
                    voluptates fugiat nesciunt corrupti minima aliquam repellat, ea quasi natus, recusandae aut nobis
                    modi. Commodi, alias reiciendis reprehenderit hic soluta consectetur corporis accusantium placeat,
                    totam minima nostrum magnam dolorum aut dolore, sapiente ea. Magni est quo ipsam nisi iste.</p>
                <div id="btn4"><a href="about.php"><button>Read More...</button></a></div>
            </div>
        </div>
    </div>
    <!-- about -->

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