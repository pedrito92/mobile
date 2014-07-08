<?php

function get_users() {
    $query = MySQL::getInstance()->query("SELECT * FROM users");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function get_user($idUser) {
    $query = MySQL::getInstance()->query("SELECT * FROM users WHERE id = :id");
    $query->bindValue(':id', $idUser, PDO::PARAM_STR);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function create_user($username) {
    $query = MySQL::getInstance()->prepare("INSERT INTO users(username) VALUES (:username)");
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    $query->execute();
}

function update_user($idUser,$username) {
    $query = MySQL::getInstance()->prepare("UPDATE users SET username = :username WHERE id = :id");
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    $query->bindValue(':id', $idUser, PDO::PARAM_STR);
    $query->execute();
}

function delete_user($idUser){
    $query = MySQL::getInstance()->prepare("DELETE FROM users WHERE id = :id");
    $query->bindValue(':id', $idUser, PDO::PARAM_INT);
    $query->execute();
}




