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

            $txtReq = "select * from ticket where idUtil = ".$_SESSION['idUtil']." ";
            $tabTickets = $pdo->query($txtReq)->fetchAll();
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
        <a href="../3ileat/userviewticket.php" ><h4 class="text-danger" align="right">Ajouter un ticket</h4></a>

        <div class="row">
            <div class="col-6">
                <h4> Liste de vos tickets </h4>
                
                <table class="table table-striped table-bordered">  
                    <thead >
                        <tr>
                            <th>Ticket</th>
                            <th>Objet</th>
                            <th>Reponse</th>
                            <th>Etat</th>
                            <th>Ouvert</th>
                            <th>Fermé</th>
                            <th>Responsable</th>
                            <th style="text-align:center">Suppression</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php              
                    foreach($tabTickets as $ticket)
                    {
                        ?>
                        <tr id="<?=$ticket['idTicket']?>">
                            
                            <td><?=$ticket["idTicket"]?> </td>
                            <td><?=$ticket["objet"]?> </td>
                            <td><?=$ticket["reponse"]?> </td>
                            <td><?=$ticket["etat"]?> </td> 
                            <td><?=$ticket["dateopen"]?> </td> 
                            <td><?=$ticket["dateclose"]?> </td> 
                            <td><?=$ticket["openadmin"]?> </td>                         
                            <td style="text-align:center">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalsupprimerticket">supprimer</button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            
        </div>
        <br>
        
        <!-- Modal -->
        <div class="modal fade" id="modalsupprimerticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Supprimer le ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Vous êtes sur le point de supprimer un ticket<br>
                êtes vous sûr de vouloir supprimer ce ticket ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" onClick="suppTicket('<?=$ticket['idTicket']?>')" data-dismiss="modal">Valider</button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="piedbas p-3 mb-2 bg-primary text-white">
            
        </div>
        
        <?php include('mesIncPhp/footer.inc.php'); ?>

        <script>
            function suppTicket(idTicket)
            {
                // Suppression avec confirmation modal
                $.post("supprimerTicket.php",{idTicket:idTicket},traiterRepSup);
            }

            function traiterRepSup(donnees)
            {
                if (donnees!="----erreur----")
                {
                    $("#"+donnees).remove();
                }
            }
        </script>
        
    </body>

</html>
