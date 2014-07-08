<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 13:46
 */

//Retourne un user avec le nombre de films like, vue...
function get_user($idUser) {
    $query = MySQL::getInstance()->prepare("SELECT u.*,COUNT(um.`like`),COUNT(um.dislike),COUNT(um.watch),COUNT(um.watchlist)
                                            FROM users AS u
                                            LEFT JOIN `user-movie` AS um ON u.id = um.idUser
                                            WHERE u.id = :id");
    $query->bindValue(':id', $idUser, PDO::PARAM_STR);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

//Mise à jour d'un user
function update_user($idUser,$username) {
    $query = MySQL::getInstance()->prepare("UPDATE users SET username = :username WHERE id = :id");
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    if($query->execute()){

    }
}

//Suppression d'un user
function delete_user($idUser){
    $query = MySQL::getInstance()->prepare("DELETE FROM users WHERE id = :id");
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
}

//Affichage de la liste des likes du user
function get_user_like($idUser){
    $query = MySQL::getInstance()->prepare("SELECT * FROM movies WHERE id in (SELECT idMovie FROM  `user-movie` WHERE idUser =:id AND `like` = TRUE )");
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
}

//Affichage de la liste des dislikes du user
function get_user_dislike($idUser){
    $query = MySQL::getInstance()->prepare("SELECT * FROM movies WHERE id in (SELECT idMovie FROM `user-movie` WHERE idUser = :id AND dislike = true);");
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
}

//liste des films qu'on a vu
function get_user_watch($idUser){
    $query = MySQL::getInstance()->prepare("SELECT * FROM movies WHERE id in (SELECT idMovie FROM `user-movie` WHERE idUser = :id AND watch = true);");
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
}

//liste des films qu'on a pas vu
function get_user_watchlist($idUser){
    $query = MySQL::getInstance()->prepare("SELECT * FROM movies WHERE id in (SELECT idMovie FROM `user-movie` WHERE idUser = :id AND watchlist = true);");
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
}

?>