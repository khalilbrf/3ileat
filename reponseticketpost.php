<?php 

    session_start();
    $_SESSION['idTicket'];
    
    //requi pour se connecter et reuperer la pdo 
    require_once "connexion.php";

    $requpdate = "UPDATE ticket SET etat = 'ferme', reponse ='".$_POST['reponse']."', dateclose = NOW() WHERE idTicket = ".$_SESSION['idTicket'];
    $requpdatenow = $pdo->query($requpdate)->fetchAll();

    header('Location: adminviewticket.php'); 
    exit;
/*
    if($_POST['reponse'] != NULL AND $_SESSION['idTicket'] != NULL){
        try { 
            
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; 
            $bdd = new PDO('mysql:host=localhost;dbname=3ileatbdd', 'root', 'root', $pdo_options); 
            //mettre la reponse dans la case
            $requpdate = "UPDATE ticket SET etat = 'ferme', reponse ='".$_POST['reponse']."' WHERE idTicket = ".$_SESSION['idTicket'];
            $requpdatenow = $pdo->query($requpdate)->fetchAll();
            header('Location: adminviewticket.php'); 
            exit;

        }catch(Exception $e) { 
            die('Erreur : '.$e->getMessage()); 
        } 
    } 
    if($_POST['reponse'] == NULL) { echo 'Vous devez saisir une reponse'; } 
    
    header('Location: adminviewticketreponse.php'); 
*/


?> 