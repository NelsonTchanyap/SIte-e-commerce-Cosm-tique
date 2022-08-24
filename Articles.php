<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Site_40.css">
    <link rel="shortcut icon" href="images/IMG-20220704-WA0014.ico" type="image/x-icon">
    <script src="Articles9.js" defer type="text/javascript"></script>
    <script src="font-awesome.js" crossorigin="anonymous" defer></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
	<script src='jquery.zoom.js'></script>
	<script>
		$(document).ready(function(){
			$('#ex1').zoom();
			
		});
	</script>
</head>
<body style="background-color:white">

<?php include("header.php"); ?>

  <nav class="Anav">
        <img src="images/IMG-20220704-WA0014.jpg" alt="Images">
        <ul>
            <?php 

                $req = $db->query("SELECT * FROM categories ");
                $data = $req->fetchAll(PDO::FETCH_ASSOC);

                foreach($data as $index => $categorieTab){

            ?>
                    <li>
                        <a href="Groupe.php?id=<?= $categorieTab["id"] ?>" >
                            <?= $categorieTab["Designation"] ?>
                        </a>
                    </li>
            <?php 

                }

            ?>
        </ul>
    </nav>

    <?php 
        

        if( isset($_GET["id"])){

            $id = $_GET["id"] ;
            $req = $db->query("SELECT * FROM articles WHERE id = $id ");
            $data = $req->fetch(PDO::FETCH_ASSOC);

        }
    ?>

   <section>
        <div class="article_details">
            <div class="zoom" id="ex1">
            <img src="<?= $data["Url"] ?>" alt="">
            </div>
            
            <div class="dl">
                <h1 class="dp"><?= $data["Designation"] ?></h1>
                <div class="dp prix">
                <?= number_format($data["Prix"] , 2 , ',' , '.') ?> euros
                </div>
                <span class="dp Qt_label"> Quantité :</span>
                <div class="dp quantity">
                           
                           <span>
                               <div>
                                    <div class="decrease" onclick="decrease(<?= $data['id'] ?>)"> <i class="fa fa-minus" aria-hidden="true"></i></div>
                                    <div class="qt">1</div>
                                    <div class="increase" onclick="increase(<?= $data['id'] ?>)"> <i class="fa fa-plus" aria-hidden="true"></i></div>
                               </div>
                           </span>
                           <span>
                               <button onclick="Ajouter(<?= $data['id'] ?>)" >Ajouter</button>
                           </span>
                </div>

                <div class="dp fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager</a></div>
               
            </div>
        </div>
        <div class=" dp b_toggle">
            <div>Description</div>
            <?php
                $idArt ="";
                if( isset($_GET["id"])){ $idArt = $_GET["id"] ;}
                $req = $db->query("SELECT * FROM avis where idArticle = $idArt ");
                $dataC = $req->fetchAll(PDO::FETCH_ASSOC);
                $nb=0 ;
                if($dataC){
                    $nb = count($dataC);
                    
                }
                
            ?>
            <div>Avis <span class="count">(<?= $nb ?>)</span> </div>
        </div>
        <div class="dp article_description_avis">
                <div class="article_description">
                    <?= $data["Descriptions"] ?>
                </div>
                <div class="article_avis">

                <?php 
                    if(isset($_SESSION["user"])){
                        
                        $id = (int)json_decode($_SESSION["user"] , true)["id"];
                        $req = $db->query("SELECT * FROM avis where idUser = $id "); /* @GameChanger! --SQLDebugging#idUer-Notid*/
                        $data = $req->fetch(PDO::FETCH_ASSOC);
                        // var_dump($data);
                           
                ?>

                <div class="dp article_avisC">
                
                <?php 
                        if($data == false){
                            
                       
                ?>
                    <div class="Pseudo"><i class="fa fa-user-o" aria-hidden="true"></i>
                        <?=json_decode($_SESSION["user"] , true)["nom"].' '?>
                        <?=json_decode($_SESSION["user"] , true)["prenom"]?>
                     </div>
                    <form class="avisform" action="">
                            <div class="control">
                                <label for="avis">Rédigez un avis</label>
                                <textarea name="avis" id="avis" placeholder="Ecrivez quelque chose..." required></textarea>
                                <div class="clear"></div>
                            </div>
                            <div class="control">
                                
                                <input type="submit" idUser ="<?= json_decode($_SESSION["user"] , true)["id"] ?>"
                                 idArticle="<?= isset($_GET["id"])? $_GET["id"] : "Nada" ?>" id="Publier" value="Publier">
                                <div class="clear"></div>
                            </div>
                    </form>
                <?php 
                     }
                     else{
                ?>
                    <div class="comment">
                        <span><i class="fa fa-exclamation-circle" style="font-size:22px"aria-hidden="true"></i>
                            Vous avez déjà rédigé un avis pour cet article . </span> <b>
                         <i>Modifiez-le.</i> </b></div>
                <?php
                     }
                ?>
                </div>
                <?php 
                 }
                 else{
                        
               
                ?>

                 <div class="disconnected">
                       Pour pouvoir poster il faut être connecté.  
                    <div class="reconnected login">
                       Connectez-vous
                    </div>
                 </div>

                <?php 
                     } 
                ?>
                    <div class="hr" style="margin-bottom:50px"></div>
                </div>

                
                  
        </div>

        

        <div class="dp list_avis">
                <?php 
                $data = 0;
                     if( isset($_GET["id"])){

                        $id = $_GET["id"] ;
                        $req = $db->query("SELECT * FROM avis WHERE idArticle = $id ");
                        $data = $req->fetchAll(PDO::FETCH_ASSOC);
                        // var_dump($data);
            
                    }
                    if($data == false ){
                           
                ?>
                    <p style="text-align:center">Encore aucun avis pour cet article. Soyez le <i>premier</i> à <label style="display:contents; cursor:pointer;color:#3e1843" for="avis"> <b>poster !</b></label></p>
                        <?php 
                        }
                        else{
                            // // $data = $req->fetchAll(PDO::FETCH_ASSOC);
                            //     var_dump($data);
                            foreach($data as $unAvis){
                              
                                $req = $db->query("SELECT * FROM utilisateurs WHERE id = ".$unAvis['idUser']." ");
                                $dataUser = $req->fetch(PDO::FETCH_ASSOC);
                ?>  
                    <div class="avis" id="avis<?= $unAvis['id'] ?>">
                    
                        <div class="Pseudo">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <?= $dataUser['nom'].' '.$dataUser['prenom'] ?>
                        </div>

                        <div class="text<?= $unAvis['id']?> text">

                            <?php if( isset($_SESSION['user'])){
                                if( json_decode($_SESSION['user'],true)["id"] == $dataUser["id"] ){
                            ?>
                                <i class="fa fa-times Aclose" onclick="DeleteAvis('<?= $unAvis['id']?>')" aria-hidden="true"></i>
                            <?php 
                            }
                                } 
                            ?>

                            

                            <?= $unAvis["Descriptions"] ?>

                            <i class="fa fa-quote-right" aria-hidden="true"></i>

                            <?php if( isset($_SESSION['user'])){
                                if( json_decode($_SESSION['user'],true)["id"] == $dataUser["id"] ){
                            ?>
                            <i class="fa fa-pencil " idart="<?= isset($_GET["id"])?$_GET["id"]:""?>"idtext="<?= $unAvis['id']?>"  aria-hidden="true"> </i>
                            <?php 
                            }
                                } 
                            ?>
                        </div>
                    </div>
                <?php
                    }
                        }
                        ?>
                    
        </div>

        <div class="suggestions">
           
            <div class=" title">Articles Similaires</div>
            <div class="grille_suggestion">
            <?php 
                if(isset( $_GET['id'])){

                    $id = $_GET['id'] ;

                    $req1 = $db->query("SELECT id , IdCategorie FROM articles WHERE id =$id ");
                    $data1 = $req1->fetch(PDO::FETCH_ASSOC);
                   
                    $cat = $data1["IdCategorie"];
                    $id = $data1["id"];
                   
                   
                    $req2 = $db->query("SELECT * FROM articles  ");
                    $data2 = $req2->fetchAll(PDO::FETCH_ASSOC);

                    foreach($data2 as $suggestion){
                            
                        if($suggestion["IdCategorie"] == $cat && $suggestion["id"] != $id ){
                    
               ?>
                <div>
                    <a href="Articles.php?id=<?= $suggestion["id"] ?>"><img src="<?= $suggestion["Url"] ?>" alt=""></a>
                    <div>
                        <p class="libellé"><a href="#"><?= $suggestion["Designation"] ?></a></p>
                        <p class="prix"><?= number_format($suggestion["Prix"] , 2 , ',' , '.').' euros' ?></p>
                    </div>
                </div>
                
                <?php
                    }
                }
            }
                
            ?>
                
            </div>
        </div>
        <!--  -------------------------------------    Les Pop Ups      ---------------------------------------------- -->
        <div class="pop-ups connexion">
                <div class="title">
                    <a href=""><img src="images/IMG-20220704-WA0014.jpg" alt=""></a>
                    <h1>Connexion</h1>
                </div>
                <div class="hr"></div>
                <div class="Con_subs">
                    <div class="log_menu">
                        <form action="ConnectionInscription.php">
                            <div class="control">
                                <label for="email_c">email</label>
                                <div class="input email">
                                    <input type="email" name="email_c" id="email_c"  required placeholder="Entrez un email" >
                                    <message class="messageErreur">existe dejà</message>
                                    <message class="messageSucces"></message>
                                    <div class="icon-notifier-success">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                    </div>
                                    <div class="icon-notifier-warning">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                    </div> 
                                </div>
                               
                                <div class="clear"></div>
                            </div>
                            <div class="control">
                                <label for="passe_c">Mot de passe</label>
                                <div class="input password">
                                    <input type="password" name="passe_c" id="passe_c" required placeholder="Entrez un mot de passe" >
                                    <message class="messageErreur">existe dejà</message>
                                    <message class="messageSucces"></message>
                                    <div class="icon-notifier-success">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                    </div>
                                    <div class="icon-notifier-warning">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                    </div> 
                                    <div class="phenomenO">
                                        <i class=" hidden fa fa-eye-slash" aria-hidden="true"></i>
                                        <i class=" show fa fa-eye" aria-hidden="true"></i>
                                    </div>
                                    

                                </div>
                               
                                <div class="clear"></div>
                               
                            </div>
                            <div class="control">
                                <input type="submit"  id="Submit-Connect" value="Connectez-vous">
                                <div class="clear"></div>
                            </div>
                        </form>
                    </div>
                    <div class="log_menu">
                        <div>
                            Vous n'avez pas encore de compte ? <span class="insc_span">Inscrivez-vous .</span>
                        </div> 
                    </div>
                    
                </div>
                <div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>
            <div class="pop-ups inscription">
                <div class="title">
                    <img src="images/IMG-20220704-WA0014.jpg" alt="">
                    <h1>Inscription</h1>
                </div>
                <div class="hr"></div>

                <div class="inscription_menu">
                        <form action="ConnectionInscription.php">
                            <div class="controls">
                                 <div class="control1"> 
                                    <label for="nom_i">Nom</label>
                                    <div class="input nom">
                                        <input type="nom" name="nom_i" id="nom_i" required placeholder="Votre nom" >
                                        <message class="messageErreur">existe dejà</message>
                                        <message class="messageSucces"></message>
                                        <div class="icon-notifier-success">
                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                        </div>
                                        <div class="icon-notifier-warning">
                                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        </div> 
                                    </div>
                                    
                                <div class="clear"></div>
                                </div>
                                <div class="control2">
                                    <label for="prenom_i">Prenom</label>
                                    <div class="input prenom">
                                        <input type="text" name="prenom_i" id="prenom_i" required placeholder="Votre prénom" >
                                        <message class="messageErreur">existe dejà</message>
                                        <message class="messageSucces"></message>
                                        <div class="icon-notifier-success">
                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                        </div>
                                        <div class="icon-notifier-warning">
                                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        </div> 
                                    </div>
                                    
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="control">
                                <label for="email_i">email</label>
                                <div class="input email">
                                    <input type="email" name="email_i" id="email_i" required  placeholder="Entrez un email">
                                    <message class="messageErreur">existe dejà</message>
                                    <message class="messageSucces"></message>
                                    <div class="icon-notifier-success">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                    </div>
                                    <div class="icon-notifier-warning">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                    </div> 
                                </div>
                               
                                <div class="clear"></div>
                            </div>
                            <div class="control">
                                <label for="date_i">Votre jour de naissance</label>
                                <div class="input date">
                                    <input type="date" name="date_i" id="date_i"  required placeholder="">
                                        <message class="messageErreur">existe dejà</message>
                                        <message class="messageSucces"></message>
                                        <div class="icon-notifier-success">
                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                        </div>
                                        <div class="icon-notifier-warning">
                                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        </div> 
                                </div>
                                
                                <div class="clear"></div>
                            </div>
                            <div class="controls">
                                <div class="control1">
                                    <label for="passe_i">Mot de passe</label>
                                    <div class="input password">
                                        <input type="password" name="passe_i" id="passe_i" required placeholder="Entrez un mot de passe">
                                        <message class="messageErreur">existe dejà</message>
                                        <message class="messageSucces"></message>
                                        <div class="icon-notifier-success">
                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                        </div>
                                        <div class="icon-notifier-warning">
                                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        </div> 
                                        <div class="phenomenO">
                                            <i class=" hidden fa fa-eye-slash" aria-hidden="true"></i>
                                            <i class=" show fa fa-eye" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="clear"></div>
                                </div>
                                <Div class="control2">
                                    <label for="passec_i">Confirmez le mot de passe</label>
                                    <div class="input passwordConfirm">
                                        <input type="password" name="" id="passec_i" required placeholder="Confirmez votre mot de passe">
                                        <message class="messageErreur">existe dejà</message>
                                        <message class="messageSucces"></message>
                                        <div class="icon-notifier-success">
                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                        </div>
                                        <div class="icon-notifier-warning">
                                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        </div> 
                                        
                                    </div>
                                    
                                    <div class="clear"></div>
                                </Div>
                                
                            </div>
                            <div class="control">
                                <input type="submit" id="Submit-insc" value="Inscrivez-vous">
                                <div class="clear"></div>
                            </div>

                            
                        </form>
                </div>
                 <div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>        
            </div>
     <div class="blackbgPoups"></div>

   </section>
   

  <?php 
        include("footer.php")
  ?>

</body>
</html>