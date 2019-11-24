<?php

    if(isset($_POST)){
        //incluimos la conexion a la bbdd
        require_once '../includes/conexion.php';
                
        //recoger los valores de formulario de registro
        $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($dbConection, $_POST['titulo']) : false;
        $descripcion= isset($_POST['descripcion']) ? mysqli_real_escape_string($dbConection, $_POST['descripcion']) : false;
        $categoria = isset($_POST['categoria']) ? (int) $_POST['categoria'] : false;
        
        //Recoger usuario de la sesion
        $usuarioId = $_SESSION['usuario']['id'];
        
        //VALIDACION DE DATOS
        //Array de errores
        $errores = array();        
        
        //validar titulo
        if(empty($titulo)){
            $errores['titulo'] = "El titulo no es valido";
        }
        
        //validar descripcion
        if(empty($descripcion)){
            $errores['descripcion'] = "La descripcion no es valida";
        }
        
        //validar categoria
        if(empty($categoria) && !is_numeric($categoria)){
            $errores['categoria'] = "La categoria no es valida ";
        }
        
        
        //GUARDAR DATOS EN BBDD
        if(count($errores) == 0){
            if(isset($_GET['edicion'])){
                $id_entrada = $_GET['edicion'];
                
                //ACTUALIZAR ENTRADA EN LA BBDD            
                $querySql = "UPDATE entradas SET ".
                            "id_categoria = '$categoria', ".
                            "titulo = '$titulo', ".
                            "descripcion = '$descripcion' ".                           
                            "WHERE id = '$id_entrada' AND id_usuario = '$usuarioId';";
            }else{            
                $querySql = "INSERT INTO entradas VALUES(null, '$usuarioId', '$categoria', '$titulo', '$descripcion', CURDATE());";
            }
            
            $queryResult = mysqli_query($dbConection, $querySql);
            
            header('Location: ../../index.php');
        }else{
            $_SESSION['errorEntrada'] = $errores;
            if(isset($_GET['edicion'])){
                header('Location: ../../editar-entrada.php?id='.$_GET['edicion']);
            }else{
                header('Location: ../../crear-entrada.php');
            }            
        }
    }
    
    
?>

