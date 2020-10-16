<?php 
            session_start();
            //Les variables recupérées
            $_SESSION['login'];  
            $_SESSION['droit']; 
            $_SESSION['idUtil'];
?>
<header>
    <!--Partie publicitaire-->
    
        <h2 class="p-3 mb-2 bg-primary text-white" align="center">Administrateurs 3ilEat</h2>
    <br>
     <!--permettra de diviser le haut de page en deux pour mettre deconnexion a droite-->
    <div class="row">
            <div class="col-6">
                <?php 
                    //AFFICHAGE DU PROPRIO DE LA SESSION ET SON DROIT
                    echo '<div><strong>Vous êtes connecté en tant que '.$_SESSION['login'].'</strong></div>'; 
                    echo '<div><strong>Votre droit : '.$_SESSION['droit'].' - Réf : '.$_SESSION['idUtil'].'</strong></div>'; 
                ?>
            </div>
            <div class="col-6" align="right">
                <button type="button" name="annuler" class="btn btn-danger" onclick="self.location.href='deconnexion.php'" >Déconnexion</button>
            </div>
    </div>
    
    <br>
    
    <script>
                var myIndex = 0;
                carousel();

            function carousel()
                {
                var i;
                var x = document.getElementsByClassName("mySlideses");
                for (i = 0; i < x.length; i++)
                {
                    x[i].style.display = "none";  
                }
                myIndex++;
                if (myIndex > x.length) 
                {myIndex = 1}    
                x[myIndex-1].style.display = "block";  
                setTimeout(carousel, 3000); 
                }
    </script>
    
</header>