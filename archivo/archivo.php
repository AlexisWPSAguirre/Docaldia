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

        /*---------------------------------------------------------+
        |                     INCLUDES                             |
        +---------------------------------------------------------*/


        /*---------------------------------------------------------+
        |                    DEFINICIONES                          |
        +---------------------------------------------------------*/
session_start();
error_reporting(7);
$url_raiz="..";
$dir_raiz=$_SESSION['dir_raiz'];
$ESTILOS_PATH2 =$_SESSION['ESTILOS_PATH2'];

        /*---------------------------------------------------------+
        |                       MAIN                               |
        +---------------------------------------------------------*/


/**
 * Administrador de Archivos
 * Sistema de gestion Documental ORFEO.
 *
 * Permite la administracion del archivo de gestion, central y edificios
 * 
 */
if (!isset($_SESSION['dependencia']))
    include "$dir_raiz/rec_session.php";

require_once("$dir_raiz/include/db/ConnectionHandler.php");
$db = new ConnectionHandler($dir_raiz);

foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;
$krd = $_SESSION["krd"];
$usua_perm_archi = $_SESSION["usua_admin_archivo"];
$encabezadol = "$PHP_SELF?" . session_name() . "=" . session_id() . "&num_exp=$num_exp&krd=$krd";
?>
<html height=50,width=150>
    <head>
        <title>Menu Archivo</title>
        <!-- <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>"> -->
        

        <!-- Custom fonts for this template-->
        <link href="../estilos/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../estilos/css/sb-admin-2.css" rel="stylesheet">

        <!--datables CSS básico-->
        <link rel="stylesheet" type="text/css" href="../estilos/vendor/datatables/datatables.min.css"/>
        <!--datables estilo bootstrap 4 CSS--> 
        <link rel="stylesheet"  type="text/css" href="../estilos/vendor/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">      
        <!-- ICONS BOOTSTRAP -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> 

        <body bgcolor="#FFFFFF">
        <link rel="stylesheet" type="text/css" href="../js/spiffyCal/spiffyCal_v2_1.css">
        <script language="JavaScript" src="../js/spiffyCal/spiffyCal_v2_1.js">
        </script>

        <div class="card shadow mb-4">
        <form name=from1 action="<?= $encabezadol ?>" method='post' action='archivo.php?<?= session_name() ?>=<?= trim(session_id()) ?>&krd=<?= $krd ?>&<?= "&num_exp=$num_exp" ?>'>
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 id="titulo" class="m-0 font-weight-bold text-primary">Men&uacute; de Archivo</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <a href='../expediente/cuerpo_exp.php?<?= $phpsession ?>&krd=<?= $krd ?>&<?= "fechaf=$fechah&carpeta=8&nomcarpeta=Expedientes&orno=1&adodb_next_page=1"; ?>' target='mainFrame'>1. Busqueda Basica(Archivar) </a>
                <a href='../archivo/busqueda_archivo.php?<?= session_name() . "=" . session_id() . "&dep_sel=$dep_sel&krd=$krd&fechah=$fechah&$orno&adodb_next_page&nomcarpeta&tipo_archivo=$tipo_archivo&carpeta" ?>' target='mainFrame'>2. Busqueda Avanzada </a>
                <a  href='reporte_archivo.php?<?= session_name() . "=" . session_id() . "&krd=$krd&adodb_next_page&nomcarpeta&fechah=$fechah&$orno&carpeta&tipo=1'" ?>' target='mainFrame'>3. Reporte por Radicados Archivados</a>
                <a href='alerta.php?<?= session_name() . "=" . session_id() . "&krd=$krd&fechah=$fechah&$orno&adodb_next_page" ?>' target='mainFrame'>4.Transferencias documentales (Expedientes)</a>
                <?
                    if ($usua_perm_archi == 2) {
                        ?>
                        <a href='../archivo/adminEdificio.php?<?= session_name() . "=" . session_id() . "&krd=$krd&fechah=$fechah&$orno&adodb_next_page" ?>' target='mainFrame'>5.Administracion de Edificios</a>
                <? } ?>
            </div>
        </form>
        </div>  
        <div id="spiffycalendar" class="text"></div>           
</html>
