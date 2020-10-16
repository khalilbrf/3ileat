<?php 

    session_start();
    $_SESSION['msgpwdconfirm'] = ' ';
    if($_POST['login'] != NULL AND $_POST['courriel'] != NULL AND $_POST['password'] != NULL 
        AND $_POST['passwordconfirm'] != NULL 
        AND $_POST['password'] == $_POST['passwordconfirm'] 
    ){
        try { 
            
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; 
            require_once "connexion.php";
            $req = $pdo->prepare('INSERT INTO utilisateurs (login, mdp, courriel) VALUES(?, ?, ?)'); 
            //CRYPTAGE
            $req->execute(array( $_POST['login'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['courriel'] )); 
            //$req->execute(array( $_POST['login'], $_POST['password'], $_POST['courriel'] ));  //permet de recuperer les donnees et les mettre dans le prepare
            if($_POST['password'] != $_POST['passwordconfirm']) { echo 'Les deux mots de passe doivent être identiques'; }  
            header('Location: index.php'); 
            
            exit;

        }catch(Exception $e) { 
            die('Erreur : '.$e->getMessage()); 
        } 
    } 
    

    if($_POST['password'] != $_POST['passwordconfirm']) { 
        $_SESSION['msgpwdconfirm'] = 'Les deux mots de passe doivent être identiques'; 
    }  
    
    header('Location: inscription.php'); 



?> 