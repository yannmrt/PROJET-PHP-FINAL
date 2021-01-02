<?php

// On inclus les elements requis par la page
require_once("php/database.php");
require_once("php/function.php");

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
                                                <th>Produit</th>
                                                <th>Prix</th>
                                                <th>Quantité</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <img src="images/image-2.jpg" class="img-fluid">
                                                    Optoma 4K HDR Projector
                                                </td>
                                                <td>
                                                    $1,500
                                                </td>
                                                <td>
                                                    <input type="number" min="1" value="1">
                                                </td>
                                                <td>
                                                    $1,500
                                                </td>
                                                <td>
                                                    <button class="btn btn-link text-danger"><i class="fas fa-times"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="images/image-3.jpg" class="img-fluid">
                                                    HP Envy Specter 360
                                                </td>
                                                <td>
                                                    $2,500
                                                </td>
                                                <td>
                                                    <input type="number" min="1" value="1">
                                                </td>
                                                <td>
                                                    $2,500
                                                </td>
                                                <td>
                                                    <button class="btn btn-link text-danger"><i class="fas fa-times"></i></button>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th colspan="3" class="text-right">Total</th>
                                                <th>$4,000</th>
                                                <th></th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="col-12 text-right">
                                        <button class="btn btn-outline-secondary mr-3" type="submit">Update</button>
                                        <a href="#" class="btn btn-outline-success">Checkout</a>
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