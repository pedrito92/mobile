<?php

//Liste tous les users
function get_users() {
    $query = MySQL::getInstance()->query("SELECT * FROM users");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

//Création d'un user
function create_user($username) {
    $query = MySQL::getInstance()->prepare("INSERT INTO users(username) VALUES (:username)");
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    $query->execute();
    return "succes";
//    $query = MySQL::getInstance()->query("SELECT * FROM users WHERE username LIKE '`':username'`' LIMIT 1");
//    $query->bindValue(':username', $username, PDO::PARAM_STR);
//    return $query->fetchAll(PDO::FETCH_ASSOC);
}




