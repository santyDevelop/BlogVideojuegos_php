<?php
    session_start();
    
    //Si la sesion de usuario esta abierta, la cerramos
    if(isset($_SESSION['usuario'])){
        session_destroy();
    }
    
    //redirigir al index
    header('Location: ../../index.php');
?>

