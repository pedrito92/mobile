<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 14:31
 */

class UserDislikesHandler {
    function get($idUser){
        $list = get_user_dislike($idUser);

        API::status(200);
        API::response($list);
    }
    function post($idUser, $idMovie){
        add_user_dislikes($idUser, $idMovie);
    }

    function delete($idUser, $idMovie){
        delete_user_dislike($idUser, $idMovie);
    }
}