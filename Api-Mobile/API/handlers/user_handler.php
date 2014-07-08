<?php

class UserHandler {
    function get($id) {
        $user = get_user($id);
        var_dump($user);
    }

    function put($id){
        var_dump($id);
        var_dump($_GET);
        var_dump($_POST);
        var_dump($_REQUEST);
        var_dump($_ENV);
//        $username = $_POST["username"];
//        update_user($id, $username);
    }
}