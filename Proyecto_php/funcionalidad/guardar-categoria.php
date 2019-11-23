<?php

    if(isset($_POST)){
        //incluimos la conexion a la bbdd
        require_once '../includes/conexion.php';
                
        //recoger los valores de formulario de registro
        $nombreCat = isset($_POST['nombreCat']) ? mysqli_real_escape_string($dbConection, $_POST['nombreCat']) : false;
        
        
        //VALIDACION DE DATOS
        //Array de errores
        $errores = array();        
        
        //validar nombre
        if(!empty($nombreCat) && !is_numeric($nombreCat) && !preg_match("/[0-9]/", $nombreCat)){
            $nombre_validado = true;
        }else{
            $nombre_validado = false;
            $errores['nombreCat'] = "El nombre de categoria es invalido";
        }
        
        
        //GUARDAR NOMBRE EN BBDD
        if(count($errores) == 0){
            $querySql = "INSERT INTO categorias VALUES(null, '$nombreCat');";
            $queryResult = mysqli_query($dbConection, $querySql);
        }        
    }
    
    header('Location: ../../index.php');
?>

