<?php
/**
 * En este frame se van cargado cada una de las funcionalidades del sistema
 *
 * Descripcion Larga
 *
 * @category
 * @package      SGD Orfeo
 * @subpackage   Main
 * @author       Community
 * @author       Skina Technologies SAS (http://www.skinatech.com)
 * @license      GNU/GPL <http://www.gnu.org/licenses/gpl-2.0.html>
 * @link         http://www.orfeolibre.org
 * @version      SVN: $Id$
 * @since
 */
/* ---------------------------------------------------------+
  |                     INCLUDES                             |
  +--------------------------------------------------------- */


/* ---------------------------------------------------------+
  |                    DEFINICIONES                          |
  +--------------------------------------------------------- */
session_start();
error_reporting(7);
$url_raiz = $_SESSION['url_raiz'];
$dir_raiz = $_SESSION['dir_raiz'];
$ESTILOS_PATH2 = $_SESSION['ESTILOS_PATH2'];
$autenticaPorLDAP = $_SESSION["autentica_por_LDAP"];
/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
//echo '-------------------- ';
//$ruta_raiz = ".";

$imagenes = $_SESSION["imagenes"];
$logo = 'logoEntidad.png';
?>
<html>
    <head>
        <title>.:: SGD Orfeo 6 ::.</title>
        <!--<link rel="shortcut icon" href="imagenes/arpa.gif">-->
        <!--By skinatech-->
        <link rel="shortcut icon" href="<?= $imagenes ?>/orfeolibre.ico">
        <link rel="stylesheet" href="<?= $url_raiz . $ESTILOS_PATH2 ?>header.css">  
        <?php require_once("$dir_raiz/head.php"); ?>    
        
        <style>
            .menuUserNom {
                background-color: #1C4056 !important;
                color: white !important;
                /*width: 189px !important;
                height: 38px !important;
                border-radius: 10px 0px 0px 10px !important;*/
                margin-top: 10px;
                margin-left: 10px;
            }

            .menuUserDepe {
                background-color: #1C4056 !important;
                color: white !important;
                margin-top: 10px;
                margin-left: 10px;
                margin-right: 10px;
            }

            .aplicarTrd {
                width: 29px;
                height: 29px;
                margin-top: -2px;
            }
        </style>

        <script src="estilos/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="estilos/js/bootstrap.min.js" type="text/javascript"></script>
        <script language="JavaScript">
            var contentMainFrame;
            function cerrar_session() {
                if (confirm('Est\xe1 seguro de Cerrar Sesion ?')) {
                    fecha = <?= date("Ymdhms") ?>;
                    <?php $fechah = date("Ymdhms") ?>
                    nombreventana = "ventanaBorrar" + fecha;
                    url = "login.php?adios=chao";
                    document.form_cerrar.submit();
                }
            }

            function cambContrasena() {

                var opcion = confirm("¿Está seguro de cambiar la contraseña?");
                if(opcion == true)
                {
                    url = 'contraxx.php?<?= session_name() . "=" . session_id() . "&fechah=$fechah" ?>';
                    document.form_cerrar.action = url;
                    document.form_cerrar.submit();
                }
            }

            function frameLoad() {
                //Cargo el conenido del frame principal cada que este cambia
                contentMainFrame = document.getElementById('mainFrame').contentWindow;
                atributesMainFrame = document.getElementById('mainFrame').contentDocument;

                var chkRows = atributesMainFrame.getElementsByClassName('chkrow');
                var check = document.getElementById("mainFrame").contentWindow;
                var menu = document.getElementById('bottomMenu');

                if (check.visible === true) {
                    menu.style.visibility = 'visible';
                    /***
                    Skinatech
                    Autor: Andrés Mosquera
                    Fecha: 06-11-2018
                    Información: Se agrega display: block para mostrar la barra flotante de transacciones
                    ***/
                    menu.style.display = 'block';

                    if (check.archivarPerm === true) {
                        document.getElementById('archivarPerm').style.visibility = 'visible';
                    }
                    if (check.NRRPerm === true) {
                        document.getElementById('NRR').style.visibility = 'visible';
                    }
                    if (check.VOBOPerm === true) {
                        document.getElementById('VOBO').style.visibility = 'visible';
                    }
                } else {
                    menu.style.visibility = 'hidden';
                    /***
                    Skinatech
                    Autor: Andrés Mosquera
                    Fecha: 06-11-2018
                    Información: Se agrega display: none para ocultar la barra flotante de transacciones
                    ***/
                    menu.style.display = 'none';

                }

                for (var i = 0; i < chkRows.length; i++) {
                    chkRows[i].addEventListener("click", function () {
                        var oneCheck = 0;
                        for (var i = 0; i < chkRows.length; i++) {
                            if (chkRows[i].checked) {
                                oneCheck = oneCheck + 1;
                                menu.classList.add("upBot");
                                break;
                            }
                        }
                        if (oneCheck == 0) {
                            menu.classList.remove("upBot");
                        }
                    });
                }
            }

            function topMenuLoad() {
                var leftMenu = document.getElementById("leftFrame").contentDocument;

                var tag = leftMenu.getElementsByClassName("me01");
                var tag2 = leftMenu.getElementsByClassName("me02");
                var tag3 = leftMenu.getElementsByClassName("menu3");
                var ul = document.getElementById("submenu");
                var ul2 = document.getElementById("submenu2");
                var ul3 = document.getElementById("submenu3");
                var subli = document.createElement("li");
                ul3.appendChild(subli);

                var aCarp = document.createElement("a");
                aCarp = leftMenu.getElementById("submenu3item");
                subli.appendChild(aCarp);

                var ulCarp = document.createElement("ul");
                ulCarp.className = "red";
                ulCarp.id = "submenusub";
                subli.appendChild(ulCarp);

                var liCarpUl2 = document.createElement("li");
                var aCarpUl2 = document.createElement("a");
                aCarpUl2 = leftMenu.getElementById("itemNuevaCarp");
                liCarpUl2.appendChild(aCarpUl2);
                ulCarp.appendChild(liCarpUl2);

                var itemsSubmenu3 = leftMenu.getElementsByClassName('itemsSubmenu3');
                for (key in itemsSubmenu3) {

                    if (itemsSubmenu3.length != 0) {
                        var lii = document.createElement("li");
                        lii.appendChild(itemsSubmenu3[0]);
                        ulCarp.appendChild(lii);
                        //console.log(lii);
                    }
                }

                var itemsSubmenu3parte = leftMenu.getElementsByClassName('itemsSubmenu3parte');
                for (key in itemsSubmenu3parte) {

                    if (itemsSubmenu3parte.length != 0) {
                        var lii = document.createElement("li");
                        lii.appendChild(itemsSubmenu3parte[0]);
                        ulCarp.appendChild(lii);
                        //console.log(itemsSubmenu3parte[0]);
                    }
                }

                var itemsSubmenu3segunda = leftMenu.getElementsByClassName('itemsSubmenu3segunda');
                for (key in itemsSubmenu3segunda) {

                    if (itemsSubmenu3segunda.length != 0) {
                        var lii = document.createElement("li");
                        lii.appendChild(itemsSubmenu3segunda[0]);
                        ulCarp.appendChild(lii);
                        //console.log(itemsSubmenu3segunda[0]);
                    }
                }
                /***
                Skinatech
                Autor: Andrés Mosquera
                Fecha: 20-11-2018
                Información: Forma en la que se carga el sub menú del menú, radicación y carpetas
                ***/
                
                var arr = Array.prototype.slice.call(tag);
                $(tag).each(function(index, el) {
                    $('#submenu').append('<li>', el);
                });

        
                var arr = Array.prototype.slice.call(tag2);
                $(tag2).each(function(index, el) {
                    $('#submenu2').append('<li>', el);
                });

                $('#submenu3').append('<li class="submenu3New"></li>');
                var arr = Array.prototype.slice.call(tag3);
                $(tag3).each(function(index, el) {
                    $('#submenu3 .submenu3New').append('<li>', el);
                });
            }

            function modalinfo() {
                <?php if ($_SESSION["countusuario"] == '1') { ?>
                            $("#myModalconfitmacion").modal("show");
                <?php } else { ?>
                            $("#myModalconfitmacion").modal("hide");
                <?php } ?>
            }
        </script>

    </head>
    <body  style="overflow: hidden;" onload="modalinfo()" id="page-top">
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index_frames.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">DOCALDIA</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                Herramientas
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item" id="">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMenu" aria-expanded="true" aria-controls="collapseMenu">
                    <i class="fas fa-fw fa-cog">
                    </i>
                    <span>Men&uacute;</span>
                </a>    
                <div id="collapseMenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" >
                    <div class="bg-white py-2 collapse-inner rounded" id="submenu">
                    </div>
                </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item" id="">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRadicacion" aria-expanded="true" aria-controls="collapseRadicacion">
                    <i class="bi bi-file-earmark-check-fill"></i>
                    </i>
                    <span>Radicaci&oacute;n</span>
                </a>    
                <div id="collapseRadicacion" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" >
                    <div class="bg-white py-2 collapse-inner rounded" id="submenu2">
                    </div>
                </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item" id="">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCarpetas" aria-expanded="true" aria-controls="collapseCarpetas">
                        <i class="bi bi-folder-fill"></i>
                    <span>Carpetas</span>
                </a>    
                <div id="collapseCarpetas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" >
                    <div class="bg-white py-2 collapse-inner rounded" id="submenu3">
                    </div>
                </div>
                </li>
                
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item" id="">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComplementos" aria-expanded="true" aria-controls="collapseComplementos">
                        <i class="bi bi-folder-fill"></i>
                    <span>Complementos</span>
                </a>    
                <div id="collapseComplementos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" >
                    <div class="bg-white py-2 collapse-inner rounded">
                    <form name=form_cerrar action=cerrar_session.php?<?= session_name() . "=" . session_id() . "&fechah=$fechah" ?> target=_parent method=post>
                            <!-- <li><a href="#" onclick="document.getElementById('mainFrame').contentWindow.showSearchTable();"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a><p>Buscar</p></li> -->
                                <a class="collapse-item" href="quixplorer.php" target="Ayuda_Orfeo" >
                                    <i class="bi bi-question-circle-fill"></i>
                                    <span>Ayuda</span>
                                </a>
                                <a class="collapse-item" href="menu/creditos.php?<?= session_name() . "=" . session_id() . "&fechah=$fechah&krd=$krd&info=false" ?>" target="mainFrame" >
                                    <i class="bi bi-lightbulb-fill"></i>
                                    <span>Créditos</span>
                                </a>
                                <a class="collapse-item" href="./estadisticas/vistaFormConsulta.php?<?= session_name() . "=" . trim(session_id()) . "&fechah=$fechah" ?>" target="mainFrame" >
                                    <i class="bi bi-bar-chart-fill"></i>
                                    <span>Reportes</span>
                                </a>
                            </form>
                    </div>
                </div>
                </li>

                 

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['usua_nomb'] ?><p class="fixed-p"><?= $_SESSION['depe_nomb'] ?></p></span>                                    
                                    <img class="img-profile rounded-circle"
                                        src="estilos/docaldia_imagen/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="mod_datos.php?<?= session_name() . "=" . session_id() . "&fechah=$fechah&krd=$krd&info=false" ?>" target="mainFrame">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Informaci&oacute;n
                                    </a>
                                    <?php
                                        if ($autenticaPorLDAP == 0) {
                                    ?>
                                        <a class="dropdown-item" href="javascript:cambContrasena()">
                                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                            <span>Contrase&ntilde;a</span>
                                        </a>
                                    <?php
                                        }
                                    ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400" onClick="cerrar_session();"></i>
                                        Cerrar Sesi&oacute;n
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <div class="container-fluid">
                        <!-- CONTENIDO ATRAIDO -->
                        <iframe id='leftFrame' name="leftFrame" src='correspondencia.php?<?= session_name() . "=" . session_id() ?>&fechah=<?= $fechah ?>' style="visibility: hidden; position: absolute;" onload="topMenuLoad(this)" ></iframe>
                        <iframe class="iframeclass" id='mainFrame' name="mainFrame" src='cuerpo.php?<?= session_name() . "=" . session_id() ?>&swLog=<?= $swLog ?>&fechah=<?= $fechah ?>&tipo_alerta=1&nomcarpeta=Entrada' frameborder="0" onload="frameLoad(this)"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Sidebar -->
        
        
        <?php include ('manejoinformacion.php'); ?>

         
        
        <!-- Menu despegable -->
        <div id="bottomMenu" class="bot" style="visibility: hidden;">
            <nav>
                <ul>
                    <li>
                        <a href="#" onclick="contentMainFrame.changedepesel(10);contentMainFrame.seleccionBarra = 10;"><span data-toggle="tooltip" data-placement="top" title="Mover A" class="glyphicon glyphicon-play"></span></a>
                    </li>
                    <li>
                        <a href="#" onclick="contentMainFrame.changedepesel(9);contentMainFrame.seleccionBarra = 9;"><span data-toggle="tooltip" data-placement="top" title="Reasignar" class="glyphicon glyphicon-log-in"></span></a>
                    </li>
                    <li>
                        <a href="#" onclick="contentMainFrame.changedepesel(8);contentMainFrame.seleccionBarra = 8;"><span data-toggle="tooltip" data-placement="top" title="Informar" class="glyphicon glyphicon-exclamation-sign"></span></a>
                    </li>
                    <li>
                        <a href="#" onclick="contentMainFrame.changedepesel(12);contentMainFrame.seleccionBarra = 12;"><span data-toggle="tooltip" data-placement="top" title="Devolver" class="glyphicon glyphicon-new-window"></span></a>
                    </li>
                    <li>
                        <a href="#" id="VOBO"><span  data-toggle="tooltip" data-placement="top" title="Visto Bueno" onclick="contentMainFrame.vistoBueno();contentMainFrame.seleccionBarra = 14;" class="glyphicon glyphicon-ok-sign "></span></a>
                    </li>
                    <li>
                        <a href="#" onclick="contentMainFrame.changedepesel(62);contentMainFrame.seleccionBarra = 62;"><span data-toggle="tooltip" data-placement="top" title="Incluir en expediente" class="glyphicon glyphicon-log-out"></span></a>
                    </li>
                    <li>
                        <a href="#" id="archivarPerm" style="visibility: hidden" onclick="contentMainFrame.changedepesel(13);contentMainFrame.seleccionBarra = 13;"><span data-toggle="tooltip" data-placement="top" title="Archivar" class="glyphicon glyphicon-folder-open"></span></a>
                    </li>
                    <li>
                        <a href="#" id="NRR" >
                            <span data-toggle="tooltip" data-placement="top" title="No requiere respuesta" onclick="contentMainFrame.changedepesel(16);contentMainFrame.seleccionBarra = 16;">
                                <img id="img_nrr" src="estilos/orfeo50/imagenes50/propuesta_3_nrr.png" alt="No requiere respuesta"/>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="contentMainFrame.showCalendarTable();"><span data-toggle="tooltip" data-placement="top" title="Calendario" class="glyphicon glyphicon-calendar"></span></a>
                    </li>
                </ul>
            </nav>
        </div>

        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
                if(bowser.firefox){
                    $("#img_nrr").css({"width": "29px", "height": "29px"});
                }else{
                    $("#img_nrr").css({"width": "29px", "height": "29px", "margin-top" : "-30px"});
                }

            });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bowser/1.9.4/bowser.min.js"></script>
            



        <!-- Pie de Free bootstrap -->

         <!-- Bootstrap core JavaScript-->
        <script src="estilos/vendor/jquery/jquery.min.js"></script>
        <script src="estilos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="estilos/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="estilos/js2/sb-admin-2.min.js"></script>
        
        <!-- datatables JS -->
        <script type="text/javascript" src="estilos/vendor/datatables/datatables.min.js"></script>    
        <!-- código propio JS --> 
        <script type="text/javascript" src="estilos/main.js"></script>  

    </body>
</html>
