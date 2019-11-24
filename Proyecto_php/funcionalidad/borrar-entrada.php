<?php
    require_once '../includes/conexion.php';
    
    if(isset($_SESSION['usuario']) && isset($_GET['id'])){
        $id_entrada = $_GET['id'];
        $id_usuario = $_SESSION['usuario']['id'];
        
        $querySql = "DELETE FROM entradas WHERE id_usuario = '$id_usuario' AND id = '$id_entrada';";
        $queryResult = mysqli_query($dbConection, $querySql);
    }
    
    header('Location: ../../index.php');
?>

