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
        <link rel="stylesheet" href="css/style_admin2.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
<?php require('../private/config.php'); require('../private/function.php'); ?> 


<?php 
if(isset($_GET['action']))
{
    if($_SESSION['douaneok'] == true)
    {
        echo '<div class="alert alert-success">
        <strong>Information!</strong> Vous étes déja connecter redirection en cours .
      </div>';
      echo '<meta http-equiv="refresh" content="3;URL=admin.php">';
    }
    if($_GET['action'] == "login")
    {
            if(!empty($_POST['pseudo']) && !empty($_POST['password'])){
            

            //  Récupération de l'utilisateur et de son pass hashé
            $req = $sql->prepare('SELECT * FROM account WHERE pseudo = :pseudo AND rank >= 1');
            $req->execute(array(
                'pseudo' => $_POST['pseudo']));
            $resultat = $req->fetch();

            $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

            if (!$resultat)
            {
                echo '<div class="alert alert-danger">
                <strong>Attention</strong> Identifiant Invalide .
              </div>';
            }
            else
            {
                if ($isPasswordCorrect) {
                    $_SESSION['douaneok'] = true;
                    $_SESSION['id'] = $resultat['id'];
                    $_SESSION['pseudo'] = $_POST['pseudo'];
                    $_SESSION['rank'] = $result['rank'];
                    echo '<div class="alert alert-success">
                    <strong>Information!</strong> Connexion réussi redirection en cours .
                  </div>';
                  echo '<meta http-equiv="refresh" content="3;URL=admin.php">';
                }
                else {
                    echo '<div class="alert alert-danger">
                    <strong>Attention!</strong> Identifiant Invalide.
                  </div>';
                }
            }
           
           
           

        }
    }
    else if($_GET['action'] == "register"){
        ?>  <div class="conteneur nben">
        <div class="row">
            <div class="formulaire col-lg-12">
            <img src="images/logo.png" class="icone_douane">
                <form  action="?action=register_add" method="post">
                <div class="form-group">
                    <label for="email">Nom D'utilisateur</label>
                    <input type="text" class="form-control" name="pseudo" id="email" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de Passe:</label>
                    <input type="password" class="form-control" name="password" id="pwd" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Inscription</button>
                
                </form>
            </div>
        </div>
    </div> <?php
    }
    else if($_GET['action'] == "register_add"){
        $users = $sql->prepare('SELECT * FROM account');
        $users->execute();
        $return = $users->fetch();

        if($return['pseudo'] != $_POST['pseudo'])
        {
            
                $options = [
                    'cost' => 12,
                ];

                 $password =  password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
                $user = $sql->prepare('INSERT INTO account(pseudo,password,rank) VALUE(:pseudo,:password,:rank)');
                $user->execute(array(
                'pseudo' => htmlentities($_POST['pseudo']),
                'password' => $password,
                'rank' => -1
                ));
                
                echo '<div class="alert alert-success">
                <strong>Success!</strong> Connexion réussie redirection en cours.
                </div>';
                echo '<meta http-equiv="refresh" content="3;URL=admin.php">';
        }
        else{
            echo '<div class="alert alert-danger">
            <strong>Attention</strong> Cette utilisateur est déja enregistré.
             </div>';
        }

    }
   
}
else {
    ?>  <div class="conteneur nben">
      <div class="row">
          <div class="formulaire col-lg-12">
          <img src="images/logo.png" class="icone_douane">
              <form  action="?action=login" method="post">
              <div class="form-group">
                  <label for="email">Nom D'utilisateur</label>
                  <input type="text" class="form-control" name="pseudo" id="email" required>
              </div>
              <div class="form-group">
                  <label for="pwd">Mot de Passe:</label>
                  <input type="password" class="form-control" name="password" id="pwd" required>
              </div>
              
              <button type="submit" style="width:10%;" class="btn btn-primary">Connexion</button>
              
              </form>
              <a href="?action=register"><button style="width:100%;" class="btn btn-danger">Obtenir un accès </button></a>
          </div>
      </div>
  </div> <?php
  }

?>
</body>
</html> 


