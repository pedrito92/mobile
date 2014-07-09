<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 09/07/14
 * Time: 15:07
 */

//Renvoie la liste de toutes les personnes que le user suit
function get_followers($idUser){
    $query = MySQL::getInstance()->prepare("SELECT * FROM follow WHERE idUserFollower = :idUser");
    $query->bindValue(":idUser", $idUser);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}