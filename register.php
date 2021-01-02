<?php 

// On inclus les elements requis par la page
require_once("php/database.php");
require_once("php/function.php");

if(isset($_POST['valider'])) {
    createUser($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mdp'], $_POST['confirmMdp'], $sql);

}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_INFO['nom']; ?> - Créer mon compte</title>

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
                        <h2>Créer mon compte</h2>
                    </div>
                </div>

                <?php if(isset($error)) { echo getError(); } ?>

                <main class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label for="name">Nom</label>
                                        <input type="text" class="form-control" name="nom" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Prénom</label>
                                        <input type="text" class="form-control" name="prenom" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Adresse email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mot de passe</label>
                                        <input type="password" class="form-control" name="mdp" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">Confirmer le mot de passe</label>
                                        <input type="password" class="form-control" name="confirmMdp" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="acceptCgu" value="1" required>
                                            <label for="agree" class="form-check-label ml-2">J'accepte les conditions d'utilisation</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="valider" class="btn btn-outline-dark">Créer mon compte</button>
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