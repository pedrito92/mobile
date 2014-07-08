<?php

class UserHandler {
    function get($id) {
        $user = get_user($id);

        API::status(200);
        API::response($user);
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

    function delete($id){
        delete_user($id);
    }
}