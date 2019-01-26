<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta author="Benoit Delobel"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Inception RP est un serveur GTA Rp sur GTA V, nous vous invitons à nous rejoindre afin de profiter d&#039;une expérience RP unique sur un serveur GTA V RP. Rejoignez l&#039;aventure dès maintenant."/>
        <link rel="canonical" href="https://inception-rp.eu/" />
        <meta property="og:locale" content="fr_FR" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="GTA RP - Inception RP - Serveurs GTA V RP sur PC" />
        <meta property="og:description" content="Inception RP est un serveur GTA Rp sur GTA V, nous vous invitons à nous rejoindre afin de profiter d&#039;une expérience RP unique sur un serveur GTA V RP. Rejoignez l&#039;aventure dès maintenant." />
        <meta property="og:url" content="https://inception-rp.eu/" />
        <meta property="og:site_name" content="Inception Rp" />
    <title>Inception Roleplay</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/main.js" defer></script>
    <script type="text/javascript" src="js/time.js" defer></script>
	<script async custom-element="amp-auto-ads"
        src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js">
</script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119391005-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-119391005-1');
</script>

</head>
<body>
 <?php require('../private/config.php'); require('../private/function.php');?>   
 <div class="form row">
 <form action="index.php?action=douane" method="post">
 <div class="col-lg-12">
                    <div class="form-group">
                        <label for="pseudo_d">Votre pseudo discord</br>
                            <span class="min">Merci d'indiquer votre pseudo discord avec le numéro qui suit (ex : DavidBGdeLille#7841)</span>
                        </label>
                        <input type="text" class="form-control" id="pseudo_d" name="pseudo_d" placeholder="monpseudodiscord#1234" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Votre âge ?*</br>
                        <span class="min">Merci d'indiquer votre âge, nous acceptons les mineurs à conditions qu'il soit suffisamment mature.</span>
                        </label>
                        <input type="text" class="form-control" name="age" id="age" placeholder="18" required>
                    </div>

                    <div class="form-group">
                        <label for="conn">Comment avez-vous entendu parler d'Inception RP ?</br>
                        <span class="min"></span>
                        </label>
                        <input type="text" class="form-control" name="conn" id="conn" placeholder="Youtube,twitch,annuaires top serveurs ..." required>
                    </div> 

                     <div class="form-group">
                        <label for="steam">Steam ID 64 ?</br>
                        <span class="min">Le steam ID 64 commence par 7656 merci de bien faire attention.</span>
                        </label>
                        <input type="text" class="form-control" name="steam" id="steam" placeholder="exemple : 7656***************" required>
                    </div>
                    
                    <div class="form-group">
                    <h3>Demande de visa RP </h3>
                    </div>
                    <div class="form-group">
                        <label for="steam">Nom & Prénom du personnage</br>
                        <span class="min">Exemple : Jack Splendid</span>
                        </label>
                        <input type="text" class="form-control" name="pseudorp" id="pseudorp" placeholder="Exemple : Jack Splendid" required>
                    </div> 


                    <div class="form-group">
                        <label for="steam">Âge de votre personnage</br>
                        <span class="min">Champs Obligatoire</span>
                        </label>
                        <input type="text" class="form-control" name="agerp" id="agerp" placeholder="exemple : 22" required>
                    </div> 

                    <div class="form-group">
                        <label for="steam">Background du personnage</br>
                        <span class="min">Nom, prénom, âge, taille, histoire du personnage, qualité, défaut, traits de caractères, merci de donner le maximum d'informations, sous peine de voir sa demande de visa repoussée.
                        </span>
                        </label>
                        <textarea  class="form-control" name="background" id="background" placeholder="Background complet et détaillé de votre personnage" required></textarea>
                    </div> 

                     <div class="form-group">
                        <label for="steam">Objectif RP du personnage</br>
                        <span class="min">Cet objectif va permettre de déterminer les directives de votre role play et ainsi pouvoir aider le staff à définir si vous avez atteint ce pourquoi vous êtes venu, par exemple devenir le maire de la ville (poste qui induit qu'on peut se faire assassiner). Il sert aussi à définir si votre mort RP est recevable.
                        </span>
                        </label>
                        <textarea  class="form-control" name="objectif" id="objectif" placeholder="Définissez votre objectif en RP pour votre personnage" required></textarea>
                    </div> 
                   
                    <div class="form-group">
                    <h3>Connaissances et maîtrises du RP</h3>
                    </div>
					
		        <div class="form-group">
                        <label for="steam">Définir le powergaming*</br>
                        <span class="min"></span>
                        </label>
                        <input type="text" class="form-control" name="powergaming" id="powergaming" placeholder="Definir ICI" required>
                    </div>

                    <div class="form-group">
                        <label for="steam">Définir le no-fear rp*</br>
                        <span class="min"></span>
                        </label>
                        <input type="text" class="form-control" name="nofear" id="nofear" placeholder="Definir ICI" required>
                    </div>

                    <div class="form-group">
                        <label for="steam">Définir le metagaming*</br>
                        <span class="min"></span>
                        </label>
                        <input type="text" class="form-control" name="metagame" id="metagame" placeholder="Definir ICI" required>
                    </div>
                   
                    <button type="submit" class="btn btn-warning">Faire ma demande de Visa</button>
                    </div>
                    </form>
                    </div>
    <?php require_once('../template/modal.php'); require_once('../private/action.php');?>
</body>
</body>
</body>

</body>
</body>
</html>