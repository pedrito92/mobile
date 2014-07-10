<?php

class UsersHandler {
    function get() {
        $users = get_users();

        if(count($users)>0){
            API::status(200);
            API::response($users);
        }else{
            API::error(204, "Aucun user enregistré");
        }
    }

    function post(){
        if(isset($_POST["username"]) && $_POST["username"] != ""){
            $username = $_POST["username"];
            $valid = create_user($username);
            if(count($valid)>0){
                API::status(201);
                API::response($valid);
            }else{
                API::error(400, "Erreur à l'enregistrement");
            }
        }else{
            API::error(400, "Aucune information à enregistrer");
        }
    }
}