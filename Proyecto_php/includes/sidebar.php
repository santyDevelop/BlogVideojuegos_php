<?php require_once 'alertLib.php';?>

<!--BARRA LATERAL-->
<aside id="sidebar">

    <!--LOGIN-->
    <div id="login" class="bloque">
        <h3>Identificate</h3>
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email"/>

            <label for="password">Contraseña</label>
            <input type="password" name="password"/>

            <input type="submit" value="Entrar"/>
        </form>
    </div>

    <!--REGISTRO-->
    <div id="registrar" class="bloque">        
        <h3>Registrate</h3>
        
        <?php if(isset($_SESSION['registroExito'])): ?>  
            <div class="alerta alerta-exito">
                <?= $_SESSION['registroExito'] ?>
            </div>
        <?php elseif(isset($_SESSION['errores']['registroFallo'])): ?> 
            <div class="alerta alerta-error">
                <?= $_SESSION['errores']['registroFallo'] ?>
            </div>
        <?php endif; ?> 
        
        
        <form action="Proyecto_php/funcionalidad/registro.php" method="POST">
            <label for="name">Nombre</label>
            <input type="text" name="name"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>            

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?> 
            
            <label for="email">Email</label>
            <input type="email" name="email"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?> 
            
            <label for="password">Contraseña</label>
            <input type="password" name="password"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?> 
            
            <input type="submit" name="submit" value="Registrar"/>
        </form>
        <?php borrarErrores(); ?>
    </div>
</aside>
