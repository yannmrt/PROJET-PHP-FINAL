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

// Permet de créer un user avec le Nom, Prénom, Mot de passe, la confirmation du mot de passe et la variable de connexion à la base de donnée
function createUser($nom, $prenom, $email, $mdp, $confirmMdp, $sql) {
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
                $_SESSION['userId'] = $_USER['userId'];
                $_SESSION['nom'] = $_USER['nom'];
                $_SESSION['prenom'] = $_USER['prenom'];
                $_SESSION['email'] = $_USER['email'];

                header('Location: index.php');

            } else { $error = "Mauvais mot de passe ou adresse email"; }
        } else { $error = "Veuillez entrer une adresse email valide"; }
    } else { $error = "Tous les champs doivent être complétés"; }

    return $error;

}

function settingUser() {

}

function addProduct() {

}

