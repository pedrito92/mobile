<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 13:46
 */

//Liste tous les users
function get_movies() {
    $query = MySQL::getInstance()->query("SELECT * FROM movies");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

//Création d'un user
function create_movie($title, $cover, $genre) {
    $query = MySQL::getInstance()->prepare("INSERT INTO movies(title,cover,genre) VALUES (:title,:cover,:genre)");
    $query->bindValue(':title', $title, PDO::PARAM_STR);
    $query->bindValue(':cover', $cover, PDO::PARAM_STR);
    $query->bindValue(':genre', $genre, PDO::PARAM_STR);
    $query->execute();
    return "succes";
//    $query = MySQL::getInstance()->query("SELECT * FROM users WHERE username LIKE '`':username'`' LIMIT 1");
//    $query->bindValue(':username', $username, PDO::PARAM_STR);
//    return $query->fetchAll(PDO::FETCH_ASSOC);
}

?>