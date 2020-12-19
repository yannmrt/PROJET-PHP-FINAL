<?php

// On inclus les elements requis par la page
require_once("php/database.php");
require_once("php/function.php");

// Suppression d'un produit du panier client 
if(isset($_GET["delete"])) {
    if(isset($_SESSION["panier"])) {
        //supprimerArticle();
        $idProduit = $_GET["delete"];
        supprimerArticle($idProduit);
    }
}

// Modifier la quantité


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_INFO["nom"]; ?> - Panier</title>

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
                <div class="row">
                    <div class="col-12 mt-3 text-center text-uppercase">
                        <h2>Panier</h2>
                    </div>
                </div>

                <main class="row">
                    <div class="col-12 bg-white py-3 mb-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-sm-10 mx-auto table-responsive">
                                <form class="row">
                                    <div class="col-12">
                                        <table class="table table-striped table-hover table-sm">
                                            <thead>
                                            <tr>
                                                <th>Illusration</th>
                                                <th>Produit</th>
                                                <th>Prix</th>
                                                <th>Quantité</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(creationPanier()) {
                                                     $nbArticles=count($_SESSION['panier']['libelleProduit']); 
                                                     if($nbArticles <= 0) {
                                                         echo "<tr><td>Le panier est vide</td></tr>";
                                                     } else {

                                                        for ($i=0 ;$i < $nbArticles ; $i++) {

                                                            echo "<tr>";
                                                            echo '<td><img src="images/produit/'.htmlspecialchars($_SESSION['panier']['idProduit'][$i]).'.jpg" class="img-fluid"></td>';
                                                            echo '<td>'.htmlspecialchars($_SESSION['panier']['libelleProduit'][$i]).'</td>';
                                                            echo '<td>'.htmlspecialchars($_SESSION['panier']['prixProduit'][$i]).' €</td>';
                                                            echo '<td>'.htmlspecialchars($_SESSION['panier']['qteProduit'][$i]).'</td>';
                                                            echo '<td><a href="cart.php?delete='.$_SESSION['panier']['idProduit'][$i].'"><button class="btn btn-link text-danger" type="button"><i class="fas fa-times"></i></button></a></td>';   
                                           
                                                        }
                                                        echo '</tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th colspan="3" class="text-right">Total</th>
                                                                <th>'.MontantGlobal().' €</th>
                                                                <th></th>
                                                            </tr>
                                                            </tfoot>
                                                            
                                                            ';          
                                                     }
                                                    }
                                            ?>
                                        </table>
                                    </div>
                                    <div class="col-12 text-right">
                                        <a href="#" class="btn btn-outline-success">Commander</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </main>
                <!-- Main Content -->
            </div>

          <?php include("footer.php"); ?>

        </div>

    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>