<?php

class UserHandler {
    function get($id) {
        $user = get_user($id);
        var_dump($user);
    }
}