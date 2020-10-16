<?php
    session_start();

    //detruire lasession
    $_SESSION = array();
    session_destroy();
    header("location:index.php");
    exit();

?>