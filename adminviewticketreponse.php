<?php 
            session_start();
            //recuperation des besoins
            $login = $_SESSION['login'];  
            $droit = $_SESSION['droit']; 
            $_SESSION['idTicket'] = $_GET["idTicket"];
            //droits suffisant ?
            if(!isset($_SESSION['droit'])){
                die("<strong>Accès réservé aux adhérant de 3ilEat</strong>");
            }
            if($_SESSION['droit'] != "Admin"){
                die("<strong>Accès réservé aux Administrateurs</strong>");
            }
            //requi pour se connecter et reuperer la pdo 
            require_once "connexion.php";
            
            $txtReq = "select * from ticket where idTicket = ".$_SESSION['idTicket'];
            $tabTicket = $pdo->query($txtReq)->fetchAll();
            $requpdate = "UPDATE ticket SET etat = 'en traitement', openadmin ='".$_SESSION['login']."' WHERE idTicket = ".$_SESSION['idTicket'];
            $requpdatenow = $pdo->query($requpdate)->fetchAll();
?>
<html>
	<head>
        <title>3ilEat</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <!--mes imports js-->
        <script src= "https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src= "https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src= "https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
        <script src= "https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script src= "https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
        <!--mes imports css-->
        <style type="text/css">
            @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css);
            @import url(https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css);
            @import url(https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css);
        </style>
        
        
	</head>

    <body class="container">
        
        <?php include('mesIncPhp/headeradmin.inc.php') ?>
        
        <!--menu partage par les pages admin--> 
         <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="adminview.php" role="tab" aria-controls="home" aria-selected="false">Utilisateurs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="adminviewticket.php" role="tab" aria-controls="profile" aria-selected="false">Tickets</a>
          </li>
          
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab"></div>
          <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
        </div>
        <br>
        
        <h4>Répondre au ticket</h4>
        
        <?php
            echo '<div>Réf ticket : <strong>'.$_SESSION['idTicket'].'</strong></div>';
            
            foreach($tabTicket as $ticket){
                
                $_SESSION['idUtil'] = $ticket['idUtil'];
                $_SESSION['etat'] = $ticket['etat'];
                $_SESSION['dateopen'] = $ticket['dateopen'];
                $_SESSION['objet'] = $ticket['objet'];

            }
            echo '<div>État : <strong>'.$_SESSION['etat'].'</strong></div>';
            echo '<div>Réf utilisateur : <strong>'.$_SESSION['idUtil'].' - '.$_SESSION['dateopen'].'</strong></div>';
            echo '<div>Ouvert par : <strong>'.$_SESSION['login'].'</strong></div>';
            echo '<br><div>Avis : '.$_SESSION['objet'].'</div>';
            
        ?>
        <br>
        <form action="reponseticketpost.php" method="post">
            <textarea id="reponse" name="reponse" class="form-control" rows="3" placeholder="Soyez bref !" required> </textarea>
            <br>
            <button type="submit" name="envoi" class="btn btn-primary" >Répondre</button>
            <!-- onclick="self.location.href='sandwich.php'" -->
        </form>
        <br>
        <div class="piedbas p-3 mb-2 bg-primary text-white">    </div>
        
       
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>
         
      
    </body>

</html>
