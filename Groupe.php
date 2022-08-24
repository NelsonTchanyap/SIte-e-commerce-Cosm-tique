<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/IMG-20220704-WA0014.ico" type="image/x-icon">
    <link rel="stylesheet" href="Site_40.css">
    <script src="Groupe5.js" defer type="text/javascript"></script>
    <script src="font-awesome.js" crossorigin="anonymous" defer></script>
    <title>Document</title>
</head>
<body style="background-color:white">
    <?php 
        include('header.php')
    ?>
    
   <nav class="Anav">
        <img src="images/IMG-20220704-WA0014.jpg" alt="Images">
        <ul>
            <?php 
            
                $req = $db->query("SELECT * FROM categories ");
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                $title="";
                foreach($data as $index => $categorieTab){

            ?>
                    <li>
                        <a href="Groupe.php?id=<?= $categorieTab["id"] ?>" 
                                class="<?= (isset($_GET["id"]) && $_GET["id"] == $categorieTab["id"] )? "active" : "" ?>">
                            <?= $categorieTab["Designation"] ?>
                        </a>
                    </li>
            <?php 

            if(isset($_GET["id"]) && $_GET["id"] == $categorieTab["id"] ){
                $title = $categorieTab["Designation"];
            }


                }

            ?>
        </ul>
    </nav>

    <div class="gr">
        <h1> <?= $title ?> </h1>
    </div>
    <section class="sectG">

        <div class="grGrid">

            <div class="first">

                <div class="title">Les plus populaires <i class="fa fa-star" aria-hidden="true"></i></div>

                <?php
                        $req1 = $db->query("SELECT * FROM articles WHERE IdCategorie = 1 LIMIT 2");
                        $data1 = $req1->fetchAll(PDO::FETCH_ASSOC);

                        $req2 = $db->query("SELECT * FROM articles WHERE IdCategorie = 3 LIMIT 2");
                        $data2 = $req2->fetchAll(PDO::FETCH_ASSOC);

                        $req3 = $db->query("SELECT * FROM articles WHERE IdCategorie = 4 LIMIT 2");
                        $data3 = $req3->fetchAll(PDO::FETCH_ASSOC);

                        $ListePopulaires = array();

                        $ListePopulaires[0] =  $data1 ; 
                        $ListePopulaires[1] =  $data2 ;
                        $ListePopulaires[2] =  $data3 ;

                        

                ?>

                <div class="sideItems grille_suggestion">

                <?php 
                        foreach($ListePopulaires as $index => $Populaire){
                            
                            foreach($Populaire as $index => $Article){
                ?>  
                    <div>
                        <a href="Articles.php?id=<?= $Article['id'] ?>"><img src="<?= $Article["Url"] ?>" alt=""></a>
                        <div>
                            <p class="libellé"><a href="Articles.php?id=<?= $Article['id'] ?>" >  <?= $Article['Designation'] ?> </a></p>
                            <p class="prix">  <?= number_format($Article['Prix'] , 2 , ',','.').' euros' ?> </p>
                        </div>
                    </div>
                <?php
                            }
                    }
                ?>

                </div>

            </div>

                    <?php 
                        if( isset( $_GET['id'])){

                            $id = $_GET['id'];

                            $req4 = $db->query(" SELECT * FROM articles WHERE IdCategorie = $id ORDER BY id DESC");
                            $data4 = $req4->fetchAll(PDO::FETCH_ASSOC);
                            $count = count($data4);

                            if ($data4) {

                          
                             
                    
                    ?>

            <div class="second">
                    <?php 
                        $id="";
                        if( isset( $_GET['id'] )){
                            $id =  $_GET['id'] ; 
                        }
                    ?>
                    <div class="dp filterGR">
                        <span>Trier par : </span>
                        <select onchange = " Filtrer_Par(this.value , <?= $id ?>)" name="filtre" id="filterGR">
                            <optgroup label="Filtrez la liste" selected>
                                <option value="Designation">Nom</option>
                                <option value="id" selected>Plus Récents</option>
                                <option value="Prix">Prix</option>
                            </optgroup>
                        </select>
                        <span class="span"> <?= $count ?> Résultats  </span>
                    </div>

                    <div class="dp elements">

                    <?php 
                            foreach($data4 as $index => $Element){
                    ?>
                        <div >
                            <a href="Articles.php?id=<?= $Element['id'] ?>"><img src="<?= $Element['Url'] ?>" alt="Erreur"/></a>
                            <div class="options">
                                <span><?= $Element['Designation'] ?> </span>
                                <span> <b> <?= number_format($Element['Prix'] , 2 , ',', '.').' euros' ?> </b></span>
                             <button onclick="AjouterInf(<?= $Element['id'] ?>)" >Ajouter</button>
                            </div>
                        </div>
                        
                    <?php 
                    }
                    ?>
                    </div>

                </div>
            <?php 
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

    <?php 
        include('footer.php')
    ?>
    
</body>
</html>