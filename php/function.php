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
    header('Location: index.php');

}

// Permet de créer un user avec le Nom, Prénom, Mot de passe, si la case accepter les cgu est cochée et la confirmation du mot de passe et la variable de connexion à la base de donnée
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

// Cette fonction permet de modifier les informations du compte de l'utilisateur, on entre les informations dans des variables ainsi que la bdd dans la variable sql
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
            $_SESSION["email"] = $email;
        }
    }
}

// Dans cette fonction on change le mot de passe de l'utilisateur, on entre les différentes versions du mot de passe ainsi que la bdd
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

// Dans cette fonctin on génére les catégories de la barre de navigation, on entre uniquement la bdd pour effectuer la requête
function headerCategory($sql) {
    $reqCategory = $sql->query("SELECT * FROM productCategory");
    
    while($category = $reqCategory->fetch()) {
        echo '<li class="nav-item"><a class="nav-link" href="category.php?id=' . $category["idProductCategory"] . '" aria-haspopup="true" aria-expanded="false">' . $category["nom"] . '</a></li>';
    }
}


// Dans cette fonction on récupère les informations d'un produit, on entre l'id du produit ainsi que la bdd
function infoProduct($idProduct, $sql) {
    $reqProduct = $sql->prepare("SELECT * FROM product WHERE idProduct = ?");
    $reqProduct->execute(array($idProduct));
    $productExist = $reqProduct->rowCount();

    if($productExist > 0) {
        $product = $reqProduct->fetch();
        return $product;
    }

}

// Dans cette fonction on envoie l'avis d'un client par rapport à un produit, on entre la message, la note l'id de l'utilisateur, l'id du produit et la bdd
function sendFeedbackProduct($descriptionAvis, $noteAvis, $idUser, $idProduct, $sql) {
    $descriptionAvis = htmlspecialchars($descriptionAvis);
    $noteAvis = htmlspecialchars($noteAvis);
    $idProduct = htmlspecialchars($idProduct);

    if(!empty($descriptionAvis) AND !empty($noteAvis) AND !empty($idProduct)) {
        $insertAvis = $sql->prepare("INSERT INTO feedbackProduct SET description = ?, note = ?, idProduct = ?, idUser = ?");
        $insertAvis->execute(array($descriptionAvis, $noteAvis, $idProduct, $idUser));
    }
}

// Dans cette fonction on récupère l'avis d'un client par rapport à un produit, on récupère l'id du produit et la bdd 
function getFeedback($idProduct, $sql) {
    $idProduct = htmlspecialchars($idProduct);
    
    if(!empty($idProduct)) {
        $reqFeedback = $sql->prepare("SELECT * FROM feedbackProduct WHERE idProduct = ?");
        $reqFeedback->execute(array($idProduct));
        $feedbackExist = $reqFeedback->rowCount();

        if($feedbackExist > 0) {
            while($feedback = $reqFeedback->fetch()) {

                // On va récupèrer les infos de l'utilisateur ayant laisser l'avis
                $reqUserF = $sql->prepare("SELECT * FROM user WHERE idUser = ?");
                $reqUserF->execute(array($feedback["idUser"]));
                $user = $reqUserF->fetch();

                echo '<!-- Comments -->
                <div class="col-12 text-justify py-2 mb-3 bg-gray">
                    <div class="row">
                        <div class="col-12">
                            <strong class="mr-2">' . $user['prenom'] . ' ' . $user['nom'] .'</strong>
                            <!--<small>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </small>-->
                            <small>' . $feedback["note"] . '/5</small>
                        </div>
                        <div class="col-12">
                            ' . $feedback["description"] .'
                        </div>
                    </div>
                </div>
                <!-- Comments -->';

            }
        } else {
            echo "Aucun avis pour ce produit.";
        }
    }
}

// Dans cette fonction on récupère les infos d'une catégorie, par l'id de la catégorie et la bdd
function getCategoryInfo($idProductCategory, $sql) {
    $idProductCategory = htmlspecialchars($idProductCategory);

    if(!empty($idProductCategory)) {
        $reqCategory = $sql->prepare("SELECT * FROM productCategory WHERE idProductCategory = ?");
        $reqCategory->execute(array($idProductCategory));
        $categoryExist = $reqCategory->rowCount();

        if($categoryExist > 0) {
            $category = $reqCategory->fetch();
            return $category;
        }
    }
}

// Dans cette fonctionon créer un bloc de produit en fonction de l'id de la catégorie et on inclus la bdd
function printProductByCategory($idProductCategory, $sql) {
    $idProductCategory = htmlspecialchars($idProductCategory);

    if(!empty($idProductCategory)) {
        $reqProduct = $sql->prepare("SELECT * FROM product WHERE idCategory = ?");
        $reqProduct->execute(array($idProductCategory));
        $productExist = $reqProduct->rowCount();

        if($productExist > 0) {
            for($i=0;$i<=3;$i++) { 
                $product = $reqProduct->fetch();
                
                echo ' <!-- Product -->
                <div class="col-lg-3 col-sm-6 my-3">
                    <div class="col-12 bg-white text-center h-100 product-item">
                        <div class="row h-100">
                            <div class="col-12 p-0 mb-3">
                                <a href="product.php?id=' . $product["idProduct"] . '">
                                    <img src="images/produit/' . $product["idProduct"] . '.jpg" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-12 mb-3">
                                <a href="product.php?id=' . $product["idProduct"] . '" class="product-name">' . $product["nom"] . '</a>
                            </div>
                            <div class="col-12 mb-3">
                                <span class="product-price">
                                    ' . $product["prix"] . ' €
                                </span>
                            </div>
                            <div class="col-12 mb-3 align-self-end">
                            <a href="product.php?id=' . $product["idProduct"] . '">
                                <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus mr-2"></i>Voir</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product -->';

            }
        }
    }
}

//FONCTIONS DU PANIER

// Dans cette fonction on créer le panier du client
function creationPanier() {
    if (!isset($_SESSION['panier'])) {
       $_SESSION['panier']=array();
       $_SESSION['panier']['idProduit'] = array();
       $_SESSION['panier']['libelleProduit'] = array();
       $_SESSION['panier']['qteProduit'] = array();
       $_SESSION['panier']['prixProduit'] = array();
       $_SESSION['panier']['verrou'] = false;
    }
    return true;
 }

 // Dans cette fonction on ajoute un produit dans le panier du client, on entre l'id du produit, la quantité du produit et le prix du produit
 function ajouterArticle($idProduit, $libelleProduit,$qteProduit,$prixProduit) {

    //Si le panier existe
    if (creationPanier() && !isVerrouille())
    {
       //Si le produit existe déjà on ajoute seulement la quantité
       $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
 
       if ($positionProduit !== false)
       {
          $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
       }
       else
       {
          //Sinon on ajoute le produit
          array_push( $_SESSION['panier']['idProduit'],$idProduit);
          array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
          array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
          array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
       }
    }
 }

// Cette fonction permet de compter le nombre d'articles dans le panier
function compterArticles() {

   if(isset($_SESSION['panier'])) {
       return count($_SESSION['panier']['idProduit']);
   } else {
       return 0;
   }

}

 // Dans cette fonction on supprime un produit du panier grâce son id
 function supprimerArticle($idProduit) {
    //Si le panier existe
    if(creationPanier() && !isVerrouille())
    {
       //Nous allons passer par un panier temporaire
       $tmp=array();
       $tmp['idProduit'] = array();
       $tmp['libelleProduit'] = array();
       $tmp['qteProduit'] = array();
       $tmp['prixProduit'] = array();
       $tmp['verrou'] = $_SESSION['panier']['verrou'];
 
       for($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++)
       {
          if ($_SESSION['panier']['idProduit'][$i] !== $idProduit)
          {
             array_push( $tmp['idProduit'],$_SESSION['panier']['idProduit'][$i]);
             array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
             array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
             array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
          }
 
       }
       //On remplace le panier en session par notre panier temporaire à jour
       $_SESSION['panier'] =  $tmp;
       //On efface notre panier temporaire
       unset($tmp);
    }
 }


 // Dans cette fonction on vérifie l'état du verrou du panier
 function isVerrouille() {
    if(isset($_SESSION['panier']) && $_SESSION['panier']['verrou']) {
        return true;
    } else {
        return false;
    }
 }

// Dans cette fonction on supprime le panier du client
function supprimePanier() {
    unset($_SESSION['panier']);
}

// Cette fonction nous permet de faire le montant total du panier
function MontantGlobal(){
    $total=0;
    for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
    {
       $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
    }
    return $total;
 }