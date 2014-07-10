<?php

//Liste tous les users
function get_users() {
    $query = MySQL::getInstance()->query("SELECT * FROM users");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

//Création d'un user
function create_user($username) {
    $db = MySQL::getInstance();
    $query = $db->prepare("INSERT INTO users(username) VALUES (:username)");
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    $query->execute();

    $lastId = $db->lastInsertId();
    return array( "id" =>$lastId, "username" => $username);
}




