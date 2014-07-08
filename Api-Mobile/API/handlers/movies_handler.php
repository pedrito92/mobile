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
        var_dump($movies);

        $movies = json_encode($movies);
        $data = "{'data': $movies}";
        $data = json_encode($data);

        echo $data;
        return $movies;
    }
    function post(){
        $title = $_POST["title"];
        $cover = $_POST["cover"];
        $genre = $_POST["genre"];
        $valid = create_movie($title,$cover,$genre);
        echo $valid;
    }
}