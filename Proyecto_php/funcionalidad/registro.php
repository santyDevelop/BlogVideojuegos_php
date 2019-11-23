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
        $password = isset($_POST['password']) ? mysqli_real_escape_string($dbConection,$_POST['password']) : false;
        
        //validar datos antes de guardarlos en la base de datos
        
        
        //Array de errores
        $errores = array();        
        
        //validar nombre
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
            $nombre_validado = true;
        }else{
            $nombre_validado = false;
            $errores['nombre'] = "El nombre es invalido";
        }
        
        //validar apellido
        if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
            $apellidos_validados = true;
        }else{
            $apellidos_validados = false;
            $errores['apellidos'] = "El apellido es invalido";
        }
        
        //validar email
        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_validado = true;
        }else{
            $email_validado = false;
            $errores['email'] = "El e-mail es invalido";
        }
        
        //validar password
        if(!empty($password)){
            $password_validado = true;
        }else{
            $password_validado = false;
            $errores['password'] = "La password esta vacia";
        }
        
        //Comprobacion de errores
        //var_dump($errores);
        
        //Guardar datos en base de datos
        if(count($errores) == 0){
            //Cifrado de contraseña
            $passwordSafe = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
            
            //INSERTAMOS USUARIO EN LA BBDD            
            $queryInsert = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$passwordSafe', CURDATE());";
            $usuarioInsertado = mysqli_query($dbConection, $queryInsert);
            
            //var_dump(mysqli_error($dbConection));
            //die();
            
            if($usuarioInsertado){
                $_SESSION['registroExito'] = "El registro se ha completado con exito"; 
            }else{
                $_SESSION['errores'] = $errores;
                $_SESSION['errores']['registroFallo'] = "Fallo al guardar el usuario"; 
            }
        }else{
            //Guardar errores en sesion y redireccion 
            $_SESSION['errores'] = $errores;            
        }
    }
    
    header('Location: ../../index.php');
?>

