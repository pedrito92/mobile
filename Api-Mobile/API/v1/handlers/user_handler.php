<?php

class UserHandler {
    function get($id) {
        $user = get_user($id);
        if(is_array($user)){
            API::status(200);
            API::response($user);
        }else{
            API::error(204, "Aucun user associé");
        }
    }

    function put($id){
        //Test PUT request: curl -X PUT http://local.api.mobile/users/2 -d username=joe
        parse_str(file_get_contents("php://input"),$post_vars);

        if(isset($post_vars['username']) && $post_vars['username'] != ""){
            $username = $post_vars['username'];

            update_user($id, $username);
        }else{
            API::error(400, "Aucune informations saisie");
        }
    }

    function delete($id){
        delete_user($id);
    }
}