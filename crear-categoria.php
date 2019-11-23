<?php require_once 'Proyecto_php/includes/redireccion.php'; ?>
<?php require_once 'Proyecto_php/includes/header.php'; ?>
<?php require_once 'Proyecto_php/includes/sidebar.php'; ?>

<!--CAJA PRINCIPAL-->
<div id="principal">
    <h1>Crear categorias</h1>
    <p>
        Añade nuevas categorias al blog para que los usuarios puedan usarlas
        al crear sus entradas.
    </p>
    </br>
    <form action="Proyecto_php/funcionalidad/guardar-categoria.php" method="POST">
        <label for="nombreCat">Nombre categoria</label>
        <input type="text" name="nombreCat"/>
        
        <input type="submit" value="Guardar"/>
    </form>
</div>
<!--FIN CAJA PRINCIPAL-->

<?php require_once 'Proyecto_php/includes/footer.php'; ?>

