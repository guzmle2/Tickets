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
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#"><i class="mdi-content-send right"></i>Login</a>
                    </li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="#"><i class="mdi-content-send right"></i>Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <section class="container section">
        <div class="row">
            <div class="col s3">
            </div>
            <div class="col s8 offset-s2">
                <form action="Back-End/Presentador/Usuario/InsertarUsuario.php" method="post" style="padding:10%;">
                    <div class="row ">
                        <div class="input-field">
                            <input disabled  type="text" class="validate" value="<?php echo $_REQUEST['email']; ?> " >
                            <input id="correo" type="hidden" class="validate" name="correo" value="<?php echo $_REQUEST['email']; ?> " >
                            <label for="correo">Correo institucional</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="input-field col s6">
                            <input id="clave" type="password" class="validate" length="10" name="clave" required>
                            <label for="clave">Clave</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="nombre" type="text" class="validate" length="10" name="nombre" required>
                            <label for="nombre">Nombre</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="input-field col s6">
                            <input id="apellido" type="text" class="validate" length="10" name="apellido" required>
                            <label for="apellido">Apellido</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="cedula" type="text" class="validate" length="10" name="cedula" required>
                            <label for="cedula">Cedula</label>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="input-field col s6 ">
                            <input id="celular" type="text" class="validate" length="10" name="celular" required>
                            <label for="celular">Celular</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="extension" type="text" class="validate" length="4" name="extension" required>
                            <label for="extension">Extension</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s6 offset-s3">
                            <label>Gerencia</label>
                            <select class="browser-default" name="gerencia" required>
                                <option value="" disabled selected>Escoga su gerencia</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="col s2 offset-s4">
                        <button class="btn waves-effect waves-light cyan lighten-1" type="submit" name="action">Agregar
                            <i class="mdi-alert-warning right"></i>
                        </button>
                    </div>
                </form>
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