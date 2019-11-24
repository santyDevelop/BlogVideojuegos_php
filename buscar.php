<?php require_once 'Proyecto_php/includes/header.php'; ?>
<?php require_once 'Proyecto_php/includes/sidebar.php'; ?>

<!--CAJA PRINCIPAL-->
<div id="principal">
    
    <?php 
        if(!isset($_POST['busqueda'])){
            header('Location: index.php');
        }
        
        $entradasBuscadas = buscarEntradas($dbConection, $_POST['busqueda']);
    ?>    
    
    <h1>Resultados busqueda "<?= $_POST['busqueda']?>"</h1>
    
    <!--Entradas buscadas-->
    <?php
        if($entradasBuscadas):
            while ($entrada = mysqli_fetch_assoc($entradasBuscadas)):  
    ?>
                <article class="entrada">
                    <a href="entrada.php?id=<?=$entrada['id']?>">
                        <h2><?= $entrada['titulo'] ?></h2>
                        <span class="fecha"><?= $entrada['fecha'] ?></span>
                        <p>
                            <?= $entrada['descripcion']; ?>
                        </p>
                    </a>
                </article>
    <?php
            endwhile;
        else:
    ?>
            <div class="alerta">No hay entradas para esa busqueda</div>
    <?php endif; ?>  

</div>    
<!--FIN CAJA PRINCIPAL-->

<?php require_once 'Proyecto_php/includes/footer.php'; ?>

