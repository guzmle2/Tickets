<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tickets</title>
    <link rel="stylesheet" href="../css/style.css">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>

<body>
<script type="text/javascript">
    function mostrar(){
        if(document.getElementById('oculto').style.display == 'block')
        {
            document.getElementById('oculto').style.display = 'none';
            document.getElementById('textCambia').innerHTML = "Generar ticket <i class='mdi-alert-warning right'></i>";

        }else{
            (document.getElementById('oculto').style.display = 'block');
            document.getElementById('textCambia').innerHTML = "Ocutar <i class='mdi-alert-warning right'></i>";
        }
    }
</script>
    <header>
        <ul id="dropdownUsuario" class="dropdown-content">
            <li><a href="UsuarioEditar.php">Editar Info</a>
            </li>
        </ul>
        <ul id="dropdownTickets" class="dropdown-content">
            <li><a href="#!">Crear</a>
            </li>
            <li><a href="#!">Consultar</a>
            </li>
        </ul>
        <nav>
            <div class="nav-wrapper cyan lighten-1">
                <a href="#!" class="brand-logo">Tickets</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a class="dropdown-button" href="#!" data-activates="dropdownTickets">Tickets<i class="mdi-navigation-arrow-drop-down right"></i></a>
                    </li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdownUsuario">Usuario<i class="mdi-navigation-arrow-drop-down right"></i></a>
                    </li>
                    <li><a href="#"><i class="mdi-content-send right"></i>Salir</a>
                    </li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="#">Sass</a>
                    </li>
                    <li><a href="#">Components</a>
                    </li>
                    <li><a href="#">Javascript</a>
                    </li>
                    <li><a href="#"><i class="mdi-content-send right"></i>Salir</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <section class="container section">
        <div class="row">
            <div class="col s3">
            </div>
            <div class="col s6 offset-s3">
                <div id="popout" class="section scrollspy">
                    <h4>Consultor de incidencias</h4>
                    <p class="caption">Estatus de sus incidencias. </p>
                    <ul class="collapsible popout collapsible-accordion" data-collapsible="accordion">
                        <li class="">
                            <div class="collapsible-header"><i class="mdi-alert-warning"></i>Incidencias Abiertas</div>
                            <div class="collapsible-body" style="display: none;">
                                <p>
                                    Incidencias abiertas
                                </p>
                            </div>
                        </li>
                        <li class="">
                            <div class="collapsible-header"><i class="mdi-action-visibility"></i>Incidencias cerradas</div>
                            <div class="collapsible-body" style="display: none;">
                                <p>
                                    Incidencias cerradas.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <button class="btn waves-effect waves-light cyan lighten-1" onclick="mostrar()" id="textCambia" name="action" >Generar ticket
                    <i class="mdi-alert-warning right"></i>
                </button>
                <br/>
                <br/>
                <form action="../Back-End/Presentador/Tikeras/CrearTicketsPresentador.php" method="post" id='oculto' style='display:none;'>
                    <div class="row">
                        <label>Prioridad</label>
                        <select class="browser-default" name="prioridad" required>
                            <option value="" disabled selected>Escoga la prioridad</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>

                    <div class="row">
                        <label>Sistema Operativo</label>
                        <select class="browser-default" name="SO" required>
                            <option value="" disabled selected>Escoga Sistema Operativo</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>


                    <div class="row ">
                        <div class="input-field">
                            <input id="asunto" type="text" class="validate" length="10" name="asunto" required>
                            <label for="asunto">Asunto</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="input-field col s12">
                            <textarea id="detalle" class="materialize-textarea" length="120" name="detalle" required></textarea>
                            <label for="detalle">Detalle</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light cyan lighten-1" type="submit" name="action">Generar
                        <i class="mdi-alert-warning right"></i>
                    </button>
                </form>

                <div style="color: blue;">
                    <?php
                    if (isset($_GET["TicketGenerado"]))
                    {
                        if ($_GET["TicketGenerado"]=="si")
                        {
                            echo '*Su ticket fue generado con exito*';
                        }else{
                            echo '*Error en generar ticket intente mas tarde*';
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
    <script type="text/javascript" src="../js/materialize.min.js"></script>
</body>

</html>