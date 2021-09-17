<?php
session_destroy();
session_start();
$_SESSION["adm"]="ativar";
header("Location:index.php");
?>