<?php require_once 'Proyecto_php/includes/header.php'; ?>
<?php require_once 'Proyecto_php/includes/sidebar.php'; ?>

<!--CAJA PRINCIPAL-->
<div id="principal">
    <?php $entradaActual = conseguirCategoria($dbConection, $_GET['id']);?>    
    <h1>Categoria <?= $entradaActual['nombre']?></h1>
    
    <!--Entradas de la categoria-->
    <?php         
        $entradas = conseguirEntradasCategoria($dbConection, $entradaActual['id']);        
        if (!empty($entradas)):
            while ($entrada = mysqli_fetch_assoc($entradas)):  
    ?>
                <article class="entrada">
                    <a href="entrada.php?id=<?=$entrada['id']?>">
                        <h2><?= $entrada['titulo'] ?></h2>
                        <span class="fecha"><?= $entrada['fecha'] ?></span>
                        <p>
                            <?= substr($entrada['descripcion'], 0, 150)." ..." ?>
                        </p>
                    </a>
                </article>
    <?php
            endwhile;
        else:
    ?>
            <div class="alerta">No hay entradas en esta categoria</div>
    <?php endif; ?>  

</div>    
<!--FIN CAJA PRINCIPAL-->

<?php require_once 'Proyecto_php/includes/footer.php'; ?>