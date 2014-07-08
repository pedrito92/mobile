<?php

class UsersHandler {
    function get() {
        $users = get_users();

        API::status(200);
        API::response($users);
    }

    function post(){
        $username = $_POST["username"];
        $valid = create_user($username);

        API::status(200);
        API::response($valid);
    }
}