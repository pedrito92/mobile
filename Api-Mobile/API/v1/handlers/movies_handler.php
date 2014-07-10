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

        if(count($movies)>0){
            API::status(200);
            API::response($movies);
        }else{
            API::error(204, "Aucun user enregistré");
        }
    }
    function post(){
        if((isset($_POST["title"]) && $_POST["title"] != "") &&
           (isset($_POST["cover"]) && $_POST["cover"] != "") &&
           (isset($_POST["genre"]) && $_POST["genre"] != "")){
            $title = $_POST["title"];
            $cover = $_POST["cover"];
            $genre = $_POST["genre"];

            $valid = create_movie($title,$cover,$genre);
            if(count($valid)>0){
                API::status(200);
                API::response($valid);
            }else{
                    API::error(400, "Erreur à l'enregistrement");
            }
        }else{
            API::error(400, "Aucune information à enregistrer");
        }
    }
}