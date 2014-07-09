<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 17:06
 */

//Renvoie la liste de tous les utilisateurs suivit par user
function get_followed($idUser){
    $query = MySQL::getInstance()->prepare("SELECT * FROM follow WHERE idUser = :id");
    $query->bindValue(":id", $idUser);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

//ajoute un utilisateur suivit à user
function add_follower($idUser, $idUserFollower){
    $query = MySQL::getInstance()->prepare("INSERT INTO follow(idUser, idUserFollower) VALUES (:idUser,:$idUserFollower)");
    $query->bindValue(":idUser", $idUser);
    $query->bindValue(":idUserFollower", $idUserFollower);
    $query->execute();
}

//supprime un utilisateur suivit à user
function delete_follower($idUser, $idUserFollower){
    $query = MySQL::getInstance()->prepare("DELETE FROM follow WHERE idUserFollower = :idUserFollower");
    $query->bindValue("idUserFollower", $idUserFollower);
    $query->execute();
}