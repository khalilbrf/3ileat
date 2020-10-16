
<?php
    session_start(); //session qui partage le login
    echo"<br>";
//    $dsn = 'mysql:host=localhost;dbname=3ileatbdd;charset=utf8';
//    $userbdd = 'root';
//    $passwordbdd = 'root';

    try{
        //recuperation des données de la bdd
        require_once "connexion.php";
        //$bdd = new PDO($dsn, $userbdd, $passwordbdd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur :' .$e->getMessage());
    }
        //ON VERIFIE QUE LUTILISATEUR A BIEN SAISI QLQ CHOSE    
        if (isset($_POST['login']) AND isset($_POST['password']))
        {
  
            $verif = $pdo->prepare('SELECT mdp FROM utilisateurs WHERE login = :login'); // Je compte le nombre d'entrÈe ayant pour mot de passe et login ceux rentrÈs
    
            $verif->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
        
            $verif->execute();
            $donnees = $verif->fetchAll();
           // var_dump($donnees);
        
            if(count($donnees)!=0){
              
              
                    //DONC LE LOGIN ET LE PASS EXISTENT DANS LA BDD
                    if (password_verify($_POST['password'], $donnees[0]['mdp'])==1)
                    { 
                       
                        echo '<div>Vous êtes connecté en tant que </div>'.$_POST['login'].' !!';
                        //ON STOCK LE LOGIN ET PASS DANS LA SESION  
                        $_SESSION['login'] = $_POST['login'];
                       // $_SESSION['password'] = $_POST['password'];
                        
                        //RECUPERATION DU DROIT DE LA PERSONNE CONNECTE
//                        $maCo = new PDO($dsn,$userbdd,$passwordbdd);
                        $texteRequete = "select droit, idUtil from utilisateurs where login = '".$_SESSION['login']."'";
                        $requete = $pdo->prepare($texteRequete);
                        $requete->execute();
                        $rslt = $requete->fetchAll(); // récupération du résultat dans un tableau associatif

                        foreach($rslt as $uneValeur)
                        {
                            $_SESSION['idUtil'] = $uneValeur['idUtil']; 
                            $_SESSION['droit'] = $uneValeur['droit'];
                        }  

                    
                        //VERIFICATION DU DROIT DE LA SESSION
                        if( $_SESSION['droit'] == 'Admin' ){
                            
                            Header('Location: adminview.php');
                             exit;
                            
                        }else{

                           Header('Location: userview.php');
                            exit;
                        }
                    } 
                    else{
                          // Personne n'existe dans la table avec ce couple mdp, login
                        $_SESSION['msgpresentbdd'] = 'Le login et/ou le mot de passe rentrÈs sont invalides'; 
                        Header('Location: index.php');
                         exit;
                     }
            } 
            else{
               // Personne n'existe dans la table avec ce couple mdp, login
                $_SESSION['msgpresentbdd'] = 'Le login et/ou le mot de passe rentrÈs sont invalides'; 
                Header('Location: index.php');
                exit;
            }
                    }            
                
        
       
    
