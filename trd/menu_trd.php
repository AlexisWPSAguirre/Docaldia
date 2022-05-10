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

/*
 * Lista Subseries documentales
 * @autor Jairo Losada
 * @fecha 2009/06 Modificacion Variables Globales.
 */
foreach ($_GET as $key => $valor)
    ${$key} = $valor;
foreach ($_POST as $key => $valor)
    ${$key} = $valor;
$krd = $_SESSION["krd"];
$dependencia = $_SESSION["dependencia"];
$usua_doc = $_SESSION["usua_doc"];
$codusuario = $_SESSION["codusuario"];
$usua_perm_trd = $_SESSION["usua_perm_trd"];

require_once("$dir_raiz/include/db/ConnectionHandler.php");
//Si no llega la dependencia recupera la sesi�n
if (!$_SESSION['dependencia']) {
    include "$dir_raiz/rec_session.php";
}
if (!$db)
    $db = new ConnectionHandler($dir_raiz);

$phpsession = session_name() . "=" . session_id();

?>

<html>
    <head>
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
    </head>
    <body topmargin="0" onLoad="window_onload();">
        <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 id="titulo" class="m-0 font-weight-bold text-primary">Administraci&oacute;n - Tablas de retenci&oacute;n documental</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <a href='../trd/admin_tipodoc.php?<?= $phpsession ?>&krd=<?= $krd ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah"; ?>' target='mainFrame'>Tipos documentales </a>
                                    <a href='../trd/admin_series.php?<?= $phpsession ?>&krd=<?= $krd ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah"; ?>' target='mainFrame'>Series </a>
                                    <a href='../trd/admin_subseries.php?<?= $phpsession ?>&krd=<?= $krd ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah"; ?>' target='mainFrame'>Subseries </a>
                                    <a href='../trd/cuerpoMatriTRD.php?<?= $phpsession ?>&krd=<?= $krd ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah"; ?>' target='mainFrame'>Matriz relaci&oacute;n </a>
                                    <a href='../trd/procModTrdArea.php?<?= $phpsession ?>&krd=<?= $krd ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah"; ?>' target='mainFrame'>Asignaci&oacute;n TRD &Aacute;rea </a>
                                    <a href='../trd/informe_trd.php?<?= $phpsession ?>&krd=<?= $krd ?>&krd=<?= $krd ?>&<? echo "fechah=$fechah"; ?>' target='mainFrame'>Listado tablas de retenci&oacute;n documental </a>
                                </div>
        </div>
            <?php
            if ($usua_perm_trd == 2) {
                ?>
                <tr> 
                    <td>
                        
                    </td>
                </tr>
                <tr> 
                    <td > 
                        
                </tr>
                <tr> 
                    <td> 
                        
                </tr>
                <tr> 
                    <td > 
                        
                    </td>
                </tr>
                <tr> 
                    <td>
                        
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr> 
                <td >
                    
                </td>
            </tr>  
            </tr>
        </table>
</body>
</html>
