<?php require_once 'conexion.php';?>
<?php require_once 'alertLib.php';?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Blog de videojuegos</title>
        <link rel="stylesheet" type="text/css" href="Proyecto_php/assets/css/estilos.css"/>
    </head>
    <body>
        <!--CABECERA-->
        <header id="cabecera"> 
            <!--LOGO-->
            <div id="logo">
                <a href="index.php">
                    Blog de videojuegos
                </a>
            </div>
            
            <!--MENU-->
            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                    <?php 
                        $categorias = conseguirCategorias($dbConection);
                        if(!empty($categorias)):
                            while($categoria = mysqli_fetch_assoc($categorias)):
                    ?>
                                <li>
                                    <a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a>
                                </li>
                    <?php
                            endwhile;
                        endif;?>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </header>
        
        <!--CONTENIDO PRINCIPAL-->
        <div id="contenedor">

