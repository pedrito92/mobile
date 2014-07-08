<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 14:31
 */

class UserLikesHandler {
    function get($idUser){
        $list = get_user_like($idUser);

        API::status(200);
        API::response($list);
    }

    function post($idUser, $idMovie){
        $add = add_user_likes($idUser, $idMovie);
    }

    function delete($id){

    }
}