<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 08/07/14
 * Time: 17:05
 */

function get_genres(){
    $query = MySQL::getInstance()->query("SELECT * FROM genre");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}