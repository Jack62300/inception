<?php
require_once("config.php");

function postToDiscord($message,$clef,$user)
{
    $data = array("content" => $message, "username" => $user);
    $curl = curl_init("https://discordapp.com/api/webhooks/".$clef);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($curl);
}
function postToDiscord2($message,$clef,$user)
{
    $data = array("content" => $message, "username" => $user);
    $curl = curl_init("https://discordapp.com/api/webhooks/".$clef);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    return curl_exec($curl);
}
function countattente($sql){
    return countX($sql,0);
}

function countvalide($sql){
    return countX($sql,2);
}

function countrefuser($sql){
    return countX($sql,3);
}

function countrepasse($sql){
    return countX($sql,1);
}

function countquitte($sql){ 
    return countX($sql,4);  
}

function countX($sql,$status){
    $count = $sql->prepare('SELECT COUNT(*) AS nbr FROM douane WHERE status=:status ');
    $count->execute(['status' => $status]);
    $result = $count->fetch();

    return $result['nbr'];
}
function getrank($user,$sql){
    $fet = $sql->prepare('SELECT * FROM account WHERE pseudo="'.$user.'"');
    $fet->execute();
    $result = $fet->fetch();
    if($result['ranks'] == 999)
    {
        return '<div class="card" style="width:400px">
        <img class="card-img-top" src="" alt="Card image">
        <div class="card-body">
         <a href=""><button class="btn btn-danger">Ajouts d\'un administrateur</button></a> </div>
         </div>';
    }
}
    function countadmin($sql){
        $fet = $sql->prepare('SELECT COUNT(*) AS total FROM account WHERE rank = -1');
        $fet->execute();
        $result = $fet->fetch();
        return $result['total'];
    }
function getrankall($value){
    if($value == 999){
        return "Responsable / Développeur";
    }
    else {
    return "Douanier";
     }
}
function getconnected($sql){
    $retour = $sql->prepare('SELECT COUNT(*) AS nbre_entrees FROM connectes');
    $retour->execute();
    $donnees = $retour->fetch();
    echo '<p>Il y a actuellement ' . $donnees['nbre_entrees'] . ' visiteurs connectés sur le site !</p>';
}



