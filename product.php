<?php

// On inclus les elements requis par la page
require_once("php/database.php");
require_once("php/function.php");

// On récupère les informations du produits dans la base de donnée
if(isset($_GET["id"])) {
    $product = infoProduct($_GET["id"], $sql);
}

// Dans ce code on lance la création de l'avis par la fonction sendFeedBackProduct
if(isset($_POST['submitAvis'])) {
    sendFeedbackProduct($_POST["descriptionAvis"], $_POST["noteAvis"], $_SESSION["idUser"], $_GET["id"], $sql);
}

// Ajout du produit dans le panier
if(isset($_POST["submitCart"])) {
    if(isset($_SESSION['panier'])) {
        ajouterArticle($product["idProduct"],$product["nom"],$_POST["qte"],$product["prix"]);
    } else {
        creationPanier();
        ajouterArticle($product["idProduct"],$product["nom"],$_POST["qte"],$product["prix"]);
    }
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
                                    <div class="img-large border" style="background-image: url('images/produit/<?php echo $product["idProduct"]; ?>.jpg')"></div>
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
                                        <form method="POST">
                                            <div class="form-group">
                                                <label for="qty">Quantité</label>
                                                <input type="number" id="qty" min="1" name="qte" value="1" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button class="btn btn-outline-dark" name="submitCart" type="submit"><i class="fas fa-cart-plus mr-2"></i>Ajouter au panier</button>
                                        </div>
                                        </form>
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

                                        <?php echo getFeedback($_GET['id'], $sql); ?>

                                        </div>
                                    </div>
                                    <!-- Review -->

                                </div>
                            </div>
                            <!-- Ratings & Reviews -->

                        </div>
                    </div>

                </main>
                <!-- Main Content -->
            </div>

            <?php include("footer.php"); ?>

            </div>
        </div>

    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>