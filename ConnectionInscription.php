<?php
session_start();

    require("Connect.php");

    if(isset($_GET["connect"])){

            $email = $_GET["emailC"];
            $passe = $_GET["passeC"];

            $req = $db->query("SELECT id , nom , prenom  FROM utilisateurs WHERE email='".$email."' " ) ;

            // echo json_encode(($req->fetch(PDO::FETCH_ASSOC)) , JSON_FORCE_OBJECT);
             $data = $req->fetch(PDO::FETCH_ASSOC) ;
          
               
            setcookie("user", json_encode(($data) , JSON_FORCE_OBJECT) , time() + 3600*24*31 *3 ) ;  
            
                
            $_SESSION["user"] = $_COOKIE["user"] ;
            
           
               
            
          
           

    }
    if(isset($_GET["emailCCon"])){

        $email = $_GET["emailCCon"];
        // $passe = $_GET["passeC"];

        $req = $db->query("SELECT email  FROM utilisateurs WHERE email='".$email."' " );

        $checkEC = array();
        $data = $req->fetch(PDO::FETCH_ASSOC) ; 
    
    if($data){

       
            $checkEC["ebool"] = true ;
            echo json_encode($checkEC , JSON_FORCE_OBJECT) ;
        
        
    }
    else{
            
        $checkEC["ebool"] = false ;
        echo json_encode($checkEC , JSON_FORCE_OBJECT) ;
    }

   

}

if(isset($_GET["passeChecK"])){

    $email = $_GET["emailC"];
    $passe = $_GET["passeC"];

    $req = $db->query("SELECT motdepasse  FROM utilisateurs WHERE email='".$email."' " );
    $checkPC = array();

    $data = $req->fetch(PDO::FETCH_ASSOC) ;
  
    if($data){
        
        if(password_verify($passe , $data["motdepasse"]) ){
            $checkPC["ebool"] = true ;
            echo json_encode($checkPC , JSON_FORCE_OBJECT) ;
            
        }
        else{
            $checkPC["ebool"] =false ;
            echo json_encode($checkPC , JSON_FORCE_OBJECT) ;
        }

    }
    else{
        
    $checkPC["ebool"] = false ;
    echo json_encode($checkPC , JSON_FORCE_OBJECT) ;
    }
    
   

}

    /* -------------------------------- Test la viabilité de l'Email lors de l'incsription ---------------------------- */

    if( isset($_GET["emailI"]) ) {

        $email = $_GET["emailI"] ;
        $req = $db->query("SELECT email  FROM utilisateurs WHERE email = '".$email."'" );
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $checkE = array();

        if( !empty($data["email"]) ){
            $checkE["ebool"] = true  ;
            echo json_encode($checkE , JSON_FORCE_OBJECT) ;
        }
        else{
            $checkE["ebool"] = false ;
           
            echo json_encode($checkE , JSON_FORCE_OBJECT) ;
        }
    }

    /* -------------------------------------------------- Envoie des infos du formulaire d'insciption ------------------------------*/

    if( isset($_GET["nomI"]) ) {
        $nomI = $_GET["nomI"] ;
        $prenomI = $_GET["prenomI"] ;
        $dateI = $_GET["dateI"] ;
        $emailI = $_GET["email"] ;
        $passeWI = $_GET["passeWI"] ;


       

        $options = [
            'cost' => 12,
            ];
        $Pass_hash = password_hash($passeWI, PASSWORD_BCRYPT, $options); 
        $dataInsc= array($nomI,$prenomI,$Pass_hash,$emailI,$dateI);
      
       

        $reqI = $db->prepare("INSERT INTO utilisateurs (nom,prenom,motdepasse,email,datedenaissance) VALUES(?,?,?,?,?)" );
        $reqI->execute($dataInsc);
     
  }


  if(isset($_GET["Deconnection"])){
 
    setcookie("user","",time() - 3600*24*3);
    unset($_SESSION["user"]);
    unset($_COOKIE["user"]);
    
  }

  if (isset( $_GET["AjoutInf"])){
    $ajoutA=$_GET["AjoutInf"];

    $req = $db->query("SELECT * FROM articles WHERE id = ".$ajoutA."" );
    $data = $req->fetch(PDO::FETCH_ASSOC);

    $find = array();
    $find["Descriptions"] =  $data["Descriptions"];
    $find["url"] =  $data["Url"];
    $find["Designation"] =  $data["Designation"];
    $find["Prix"] =  $data["Prix"];
    $find["Qté"] =  $data["Quantité"];
    $find["id"] =  $data["id"];
 
    echo json_encode($find , JSON_FORCE_OBJECT);


  }


 
  
  if(isset($_GET["AddThis"])){

    if(isset($_COOKIE["Panier"]) && isset( $_SESSION["Panier"])){

        $idArt = $_GET["AddThis"];
        $Qt = (int)$_GET["Qt"];

        $req = $db->query("SELECT Quantité  FROM articles WHERE id = ".$idArt."" );
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $QtDB = $data["Quantité"];
    
       

        $panier = json_decode($_SESSION["Panier"],true);

        if(isset($panier[$idArt])){

            if($QtDB >= ( $panier[$idArt] + $Qt ) ){
                $panier[$idArt] += $Qt;
                $response = array();
                $response["AddBool"] = true ;
            }
            else{
                $response = array();
                $response["AddBool"] = false ;
            }
        }
        else{

            if($QtDB >= $Qt ){
                $panier[$idArt] = $Qt;
                $response = array();
                $response["AddBool"] = true ;
            }
            else{
                $response = array();
                $response["AddBool"] = false ;
            }

        }
            
    
        $panierSerial = json_encode($panier , JSON_FORCE_OBJECT);
        // setcookie("Panier", $panierSerial ,( time() + ( 3600 * 24 * 31 ) * 3  ) ) ;
         setcookie("Panier", $panierSerial , time() +  3600 * 24 * 31  * 3  ) ;
        $_COOKIE["Panier"]=$panierSerial;
        $_SESSION["Panier"]=$_COOKIE["Panier"];
          
    
        
    
        $jsResponse = json_encode($response , JSON_FORCE_OBJECT);
        echo $jsResponse ;

    }

    else{

        $idArt = $_GET["AddThis"];
        $Qt = (int)$_GET["Qt"];

    
     
    $req = $db->query("SELECT Quantité  FROM articles WHERE id = ".$idArt."" );
    $data = $req->fetch(PDO::FETCH_ASSOC);
    $QtDB = $data["Quantité"];

    if( $QtDB >= $Qt){

        $panier = array();
        $panier[$idArt] = $Qt;

        $panierSerial = json_encode($panier , JSON_FORCE_OBJECT);

        setcookie("Panier", $panierSerial , time() +  3600 * 24 * 31  * 3  ) ;
       
        $_SESSION["Panier"] = $panierSerial;

  
        $_SESSION["Panier"] = $panierSerial;
        $response = array();
        $response["AddBool"] = true ;
        
        $jsResponse = json_encode($response , JSON_FORCE_OBJECT);
        echo $jsResponse ;
    }
   
    }
    
    
  }


  if( isset($_GET["Increase"])){

    $value = $_GET["Increase"];
    $id = $_GET["id"];

    $panier = json_decode($_SESSION["Panier"],true);


    $panier[$id] = $value  ;
    $_SESSION["Panier"] = json_encode($panier , JSON_FORCE_OBJECT);
    $_COOKIE["Panier"] = $_SESSION["Panier"];
    setcookie("Panier", $_SESSION["Panier"] , time() +  3600 * 24 * 31  * 3  ) ;

    $sousTotal = 0 ;
    $Total = 0 ;

    foreach( $panier as $index => $Qté){

        $req = $db->query("SELECT Prix  FROM articles WHERE id = ".$index."" );
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $PrixDB = $data["Prix"];

        $Total +=  $PrixDB*$Qté;

        if($index == $id){
            $sousTotal = $PrixDB*$Qté;
        }

    }

    $response = array();
    $response["sousTotal"] = $sousTotal ;
    $response["Total"] = $Total ;

    echo json_encode($response , JSON_FORCE_OBJECT);

  }

  if( isset($_GET["Decrease"])){
    
    $value = $_GET["Decrease"];
    $id = $_GET["id"];

    $panier = json_decode($_SESSION["Panier"],true);
   
    $panier[$id] = $value  ;
    $_SESSION["Panier"] = json_encode($panier , JSON_FORCE_OBJECT);
     setcookie("Panier", $_SESSION["Panier"] , time() +  3600 * 24 * 31  * 3  ) ;
    $_COOKIE["Panier"] = $_SESSION["Panier"];

    $sousTotal = 0 ;
    $Total = 0 ;

    foreach( $panier as $index => $Qté){

        $req = $db->query("SELECT Prix  FROM articles WHERE id = ".$index."" );
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $PrixDB = $data["Prix"];

        $Total +=  $PrixDB*$Qté;

        if($index == $id){
            $sousTotal = $PrixDB*$Qté;
        }

    }

    $response = array();
    $response["sousTotal"] = $sousTotal ;
    $response["Total"] = $Total ;

    echo json_encode($response , JSON_FORCE_OBJECT);

}

if( isset($_GET["delete"]) ){

    $thisOne = $_GET["delete"] ;

    $panier = json_decode($_SESSION["Panier"] , true);

    unset( $panier[$thisOne] );

    $count = count($panier) ;

    if( $count == 0 ){
        setcookie("Panier","",time() - 3600*24*3);
        unset( $_SESSION["Panier"] );
        unset( $_COOKIE["Panier"] );

        $response = array();
        $response["zero"] = true ;

        echo json_encode($response , JSON_FORCE_OBJECT);

    }
    else{

        $_SESSION["Panier"] = json_encode( $panier , JSON_FORCE_OBJECT );
        $_COOKIE["Panier"] = $_SESSION["Panier"] ;
        $response = array();
        $response["zero"] = false;
        

        $Total =0 ;

        foreach( $panier as $index => $Qté){

            $req = $db->query("SELECT Prix  FROM articles WHERE id = ".$index."" );
            $data = $req->fetch(PDO::FETCH_ASSOC);
            $PrixDB = (float)$data["Prix"];

            $Total +=  $PrixDB*$Qté;
    
        
        }
        $response["Montant"] = $Total;
        $response["count"] = count($panier); 

        echo json_encode($response, JSON_FORCE_OBJECT);

    }


}

if ( isset( $_GET["unAvis"])){

    $unAvis = $_GET["unAvis"] ;
    $idUser = $_GET["idUser"] ;
    $idArticle = $_GET["idArticle"] ;

    $req1 = $db->query("SELECT * FROM avis WHERE idUser = $idUser ");
    $data1 = $req1->fetch(PDO::FETCH_ASSOC);

    IF($data1 == false ){
        $req2 = $db->prepare("INSERT INTO avis (idArticle , idUser , Descriptions) VALUES(?,?,?)");
        $req2->execute(array($idArticle,$idUser,$unAvis));
    }


    

    
    $req3 = $db->query("SELECT * FROM avis ");
    $data = $req3->fetchAll(PDO::FETCH_ASSOC);
      /* GameChanger $req1 , $req2 , $req3 */ 
    $response = array();
    $count = count($data); 
    $BigText="";

    foreach($data as $Avis){

        $req3 = $db->query("SELECT id , nom , prenom FROM utilisateurs WHERE id = ".$Avis['idUser']." ");
        $dataUser = $req3->fetch(PDO::FETCH_ASSOC);

        $BigText .= "<div class='avis' id='avis".$Avis['id']."'> <div class='Pseudo'><i class='fa fa-user' aria-hidden='true'></i>";
        $BigText .= $dataUser['nom']." ".$dataUser['prenom']."</div><div class='text".$Avis['id']." text'>";

        if( isset($_SESSION["user"])){

            if( json_decode($_SESSION['user'],true)["id"] == $dataUser["id"]  ){
                $BigText .= "<i class='fa fa-times Aclose' onclick='DeleteAvis(".$Avis['id'].")' aria-hidden='true' ></i>";
            }

        }
        $BigText .= $Avis["Descriptions"] ;
        $BigText .= "<i class='fa fa-quote-right' style='margin-left:8px' aria-hidden='true'></i>";

        if( isset($_SESSION["user"])){

            if( json_decode($_SESSION['user'],true)["id"] == $dataUser["id"]  ){
                $BigText .= "<i class='fa fa-pencil ' onclick ='Modifiert(this)' idart='".$Avis['idArticle']."' idtext='".$Avis['id']."' aria-hidden='true' ></i>";
            }

        }
        $BigText .="</div></div>";
    }

    $response["ListeAvis"] = $BigText ;
    $response["nbrAvis"] = $count ;

    echo json_encode($response , JSON_FORCE_OBJECT);

}

if ( isset( $_GET["EditThis"])){

    $Edit = $_GET["EditThis"] ;
    $idArt = $_GET["idArt"] ;
    $Desc = $_GET['desc'];
    $idUser = "";

    if(isset($_SESSION["user"])){
        $idUser = json_decode( $_SESSION["user"] , true)["id"];
    }
 

 $db->query("UPDATE avis SET  Descriptions = '".$Desc."'  WHERE id = $Edit AND idUser= $idUser  AND idArticle = $idArt");
  $response = array();

  $req = $db->query("SELECT Descriptions , idArticle , id  FROM avis WHERE id = $Edit ");

  $data = $req->fetch(PDO::FETCH_ASSOC);
  $response["avis"] = $data["Descriptions"];
  $response["idARt"] = $data["idArticle"];
  $response["idAvis"] = $Edit;
  echo json_encode($response , JSON_FORCE_OBJECT);

   


}

if( isset($_GET["DeleteThis"])){

    $dele = (int)$_GET["DeleteThis"] ; 
    
    $req1 = $db->query("SELECT idArticle FROM avis  WHERE id = $dele ");
    $data1 = $req1->fetch(PDO::FETCH_ASSOC);
    
    $db->query("DELETE  FROM avis WHERE id=$dele");
    $req = $db->query("SELECT  *  FROM avis ");
    $data = $req->fetchAll(PDO::FETCH_ASSOC);

    $response = array();
   

    if($data){
        $response['count']= count($data);
        
    }
        $BigText="";
        $BigText .= "<div class='Pseudo' ><i class='fa fa-user-o' aria-hidden='true'></i>";

        if( isset($_SESSION["user"])){

                $BigText .= json_decode($_SESSION["user"] , true)["nom"]." ".json_decode($_SESSION["user"] , true)["prenom"];
                $BigText .= "</div>";
        }
        $BigText .= "<form class='avisform' action=''><div class='control'><label for='avis'>Rédigez un avis</label>" ;
        $BigText .= "<textarea name='Tavis' id='avis' placeholder='Ecrivez quelque chose...' required></textarea> <div class='clear'></div>";
        $BigText .= "</div><div class='control'>";
        if( isset($_SESSION["user"])){

            if( $_SESSION['user']  ){
                $BigText .= "<Div class='CheatCode' onclick='PublieR(this)' idUser ='".json_decode($_SESSION['user'], true)['id']."' idArticle='".$data1['idArticle']."'  id='Publier' value='Publier'> Publier </Div>";
            }
            $BigText .= "<div class='clear'></div></div>";
        }

        $response['Form']=$BigText;
        echo json_encode($response , JSON_FORCE_OBJECT);

    }

    if( isset( $_GET['Filtre'] ) ){

        $filtre = $_GET['Filtre'] ; 
        $idCategorie = $_GET['id'];

        $req = "" ; 

        if( $filtre == "Nom" ){
            $req = $db->query("SELECT * FROM articles WHERE IdCategorie = $idCategorie ORDER BY $filtre ASC") ; 
        }
        else{
            $req = $db->query("SELECT * FROM articles WHERE IdCategorie = $idCategorie ORDER BY $filtre DESC") ; 
        }
       
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        if ( $data ){

            $BigData = "";

       

            foreach( $data as $index => $item ){
    
                $BigData .= "<div><a href='Articles.php?id='".$item['id']."' > <img src='".$item['Url']."' alt='Erreur'/></a>";
                $BigData .= "<div class='options'><span>".$item['Designation']."</span>  <span> <b> ".number_format($item['Prix'] , 2 , ',', '.').' euros'."  </b></span> ";
                $BigData .= " <button onclick='AjouterInf(". $item['id'].")' >Ajouter</button>";
                $BigData .= " </div> </div>";

            }

            echo $BigData ;

        }
        else{

            echo "";

        }
        
     
    }

    

?>