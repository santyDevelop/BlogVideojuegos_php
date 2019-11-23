<?php
    if(isset($_POST)){
        //incluimos la conexion a la bbdd
        require_once '../includes/conexion.php';
            
        //Si se ha cerrado sesion, se vuelve a abrir
        if(!isset($_SESSION)){
            session_start();
        }
        
        //recoger los valores de formulario de registro
        $nombre = isset($_POST['name']) ? mysqli_real_escape_string($dbConection, $_POST['name']) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($dbConection,$_POST['apellidos']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($dbConection,trim($_POST['email'])) : false;
        
        
        
        //VALIDACION DE DATOS        
        //Array de errores
        $errores = array();        
        
        //validar nombre
        if(empty($nombre)){
            $nombre = $_SESSION['usuario']['nombre'];
        }else if(!is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
            $nombre_validado = true;
        }else{    
            $nombre_validado = false;
            $errores['nombre'] = "El nombre es invalido";
        }
        
        //validar apellido
        if(empty($apellidos)){
            $apellidos = $_SESSION['usuario']['apellidos'];            
        }else if(!is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
            $apellidos_validados = true;
        }else{
            $apellidos_validados = false;
            $errores['apellidos'] = "El apellido es invalido";
        }
        
        //validar email
        if(empty($email)){
            $email = $_SESSION['usuario']['email'];            
        }else if(filter_var($email, FILTER_VALIDATE_EMAIL)){            
            $email_validado = true;
        }else{
            $email_validado = false;
            $errores['email'] = "El e-mail es invalido";
        }
        
        //GUARDAR DATOS EN BBDD
        if(count($errores) == 0){        
            //Id del usuario de la sesion
            $usuarioId = $_SESSION['usuario']['id'];
            
            //Comprobar si el email ya existe, si es asi recogemos el id de ese usuario
            $sqlEmail = "SELECT id, email FROM usuarios WHERE email = '$email';";
            $queryEmailResult = mysqli_query($dbConection, $sqlEmail);
            $User = mysqli_fetch_assoc($queryEmailResult);
            
            //Comprobamos que el usuarios del email es el mismo
            if($User['id'] == $usuarioId || empty($User)){
                
                //ACTUALIZAR USUARIO EN LA BBDD            
                $querySql = "UPDATE usuarios SET ".
                            "nombre = '$nombre', ".
                            "apellidos = '$apellidos', ".
                            "email = '$email' ".
                            "WHERE id = '$usuarioId';";
                $queryResult = mysqli_query($dbConection, $querySql);

                if($queryResult){
                    //Actualizacion de la sesion de usuario
                    $_SESSION['usuario']['nombre'] = $nombre;
                    $_SESSION['usuario']['apellidos'] = $apellidos;
                    $_SESSION['usuario']['email'] = $email;

                    $_SESSION['registroExito'] = "Tus datos se han actualizado con exito"; 
                }else{
                    $_SESSION['errores']['general'] = "Fallo al actualizar tus datos"; 
                }
            }else{
                $_SESSION['errores']['general'] = "El usuario con ese email ya existe";
            }
            
            
            
        }else{
            //Guardar errores en sesion y redireccion 
            $_SESSION['errores'] = $errores;            
        }
    }
    
    header('Location: ../../actualizar-usuario.php');
?>
