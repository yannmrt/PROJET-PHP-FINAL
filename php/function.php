<?php 

function reqUser($id) {

    $idUser = htmlspecialchars($id);

    if(!empty($idUser)) {
        $reqUser = $sql->query("SELECT * FROM user WHERE id = " . $idUser . "");
    }

}