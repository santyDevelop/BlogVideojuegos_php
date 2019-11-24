<?php require_once 'Proyecto_php/includes/header.php'; ?>
<?php require_once 'Proyecto_php/includes/sidebar.php'; ?>

<!--CAJA PRINCIPAL-->
<div id="principal">
    <?php $entradaActual = conseguirEntrada($dbConection, $_GET['id']);?>    
    <h1><?= $entradaActual['titulo']?></h1>
    
    <!--Entradas de la categoria-->
    <article class="entrada">
        <a href="categoria.php?id=<?=$entradaActual['id_categoria']?>">
            <h2><?= $entradaActual['categoria']?></h2>
        </a>        
        <h4><?= $entradaActual['fecha']?> | <?= $entradaActual['usuario']?></h4>
        <p>
            <?= $entradaActual['descripcion']?>
        </p>
        </br>
        <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entradaActual['id_usuario']):?>
            <!--Botones-->
            <a href="editar-entrada.php?id=<?=$entradaActual['id']?>" class="boton">Editar entrada</a>
            <a href="Proyecto_php/funcionalidad/borrar-entrada.php?id=<?=$entradaActual['id']?>" class="boton boton-verde">Borrar entrada</a>
        <?php endif;?>

    </article>
    
</div>    
<!--FIN CAJA PRINCIPAL-->

<?php require_once 'Proyecto_php/includes/footer.php'; ?>
