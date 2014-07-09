<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 17:03
 */

class SearchHandler {
    function get(){
        $search = $_GET["q"];
        $type = $_GET["type"];
        $result = search($search, $type);

        API::status(200);
        API::response($result);
    }
}