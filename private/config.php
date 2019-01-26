<?php
session_start();



/*$url_discord = "519459502366392321/BF3ww9ir7PbIGxh5MOvYL0o3Nl4IVCE3_sNqb2FzbaPoQ0XqUNOqN5ptD9hCVTeX6VYe";
$url_discord2 = "519558134654566400/BNOSaD68OOuroVSCycPYgeOTGMa2RxIzWlCJxq5PAOi0PSbBtEAIwcI9Pw69ZAMnFyq5";
$url_btn = "../public/admin.php";
$host = "localhost";
$bdd = "Inception";
$user = "inception_wp";
$pass = "hGjp!904"; */

$url_discord = "519459502366392321/BF3ww9ir7PbIGxh5MOvYL0o3Nl4IVCE3_sNqb2FzbaPoQ0XqUNOqN5ptD9hCVTeX6VYe";
$url_discord2 = "519558134654566400/BNOSaD68OOuroVSCycPYgeOTGMa2RxIzWlCJxq5PAOi0PSbBtEAIwcI9Pw69ZAMnFyq5";
$url_btn = "../../inception/public/admin.php";
$host = "localhost";
$bdd = "inception";
$user = "root";
$pass = ""; 


$sql = new PDO('mysql:host='.$host.';dbname='.$bdd.';charset=utf8', $user,$pass);