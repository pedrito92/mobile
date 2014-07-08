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
    return array("meta" => array("code" => 200), "data"=> $query->fetchAll(PDO::FETCH_ASSOC));;
}

//Création d'un user
function create_movie($title, $cover, $genre) {
    $db = MySQL::getInstance();
    $query = $db->prepare("INSERT INTO movies(title,cover,genre) VALUES (:title,:cover,:genre)");
    $query->bindValue(':title', $title, PDO::PARAM_STR);
    $query->bindValue(':cover', $cover, PDO::PARAM_STR);
    $query->bindValue(':genre', $genre, PDO::PARAM_STR);
    $query->execute();

    $lastId = $db->lastInsertId();
    return array("data"=> array( "insertId" =>$lastId, "title" => $title, "cover" => $cover, "genre" => $genre));
}

?>