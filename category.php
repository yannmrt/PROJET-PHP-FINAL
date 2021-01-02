<?php

// On inclus les elements requis par la page
require_once("php/database.php");
require_once("php/function.php");

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $category = getCategoryInfo($id, $sql);
} else {
    header('Location: index.php');
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_INFO["nom"]; ?> - <?php echo $category["nom"]; ?></title>

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

                <!-- Category Products -->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 py-3">
                            <div class="row">
                                <div class="col-12 text-center text-uppercase">
                                    <h2><?php echo $category["nom"]; ?></h2>
                                </div>
                            </div>
                            <div class="row">

                            <?php echo printProductByCategory($id, $sql); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Category Products -->

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