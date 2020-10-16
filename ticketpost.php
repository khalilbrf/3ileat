<?php 

    session_start();
    $_SESSION['idUtil'];
    if($_POST['objet'] != NULL AND $_SESSION['idUtil'] != NULL){
        try { 
            
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; 
            $bdd = new PDO('mysql:host=localhost;dbname=3ileatbdd', 'root', 'root', $pdo_options); 
            $req = $bdd->prepare('INSERT INTO ticket (objet, idUtil) VALUES(?, ?)'); 
            $req->execute(array( $_POST['objet'], $_SESSION['idUtil'] ));  //permet de recuperer les donnees et les mettre dans le prepare
            header('Location: userview.php'); 
            exit;

        }catch(Exception $e) { 
            die('Erreur : '.$e->getMessage()); 
        } 
    } 
    if($_POST['objet'] == NULL) { echo 'Vous devez saisir un objet'; } 
    
    header('Location: userviewticket.php'); 



?> 