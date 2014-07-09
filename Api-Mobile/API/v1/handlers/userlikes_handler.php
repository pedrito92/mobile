<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 14:31
 */

class UserLikesHandler {
    //Renvois la liste des films likes de user
    function get($idUser){
        $list = get_user_movielike($idUser);

        API::status(200);
        API::response($list);
    }

    //Ajoute un film like à user
    function post($idUser, $idMovie){
        add_user_likes($idUser, $idMovie);
    }

    //Supprime un film like à user
    function delete($idUser, $idMovie){
        delete_user_likes($idUser, $idMovie);
    }
}