<?php 

    $id = $_GET["id"];
    $adm = $_SESSION["adm"];
    session_destroy();
    session_start();
    $_SESSION["rest"] = "$id";
    $_SESSION["adm"] = $adm;

    header("Location: index.php")



?>