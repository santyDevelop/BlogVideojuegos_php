<?php require_once 'Proyecto_php/includes/redireccion.php'; ?>
<?php require_once 'Proyecto_php/includes/header.php'; ?>
<?php require_once 'Proyecto_php/includes/sidebar.php'; ?>

<!--CAJA PRINCIPAL-->
<div id="principal">
    <?php $entradaActual = conseguirEntrada($dbConection, $_GET['id']);?>    
    <h1>Editar entrada <?= $entradaActual['titulo']?></h1>
    
    </br>
    <form action="Proyecto_php/funcionalidad/guardar-entrada.php?edicion=<?= $entradaActual['id']?>" method="POST">
        <!--Titulo de la entrada -->
        <label for="titulo">Titulo de entrada: </label>
        <input type="text" name="titulo" value="<?= $entradaActual['titulo']?>"/>
        <?php echo isset($_SESSION['errorEntrada']) ? mostrarError($_SESSION['errorEntrada'], 'titulo') : ''; ?>
        
        <!--Descripcion de la entrada -->
        <label for="descripcion">Descripcion de entrada: </label>
        <textarea name="descripcion"><?= $entradaActual['descripcion']?></textarea>
        <?php echo isset($_SESSION['errorEntrada']) ? mostrarError($_SESSION['errorEntrada'], 'descripcion') : ''; ?>
        
        <!--Categorias de la entrada -->
        <label for="categoria">Categorias: </label>
        <select name="categoria">
            <?php 
                $categorias = conseguirCategorias($dbConection);
                if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
            
            <option value="<?=$categoria['id']?>"
                    <?=($categoria['id'] == $entradaActual['id_categoria']) ? 'selected="selected"' : ''?>>
                <?=$categoria['nombre']?>
            </option>
            
            <?php
                    endwhile;
                endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errorEntrada']) ? mostrarError($_SESSION['errorEntrada'], 'categoria') : ''; ?>
        
        <input type="submit" value="Editar"/>
    </form>
    <?php borrarErrores(); ?>
    
</div>    
<!--FIN CAJA PRINCIPAL-->

<?php require_once 'Proyecto_php/includes/footer.php'; ?>


