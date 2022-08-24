<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="Site.css">
    <script src="Site.js" defer type="text/javascript"></script>
    <script src="font-awesome.js" crossorigin="anonymous" defer></script>
</head>
<body class="container_">
  <?php 
        require("Connect.php");

       
  ?>
  <div class="container">
    <h1>Connectez-vous</h1>
    <hr/>
        <form action="" method="get">
            <div class="controls">
                <label for="nom">Nom :</label>
                 <input type="text" name="nom" id="nom"/>
            </div>
            <div class="controls">
                 <label for="passe">Mot de passe :</label>
                 <input type="password" name="passe" id="passe"/>
            </div>
            <div class="controls">
                 <input type="submit" value="Connectez vous">
            </div>
      
        </form>

    </div>
    
</body>
</html>