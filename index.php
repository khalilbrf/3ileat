<?php
    session_start();
    $_SESSION['msgpresentbdd']; 
?>
<html>
	<head>
        <title>3ilEat</title>
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
        <!--boostrap et js sans internet-->
        <link rel="stylesheet" href="mesCSS/bootstrap.min.css" >
        <script src="js/jquery-3.4.1.min.js"> </script> 

       
	</head>
    
    <body class="container">
        
        <?php include('mesIncPhp/header.inc.php') ?>
        <h4><marquee behavior="scroll" direction="Left">Bienvenue sur 3ilEat ! Récuperez vos identifiants aupres du résponsable réstauration ou inscrivez vous directement</marquee></h4>
        <h3 class="p-3 mb-2 bg-primary text-white">Identification</h3>
        <br>
        <div class="row">
            <div class="col-6">
                <h5 class="text-primary">3ilEATT</h5>
                <h3>Connexion</h3>
                <h6 class="text-secondary">Accéder à 3ilEAT</h6>
                <form action="indexpost.php" method="post">
                    <br>
                    <input type="text" name="login" placeholder="Identifiant" value=""><br>
                    <br>
                    <input type="password" name="password" placeholder="Mot de passe" value=""><br>
                    <br>
                    <a href="../3ileat/inscription.php" class="text-primary">Créer votre compte</a><br><br>
                    <button type="button" name="inscription" class="btn btn-secondary" onclick="self.location.href='inscription.php'" >Inscription</button>
                    <button type="submit" name="envoi" class="btn btn-primary" >Connexion</button>

                    <!-- onclick="self.location.href='sandwich.php'" -->
                    <?php 
                        echo '<br>'.$_SESSION['msgpresentbdd']; 
                        $_SESSION['msgpresentbdd']= ' ';
                    ?>
                </form>
             </div>
             <div class="col-6">
                 <a href="../3ileat/index.php" ><img src="mesIMG/logo3ileatlogo.png" style="width:70%"></a>
             </div>
        </div>
        <br>
        <div align="center">
            Rejoignez nous et faites vos commandes sans faire la queue
        </div>
        
       
        

        <?php include('mesIncPhp/footer.inc.php'); ?>
       
    </body>    

</html>
