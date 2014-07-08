<?php

//Liste tous les users
function get_users() {
    $query = MySQL::getInstance()->query("SELECT * FROM users");
    return array("meta" => array("code" => 200), "data"=> $query->fetchAll(PDO::FETCH_ASSOC));
}

//Création d'un user
function create_user($username) {
    $db = MySQL::getInstance();
    $query = $db->prepare("INSERT INTO users(username) VALUES (:username)");
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    $query->execute();

    $lastId = $db->lastInsertId();
    return array("meta" => array("code" => 200), "data"=> array( "insertId" =>$lastId, "username" => $username));
}




