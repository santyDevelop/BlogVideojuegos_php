<?php require_once 'Proyecto_php/includes/redireccion.php'; ?>
<?php require_once 'Proyecto_php/includes/header.php'; ?>
<?php require_once 'Proyecto_php/includes/sidebar.php'; ?>

<!--CAJA PRINCIPAL-->
<div id="principal">
    <h1>Mis datos</h1>
    
    <?php if(isset($_SESSION['registroExito'])): ?>  
    <div class="alerta alerta-exito">
            <?= $_SESSION['registroExito'] ?>
        </div>
    <?php elseif (isset($_SESSION['errores']['general'])): ?> 
        <div class="alerta alerta-error">
            <?= $_SESSION['errores']['general'] ?>
        </div>
    <?php endif; ?> 


    <form action="Proyecto_php/funcionalidad/guardar-usuario.php" method="POST">
        <label for="name">Nombre</label>
        <input type="text" name="name" placeholder="<?=$_SESSION['usuario']['nombre']?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>            

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" placeholder="<?=$_SESSION['usuario']['apellidos']?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?> 

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="<?=$_SESSION['usuario']['email']?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?> 

        <input type="submit" name="submit" value="Actualizar"/>
    </form>
    <?php borrarErrores(); ?>
</div>
<!--FIN CAJA PRINCIPAL-->

<?php require_once 'Proyecto_php/includes/footer.php'; ?>
