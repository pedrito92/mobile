<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 13:46
 */

//Retourne un user avec le nombre de films like, vue...
function get_user($idUser) {
    $query = MySQL::getInstance()->prepare("SELECT u.*,COUNT(um.likes) as likes,COUNT(um.dislike) as dislike,COUNT(um.watch) as watch,COUNT(um.watchlist) as watchlist
                                            FROM users AS u
                                            LEFT JOIN usermovie AS um ON u.id = um.idUser
                                            WHERE u.id = :id");
    $query->bindValue(':id', $idUser, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if(isset($user["id"])) return $user;
    else return false;
}

//Mise à jour d'un user
function update_user($idUser,$username) {
    $query = MySQL::getInstance()->prepare("UPDATE users SET username = :username WHERE id = :id");
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    $query->bindValue(':id', $idUser, PDO::PARAM_STR);
    if(!$query->execute()){
        return array("erreur" => "Pas de user trouvé");
    }
    return get_user($idUser);
}

//Suppression d'un user
function delete_user($idUser){
    $query = MySQL::getInstance()->prepare("DELETE FROM users WHERE id = :id;
                                            DELETE FROM usermovie WHERE idUser = :id;
                                            DELETE FROM follow WHERE idUser = :id;
                                            DELETE FROM follow WHERE idUserFollower = :id;");
    $query->bindValue(':id', $idUser, PDO::PARAM_STR);
    $query->execute();
}

//Affichage de la liste des likes du user
function get_user_movielike($idUser){
    $query = MySQL::getInstance()->prepare("SELECT * FROM movies WHERE id in (SELECT idMovie FROM  usermovie WHERE idUser =:id AND likes = TRUE )");
    $query->bindValue(':id', $idUser, PDO::PARAM_STR);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

//Renvoie toute les informations concernant un user et un film
function get_user_movie_info($idUser, $idFilm){
    $db = MySQL::getInstance();
    $query = $db->prepare("SELECT * FROM usermovie WHERE idUser = :idUser AND idMovie = :idFilm");
    $query->bindValue(':idUser', $idUser, PDO::PARAM_STR);
    $query->bindValue(':idFilm', $idFilm, PDO::PARAM_STR);
    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
}

//Ajoute un like à film
function add_user_likes($idUser, $idFilm){
    $likes = get_user_movie_info($idUser, $idFilm);
    $db = MySQL::getInstance();
    if(count($likes["likes"])==1 || count($likes["dislikes"])==1){
        $query = $db->prepare("UPDATE usermovie SET idUser = :idUser,idMovie = :idFilm, likes = true, dislike = false WHERE idUser = :idUser AND idMovie = :idFilm;
                               UPDATE movies SET likes = likes+1 WHERE id = :idFilm;");
    }else{
        $query = $db->prepare("INSERT INTO usermovie(idUser, idMovie, likes, dislike) VALUES (:idUser,:idFilm,true, false);
                               UPDATE movies SET likes = likes+1 WHERE id = :idFilm;");
    }
    $query->bindValue(':idUser', $idUser, PDO::PARAM_STR);
    $query->bindValue(':idFilm', $idFilm, PDO::PARAM_STR);
    $query->execute();
}

//Supprime un like à film
function delete_user_likes($idUser, $idFilm){
    $query = MySQL::getInstance()->prepare("UPDATE usermovie SET idUser = :idUser,idMovie = :idFilm, likes = false WHERE idUser = :idUser AND idMovie = :idFilm;
                                            UPDATE movies SET likes = likes-1 WHERE id = :idFilm;");
    $query->bindValue(':idUser', $idUser, PDO::PARAM_STR);
    $query->bindValue(':idFilm', $idFilm, PDO::PARAM_STR);
    $query->execute();
}


//Affichage de la liste des dislikes du user
function get_user_dislike($idUser){
    $query = MySQL::getInstance()->prepare("SELECT * FROM movies WHERE id in (SELECT idMovie FROM usermovie WHERE idUser = :id AND dislike = true);");
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

//ajoute un dislike à un film
function add_user_dislikes($idUser, $idFilm){
    $likes = get_user_movie_info($idUser, $idFilm);
    $db = MySQL::getInstance();
    if(count($likes["likes"])==1 || count($likes["dislikes"])==1){
        $query = $db->prepare("UPDATE usermovie SET idUser = :idUser,idMovie = :idFilm, likes = false, dislike = true WHERE idUser = :idUser AND idMovie = :idFilm;
                               UPDATE movies SET dislike = dislike+1 WHERE id = :idFilm;");
    }else{
        $query = $db->prepare("INSERT INTO usermovie(idUser, idMovie, likes, dislike) VALUES (:idUser,:idFilm,false, true);
                               UPDATE movies SET dislike = dislike+1 WHERE id = :idFilm;");
    }$query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    $query->bindValue(':idFilm', $idFilm, PDO::PARAM_INT);
    $query->execute();
}

//Supprime un dislike d'un film
function delete_user_dislike($idUser, $idFilm){
    $query = MySQL::getInstance()->prepare("UPDATE usermovie SET idUser = :idUser,idMovie = :idFilm, dislike = false WHERE idUser = :idUser AND idMovie = :idFilm;
                                            UPDATE movies SET dislike = dislike-1 WHERE id = :idFilm;");
    $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    $query->bindValue(':idFilm', $idFilm, PDO::PARAM_INT);
    $query->execute();
}

//liste des films qu'on a vu
function get_user_watch($idUser){
    $query = MySQL::getInstance()->prepare("SELECT * FROM movies WHERE id in (SELECT idMovie FROM usermovie WHERE idUser = :id AND watch = true);");
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

//Ajoute un watch à un film
function add_user_watch($idUser, $idFilm){
    $likes = get_user_movie_info($idUser, $idFilm);
    $db = MySQL::getInstance();
    if(count($likes["watch"])==1 || count($likes["watchlist"])==1){
        $query = $db->prepare("UPDATE usermovie SET idUser = :idUser,idMovie = :idFilm, watch = true, watchlist = false WHERE idUser = :idUser AND idMovie = :idFilm;
                               UPDATE movies SET watch = watch+1 WHERE id = :idFilm;");
    }else{
        $query = $db->prepare("INSERT INTO usermovie(idUser, idMovie, watch, watchlist) VALUES (:idUser,:idFilm,true, false);
                               UPDATE movies SET watch = watch+1 WHERE id = :idFilm;");
    }$query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    $query->bindValue(':idFilm', $idFilm, PDO::PARAM_INT);
    $query->execute();
}

//Supprime un watch d'un film
function delete_user_watch($idUser, $idFilm){
    $query = MySQL::getInstance()->prepare("UPDATE usermovie SET idUser = :idUser,idMovie = :idFilm, watch = false WHERE idUser = :idUser AND idMovie = :idFilm;
                                            UPDATE movies SET watch = watch-1 WHERE id = :idFilm;");
    $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    $query->bindValue(':idFilm', $idFilm, PDO::PARAM_INT);
    $query->execute();
}

//liste des films qu'on a pas vu
function get_user_watchlist($idUser){
    $query = MySQL::getInstance()->prepare("SELECT * FROM movies WHERE id in (SELECT idMovie FROM usermovie WHERE idUser = :id AND watchlist = true);");
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

//ajoute un watchlist d'un film
function add_user_watchlist($idUser, $idFilm){
    $likes = get_user_movie_info($idUser, $idFilm);
    $db = MySQL::getInstance();
    if(count($likes["watch"])==1 || count($likes["watchlist"])==1){
        $query = $db->prepare("UPDATE usermovie SET idUser = :idUser,idMovie = :idFilm, watch = false , watchlist = true WHERE idUser = :idUser AND idMovie = :idFilm;
                               UPDATE movies SET watchlist = watchlist+1 WHERE id = :idFilm;");
    }else{
        $query = $db->prepare("INSERT INTO usermovie(idUser, idMovie, watch, watchlist) VALUES (:idUser,:idFilm,false, true);
                               UPDATE movies SET watchlist = watchlist+1 WHERE id = :idFilm;");
    }$query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    $query->bindValue(':idFilm', $idFilm, PDO::PARAM_INT);
    $query->execute();
}

//Supprime un watchlist d'un film
function delete_user_watchlist($idUser, $idFilm){
    $query = MySQL::getInstance()->prepare("UPDATE usermovie SET idUser = :idUser,idMovie = :idFilm, watchlist = false WHERE idUser = :idUser AND idMovie = :idFilm;
                                            UPDATE movies SET watchlist = watchlist-1 WHERE id = :idFilm;");
    $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    $query->bindValue(':idFilm', $idFilm, PDO::PARAM_INT);
    $query->execute();
}

?>