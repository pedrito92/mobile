<?php
//exit("on y est");

//Redirection des classes
require("v1/libs/Toro.php");
require("v1/libs/api.php");

//Connection à la base de données
require("v1/libs/mysql.php");

//Requete sur les users
require("v1/libs/users_queries.php");
//Requete sur un user
require("v1/libs/user_queries.php");
//Requete sur les films
require("v1/libs/movies_queries.php");
//Requete sur un film
require("v1/libs/movie_queries.php");
//Requete sur les genres
require("v1/libs/genre_queries.php");
//Requete de la recherche
require("v1/libs/search_queries.php");
//Requete de foolowed
require("v1/libs/followed_queries.php");
//Requete de follower
require("v1/libs/followers_queries.php");



//classes sur les users
require("v1/handlers/users_handler.php");
//classes sur les films
require("v1/handlers/movies_handler.php");
//classes sur un user
require("v1/handlers/user_handler.php");
//classes sur un film
require("v1/handlers/movie_handler.php");
//Classe sur les likes d'un user
require("v1/handlers/userlikes_handler.php");
//classes sur les films
require("v1/handlers/userdislikes_handler.php");
//classes sur un user
require("v1/handlers/userwatched_handler.php");
//classes sur un film
require("v1/handlers/userwatchlist_handler.php");
//Classes sur les genres
require("v1/handlers/genre_handler.php");
//Classes recherche
require("v1/handlers/search_handler.php");
//Classes followed
require("v1/handlers/followed_handler.php");
//Classes follower
require("v1/handlers/followers_handler.php");

ToroHook::add("404", function() {
    API::error(404, "Erreur de requete");
});

Toro::serve(array(
    "/v1/"                                 => "UsersHandler",

    //creation de user
    "/v1/users"                            => "UsersHandler",              //GET, POST fait

    //affichage d'un user
    "/v1/users/:number"                    => "UserHandler",               //GET, PUT, DELETE fait
    "/v1/users/:number/likes"              => "UserLikesHandler",          //GET fait
    "/v1/users/:number/likes/:number"      => "UserLikesHandler",          //POST - DELETE fait
    "/v1/users/:number/dislikes"           => "UserDislikesHandler",       //GET fait
    "/v1/users/:number/dislikes/:number"   => "UserDislikesHandler",       //POST - DELETE fait
    "/v1/users/:number/watched"            => "UserWatchedHandler",        //GET fait
    "/v1/users/:number/watched/:number"    => "UserWatchedHandler",        //POST - DELETE fait
    "/v1/users/:number/watchlist"          => "UserWatchlistHandler",      //GET fait
    "/v1/users/:number/watchlist/:number"  => "UserWatchlistHandler",      //POST - DELETE fait

    "/v1/users/:number/followed"           => "FollowedHandler",           //GET fait
    "/v1/users/:number/followed/:number"   => "FollowedHandler",           //POST, DELETE fait

    "/v1/users/:number/followers"          => "FollowersHandler",          //GET fait

    "/v1/movies"                           => "MoviesHandler",             //GET, POST fait
    "/v1/movies/:number"                   => "MovieHandler",              //GET, PUT, DELETE fait

    "/v1/search"                           => "SearchHandler",             //GET fait

    "/v1/genres"                           => "GenreHandler"               //GET fait
));