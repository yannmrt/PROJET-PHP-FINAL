<?php 

// Permet de récuperer une erreur et de l'afficher
function getError($error) {
    $error = htmlspecialchars($error);

    echo '<div class="message-holder">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert">
                <small><i class="fas fa-times"></i></small>
            </button>
            <i class="fas fa-check-circle mr-2"></i>
            ' . $error . '
    
    </div>
    </div>';

}

// Cette fonction permet de déconnecter l'utilisateur
function logoutUser() {
    $_SESSION = array();
    session_destroy();

}

// Permet de créer un user avec le Nom, Prénom, Mot de passe, si la case accepter les cgu est cochée et la confirmation du mot de passe et la variable de connexion à la base de donnée
function createUser($nom, $prenom, $email, $mdp, $confirmMdp, $acceptCgu, $sql) {
    $nom = htmlspecialchars($nom);
    $prenom = htmlspecialchars($prenom);
    $email = htmlspecialchars($email);
    $mdp = hash("sha512", $mdp);
    $confirmMdp = hash("sha512", $confirmMdp);

    if(!empty($nom) AND !empty($prenom) AND !empty($mdp) AND !empty($confirmMdp)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if($mdp == $confirmMdp) {
                $createUser = $sql->prepare("INSERT INTO user SET nom = ?, prenom = ?, email = ?, mdp = ?");
                $createUser->execute(array($nom, $prenom, $email, $mdp));

                header("Location: login.php");

            } else { $error = "Vos mots de passe ne correspondent pas"; }
        } else { $error = "Veuillez entrer une adresse email valide"; }
    } else { $error = "Tous les champs doivent être complétés"; }

    return $error;
    
}

// Permet de lancer la session de l'utilisateur grâce à son adresse email et le mot de passe. On inclus également la variable de connexion à la base de donnée
function loginUser($email, $mdp, $sql) {
    $email = htmlspecialchars($email);
    $mdp = hash("sha512", $mdp); 

    if(!empty($email) AND !empty($mdp)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $checkUser = $sql->prepare("SELECT * FROM user WHERE email = ? AND mdp = ?");
            $checkUser->execute(array($email, $mdp));
            $userExist = $checkUser->rowCount();

            if($userExist > 0) {
                $_USER = $checkUser->fetch();
                $_SESSION['idUser'] = $_USER['idUser'];
                $_SESSION['nom'] = $_USER['nom'];
                $_SESSION['prenom'] = $_USER['prenom'];
                $_SESSION['email'] = $_USER['email'];

                header('Location: index.php');

            } else { $error = "Mauvais mot de passe ou adresse email"; }
        } else { $error = "Veuillez entrer une adresse email valide"; }
    } else { $error = "Tous les champs doivent être complétés"; }

    return $error;

}

// Cette fonction permet de modifier les informations du compte de l'utilisateur
function editUser($nom, $prenom, $email, $sql) {
    $nom = htmlspecialchars($nom);
    $prenom = htmlspecialchars($prenom);
    $email = htmlspecialchars($email);

    if(!empty($nom) AND !empty($prenom) AND !empty($email)) {
        if($nom != $_SESSION["nom"]) {
            $editNom = $sql->prepare("UPDATE user SET nom = ? WHERE idUser = ?");
            $editNom->execute(array($nom, $_SESSION["idUser"]));
            $_SESSION["nom"] = $nom;
        }

        if($prenom != $_SESSION["prenom"]) {
            $editPrenom = $sql->prepare("UPDATE user SET prenom = ? WHERE idUser = ?");
            $editPrenom->execute(array($prenom, $_SESSION["idUser"]));
            $_SESSION["prenom"] = $prenom;
        }

        if($email != $_SESSION["email"]) {
            $editEmail = $sql->prepare("UPDATE user SET email = ? WHERE idUser = ?");
            $editEmail->execute(array($email, $_SESSION["idUser"]));
        }
    }
}

// Dans cette fonction on change le mot de passe de l'utilisateur
function editPassword($actualPassword, $newPassword, $confirmNewPassword, $sql) {
    $actualPassword = hash("sha512", $actualPassword);
    $newPassword = hash("sha512", $newPassword);
    $confirmNewPassword = hash("sha512", $confirmNewPassword);

    if(!empty($actualPassword) AND !empty($newPassword) AND !empty($confirmNewPassword)) {
        $reqPassword = $sql->prepare("SELECT mdp FROM user WHERE idUser = ?");
        $reqPassword->execute(array($_SESSION["idUser"]));
        $userPassword = $reqPassword->fetch();

        if($actualPassword == $userPassword) {
            if($newPassword == $confirmNewPassword) {
                $editPassword = $sql->prepare("UPDATE user SET mdp = ? WHERE idUser = ?");
                $editPassword->execute(array($newPassword, $_SESSION["idUser"]));
            }
        }
    }
}

// Dans cette fonctin on génére les catégories de la barre de navigation
function headerCategory($sql) {
    $reqCategory = $sql->query("SELECT * FROM productCategory");
    
    while($category = $reqCategory->fetch()) {
        echo '<li class="nav-item"><a class="nav-link" href="#" aria-haspopup="true" aria-expanded="false">' . $category["nom"] . '</a></li>';
    }
}

function infoProduct($idProduct, $sql) {
    $reqProduct = $sql->prepare("SELECT * FROM product WHERE idProduct = ?");
    $reqProduct->execute(array($idProduct));
    $productExist = $reqProduct->rowCount();

    if($productExist > 0) {
        $product = $reqProduct->fetch();
        return $product;
    }

}

function settingUser() {

}

function addProduct() {

}

