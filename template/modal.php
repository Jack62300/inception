
<div class="modal" id="douane">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><img src="images/douane_logo.png"></br>Formulaire de demande de visa pour rejoindre Inception</h4>
                    
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form action="index.php?action=douane" method="post">
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
                        <input type="text" class="form-control" name="age" id="age" placeholder="9" required>
                    </div>

                    <div class="form-group">
                        <label for="conn">Comment avez-vous entendu parler d'Inception RP ?</br>
                        <span class="min"></span>
                        </label>
                        <input type="text" class="form-control" name="conn" id="conn" placeholder="Sur tfou dans l'épisode de dora l'exploratrice !!!" required>
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
                        <textarea  class="form-control" name="background" id="background" placeholder="background : J'aime le foot ou pas !!!" required></textarea>
                    </div> 

                     <div class="form-group">
                        <label for="steam">Objectif RP du personnage</br>
                        <span class="min">Cet objectif va permettre de déterminer les directives de votre role play et ainsi pouvoir aider le staff à définir si vous avez atteint ce pourquoi vous êtes venu, par exemple devenir le maire de la ville (poste qui induit qu'on peut se faire assassiner). Il sert aussi à définir si votre mort RP est recevable.
                        </span>
                        </label>
                        <textarea  class="form-control" name="objectif" id="objectif" placeholder="Votre background ici..." required></textarea>
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
                    </form>
                </div>

               

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
            </div>
            
           <!-- modal staff --->
            <div class="modal" id="staff">
            <div class="modal-dialog">
                <div class="modal-content">
        

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">L'équipe d'Inception Roleplay</h4>
                    
                </div>

                <!-- Modal body -->
                <div class="row justify">
              <?php  $staff = $sql->prepare('SELECT * FROM staff');
                $staff->execute();
                while($return = $staff->fetch()){
                
                    echo ' 
                    <div class="col-lg-4 box-staff">
                    <div class="card" style="width:400px;" >
                        <img class="card-img-top" src="'.$return['avatar'].'" alt="Avatar de '.$return['pseudo'].'">
                        <div class="card-body">
                            <h4 class="card-title">'.$return['pseudo'].'</h4>
                            <p class="card-text badge badge-success">'.$return['rank'].'</p>
                            
                        </div>
                        </div>
                        </div>
                        ';
                }?>
               </div>
              

                <!-- Modal footer -->
                

                </div>
            </div>
            </div>


            <!-- modal staff --->
            <div class="modal" id="ville">
            <div class="modal-dialog">
                <div class="modal-content ville">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">GTA RP : HISTOIRE DE L’ILE D’INCEPTION</h4>
                    
                </div>

                <!-- Modal body -->
                <span>
Dans le courant des années 1770, les colons américains s’opposent de plus en plus à leur métropole : Londres leur refuse les terres indiennes situées à l’ouest des montagnes Appalaches. Le gouverneur qui fut en place sur l’île décida de couper tout contact entre le continent et la métropole ne souhaitant aucun conflit.
</span><span>
George Anderson le gouverneur était un grand homme aux idées avant-gardistes , une fois libre de ses choix et de ses actes, il fit l’abolition de l’esclavage et tendais à mettre en place l’égalité des peuples.
</span><span>
Lors de la seconde guerre mondiale l’île était plongée dans un chaos sans précédent. William Smith-White gouverneur de l’époque sur l’île profita de cette période difficile pour aider les nazis dans leurs idées de conquête et de gouvernance sur le monde entier.
</span><span>
La population fut rabaissée, déshumanisée, le retour de l’esclavagisme, les citoyens travaillèrent jusqu’à l’épuisement pour le 3ème Reich. C’est en 1944 que les Américains décidèrent d’intervenir afin de récupérer l’île d’Inception ayant une position stratégique et ainsi d’aider les locaux dans leur reconstruction.
</span><span>
L’industrialisation transforme les États-Unis au cours du XIXe siècle. L’agriculture et les manufactures se mécanisent alors que les services connaissent une standardisation précoce. Les innovations technologiques et l’emploi de machines-outils y sont donc plus importants qu’ailleurs. L’essor industriel du pays provoque l’urbanisation de l’île et la modernisation de la ville. La ville est le berceau d’un nouveau mythe américain, une grande station balnéaire ou toutes les grandes stars se rendent pour leurs séjours.
</span><span>
Le 11 septembre 2001, les États-Unis sont victimes d’une vague d’attentats terroristes  qui font près de trois mille morts. En réponse, le gouvernement fédéral de notre île décide de quitter les États-Unis afin de devenir un État indépendant. Depuis que nous avons quitté les États-Unis notre île a connue une guerre civile.
</span><span>
Dans le courant des années 2009 le gouvernement fédéral finit par trouver les mots justes et régler ce problème de guerre civile, quoi qu’il en soit tout reste à faire sur notre belle île qui a été ravagée par cette guerre extrêmement violente. Le peuple décida de mettre ses rancoeurs de côtés et de reconstruire tout ce qui fut dévasté, la mise en place d’institutions de premiers secours fut rapide ainsi que la remise en place d’une structure dans l’état ce qui ne fut pas chose simple au regard des vieilles rancunes libéralistes et le fascime omniprésent.
</span><span>
Aujourd’hui,  l’île est à nouveau fonctionnelle, tous les services publics, les EMS, la LSPD, les commerces locaux sont opérationnels …
</span><span>
Des entreprises locales ont été créés, elles fonctionnent et ont permis de relancer l’économie. Est-ce que la paix et la prospérité vont durer dans le temps ? Tout est possible vous voulez déménager dans notre belle ville, les douaniers vous feront passer un entretien à l’aéroport ou par téléphone pour l’obtention de votre passeport, alors qu’attendez-vous pour marquer de votre empreinte l’histoire de l’île d’Inception </span>

                </div>

                <!-- Modal footer -->
                

                </div>
            </div>
            </div>


            <!-- modal staff --->
            <div class="modal" id="service">
            <div class="modal-dialog">
                <div class="modal-content ville">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">LES SERVICES DISPONIBLES EN VILLE</h4>
                    
                </div>

                <!-- Modal body -->
               <img src="images/service/1.png"  alt="Nos Services"/>
                </div>

                <!-- Modal footer -->
                

                </div>
            </div>
            </div>



           