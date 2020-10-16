<?php 
            session_start();
            //recuperation des besoins
            $login = $_SESSION['login'];  
            $droit = $_SESSION['droit']; 
            //droits suffisant ?
            if(!isset($_SESSION['droit'])){
                die("<strong>Accès réservé aux adhérant de 3ilOrder</strong>");
            }
            if($_SESSION['droit'] != "Client"){
                die("<strong>Accès réservé aux clients</strong>");
            }
?>
<html>
	<head>
        <title>3ilEat</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="mesCSS/bootstrap.min.css" />
        <script src="js/jquery-3.4.1.min.js"> </script>
	</head>

    <body class="container">
        
         <?php include('mesIncPhp/header.inc.php') ?>
      
        <br>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" ariavaluemax="100"></div>
        </div>
        <br>
        <?php 
            //AFFICHAGE DU PROPRIO DE LA SESSION
            echo '<h2>Cher '.$_SESSION['login'].' votre demande a été bien envoyée !</h2>'; 
        ?>
        <p>Merci de votre confiance, à bientôt...</p>
            
        <?php include('mesIncPhp/footer.inc.php'); ?>
        
        
    </body>

</html>