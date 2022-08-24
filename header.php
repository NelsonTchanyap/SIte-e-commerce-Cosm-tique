<?php 
    session_start();
    require("Connect.php");
    
    if(isset($_COOKIE["user"])){ 
        $_SESSION["user"] = $_COOKIE["user"];
    }
    if(isset($_COOKIE["Panier"])){ 
        $_SESSION["Panier"] = $_COOKIE["Panier"];
    }

?>
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
