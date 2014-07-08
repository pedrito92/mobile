<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 13:45
 */

class MoviesHandler {
    function get(){
        $movies = get_movies();

        API::status(200);
        API::response($movies);
    }
    function post(){
        $title = $_POST["title"];
        $cover = $_POST["cover"];
        $genre = $_POST["genre"];
        $valid = create_movie($title,$cover,$genre);

        API::status(200);
        API::response($valid);
    }
}