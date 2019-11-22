<?php require_once 'Proyecto_php/includes/header.php'; ?>
<?php require_once 'Proyecto_php/includes/sidebar.php'; ?>

<!--CAJA PRINCIPAL-->
<div id="principal">
    <h1>Ultimas entradas</h1>
    
    <!--Ultimas entradas desde funcion-->
    <?php 
        $ultimasEntradas = conseguirUltimasEntradas($dbConection);        
        if (!empty($ultimasEntradas)):
            while ($entrada = mysqli_fetch_assoc($ultimasEntradas)):
                
    ?>
                <article class="entrada">
                    <a href="">
                        <h2><?= $entrada['titulo'] ?></h2>
                        <span class="fecha"><?= $entrada['categoria']." | ".$entrada['fecha'] ?></span>
                        <p>
                            <?= substr($entrada['descripcion'], 0, 150)." ..." ?>
                        </p>
                    </a>
                </article>
    <?php
            endwhile;
        endif;
    ?>  

    <div id="ver-todas">
        <a href="">Ver todas las entradas</a>
    </div>
</div>    
<!--FIN CAJA PRINCIPAL-->

<?php require_once 'Proyecto_php/includes/footer.php'; ?>
