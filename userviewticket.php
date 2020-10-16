<?php 
            session_start();
            //Les variables recupérées
            $_SESSION['login'];  
            $_SESSION['droit']; 
            $_SESSION['idUtil'];

            //droits suffisant ?
            if(!isset($_SESSION['droit'])){
                die("<strong>Accès réservé aux adhérant de 3ilEat</strong>");
            }
            if($_SESSION['droit'] != "Client"){
                die("<strong>Accès réservé aux clients</strong>");
            }
            
            //recuperation des données de la bdd
            require_once "connexion.php";

?>
<html>
	<head>
        <title>3ilEat</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--lib css-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  
        <!--lib popper et jquery-->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script   src="https://code.jquery.com/jquery-3.4.1.min.js"   integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <!--lib js-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>

    <body class="container">
    
        <?php include('mesIncPhp/headeruser.inc.php') ?>
   
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" ariavaluemax="100"></div>
        </div>
        <br>
        
        <h2 class="text-primary">Borne des tickets</h2>
        <div class="row">
            <div class="col-6">
                <h4> Ajouter un ticket </h4>
                <br>
                <h6 class="text-secondary">Objet</h6>
                <form action="ticketpost.php" method="post">
                    <textarea id="objet" name="objet" class="form-control" rows="3" placeholder="Soyez bref et precis !" required> </textarea> 
                    <br><br>
                    <button type="button" name="annuler" class="btn btn-secondary" onclick="self.location.href='userview.php'" >Retour</button>
                    <button type="submit" name="envoi" class="btn btn-primary" >Soumettre</button>
                </form>
                
            </div>
            <div class="col-6" align="right">
                <a href="../3ileat/userviewticket.php" ><h5 class="text-secondary">Actualiser</h5></a>
            </div>
        </div>
        <br>
        
        <div class="piedbas p-3 mb-2 bg-primary text-white">
            
        </div>
        
        <?php include('mesIncPhp/footer.inc.php'); ?>
        
        
        
    </body>

</html>
