<footer>
    <div>
       <h3> DM Skin Care</h3>
       <p>
            <a href="">Accueil</a>
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
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v14.0" nonce="e38lCEQS"></script>
   </footer>