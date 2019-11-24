<?php
    //incluimos la conexion a la bbdd
    require_once '../includes/conexion.php';
            
    if(isset($_POST)){
        //Borrar sesion de error antigua si existe
        if(isset($_SESSION['loginError'])){
            session_unset();            
        }
                
        //Recoger datos del formulario
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        
        //Consulta para comprobar las credenciales del usuario
        $querySelect = "SELECT * FROM usuarios WHERE email = '$email'";
        $queryLogin = mysqli_query($dbConection, $querySelect);
        
        if($queryLogin && mysqli_num_rows($queryLogin) == 1){
            
            $usuario = mysqli_fetch_assoc($queryLogin);
                        
            //Comprobar la contraseña
            $passVerify = password_verify($password, $usuario['password']);
            
            if($passVerify){
                //Utilizar una sesion para guardar los datos del usuario logeado
                $_SESSION['usuario'] = $usuario;
                
            }else{
                //Si no coincide la password, enviar una sesion con el fallo
                $_SESSION['loginError'] = "Login incorrecto";
            }
        }else{
            //Si no existe el usuario, enviar una sesion con el fallo
            $_SESSION['loginError'] = "El usuario no existe";
        }
    }
       
    //redirigir al index
    header('Location: ../../index.php');
?>

