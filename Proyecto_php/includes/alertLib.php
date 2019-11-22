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
    
    function conseguirUltimasEntradas($dbConection){
        $querySql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e ".
                    "INNER JOIN categorias c ON e.id_categoria = c.id ".
                    "ORDER BY e.id DESC LIMIT 4;";
        $queryResult = mysqli_query($dbConection, $querySql);
        
        $entradas = array();
        if($queryResult && mysqli_num_rows($queryResult) >= 1){
            $entradas = $queryResult;
        }
        
        return $entradas;
    }
?>