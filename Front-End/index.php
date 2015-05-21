<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tickets</title>
    <link rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>

<body>
    <header>
        <nav>
            <div class="nav-wrapper cyan lighten-1">
                <a href="#!" class="brand-logo">Tickets</a>
            </div>
        </nav>
    </header>
    <section class="container section">
        <div class="row">
            <div class="col s3">              
            </div>
            <div class="col s6 offset-s3">
                <form action="Back-End/Presentador/Usuario/indexPresentador.php" method="post" style="padding:20%;" onsubmit="return valida(this)">
                    <div class="row ">
                        <div class="input-field">
                            <input  id="email" type="email" name="email" class="validate" required>
                            <label for="email">Correo (@email)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <input id="password" type="password" name="password" class="validate" required>
                            <label for="password">Clave</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light cyan lighten-1" type="submit" name="action" >Ingresar
                        <i class="mdi-content-send right"></i>
                    </button>
                </form>
                <div style="color: red;">
                    <?php
                    if (isset($_GET["errorusuario"]))
                    {
                        if ($_GET["errorusuario"]=="si")
                        {
                            echo '*Clave incorrecta*';
                        }
                    }
                    ?>
                    <div style="color: blue;">
                        <?php
                        if (isset($_GET["usuarionuevo"]))
                        {
                            if ($_GET["usuarionuevo"]=="si")
                            {
                                echo '*Ingrese con su nueva clave*';
                            }
                        }
                        ?>
                </div>

            </div>
            <div class="col s3"></div>
        </div>
    </section>
    <footer class="page-footer cyan lighten-1">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Tickets</h5>
                    <p class="grey-text text-lighten-4">Diseño y desarrollo como software de defensa de tesis.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Tesistas</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Alumno #1</a>
                        </li>
                        <li><a class="grey-text text-lighten-3" href="#!">Alumno #2</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2015 Copyright
                <a class="grey-text text-lighten-4 right" href="#!">Universidad</a>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>