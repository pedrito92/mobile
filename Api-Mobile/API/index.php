<?php
//exit("on y est");

require("libs/mysql.php");
require("libs/queries.php");
require("libs/Toro.php");
require("handlers/users_handler.php");
require("handlers/user_handler.php");

ToroHook::add("404", function() {
    echo "Not found";
});

Toro::serve(array(
    "/" => "UsersHandler",
    "/users" => "UsersHandler",
    "/users/:number" => "UserHandler",
));


//,
//"/users/:number" => "UserHandler",
//    "/movies" => "MoviesHandler",
//    "/movies/:number" => "MoviesHandler"