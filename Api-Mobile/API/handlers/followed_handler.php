<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 17:03
 */

class FollowedHandler {
    //renvoie la liste des utilisateurs suivis par l'utilisateur
    function get($idUser){
        $followed = get_followed($idUser);

        API::status(200);
        API::response($followed);
    }

    //ajoute un utilisateur suivis à user
    function post($idUser, $idUserFollower){
        add_follower($idUser, $idUserFollower);
    }

    //supprime un utilisateur suivis à user
    function delete($idUser, $idUserFollower){
        delete_follower($idUser, $idUserFollower);
    }
}