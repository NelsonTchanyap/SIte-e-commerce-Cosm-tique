<?php 
    session_start();
    if(isset($_COOKIE["user"])){ 
        $_SESSION["user"] = $_COOKIE["user"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="images/IMG-20220704-WA0014.ico" type="image/x-icon">
    <link rel="stylesheet" href="Site_40.css">
    <script src="Accueil12.js" defer type="text/javascript"></script>
    <script src="font-awesome.js" type="text/javascript" crossorigin="anonymous" defer></script>
</head>
<body>
   <header>
     <div class="top">
        <div>
            <div class="burgr">
                <span class="burger"></span>
                <span class="burger"></span>
                <span class="burger"></span>
            </div>
            <div class="Brand"><a href="index.php"> DM Skin Care</a></div>
        </div>
        
       
           <?php 
                 if(isset($_SESSION["user"])){
                    // echo json_decode($_SESSION["user"],true)["nom"]
            ?>
                <div class="logOut">
                    <div class="user-nom">
                        <div class="nom"><?=json_decode($_SESSION["user"],true)["nom"] ?></div>
                        <div class="user"><i class="fa fa-user" aria-hidden="true"></i></div>
                    </div>
                    <div id="logOut">
                        <i class="fa fa-sign-out" aria-hidden="true" style="margin-right:10pxargin-right: 10px; color: #8c8c8c;"></i>
                        <span>Déconnexion</span>
                    </div>
                    
                </div>
            <?php        
                 }
                 else{
                    ?>
                     <div class="login">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                     </div>
                    <?php
                 }
           ?>
           
       
     </div> 
     <div class="slide">
            <div class="el"></div>
            <div class="el"></div>
            <div class="el"></div>
            <div class="el"></div>
     </div>
     <div class="aside">
        <div class="a_top">
            <div class="ln_grad"></div>
            <div class="above">
                <div class="st-items"><img src="images/IMG-20220704-WA0014.jpg" /></div>
                <div class="st-items">DM Skin Care</div>
            </div>
            <div class="above">
                <ul>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i> Paris,France</li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i> +33699333327</li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i>dm.pehuie@gmail.com</li>
                </ul>
            </div>
        </div>
        <div class="a_bottom">
            <ul >
                <li><a href="index.php">Accueil</a></li>
                <li><a href="Panier.php">Panier</a></li>
                <li><a href="....php">A propos</a></li>
             </ul>
        </div>
     </div>
     <div class="aside1"></div>

   </header>
   <section>
      


    <?php 

        require("Connect.php");

        

        $req2 = $db->query("SELECT * FROM categories  WHERE id != 2 ");
        $dataCats = $req2->fetchAll(PDO::FETCH_ASSOC);

        foreach($dataCats as $index => $dataCat){

    ?>

        <div class="component">
            <h1> <?= $dataCat["Designation"] ?></h1>
            <div class="items">
    <?php 
        $req1 = $db->query("SELECT * FROM articles WHERE IdCategorie='".$dataCat["id"]."'");
        $dataArts = $req1->fetchAll(PDO::FETCH_ASSOC);

        foreach($dataArts as $index => $dataArt){

    ?>
            <div >
                     <a href="./Articles.php?id=<?= $dataArt['id'] ?>" ><img src="<?= $dataArt['Url'] ?>" alt="Erreur" /></a>
                    <div class="options">
                        <span> <?= $dataArt['Designation'] ?> </span>
                        <span> <b> <?= number_format($dataArt['Prix'] , 2 , ',' , '.') ?> euros</b></span>
                        <button onclick="AjouterInf(<?= $dataArt['id'] ?>)">Ajouter</button>
                    </div>
            </div>
    <?php 
    
    }

    ?>
                        
            </div>
        </div>

    <?php
            
    }

    ?>
        

    
   




               
                 <!-- <div >
                     <a href=""><img src="images/18.jpg" alt="Erreur"/></a>
                    <div class="options">
                        <span> Savon </span>
                        <span> <b> 1209 euros</b></span>
                        <button id="">Ajouter</button>
                    </div>
                 </div>
                 <div >
                     <a href=""><img src="images/16.jpg" alt="Erreur"/></a>
                    <div class="options">
                        <span> Savon </span>
                        <span> <b> 1209 euros</b></span>
                        <button id="">Ajouter</button>
                    </div>
                 </div>
     
       -->



       

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
            <div class="pop-ups article-ajout">
                <div class="article_menu">
                    <div>
                        <img src="images/IMG-20220704-WA0014.jpg" alt="">
                    </div>
                    <div>
                        <div class="title">
                            <h3>Article X</h3>
                            <span class="span_b">XAF 3 000</span>
                        </div>
                        <div class="description">
                            <h4>zeze</h4>
                            Lorem ipsum,<b> dolor sit amet consectetur adipisicing elit</b> dolor sit amet consectetur adipisicing elit. Eveniet doloribus, qui nam laudantium error tempora harum? Voluptatem eveniet soluta consectetur fugit quaerat consequuntur, alias optio porro nihil dolores perferendis maxime!
                            Facilis eveniet suscipit neque saepe nesciunt culpa ut,
                            <h4>ezrze</h4> possimus quia voluptates, praesentium sequi at ipsam nemo natus voluptatibus autem ea similique illum enim ullam illo impedit! Neque voluptates itaque labore.
                            Quibusdam porro natus fugiat officia rem, modi repellat veritatis temporibus veniam odit similique facere vitae dolore deleniti, voluptates, eaque cum. Rem porro illum placeat, nam fugit ipsam ipsum similique! Sequi!
                            Esse dolorem error, voluptatum placeat fugiat atque at omnis eum aspernatur. Nihil ratione hic accusantium nobis molestiae aspernatur perferendis voluptatibus accusamus aut esse, velit aliquam porro magnam nam reiciendis delectus!
                        </div>
                        <span class="Qt_label"> Quantité :</span>
                        <div class="quantity">
                           
                            <span>
                                <div>
                                    <div class="decrease" onclick="increase()"> <i class="fa fa-minus" aria-hidden="true"></i></div>
                                    <div class="qt" id="qté">1</div>
                                    <div class="increase" onclick="decrease()"> <i class="fa fa-plus" aria-hidden="true"></i></div>
                                </div>
                            </span>
                            <span>
                                <Add class="button" onclick="Ajouter(id)">Ajouter</Add>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>

        
            <div class="blackbgPoups"></div>

   </section>
   <footer>
    <div>
       <h3> DM Skin Care</h3>
       <p>
            <a href="index.php">Accueil</a>
       </p>                                                                                 
    </div>
    <div>
        <h3> MON COMPTE</h3> 
        
       
        <?php 
                 if(isset($_SESSION["user"])){
                    // echo json_decode($_SESSION["user"],true)["nom"]
            ?>
          
                    <div id="Out">
                        <i class="fa fa-sign-out" aria-hidden="true" style="margin-right:10pxargin-right: 10px; color: #8c8c8c;"></i>
                        <span>Déconnexion</span>
                    </div>
                    
            <?php        
                 }
                 else{
                    ?>
                     <div class="login">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        <p>Connexion</p>
                     </div>
                    <?php
                 }
           ?>
           
       
    </div>
    <div>
         <h3> CONTACTS </h3>
         <ul>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>Paris,France</li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i> +33699333327</li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i>dm.pehuie@gmail.com</li>
         </ul>
    </div>
   </footer>

</body>
</html>