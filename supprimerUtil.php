<?php   
    require_once "connexion.php";

    $varidUtil = $_POST["idUtil"];

    $req= $pdo->prepare("delete from utilisateurs where idUtil=:idUtil");
    $req->bindParam(":idUtil",$varidUtil);

    $req->execute();

    echo $varidUtil;