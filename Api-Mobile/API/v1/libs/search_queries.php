<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 17:05
 */

function search($search, $type){
    switch($type){
        case "movies":
            $research = "SELECT * FROM movies WHERE title LIKE '%$search%'";
            break;
        case "users":
            $research = "SELECT * FROM users WHERE username LIKE '%$search%'";
            break;
    }
    $query = MySQL::getInstance()->query($research);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}