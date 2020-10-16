<?php 
            session_start();
            //recuperation des besoins
            $login = $_SESSION['login'];  
            $droit = $_SESSION['droit']; 

            //droits suffisant ?
            if(!isset($_SESSION['droit'])){
                die("<strong>Accès réservé aux adhérant de 3ilEat</strong>");
            }
            if($_SESSION['droit'] != "Admin"){
                die("<strong>Accès réservé aux Administrateurs</strong>");
            }
            // récupération du contenu de la table utilisateurs, pour affichage
            require_once "connexion.php";

            $txtReq = "select * from ticket";
            $tabTickets = $pdo->query($txtReq)->fetchAll();
            
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
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="adminviewticket.php" role="tab" aria-controls="profile" aria-selected="true">Tickets</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab"></div>
          <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
        </div>
        <br>
        
        <h4>Liste des tickets </h4>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">  
                    <thead class="thead-dark">
                        <tr>
                            
                            <th>User</th>
                            <th>Objet</th>
                            <th>Réponse</th>
                            <th>Etat</th>
                            <th>Ouvert</th>
                            <th>Fermé</th>
                            <th>Résponsable</th>
                            <th>    </th>
                            <!--<th style="text-align:center">Suppression</th>-->
                        </tr>
                    </thead>
                    <tbody>
                    <?php              
                    foreach($tabTickets as $ticket)
                    {
                        ?>
                        <tr id="<?=$ticket['idTicket']?>">
                            
                            <td><?=$ticket["idUtil"]?> </td> 
                            <td><?=$ticket["objet"]?> </td>
                            <td><?=$ticket["reponse"]?> </td>
                            <td><?=$ticket["etat"]?></td> 
                            <td><?=$ticket["dateopen"]?> </td> 
                            <td><?=$ticket["dateclose"]?> </td> 
                            <td><?=$ticket["openadmin"]?> </td> 
                            <td>
                                <?php
                                    if( $ticket['etat'] != 'ferme' ) { ?>
                                        <a href="adminviewticketreponse.php?idTicket=<?php echo $ticket['idTicket']?>">Répondre</a>
                                <?php 
                                                              
                                    } 
                                ?>
                            </td>
                            
                            <!--on traite ici si ticket etat = ouvert alors on affiche une case avec lien consulter qui nous renvoi dans une page avec lid et on retire le adminviewticketreponse et reponseticketpostcopletement-->
                            <!--<td style="text-align:center"> <button class='btn btn-danger' onClick="suppTicket('<?=$ticket['idTicket']?>')">supprimer</button></td>-->
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
            </table>

        <br>
        
        
        <div class="piedbas p-3 mb-2 bg-primary text-white">    </div>
        
       
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>
         
        <!--script pour recuperation de idTicket pour usage dans adminviewticketreponse-->
        <script>
            function repondreTicket(idTicket)
            {
                // Suppression "brutale", sans confirmation
                $.post("reponseTicket.php",{idTicket:idTicket},traiterRepSup);
            }
        </script>
       

    </body>

</html>
