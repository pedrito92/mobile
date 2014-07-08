<?php
//exit("on y est");

//Redirection des classes
require("libs/Toro.php");
require("libs/api.php");

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
    "/"                                 => "UsersHandler",

    //creation de user
    "/users"                            => "UsersHandler",              //GET, POST fait

    //affichage d'un user
    "/users/:number"                    => "UserHandler",               //GET, POST, DELETE fait -  PUT à faire
    "/users/:number/likes"              => "UserLikesHandler",          //GET fait
    "/users/:number/likes/:number"      => "UserLikesHandler",          //POST, DELETE à faire
    "/users/:number/dislikes"           => "UserDislikesHandler",       //GET à faire
    "/users/:number/dislikes/:number"   => "UserDislikesHandler",       //POST, DELETE à faire
    "/users/:number/watched"            => "UserWatchedHandler",        //GET à faire
    "/users/:number/watched/:number"    => "UserWatchedHandler",        //POST, DELETE à faire
    "/users/:number/watchlist"          => "UserWatchlistHandler",      //GET à faire
    "/users/:number/watchlist/:number"  => "UserWatchlistHandler",      //POST, DELETE à faire

    "/users/:number/followed/"          => "FollowedHandler",           //GET à faire
    "/users/:number/followed/:number"   => "FollowedHandler",           //POST, DELETE à faire

    "/users/:number/followers/"         => "FollowersHandler",          //GET à faire

    "/movies"                           => "MoviesHandler",             //GET, POST fait
    "/movies/:number"                   => "MoviesHandler",             //GET, POST, DELETE fait -  PUT à faire

    "/search"                           => "SearchHandler",             //GET à faire

    "/genres"                           => "GenreHandler"               //GET à faire
));