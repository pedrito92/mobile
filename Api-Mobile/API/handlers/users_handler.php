<?php

class UsersHandler {
    function get() {
        $users = get_users();
//        var_dump($users);

        $users = json_encode($users);
        $data = "{'data': $users}";
        $data = json_encode($data);

        echo $data;
        return $users;
    }

    function post(){
        $username = $_POST["username"];
        $valid = create_user($username);
        echo $valid;
//        var_dump($userid);
    }

    function delete($id){
        delete_user($id);
    }
}