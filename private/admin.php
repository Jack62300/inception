<?php

if(isset($_GET['action']))
{
    switch($_GET['action']){
        case 'attente':
       
        $attente = $sql->prepare('SELECT * FROM douane WHERE status=0 ORDER BY dated DESC');
        $attente->execute();
        ?>
        <div class="container">
           
        <div id="accordion">

        

        <span class="badge badge-danger top"> <h3>Liste des joueurs en attente d'un passage de douane  <a href="<?php echo $url_btn; ?>"><button class="btn btn-success">Retour au portail douane</button></a></h3></span>
                <?php
            while($result = $attente->fetch())
            {
                ?>
            <div class="card">
               
            <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseOne<?php echo $result['id_unique']; ?>"><i class="fas fa-chevron-down button-clic"></i></a>
                <b><span class="badge badge-danger"><?php echo $result['pseudo_d'].'</span></b> - Pseudo Rp : '.$result['pseudorp'].' Date : '. $result['dated'];?>
                <div class="button-action">
                <a href="?action=update&id=<?php echo $result['id_unique'];  ?>&status=1"><button class="btn btn-warning"><i class="far fa-clock"></i> Repasse plus tard</button></a>
                <a href="?action=update&id=<?php echo $result['id_unique'];  ?>&status=2"><button class="btn btn-success"><i class="fas fa-user-check"></i> Visa accepté</button></a>
                <a href="?action=update&id=<?php echo $result['id_unique'];  ?>&status=3"><button class="btn btn-danger"><i class="fas fa-user-times"></i> Visa refusé</button></a>
                <a href="?action=update&id=<?php echo $result['id_unique'];  ?>&status=4"><button class="btn btn-primary"><i class="fas fa-city"></i> A quitté la ville </button></a>
            </button>
            
            </div>
            <div id="collapseOne<?php echo $result['id_unique']; ?>" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <div class="container">
                    <div class="row ros">
                        <div class="col-lg-6 back"><span class="badge badge-warning">Background : </span><br /><?php echo $result['background']; ?></div>
                        <div class="col-lg-6 obj"><span class="badge badge-warning"> Objectif : </span> <br /><?php echo $result['objectif']; ?></div>
                        <div class="col-lg-6 rp"><span class="badge badge-warning">Powergaming :</span> <br /> <?php echo $result['powergame']; ?> - <br/> <span class="badge badge-warning">Metagame :</span> <br /> <?php echo $result['metagaming']; ?> - <br/> <span class="badge badge-warning">NoFear : </span><br /> <?php echo $result['nofear']; ?></div>
                        <div class="col-lg-6 autre"><span class="badge badge-warning">Age RP : </span><br /><?php echo $result['agerp']; ?> ans - <br/> <span class="badge badge-warning">Age HRP : </span><br /><?php echo $result['agehrp']; ?> ans</div>
                    </div>
                </div>
            </div>
            </div>
        </div>
            <?php
            }
           ?>
           </div>
        </div>
        
        <?php
        
        

        break;
        case 'update' :
        
        if($_GET['status'] == 1)
        {
            $update = $sql->prepare('UPDATE douane SET status=1,  douanier="'.$_SESSION['pseudo'].'" WHERE id_unique="'.$_GET['id'].'"');
            $update->execute();
            echo '<div class="alert alert-success">
            <strong>Success!</strong> Mise à jour prise en compte
          </div>';
          echo '<meta http-equiv="refresh" content="3;URL=admin.php">';
        }
        else if($_GET['status'] == 2)
        {
            $update = $sql->prepare('UPDATE douane SET status=2,  douanier="'.$_SESSION['pseudo'].'" WHERE id_unique="'.$_GET['id'].'"');
            $update->execute();
            $user = $sql->prepare('SELECT * FROM douane WHERE id_unique="'.$_GET['id'].'"');
            $user->execute();
            $result = $user->fetch();
            echo '<div class="alert alert-success">
            <strong>Success!</strong> Mise à jour prise en compte
          </div>';
          echo '<meta http-equiv="refresh" content="3;URL=admin.php">';
          postToDiscord($result['pseudorp'].'```whitesteam '.$result['steamid'].'```',$url_discord,$_SESSION['pseudo']);
        }
        else if($_GET['status'] == 3)
        {
            $update = $sql->prepare('UPDATE douane SET status=3,  douanier="'.$_SESSION['pseudo'].'" WHERE id_unique="'.$_GET['id'].'"');
            $update->execute();
            echo '<div class="alert alert-success">
            <strong>Success!</strong> Mise à jour prise en compte
          </div>';
          echo '<meta http-equiv="refresh" content="3;URL=admin.php">';
        }
        else if($_GET['status'] == 4)
        {
            $update = $sql->prepare('UPDATE douane SET status=4, douanier="'.$_SESSION['pseudo'].'" WHERE id_unique="'.$_GET['id'].'"');
            $update->execute();
            echo '<div class="alert alert-success">
            <strong>Success!</strong> Mise à jour prise en compte
          </div>';
          echo '<meta http-equiv="refresh" content="3;URL=admin.php">';
        }
        else {
           echo '<div class="alert alert-danger">
           <strong>Une erreur s\'est produite!</strong> Nous sommes désolé mais votre demande ne peut aboutir merci de contacter un technicien.
         </div>';
        }
        
        
        

        break;

        case 'refuser':
       
        $attente = $sql->prepare('SELECT * FROM douane WHERE status=3 ORDER BY dated DESC');
        $attente->execute();
        ?>
        <div class="container">
        <div id="accordion">

        

        <span class="badge badge-danger top"> <h3>Liste des joueurs refusés à la douane <a href="<?php echo $url_btn; ?>"><button class="btn btn-success">Retour au portail douane</button></a></h3></span>
                <?php
            while($result = $attente->fetch())
            {
                ?>
            <div class="card">
               
            <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseOne<?php echo $result['id_unique']; ?>"><i class="fas fa-chevron-down button-clic"></i></a>
                <b><span class="badge badge-danger"><?php echo $result['pseudo_d'].'</span></b> - Pseudo Rp : '.$result['pseudorp'].' Date : '. $result['dated'].'Refuser par : '.$result['douanier'];?>
                <div class="button-action">
                <a href="?action=update&id=<?php echo $result['id_unique'];  ?>&status=1"><button class="btn btn-warning"><i class="far fa-clock"></i> Repasse plus tard</button></a>
                <a href="?action=update&id=<?php echo $result['id_unique'];  ?>&status=2"><button class="btn btn-success"><i class="fas fa-user-check"></i> Visa accepté</button></a>
                <a href="?action=update&id=<?php echo $result['id_unique'];  ?>&status=4"><button class="btn btn-primary"><i class="fas fa-city"></i> A quitté la ville  </button></a>
            </button>
            
            </div>
            <div id="collapseOne<?php echo $result['id_unique']; ?>" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <div class="container">
                    <div class="row ros">
                        <div class="col-lg-6 back"><span class="badge badge-warning">Background : </span><br /><?php echo $result['background']; ?></div>
                        <div class="col-lg-6 obj"><span class="badge badge-warning"> Objectif : </span> <br /><?php echo $result['objectif']; ?></div>
                        <div class="col-lg-6 rp"><span class="badge badge-warning">Powergaming :</span> <br /> <?php echo $result['powergame']; ?> - <br/> <span class="badge badge-warning">Metagame :</span> <br /> <?php echo $result['metagaming']; ?> - <br/> <span class="badge badge-warning">NoFear : </span><br /> <?php echo $result['nofear']; ?></div>
                        <div class="col-lg-6 autre"><span class="badge badge-warning">Age RP : </span><br /><?php echo $result['agerp']; ?> ans - <br/> <span class="badge badge-warning">Age HRP : </span><br /><?php echo $result['agehrp']; ?> ans</div>
                    </div>
                </div>
            </div>
            </div>
        </div>
            <?php
            }
           ?>
           </div>
        </div>
        
        <?php
        
        

        break;
        case 'repasse':
       
        $attente = $sql->prepare('SELECT * FROM douane WHERE status=1 ORDER BY dated DESC');
        $attente->execute();
        ?>
        <div class="container">
        <div id="accordion">

        

        <span class="badge badge-danger top"> <h3>Liste des joueurs qui doivent repasser une douane <a href="<?php echo $url_btn; ?>"><button class="btn btn-success">Retour au portail douane</button></a></h3></span>
                <?php
            while($result = $attente->fetch())
            {
                ?>
            <div class="card">
               
            <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseOne<?php echo $result['id_unique']; ?>"><i class="fas fa-chevron-down button-clic"></i></a>
                <b><span class="badge badge-danger"><?php echo $result['pseudo_d'].'</span></b> - Pseudo Rp : '.$result['pseudorp'].' Date : '. $result['dated'].'reporter par : '.$result['douanier'];?>
                <div class="button-action">
                <a href="?action=update&id=<?php echo $result['id_unique'];  ?>&status=2"><button class="btn btn-success"><i class="fas fa-user-check"></i> Visa accepté</button></a>
                <a href="?action=update&id=<?php echo $result['id_unique'];  ?>&status=3"><button class="btn btn-danger"><i class="fas fa-user-times"></i> Visa refusé</button></a>
                <a href="?action=update&id=<?php echo $result['id_unique'];  ?>&status=4"><button class="btn btn-primary"><i class="fas fa-city"></i> A quitté la ville  </button></a>
            </button>
            
            </div>
            <div id="collapseOne<?php echo $result['id_unique']; ?>" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <div class="container">
                    <div class="row ros">
                        <div class="col-lg-6 back"><span class="badge badge-warning">Background : </span><br /><?php echo $result['background']; ?></div>
                        <div class="col-lg-6 obj"><span class="badge badge-warning"> Objectif : </span> <br /><?php echo $result['objectif']; ?></div>
                        <div class="col-lg-6 rp"><span class="badge badge-warning">Powergaming :</span> <br /> <?php echo $result['powergame']; ?> - <br/> <span class="badge badge-warning">Metagame :</span> <br /> <?php echo $result['metagaming']; ?> - <br/> <span class="badge badge-warning">NoFear : </span><br /> <?php echo $result['nofear']; ?></div>
                        <div class="col-lg-6 autre"><span class="badge badge-warning">Age RP : </span><br /><?php echo $result['agerp']; ?> ans - <br/> <span class="badge badge-warning">Age HRP : </span><br /><?php echo $result['agehrp']; ?> ans</div>
                    </div>
                </div>
            </div>
            </div>
        </div>
            <?php
            }
           ?>
           </div>
        </div>
        
        <?php
        
        

        break;

    case 'accepter':
       
        $attente = $sql->prepare('SELECT * FROM douane WHERE status=2 ORDER BY dated DESC');
        $attente->execute();
        ?>
        <div class="container">
        <div id="accordion">

        

        <span class="badge badge-danger top"> <h3>Liste des joueurs acceptés à la douane <a href="<?php echo $url_btn; ?>"><button class="btn btn-success">Retour au portail douane</button></a></h3></span>
                <?php
            while($result = $attente->fetch())
            {
                ?>
            <div class="card">
               
            <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseOne<?php echo $result['id_unique']; ?>"><i class="fas fa-chevron-down button-clic"></i></a>
                <b><span class="badge badge-danger"><?php echo $result['pseudo_d'].'</span></b> - Pseudo Rp : '.$result['pseudorp'].' Date : '. $result['dated'].'Accepter par : '.$result['douanier'];?>
                <div class="button-action">
                <a href="?action=update&id=<?php echo $result['id_unique'];  ?>&status=1"><button class="btn btn-warning"><i class="far fa-clock"></i> Repasse plus tard</button></a>
                <a href="?action=update&id=<?php echo $result['id_unique'];  ?>&status=3"><button class="btn btn-danger"><i class="fas fa-user-times"></i> Visa refusé</button></a>
                <a href="?action=update&id=<?php echo $result['id_unique'];  ?>&status=4"><button class="btn btn-primary"><i class="fas fa-city"></i> A quitté la ville  </button></a>
            </button>
            
            </div>
            <div id="collapseOne<?php echo $result['id_unique']; ?>" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <div class="container">
                    <div class="row ros">
                        <div class="col-lg-6 back"><span class="badge badge-warning">Background : </span><br /><?php echo $result['background']; ?></div>
                        <div class="col-lg-6 obj"><span class="badge badge-warning"> Objectif : </span> <br /><?php echo $result['objectif']; ?></div>
                        <div class="col-lg-6 rp"><span class="badge badge-warning">Powergaming :</span> <br /> <?php echo $result['powergame']; ?> - <br/> <span class="badge badge-warning">Metagame :</span> <br /> <?php echo $result['metagaming']; ?> - <br/> <span class="badge badge-warning">NoFear : </span><br /> <?php echo $result['nofear']; ?></div>
                        <div class="col-lg-6 autre"><span class="badge badge-warning">Age RP : </span><br /><?php echo $result['agerp']; ?> ans - <br/> <span class="badge badge-warning">Age HRP : </span><br /><?php echo $result['agehrp']; ?> ans</div>
                    </div>
                </div>
            </div>
            </div>
        </div>
            <?php
            }
           ?>
           </div>
        </div>
        
        <?php
        
        

        break;

        

        case 'leave':
       
        $attente = $sql->prepare('SELECT * FROM douane WHERE status=4 ORDER BY dated DESC');
        $attente->execute();
        ?>
        <div class="container">
        <div id="accordion">

        

        <span class="badge badge-primary top"> <h3>Liste des joueurs ayant quitté le serveur<a href="<?php echo $url_btn; ?>"><button class="btn btn-success">Retour au portail douane</button></a></h3></span>
                <?php
            while($result = $attente->fetch())
            {
                ?>
            <div class="card">
               
            <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseOne<?php echo $result['id_unique']; ?>"><i class="fas fa-chevron-down button-clic"></i></a>
                <b><span class="badge badge-danger"><?php echo $result['pseudo_d'].'</span></b> - Pseudo Rp : '.$result['pseudorp'].' Date : '. $result['dated'].'Déplacer par : '.$result['douanier'];?>
                <div class="button-action">
                <a href="?action=update&id=<?php echo $result['id_unique'];  ?>&status=1"><button class="btn btn-warning"><i class="far fa-clock"></i> Repasse plus tard</button></a>
                <a href="?action=update&id=<?php echo $result['id_unique'];  ?>&status=2"><button class="btn btn-success"><i class="fas fa-user-check"></i> Visa accepté</button></a>
                <a href="?action=update&id=<?php echo $result['id_unique'];  ?>&status=3"><button class="btn btn-danger"><i class="fas fa-user-times"></i> Visa refusé</button></a>
            </button>
            
            </div>
            <div id="collapseOne<?php echo $result['id_unique']; ?>" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <div class="container">
                    <div class="row ros">
                        <div class="col-lg-6 back"><span class="badge badge-warning">Background : </span><br /><?php echo $result['background']; ?></div>
                        <div class="col-lg-6 obj"><span class="badge badge-warning"> Objectif : </span> <br /><?php echo $result['objectif']; ?></div>
                        <div class="col-lg-6 rp"><span class="badge badge-warning">Powergaming :</span> <br /> <?php echo $result['powergame']; ?> - <br/> <span class="badge badge-warning">Metagame :</span> <br /> <?php echo $result['metagaming']; ?> - <br/> <span class="badge badge-warning">NoFear : </span><br /> <?php echo $result['nofear']; ?></div>
                        <div class="col-lg-6 autre"><span class="badge badge-warning">Age RP : </span><br /><?php echo $result['agerp']; ?> ans - <br/> <span class="badge badge-warning">Age HRP : </span><br /><?php echo $result['agehrp']; ?> ans</div>
                    </div>
                </div>
            </div>
            </div>
        </div>
            <?php
            }
           ?>
           </div>
        </div>
        
        <?php
        
        

        break;

        case 'liste-sd':
        $attente = $sql->prepare('SELECT * FROM account WHERE rank= "-1" ORDER BY id DESC');
        $attente->execute();
        ?>
        <div class="container">
        <div id="accordion">

        

        <span class="badge badge-danger top"> <h3>Liste des demandes de droits <a href="<?php echo $url_btn; ?>"><button class="btn btn-success">Retour au portail douane</button></a></h3></span>
                <?php
            while($result = $attente->fetch())
            {
                ?>
            <div class="card">
               
            <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseOne<?php echo $result['id']; ?>"><i class="fas fa-chevron-down button-clic"></i></a>
                <b><span class="badge badge-danger">Pseudo : <?php echo $result['pseudo'].'</span></b> - Rang Actuel : '.$result['rank']?>
                <div class="button-action">
                <a href="?action=update_admin&id=<?php echo $result['id'];  ?>&status=1"><button class="btn btn-warning"><i class="fas fa-plane-arrival"></i> Droit de Douanier</button></a>
                <a href="?action=update_admin&id=<?php echo $result['id'];  ?>&status=999"><button class="btn btn-success"><i class="fas fa-tools"></i> Droit Admin (Attention!!!)</button></a>
                <a href="?action=delete_admin&id=<?php echo $result['id'];  ?>"><button class="btn btn-danger"><i class="fas fa-user-minus"></i> Supprimer</button></a>
            </button>
            
            </div>
           
        </div>
            <?php
            }
           ?>
           </div>
        </div>
        
        <?php
        break;

        case 'update_admin':

        $update = $sql->prepare('UPDATE account SET rank="'.$_GET['status'].'" WHERE id="'.$_GET['id'].'"');
            $update->execute();
            echo '<div class="alert alert-success">
            <strong>Success!</strong> Mise à jour prise en compte
          </div>';
          echo '<meta http-equiv="refresh" content="3;URL=admin.php?action=list_sd">';
          break;

          case 'update_admin':

        $update = $sql->prepare('DELETE FROM account WHERE id="'.$_GET['id'].'"');
            $update->execute();
            echo '<div class="alert alert-success">
            <strong>Success!</strong> Mise à jour prise en compte
          </div>';
          echo '<meta http-equiv="refresh" content="3;URL=admin.php?action=list-sd">';
          break;

          case 'bdd_all'
          ?>
          <div class="container tabletwo">
           <a href="admin.php"><button class="btn btn-warning">Retour au panel</button></a>
            <table class="table">
        <thead>
                <tr class="top_table">
                    <th>Nom de la table</th>
                    <th>Ca supprime quoi </th>
                    <th>Action</th>
                </tr>
        </thead>
        <tbody class="middle_table">
                <tr>
                    <td>DOUANE</td>
                    <td>Vider les utilisateurs ayant quitté la ville</td>
                    <td><a href="?action=delete_table&status=4"><button class="btn btn-danger">SUPPRIMER</button></a></td>
                </tr>

                <tr>
                    <td>DOUANE</td>
                    <td>Vider les utilisateurs ayant été refusé</td>
                    <td><a href="?action=delete_table&status=3"><button class="btn btn-danger">SUPPRIMER</button></a></td>
                </tr>
        </tbody>
            </table>
            </div>

            <?php
            break;
            
            case 'delete_table':
            $update = $sql->prepare('DELETE  FROM douane WHERE status="'.$_GET['status'].'"');
            $update->execute();
            echo '<div class="alert alert-success">
            <strong>Success!</strong> Mise à jour prise en compte
          </div>';
          echo '<meta http-equiv="refresh" content="3;URL=admin.php?action=list-sd">';
          break;
          
          case 'list_all':
          
          ?>
          <div class="container tabletwo">
           <a href="admin.php"><button class="btn btn-warning">Retour au panel</button></a>
          <table class="table">
      <thead>
              <tr class="top_table">
                  <th>Nom</th>
                  <th>Action</th>
              </tr>
      </thead>
      <tbody class="middle_table">
        <?php
        $list = $sql->prepare('SELECT *  FROM account');
        $list->execute();
        while($result = $list->fetch()){

        
              echo '<tr>
                  <td>'.$result['pseudo'].' <span class="badge badge-warning">'.getrankall($result['rank']).'</span</td>
                 
                  <td><a href="?action=delete_adm&id='.$result['id'].'>"><button class="btn btn-danger">SUPPRIMER</button></a></td>
              </tr>';
        }
        ?>
            
      </tbody>
          </table>
          </div>

          <?php

          break;

          case 'delete_adm':

          $delete = $sql->prepare('DELETE FROM account WHERE id="'.$_GET['id'].'"');
            $delete->execute();
          echo '<div class="alert alert-success">
            <strong>Success!</strong>Mise à jour prise en compte
          </div>';
          echo '<meta http-equiv="refresh" content="3;URL=admin.php?action=list-sd">';
        break;
        case 'list_allstaff':

        ?>
        <div class="container tabletwo">
            <a href="?action=addstaff"><button class="btn btn-success">Ajouter un membre</button></a> <a href="admin.php"><button class="btn btn-warning">Retour au panel</button></a>
        <table class="table">
           
    <thead>
            <tr class="top_table">
                <th>Avatar</th>
                <th>Pseudo</th>
                <th>Rank</th>
                <th>Action</th>
            </tr>
    </thead>
    <tbody class="middle_table">
      <?php
      $list = $sql->prepare('SELECT *  FROM staff');
      $list->execute();
      while($result = $list->fetch()){

      
            echo '<tr>
                <td><img src="'.$result['avatar'].'" style="max-width: 100px; max-height: 100px;"/></td>
                <td>'.$result['pseudo'].'</td>
                <td>'.$result['rank'].'</td>
                <td><a href="?action=delete_staff&id='.$result['id'].'"><button class="btn btn-danger">SUPPRIMER</button></a></td>
            </tr>';
      }
      ?>
          
    </tbody>
        </table>
        </div>

        <?php


        break;
        case 'delete_staff':
        $delete = $sql->prepare('DELETE FROM staff WHERE id="'.$_GET['id'].'"');
            $delete->execute();
          echo '<div class="alert alert-success">
            <strong>Success!</strong> Mise à jour prise en compte
          </div>';
          echo '<meta http-equiv="refresh" content="3;URL=admin.php?action=list-allstaff">';
        break;

        case 'addstaff':
        ?>
        <div class="container tabletwo">
        <form action="admin_suite.php?action=addstaff_s" method="post">
        <div class="form-group">
            <label for="pseudo">Pseudo:</label>
            <input type="text" class="form-control" name="pseudo" id="pseudo" required>
        </div>
        <div class="form-group">
            <label for="Rank">Pseudo:</label>
           <select name="rank" required>
           <option value="Développeur-Web">Développeur Web</option>
           <option value="Développeur-Serveur">Développeur Serveur</option>
           <option value="Fondateur">Fondateur</option>
           <option value="Administrateur">Administrateur</option>
           <option value="Helpeur">Helpeur</option>
           </select>
        </div>
        <div class="form-group">
            <label for="url"> Lien de Images:</label>
            <input type="url" class="form-control" name="avatar" id="avatar" required>
        </div>
        <button type="submit" class="btn btn-success">Valider</button>
        </form>
        </div>
        <?php
        break;

        case 'addstaff_s':
        $staff = $sql->prepare('INSERT INTO staff(pseudo,rank,avatar) VALUES(:pseudo,:rank,:avatar)');
        $staff->execute(array(
        'pseudo' => htmlentities($_POST['pseudo']),
        'rank' => htmlentities($_POST['rank']),
        'avatar' => $_POST['avatar']

        ));
        echo '<div class="alert alert-success">
        <strong>Success!</strong> Mise à jour prise en compte
      </div>';
      echo '<meta http-equiv="refresh" content="3;URL=admin.php?action=list-allstaff">';

        break;
        }
}