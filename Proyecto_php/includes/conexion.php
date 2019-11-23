<?php

    //CONEXION CON LA BBDD
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'blog_master';
    
    $dbConection = mysqli_connect($server, $username, $password, $database); 
    
    //Setear informacion que llega de la bbdd en utf-8
    mysqli_query($dbConection,"SET NAMES 'utf8");
    
    //Iniciar la sesion
    if(!isset($_SESSION)){
        session_start();
    }
?>
