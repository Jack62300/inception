<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Service des douanes</title>
   
         <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" defer></script>
        <link rel="stylesheet" href="css/style_admin.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
    
<?php require('../private/config.php'); 
if(isset($_SESSION['douaneok'])){


require('../private/function.php'); require('../private/admin.php');
$fet = $sql->prepare("SELECT * FROM account WHERE pseudo='".$_SESSION['pseudo']."'");
$fet->execute();
$resulte = $fet->fetch();
if($resulte['rank'] == 999){
   
?>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="admin_suite.php?action=liste-sd"><i class="fas fa-balance-scale"></i> Demande de droit</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="admin_suite.php?action=bdd_all"><i class="fas fa-database"></i> Gestion BDD</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="admin_suite.php?action=list_all"><i class="fas fa-list-ul"></i> Liste des douaniers/Admins</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="admin_suite.php?action=list_allstaff"><i class="fas fa-list-ul"></i> Liste du Staffs</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
  </li>

</ul>


<?php
}
else {
  echo '<a href="logout.php"><button class="btn btn-warning col-lg-4"><i class="fas fa-sign-out-alt"></i> Déconnexion</button></a>';
}
?>
    

   
<section class="container box_top">

    <div class="card grisebox" style="width:400px">
    <img class="card-img-top" src="images/attente.png" alt="Card image">
    <div class="card-body">
        <h4 class="card-title">Douane en Attente</h4>
        <p class="card-text">Utilisateur en Attente : <?php echo countattente($sql); ?></p>
        <a href="admin_suite.php?action=attente" class="btn btn-dark">VOIR</a>
    </div>
    </div>

     <div class="card greenbox" style="width:400px">
    <img class="card-img-top" src="images/valider.png" alt="Card image">
    <div class="card-body">
        <h4 class="card-title">Douane Accepter</h4>
        <p class="card-text">Utilisateur Valider : <?php echo countvalide($sql);  ?></p>
        <a href="admin_suite.php?action=accepter" class="btn btn-success">VOIR</a>
    </div>
    </div>

     <div class="redbox card" style="width:400px">
    <img class="card-img-top" src="images/refuser.png" alt="Card image">
    <div class="card-body">
        <h4 class="card-title">Douane Refuser</h4>
        <p class="card-text">Utilisateur     Refuser : <?php echo countrefuser($sql);  ?></p>
        <br/><a href="admin_suite.php?action=refuser" class="btn btn-danger">VOIR</a>
    </div>
    </div>

     <div class="card" style="width:400px">
    <img class="card-img-top" src="images/tard.png" alt="Card image">
    <div class="card-body">
        <h4 class="card-title">Douane Qui repasse</h4>
        <p class="card-text">Utilisateur retarder: <?php echo countrepasse($sql);  ?></p>
        <a href="admin_suite.php?action=repasse" class="btn btn-primary">VOIR</a>
    </div>
    </div>

     <div class="card" style="width:400px">
    <img class="card-img-top" src="images/quitter.png" alt="Card image">
    <div class="card-body">
        <h4 class="card-title">Douane Erroner</h4>
        <p class="card-text">Utilisateur qui est parti : <?php echo countquitte($sql);  ?><br/></p>
        <a href="admin_suite.php?action=leave" class="btn btn-warning">VOIR</a>
    </div>

    
    

  
</section>
<?php   
}
else {
header('location: login.php');
}
?>
</body>
</html>