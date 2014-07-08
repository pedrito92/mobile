<?php
/**
 * Created by JetBrains PhpStorm.
 * User: P. FAYOL
 * Date: 07/07/14
 * Time: 17:03
 */

//Définition de l'api
define('API_ROOT', 'http://localhost/mobile/Api-Mobile/API/index.php/');

//Lister ou rechercher
define('API_METHOD', '');

//Ajouter
//define('API_METHOD', 'ajouter');

//modifier
//define('API_METHOD', 'modifier');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, API_ROOT.API_METHOD);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//liste
curl_setopt($ch, CURLOPT_POSTFIELDS, "");

//Recherche
//curl_setopt($ch, CURLOPT_POSTFIELDS, "recherche=bozo@bozo.com");

//ajout
//curl_setopt($ch, CURLOPT_POSTFIELDS, "nom=moi&email=coucou@salut.yop");

//Modifier
//curl_setopt($ch, CURLOPT_POSTFIELDS, "id=1&email=yo@salut.yop");


$result = curl_exec($ch);

curl_close($ch);
var_dump($result);

var_dump(json_decode($result,true));
?>