<?php

class UserHandler {
    function get($id) {
        $user = get_user($id);

        API::status(200);
        API::response($user);
    }

    function put($id){
        $putData = file_get_contents("php://input");
        var_dump($putData);
//        var_dump($id);
//        parse_str(file_get_contents("php://input"),$data);
//        var_dump($data);
//        echo $data["username"];
//        $username = $_POST["username"];
//        update_user($id, $username);
    }

    function delete($id){
        delete_user($id);
    }
}