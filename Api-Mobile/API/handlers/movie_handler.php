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
    function post(){

    }
    function put(){

    }
    function delete(){

    }
}