<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Blog de videojuegos</title>
        <link rel="stylesheet" type="text/css" href="Proyecto_php/assets/css/estilos.css"/>
    </head>
    <body>
        <!--CABECERA-->
        <header id="cabecera"> 
            <!--LOGO-->
            <div id="logo">
                <a href="index.php">
                    Blog de videojuegos
                </a>
            </div>
            
            <!--MENU-->
            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                    <li>
                        <a href="index.php">Categoria 1</a>
                    </li>
                    <li>
                        <a href="index.php">Categoria 2</a>
                    </li>
                    <li>
                        <a href="index.php">Categoria 3</a>
                    </li>
                    <li>
                        <a href="index.php">Categoria 4</a>
                    </li>
                    <li>
                        <a href="index.php">Sobre mi</a>
                    </li>
                    <li>
                        <a href="index.php">Contacto</a>
                    </li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </header>
        
        <!--CONTENIDO PRINCIPAL-->
        <div id="contenedor">        
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
                    <form action="registro.php" method="POST">
                        <label for="name">Nombre</label>
                        <input type="text" name="name"/>
                        
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos"/>
                        
                        <label for="email">Email</label>
                        <input type="email" name="email"/>
                        
                        <label for="password">Contraseña</label>
                        <input type="password" name="password"/>
                        
                        <input type="submit" value="Registrar"/>
                    </form>
                </div>
            </aside>
            
            <!--CAJA PRINCIPAL-->
            <div id="principal">
                <h1>Ultimas entradas</h1>
                <article class="entrada">
                    <a href="">
                        <h2>Titulo de entrada</h2>
                        <p>
                            Vivamus eleifend enim tortor, ut consectetur enim congue laoreet. Aliquam mattis imperdiet urna eu egestas. Donec ut convallis ex. Nullam luctus eget purus ut pulvinar. Donec eget nulla velit. Vestibulum vehicula massa et magna mattis rhoncus. In condimentum at tortor a porttitor. Nunc semper vestibulum nulla, ut cursus arcu efficitur et.
                        </p>
                    </a>
                </article>
                <article class="entrada">
                    <a href="">
                        <h2>Titulo de entrada</h2>
                        <p>
                            Vivamus eleifend enim tortor, ut consectetur enim congue laoreet. Aliquam mattis imperdiet urna eu egestas. Donec ut convallis ex. Nullam luctus eget purus ut pulvinar. Donec eget nulla velit. Vestibulum vehicula massa et magna mattis rhoncus. In condimentum at tortor a porttitor. Nunc semper vestibulum nulla, ut cursus arcu efficitur et.
                        </p>
                    </a>
                </article>
                <article class="entrada">
                    <a href="">
                        <h2>Titulo de entrada</h2>
                        <p>
                            Vivamus eleifend enim tortor, ut consectetur enim congue laoreet. Aliquam mattis imperdiet urna eu egestas. Donec ut convallis ex. Nullam luctus eget purus ut pulvinar. Donec eget nulla velit. Vestibulum vehicula massa et magna mattis rhoncus. In condimentum at tortor a porttitor. Nunc semper vestibulum nulla, ut cursus arcu efficitur et.
                        </p>
                    </a>
                </article>
                <article class="entrada">
                    <a href="">
                        <h2>Titulo de entrada</h2>
                        <p>
                            Vivamus eleifend enim tortor, ut consectetur enim congue laoreet. Aliquam mattis imperdiet urna eu egestas. Donec ut convallis ex. Nullam luctus eget purus ut pulvinar. Donec eget nulla velit. Vestibulum vehicula massa et magna mattis rhoncus. In condimentum at tortor a porttitor. Nunc semper vestibulum nulla, ut cursus arcu efficitur et.
                        </p>
                    </a>
                </article>
                
                <div id="ver-todas">
                    <a href="">Ver todas las entradas</a>
                </div>
            </div>    
            <div class="clearfix"></div>
        </div>
        
        <!--PIE DE PAGINA-->
        <footer id="pie">
            <p>Desarrollado por Santi Garcia &copy; 2019</p>
        </footer>
    </body>
</html>
