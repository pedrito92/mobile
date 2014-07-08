<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 13:46
 */

//Retourne un user avec le nombre de films like, vue...
function get_movie($idFilm) {
    $query = MySQL::getInstance()->prepare("SELECT u.*,COUNT(um.`like`),COUNT(um.dislike),COUNT(um.watch),COUNT(um.watchlist)
                                            FROM users AS u
                                            LEFT JOIN `user-movie` AS um ON u.id = um.idUser
                                            WHERE u.id = :id");
    $query->bindValue(':id', $idFilm, PDO::PARAM_STR);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

//Mise à jour d'un user
function update_user($idUser,$username) {
    $query = MySQL::getInstance()->prepare("UPDATE users SET username = :username WHERE id = :id");
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
}

//Suppression d'un user
function delete_user($idUser){
    $query = MySQL::getInstance()->prepare("DELETE FROM users WHERE id = :id");
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
}

?>