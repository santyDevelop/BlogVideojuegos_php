<?php
    
    function mostrarError($errores, $campo){
        $alerta = '';
        if(isset($errores[$campo]) && !empty($campo)){
            $alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
        }
        return $alerta;
    }
    
    function borrarErrores(){
        if(isset($_SESSION['errores'])){
            $_SESSION['errores'] = null;               
            unset($_SESSION['errores']);
        }
        
        if(isset($_SESSION['errorEntrada'])){
            $_SESSION['errorEntrada'] = null;               
            unset($_SESSION['errorEntrada']);
        }
        
        if(isset($_SESSION['registroExito'])){
            $_SESSION['registroExito'] = null;
            unset($_SESSION['registroExito']);
        }
    }
    
    function conseguirCategorias($dbConection){
        $querySql = "SELECT * FROM categorias ORDER BY id ASC;";
        $queryResult = mysqli_query($dbConection, $querySql);
        
        $categorias = array();
        if($queryResult && mysqli_num_rows($queryResult) >= 1){
            $categorias = $queryResult;
        }
        
        return $categorias;
    }
    
    function conseguirCategoria($dbConection, $id){
        $querySql = "SELECT * FROM categorias WHERE id = $id;";
        $queryResult = mysqli_query($dbConection, $querySql);
        
        if($queryResult){            
            $categoria = mysqli_fetch_assoc($queryResult);        
            if(!$categoria){
                header('Location: index.php');
            }
        }        
        return $categoria;
    }
    
    function conseguirUltimasEntradas($dbConection){        
        $limit = "ORDER BY e.id DESC LIMIT 4;";               
        return conseguirEntradas($dbConection,$limit);
    }
    
    function conseguirTodasEntradas($dbConection){
        $orderBy = "ORDER BY e.id DESC;"; 
        return conseguirEntradas($dbConection,$orderBy);
    }
    
    function conseguirEntradasCategoria($dbConection,$id){
        $querySql = "SELECT * FROM entradas WHERE id_categoria = '$id'";
        $queryResult = mysqli_query($dbConection, $querySql);
        
        $entradas = array();
        if($queryResult && mysqli_num_rows($queryResult) >= 1){
            $entradas = $queryResult;
        }
        
        return $entradas;
    }
    
    function conseguirEntrada($dbConection,$id){
        $querySql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e ".
                    "INNER JOIN categorias c ON e.id_categoria = c.id ".
                    "WHERE e.id = '$id';";
        $queryResult = mysqli_query($dbConection, $querySql);
        
        if($queryResult){            
            $entrada = mysqli_fetch_assoc($queryResult);        
            if(!$entrada){
                header('Location: index.php');
            }
        }        
        return $entrada;
    }
    
    function conseguirEntradas($dbConection, $sqlCode = null){
        $querySql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e ".
                    "INNER JOIN categorias c ON e.id_categoria = c.id ";
        
        if($sqlCode){
            $querySql .= $sqlCode;
        }else{
            $querySql .= ";";
        }
        
        $queryResult = mysqli_query($dbConection, $querySql);
        
        $entradas = array();
        if($queryResult && mysqli_num_rows($queryResult) >= 1){
            $entradas = $queryResult;            
        }
        
        return $entradas;
    }
?>