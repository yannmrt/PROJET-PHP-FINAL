<?php

// On inclus les elements requis par la page
require_once("php/database.php");
require_once("php/function.php");

// On récupère les informations du produits dans la base de donnée
if(isset($_GET["id"])) {
    $product = infoProduct($_GET["id"], $sql);
}

if(isset($_POST['submitAvis'])) {
    sendFeedbackProduct($_POST["descriptionAvis"], $_POST["noteAvis"], $_SESSION["idUser"], $_GET["id"], $sql);
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $product["nom"] . " - " . $_INFO["nom"]; ?></title>

    <link href="//fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-fluid">

        <div class="row min-vh-100">
            
            <?php include("menu.php"); ?>

            <div class="col-12">
                <!-- Main Content -->
                <main class="row">
                    <div class="col-12 bg-white py-3 my-3">
                        <div class="row">

                            <!-- Product Images -->
                            <div class="col-lg-5 col-md-12 mb-3">
                                <div class="col-12 mb-3">
                                    <div class="img-large border" style="background-image: url('images/image-1.jpg')"></div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-2 col-3">
                                            <div class="img-small border" style="background-image: url('images/image-1.jpg')" data-src="images/image-1.jpg"></div>
                                        </div>
                                        <div class="col-sm-2 col-3">
                                            <div class="img-small border" style="background-image: url('images/image-2.jpg')" data-src="images/image-2.jpg"></div>
                                        </div>
                                        <div class="col-sm-2 col-3">
                                            <div class="img-small border" style="background-image: url('images/image-3.jpg')" data-src="images/image-3.jpg"></div>
                                        </div>
                                        <div class="col-sm-2 col-3">""
                                            <div class="img-small border" style="background-image: url('images/image-4.jpg')" data-src="images/image-4.jpg"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Images -->

                            <!-- Product Info -->
                            <div class="col-lg-5 col-md-9">
                                <div class="col-12 product-name large">
                                    <?php echo $product["nom"]; ?>
                                    <small>Par <a href="#"><?php echo $product["vendeur"]; ?></a></small>
                                </div>
                                <div class="col-12 px-0">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <ul>
                                        <?php echo $product["description"]; ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- Product Info -->

                            <!-- Sidebar -->
                            <div class="col-lg-2 col-md-3 text-center">
                                <div class="col-12 border-left border-top sidebar h-100">
                                    <div class="row">
                                        <div class="col-12">
                                        <span class="detail-price">
                                            <?php echo $product["prix"]; ?> €
                                        </span>
                                        </div>
                                        <div class="col-xl-5 col-md-9 col-sm-3 col-5 mx-auto mt-3">
                                            <div class="form-group">
                                                <label for="qty">Quantité</label>
                                                <input type="number" id="qty" min="1" value="1" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus mr-2"></i>Ajouter au panier</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar -->

                        </div>
                    </div>

                    <div class="col-12 mb-3 py-3 bg-white text-justify">
                        <div class="row">

                            <!-- Details -->
                            <div class="col-md-7">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 text-uppercase">
                                            <h2><u>Détails</u></h2>
                                        </div>
                                        <div class="col-12" id="details">
                                            <?php echo $product["descriptionFull"]; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Details -->

                            <!-- Ratings & Reviews -->
                            <div class="col-md-5">
                                <div class="col-12 px-md-4 border-top border-left sidebar h-100">

                                    <!-- Rating -->
                                    <div class="row">
                                        <div class="col-12 mt-md-0 mt-3 text-uppercase">
                                            <h2><u>Notation & avis</u></h2>
                                        </div>
                                    </div>
                                    <!-- Rating -->

                                    <?php 

                                    if(isset($_SESSION["idUser"])) {

                                    ?>

                                    <div class="row">
                                        <div class="col-12 px-md-3 px-0">
                                            <hr>
                                        </div>
                                    </div>

                                    <!-- Add Review -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>Ajouter un avis</h4>
                                        </div>
                                        <div class="col-12">
                                            <form method="POST">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="descriptionAvis" placeholder="Donner nous votre avis"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="d-flex ratings justify-content-end flex-row-reverse">
                                                        <input type="radio" value="5" name="noteAvis" id="rating-5"><label
                                                            for="rating-5"></label>
                                                        <input type="radio" value="4" name="noteAvis" id="rating-4"><label
                                                            for="rating-4"></label>
                                                        <input type="radio" value="3" name="noteAvis" id="rating-3"><label
                                                            for="rating-3"></label>
                                                        <input type="radio" value="2" name="noteAvis" id="rating-2"><label
                                                            for="rating-2"></label>
                                                        <input type="radio" value="1" name="noteAvis" id="rating-1" checked><label
                                                            for="rating-1"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-outline-dark" name="submitAvis">Publier</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Add Review -->

                                    <div class="row">
                                        <div class="col-12 px-md-3 px-0">
                                            <hr>
                                        </div>
                                    </div>

                                    <?php } ?>

                                    <!-- Review -->
                                    <div class="row">
                                        <div class="col-12">

                                            <!-- Comments -->
                                            <div class="col-12 text-justify py-2 mb-3 bg-gray">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <strong class="mr-2">Steve Rogers</strong>
                                                        <small>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </small>
                                                    </div>
                                                    <div class="col-12">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut ullamcorper quam, non congue odio.
                                                        <br>
                                                        Fusce ligula augue, faucibus sed neque non, auctor rhoncus enim. Sed nec molestie turpis. Nullam accumsan porttitor rutrum. Curabitur eleifend venenatis volutpat.
                                                        <br>
                                                        Aenean faucibus posuere vehicula.
                                                    </div>
                                                    <div class="col-12">
                                                        <small>
                                                            <i class="fas fa-clock mr-2"></i>5 hours ago
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Comments -->

                                            <!-- Comments -->
                                            <div class="col-12 text-justify py-2 mb-3 bg-gray">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <strong class="mr-2">Bucky Barns</strong>
                                                        <small>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </small>
                                                    </div>
                                                    <div class="col-12">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut ullamcorper quam, non congue odio.
                                                        <br>
                                                        Aenean faucibus posuere vehicula.
                                                    </div>
                                                    <div class="col-12">
                                                        <small>
                                                            <i class="fas fa-clock mr-2"></i>5 hours ago
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Comments -->

                                        </div>
                                    </div>
                                    <!-- Review -->

                                </div>
                            </div>
                            <!-- Ratings & Reviews -->

                        </div>
                    </div>

                    <!-- Similar Product -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 py-3">
                                <div class="row">
                                    <div class="col-12 text-center text-uppercase">
                                        <h2>Similar Products</h2>
                                    </div>
                                </div>
                                <div class="row">

                                    <!-- Product -->
                                    <div class="col-lg-3 col-sm-6 my-3">
                                        <div class="col-12 bg-white text-center h-100 product-item">
                                            <div class="row h-100">
                                                <div class="col-12 p-0 mb-3">
                                                    <a href="product.html">
                                                        <img src="images/image-1.jpg" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <a href="product.html" class="product-name">Sony Alpha DSLR Camera</a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <span class="product-price-old">
                                                        $500
                                                    </span>
                                                    <br>
                                                    <span class="product-price">
                                                        $500
                                                    </span>
                                                </div>
                                                <div class="col-12 mb-3 align-self-end">
                                                    <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus mr-2"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product -->

                                    <!-- Product -->
                                    <div class="col-lg-3 col-sm-6 my-3">
                                        <div class="col-12 bg-white text-center h-100 product-item">
                                            <div class="row h-100">
                                                <div class="col-12 p-0 mb-3">
                                                    <a href="product.html">
                                                        <img src="images/image-2.jpg" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <a href="product.html" class="product-name">Optoma 4K HDR Projector</a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <span class="product-price">
                                                        $1,500
                                                    </span>
                                                </div>
                                                <div class="col-12 mb-3 align-self-end">
                                                    <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus mr-2"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product -->

                                    <!-- Product -->
                                    <div class="col-lg-3 col-sm-6 my-3">
                                        <div class="col-12 bg-white text-center h-100 product-item">
                                            <div class="row h-100">
                                                <div class="col-12 p-0 mb-3">
                                                    <a href="product.html">
                                                        <img src="images/image-3.jpg" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <a href="product.html" class="product-name">HP Envy Specter 360</a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <div class="product-price-old">
                                                        $2,800
                                                    </div>
                                                    <span class="product-price">
                                                        $2,500
                                                    </span>
                                                </div>
                                                <div class="col-12 mb-3 align-self-end">
                                                    <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus mr-2"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product -->

                                    <!-- Product -->
                                    <div class="col-lg-3 col-sm-6 my-3">
                                        <div class="col-12 bg-white text-center h-100 product-item">
                                            <div class="row h-100">
                                                <div class="col-12 p-0 mb-3">
                                                    <a href="product.html">
                                                        <img src="images/image-4.jpg" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <a href="product.html" class="product-name">Dell Alienware Area 51</a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <span class="product-price">
                                                        $4,500
                                                    </span>
                                                </div>
                                                <div class="col-12 mb-3 align-self-end">
                                                    <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus mr-2"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Similar Products -->

                </main>
                <!-- Main Content -->
            </div>

            <div class="col-12 align-self-end">
                <!-- Footer -->
                <footer class="row">
                    <div class="col-12 bg-dark text-white pb-3 pt-5">
                        <div class="row">
                            <div class="col-lg-2 col-sm-4 text-center text-sm-left mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="footer-logo">
                                            <a href="index.html">E-Commerce</a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <address>
                                            221B Baker Street<br>
                                            London, England
                                        </address>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-8 text-center text-sm-left mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12 text-uppercase">
                                        <h4>Who are we?</h4>
                                    </div>
                                    <div class="col-12 text-justify">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam imperdiet vel ligula vel sodales. Aenean vel ullamcorper purus, ac pharetra arcu. Nam enim velit, ultricies eu orci nec, aliquam efficitur sem. Quisque in sapien a sem vestibulum volutpat at eu nibh. Suspendisse eget est metus. Maecenas mollis quis nisl ac malesuada. Donec gravida tortor massa, vitae semper leo sagittis a. Donec augue turpis, rutrum vitae augue ut, venenatis auctor nulla. Sed posuere at erat in consequat. Nunc congue justo ut ante sodales, bibendum blandit augue finibus.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-3 col-5 ml-lg-auto ml-sm-0 ml-auto mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12 text-uppercase">
                                        <h4>Quick Links</h4>
                                    </div>
                                    <div class="col-12">
                                        <ul class="footer-nav">
                                            <li>
                                                <a href="#">Home</a>
                                            </li>
                                            <li>
                                                <a href="#">Contact Us</a>
                                            </li>
                                            <li>
                                                <a href="#">About Us</a>
                                            </li>
                                            <li>
                                                <a href="#">Privacy Policy</a>
                                            </li>
                                            <li>
                                                <a href="#">Terms & Conditions</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-2 col-4 mr-auto mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12 text-uppercase text-underline">
                                        <h4>Help</h4>
                                    </div>
                                    <div class="col-12">
                                        <ul class="footer-nav">
                                            <li>
                                                <a href="#">FAQs</a>
                                            </li>
                                            <li>
                                                <a href="#">Shipping</a>
                                            </li>
                                            <li>
                                                <a href="#">Returns</a>
                                            </li>
                                            <li>
                                                <a href="#">Track Order</a>
                                            </li>
                                            <li>
                                                <a href="#">Report Fraud</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 text-center text-sm-left">
                                <div class="row">
                                    <div class="col-12 text-uppercase">
                                        <h4>Newsletter</h4>
                                    </div>
                                    <div class="col-12">
                                        <form action="#">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter your email..." required>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-outline-light text-uppercase">Subscribe</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- Footer -->
            </div>
        </div>

    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>