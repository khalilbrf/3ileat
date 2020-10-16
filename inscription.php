<?php 
            session_start();
            //recuperation des besoins
            $_SESSION['msgpwdconfirm'];
           
            // récupération du contenu de la table utilisateurs, pour affichage
            require_once "connexion.php";

?>
<html>
	<head>
        <title>3ilEat</title>
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        
        <?php include('mesIncPhp/header.inc.php') ?>
        
        <h4><marquee behavior="scroll" direction="Left">Bienvenue sur 3ilOrder ! Récuperez vos identifiants de connexion aupres du responsable restauration</marquee></h4>
        <h3 class="p-3 mb-2 bg-primary text-white">Formulaire d'inscription</h3>
        <br>
        <div class="row">
            <div class="col-6">
                <h5 class="text-primary">3ilEAT</h5>
                <h3>Inscription</h3>
                <h6 class="text-secondary">Inscription à 3ilEAT</h6>
                <form action="inscriptionpost.php" method="post">
                    <br>
                    <input type="text" name="login" id="login" placeholder="Identifiant" value="" required><br>
                    <br>
                    <input type="email" name="courriel" id="courriel" placeholder="xyz@exemple.fr" value="" required><br>
                    <br>
                    <input type="password" name="password" id="password" placeholder="Mot de passe" value="" required><br>
                    <br>
                    <input type="password" name="passwordconfirm" id="password" placeholder="Confirmer" value="" required><br><br>

                    <!--message en cas de mdp differents-->
                    <p><strong>
                        <?php 
                            echo $_SESSION['msgpwdconfirm']; 
                            $_SESSION['msgpwdconfirm']= ' ';
                        ?>
                    </strong></p>

                    <button type="button" name="annuler" class="btn btn-secondary" onclick="self.location.href='index.php'" >Retour</button>
                    <button type="submit" name="envoi" class="btn btn-primary" >Suivant</button>
                </form>
            </div>
            <div class="col-6">
                 <a href="../3ileat/index.php" ><img src="mesIMG/logo3ileatlogo.png" style="width:70%"></a>
             </div>
        </div>
        <?php include('mesIncPhp/footer.inc.php'); ?>
        
    </body>    

</html>
