<?php

class UserHandler {
    function get($id) {
        $user = get_user($id);

        API::status(200);
        API::response($user);
    }

    function put($id){
        //Test PUT request: curl -X PUT http://local.api.mobile/users/2 -d username=joe
        parse_str(file_get_contents("php://input"),$post_vars);
        $username = $post_vars['username'];

        update_user($id, $username);
    }

    function delete($id){
        delete_user($id);
    }
}