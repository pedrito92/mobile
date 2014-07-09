<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 13:46
 */

//Retourne un user avec le nombre de films like, vue...
function get_movie($idFilm) {
    $query = MySQL::getInstance()->prepare("SELECT * FROM movies WHERE id = :id");
    $query->bindValue(':id', $idFilm, PDO::PARAM_STR);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

//Mise à jour d'un user
function update_movie($idFilm,$title,$cover,$genre) {
    $query = MySQL::getInstance()->prepare("UPDATE movies SET title=:title,cover=:cover,genre=:genre WHERE id = :id");
    $query->bindValue(':title', $title, PDO::PARAM_STR);
    $query->bindValue(':cover', $cover, PDO::PARAM_STR);
    $query->bindValue(':genre', $genre, PDO::PARAM_STR);
    $query->bindValue(':id', $idFilm, PDO::PARAM_INT);
    $query->execute();
}

//Suppression d'un user
function delete_movie($idFilm){
    $query = MySQL::getInstance()->prepare("DELETE FROM movies WHERE id = :id;
                                            DELETE FROM usermovie WHERE idMovie = :id");
    $query->bindValue(':id', $idFilm, PDO::PARAM_INT);
    $query->execute();
}

?>