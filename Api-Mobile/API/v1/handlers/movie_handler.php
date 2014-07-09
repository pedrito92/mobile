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

        API::status(200);
        API::response($movie);
    }

    function put($id){
        //Test PUT Request : curl -X PUT http://local.api.mobile/movies/2 -d title=encore -d cover=kkkkkkkk -d genre=1
        parse_str(file_get_contents("php://input"),$post_vars);
        $title = $post_vars['title'];
        $cover = $post_vars['cover'];
        $genre = $post_vars['genre'];

        update_movie($id,$title,$cover,$genre);
    }

    function delete($id){
        delete_movie($id);
    }
}