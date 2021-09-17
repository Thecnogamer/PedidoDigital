<?php    
    session_destroy();
    session_start();

    $_SESSION["adm"]="desativar";
    header("Location:index.php");
?>