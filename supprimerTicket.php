<?php   
    require_once "connexion.php";

    $varidTicket = $_POST["idTicket"];

    $req= $pdo->prepare("delete from ticket where idTicket=:idTicket");
    $req->bindParam(":idTicket",$varidTicket);

    $req->execute();

    echo $varidTicket;