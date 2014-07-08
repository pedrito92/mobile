<?php

class UsersHandler {
    function get() {
        $users = get_users();
//        var_dump($users);

        $users = json_encode($users);
        return $users;
    }

    function post(){
        $username = $_POST["username"];
        create_user($username);
    }
}