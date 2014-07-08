<?php
//exit("on y est");

//Redirection des classes
require("libs/Toro.php");

//Connection à la base de données
require("libs/mysql.php");

//Requete sur les users
require("libs/users_queries.php");
//Requete sur un user
require("libs/user_queries.php");
//Requete sur les films
require("libs/movies_queries.php");
//Requete sur un film
require("libs/movie_queries.php");


//Requete sur les users
//require("libs/users_queries.php");
//classes sur les users
require("handlers/users_handler.php");
//classes sur les films
require("handlers/movies_handler.php");
//classes sur un user
require("handlers/user_handler.php");
//classes sur un film
require("handlers/movie_handler.php");
//Classe sur les likes d'un user
require("handlers/userlikes_handler.php");
//classes sur les films
require("handlers/userdislikes_handler.php");
//classes sur un user
require("handlers/userwatched_handler.php");
//classes sur un film
require("handlers/userwatchlist_handler.php");

ToroHook::add("404", function() {
    echo "Not found";
});

Toro::serve(array(
    "/" => "UsersHandler",

    //creation de user
    "/users" => "UsersHandler",

    //affichage d'un user
    "/users/:number" => "UserHandler",
    "/users/:number/likes" => "UserLikesHandler",
    "/users/:number/likes/:number" => "UserLikesHandler",
    "/users/:number/dislikes" => "UserDislikesHandler",
    "/users/:number/dislikes/:number" => "UserDislikesHandler",
    "/users/:number/watched" => "UserWatchedHandler",
    "/users/:number/watched/:number" => "UserWatchedHandler",
    "/users/:number/watchlist" => "UserWatchlistHandler",
    "/users/:number/watchlist/:number" => "UserWatchlistHandler",

    "/movies" => "MoviesHandler",
    "/movies/:number" => "MoviesHandler"
));


//,
//"/users/:number" => "UserHandler",
//    "/movies" => "MoviesHandler",
//    "/movies/:number" => "MoviesHandler"