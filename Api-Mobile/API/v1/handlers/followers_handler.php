<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 17:03
 */

class FollowersHandler {
    //Renvoie la liste de tous les utilisateurs suivit par user
    function get($idUser){
        $followers = get_followers($idUser);

        API::status(200);
        API::response($followers);
    }
}