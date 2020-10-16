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
        <title>3ilOrder</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="mesCSS/bootstrap.min.css" />
	</head>

    <body class="container">

        <?php include('mesIncPhp/header.inc.php') ?>
        <br>
        
        <?php 
            //AFFICHAGE DU PROPRIO DE LA SESSION ET SON DROIT
            echo '<div><strong>Vous êtes connecté en tant que '.$_SESSION['login'].'</strong></div>'; 
            echo '<div><strong>Votre droit : '.$_SESSION['droit'].' !</strong></div>'; 
        ?>
        
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" ariavaluemax="100"></div>
        </div>
        <br>
        
        
        <h2>Récapitulatif de la commande</h2>
        <div>
                <br>
                <p>- 1 Panini dinde, sauce algérienne, salade, tomate, maïs.</p>
                <p>- 1 Ice-tea.</p>
                <p>- 1 Eau minéral.</p>
                <p>- 1 Chips dinde</p>
    
        </div>
          
        <div class="piedbas p-3 mb-2 bg-primary text-white">
                    <span>Total : </span>
                    <input type="text" id="ident" name="total" value="4.50 euro" placeholder="">
                    <button type="button" name="Valider" class="btn btn-secondary" onclick="self.location.href='validation.php'">Valider</button>        
        </div>

        <?php include('mesIncPhp/footer.inc.php'); ?>
          
        
    </body>

</html>