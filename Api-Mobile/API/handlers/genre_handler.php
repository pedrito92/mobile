<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 17:04
 */

class GenreHandler {
    function get(){
        $genre = get_genres();

        API::status(200);
        API::response($genre);
    }
}