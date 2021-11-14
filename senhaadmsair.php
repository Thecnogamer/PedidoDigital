<?php    
    session_destroy();
    session_start();

    $_SESSION["adm"]="desativar";
    $_SESSION["rest"]="0";
    header("Location: index.php");
?>

