<?php
//PREMIERE PAGE QUI LISTE LES UTILISATEURS
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

            $txtReq = "select * from utilisateurs ";
            $tabUtils = $pdo->query($txtReq)->fetchAll();
            
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
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="adminview.php" role="tab" aria-controls="home" aria-selected="true">Utilisateurs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="adminviewticket.php" role="tab" aria-controls="profile" aria-selected="false">Tickets</a>
          </li>
        </ul>
        
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"></div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
        </div>
        
        <br>
        
        <div class="col-6">
            <h4>Liste des utilisateurs </h4>
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">  
                    <thead class="thead-dark">
                        <tr>
                            <th>id</th>
                            <th>Login</th>
                            <th>Password</th>
                            <th>Droit</th>
                            <th style="text-align:center">Suppression direct !</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php              
                    foreach($tabUtils as $util)
                    {
                        ?>
                        <tr id="<?=$util['idUtil']?>">
                            <td><?=$util["idUtil"]?> </td>
                            <td><?=$util["login"]?> </td> 
                            <td><?=$util["mdp"]?> </td>
                            <td><?=$util["droit"]?> </td>
                            <td style="text-align:center"> 
                                <?php
                                    if( $util["droit"] == 'Client') { ?>
                                        <button type="button" class="btn btn-danger" onClick="suppUtil('<?=$util['idUtil']?>')">supprimer</button>
                                <?php 
                                                              
                                    } 
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
        </div>
        
        
        <br>
        <div class="piedbas p-3 mb-2 bg-primary text-white">    </div>
        
        <?php include('mesIncPhp/footer.inc.php'); ?>
        
        <!--script concernant le tri et affichage en data boostrap-->
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>
        
        <!--script de suppression-->
        <script>
            function suppUtil(logUtil)
            {
                // Suppression "brutale", sans confirmation
                $.post("supprimerUtil.php",{idUtil:logUtil},traiterRepSup);
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
