<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Site_40.css">
    <link rel="shortcut icon" href="images/IMG-20220704-WA0014.ico" type="image/x-icon">
    <script src="panier3.js" defer type="text/javascript"></script>
    <script src="font-awesome.js" crossorigin="anonymous" defer></script>
    <title>Document</title>
</head>
<body style="background-color:white">
    <?php 
        include('header.php');
        require("Connect.php")
    ?>
    
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
    
    <h1 class="title panierH">Mon panier</h1>
    <section>
        

        <DIv class="wrapper panierDivisions">

            <div class="divis1">


            <?php 

                if(isset($_SESSION["Panier"])){

                    $panier = json_decode($_SESSION["Panier"],true);
                    $nombre = count($panier);
                    $total = 0;

                    foreach($panier as $index => $Qté){

                        $req = $db->query("SELECT * FROM articles WHERE id = ".$index."" );
                        $data = $req->fetch(PDO::FETCH_ASSOC);
                        $total += $data["Prix"]*$Qté;
            ?>

                <div class="articles" id="Art<?= $index ?>">

                    <de class="delete" onclick="Delete(<?= $index ?>)"><i class="fa fa-times" aria-hidden="true"></i></de>

                    <a href="Articles.php?id=<?= $index ?>"><img src="<?= $data["Url"] ?>" alt=""></a>
                    <div>
                        <h2><?= $data["Designation"] ?></h2>
                        <div class="details">
                            <div class="first">

                                <div>
                                    <span class="label" >
                                        Prix
                                    </span>
                                    <span class="prix">
                                            <!-- 10 000 euros --><?= number_format($data["Prix"] ,2,',','.').'  euros' ?>
                                    </span>
                                </div>
                                <div>
                                    <span class="label" >
                                                Quantité
                                        </span>
                                    
                                        <span class="quantity">
                                            <span>
                                                <div>
                                                    <div class="decrease" onclick="decrease(<?= $index ?>)"> <i class="fa fa-minus" aria-hidden="true"></i></div>
                                                    <div class="qt" id="Qté<?= $index ?>"> <?= $Qté ?> </div>
                                                    <div class="increase" onclick="increase(<?= $index ?> , <?= $data['Quantité'] ?>)"> <i class="fa fa-plus" aria-hidden="true"></i></div>
                                                </div>
                                            </span>
                                            
                                        </span>
                                </div>
                                  
                                
                            </div>
                            
                            <div class="second">
                                <span class="label" >
                                    Sous-total
                                </span>
                                <span class="sous-total<?= $index ?>" id="<?= $index ?>">
                                <?= number_format($data["Prix"]*$Qté ,2,',','.').'  euros' ?> 
                                </span>
                            </div>

                            <div class="del" onclick="Delete(<?= $index ?>)">
                                Supprimer
                            </div>

                        </div>
                    </div>
                </div>

            <?php
                }
                    }
                    else{
            ?>
                <div class="PanierVide"> 
                    <i class="fa fa-shopping-basket" style="margin-right:8px" aria-hidden="true"></i>
                        Votre panier est vide 
                    <i class="fa fa-exclamation-circle" style="margin-left:18px" aria-hidden="true"></i>
                </div>
            <?php 

                    }
            ?>

            </div>
            <div class="divis2">

                <div>
                    <div class="title">
                        <span class="nbreArticles"> <?= (isset($nombre))? $nombre : "0" ?> </span> élément(s) au total
                    </div>
                    <div class="total">
                    <?= (isset($total))? number_format($total ,2,',','.').'  euros' : "0 euros" ?> 
                    </div>
                    <div class="promoCode">
                        <div class="promo">
                            <input type="text" placeholder="Entrer votre code"/>
                            <div class="ok">OK</div>
                        </div>
                        <div class="Quest"> <span>Promo code ?</span> </div>
                    </div>
                </div>

                <div>

                        <div class="title">
                           Récupération / Livraison
                        </div>

                        <div class="annotation">
                            Veuillez choisir une option ci-dessous
                        </div>

                        <div class="Choix1 Choix" onclick="taxe1(10,<?=(float)$total?>)">

                           <div class="lieu">
                                Livraison Paris
                           </div>
                           <div class="heure-prix">
                                <div class="heure">
                                    24H après la commande
                                </div>
                                <div class="prix">
                                        10 euros
                                </div>
                           </div>

                        </div>

                            <div class="hr" style="margin:0px 0px"></div>

                        <div class="Choix2 Choix" onclick="taxe2(12.75 ,<?=(float)$total?>)">

                           <div class="lieu">
                                Livraison Marseille
                           </div>
                           <div class="heure-prix">
                                <div class="heure">
                                    24H après la commande
                                </div>
                                <div class="prix">
                                    12,75 euros
                                </div>
                           </div>

                        </div>
                </div>

                <div>
                    <div class="title" style="font-size:bold;margin-bottom:30px">
                        Total :
                    </div>
                    <div class="Montant">
                        <?= (isset($total))? number_format($total ,2,',','.').'  euros' : "0 euros" ?> 
                    </div>
                    <div class="Checkout"> 
                        <span>
                            <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        </span>
                        Terminer Les Achats
                    </div>

                    
                </div>


            </div>

        </DIv>

            
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
                                    <div class="decrease"> <i class="fa fa-minus" aria-hidden="true"></i></div>
                                    <div class="qt">1</div>
                                    <div class="increase"> <i class="fa fa-plus" aria-hidden="true"></i></div>
                                </div>
                            </span>
                            <span>
                                <button>Ajouter</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>

     <div class="blackbgPoups"></div>

    </section>
 <!-- Replace "test" with your own sandbox Business account app client ID -->
 <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD" type="text/javascript"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <script>
      paypal.Buttons({
        // Order is created on the server and the order id is returned
        createOrder: (data, actions) => {
          return fetch("/api/orders", {
            method: "post",
            // use the "body" param to optionally pass additional order information
            // like product ids or amount
          })
          .then((response) => response.json())
          .then((order) => order.id);

          return actions.order.create({
         "purchase_units": [{
            "amount": {
              "currency_code": "USD",
              "value": "100",
              "breakdown": {
                "item_total": {  /* Required when including the items array */
                  "currency_code": "USD",
                  "value": "100"
                }
              }
            },
            "items": [
              {
                "name": "First Product Name", /* Shows within upper-right dropdown during payment approval */
                "description": "Optional descriptive text..", /* Item details will also be in the completed paypal.com transaction view */
                "unit_amount": {
                  "currency_code": "USD",
                  "value": "50"
                },
                "quantity": "2"
              },
            ]
          }]
      });
        },
        // Finalize the transaction on the server after payer approval
        onApprove: (data, actions) => {
          return fetch(`/api/orders/${data.orderID}/capture`, {
            method: "post",
          })
          .then((response) => response.json())
          .then((orderData) => {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });

          
        }
      }).render('#paypal-button-container');
    </script>
    <?php 
        include('footer.php')
    ?>
    
</body>
</html>