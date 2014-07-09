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
//Requete sur les genres
require("libs/genre_queries.php");
//Requete de la recherche
require("libs/search_queries.php");


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
//Classes sur les genres
require("handlers/genre_handler.php");
//Classes recherche
require("handlers/search_handler.php");

ToroHook::add("404", function() {
    echo "Not found";
});

Toro::serve(array(
    "/"                                 => "UsersHandler",

    //creation de user
    "/users"                            => "UsersHandler",              //GET, POST fait

    //affichage d'un user
    "/users/:number"                    => "UserHandler",               //GET, PUT, DELETE fait
    "/users/:number/likes"              => "UserLikesHandler",          //GET fait
    "/users/:number/likes/:number"      => "UserLikesHandler",          //POST - DELETE fait
    "/users/:number/dislikes"           => "UserDislikesHandler",       //GET fait
    "/users/:number/dislikes/:number"   => "UserDislikesHandler",       //POST - DELETE fait
    "/users/:number/watched"            => "UserWatchedHandler",        //GET fait
    "/users/:number/watched/:number"    => "UserWatchedHandler",        //POST - DELETE fait
    "/users/:number/watchlist"          => "UserWatchlistHandler",      //GET fait
    "/users/:number/watchlist/:number"  => "UserWatchlistHandler",      //POST - DELETE fait

    "/users/:number/followed/"          => "FollowedHandler",           //GET fait
    "/users/:number/followed/:number"   => "FollowedHandler",           //POST, DELETE fait

    "/users/:number/followers/"         => "FollowersHandler",          //GET fait

    "/movies"                           => "MoviesHandler",             //GET, POST fait
    "/movies/:number"                   => "MovieHandler",              //GET, PUT, DELETE fait

    "/search"                           => "SearchHandler",             //GET fait

    "/genres"                           => "GenreHandler"               //GET fait
));