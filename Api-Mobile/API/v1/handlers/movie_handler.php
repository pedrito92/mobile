<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 13:44
 */

class MovieHandler {
    function get($id){
        $movie = get_movie($id);

        if(is_array($movie)){
            API::status(200);
            API::response($movie);
        }else{
            API::error(204, "Aucun user associé");
        }
    }

    function put($id){
        //Test PUT Request : curl -X PUT http://local.api.mobile/movies/2 -d title=encore -d cover=kkkkkkkk -d genre=1
        parse_str(file_get_contents("php://input"),$post_vars);
        if((isset($post_vars["title"]) && $post_vars["title"] != "") &&
           (isset($post_vars["cover"]) && $post_vars["cover"] != "") &&
           (isset($post_vars["genre"]) && $post_vars["genre"] != "")){
            $title = $post_vars['title'];
            $cover = $post_vars['cover'];
            $genre = $post_vars['genre'];

            update_movie($id,$title,$cover,$genre);
        }else{
            API::error(400, "Aucune informations saisie");
        }
    }

    function delete($id){
        delete_movie($id);
    }
}