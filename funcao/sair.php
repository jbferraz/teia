<?php
        session_start();
        session_encode();
        session_destroy();     
header('Location:../Paginas/Login.php'); 
?>

