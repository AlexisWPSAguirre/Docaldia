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


   $krdOld = $krd;
   if(!$krd) $krd=$krdOsld;
   if(!$_SESSION['dependencia'] or !$_SESSION['tpDepeRad']) include "$dir_raiz/rec_session.php";
   if(!$carpeta) {
      $carpeta = $carpetaOld;
      $tipo_carp = $tipoCarpOld;
   }
   $verrad = "";
   include_once "$dir_raiz/include/db/ConnectionHandler.php";
   $db = new ConnectionHandler($dir_raiz);	 
/*********************************************************************************
 *       Filename: menu_prestamo.php
 *       Modificado: 
 *          1/3/2006  IIAC  Men� del m�dulo de pr�stamos. Carga e inicializa los
 *                          formularios.  
 *********************************************************************************/
   // prestamo CustomIncludes begin
   include ("common.php");   
   // Save Page and File Name available into variables
   $sFileName = "menu_prestamo.php";
   // Variables de control   
   $opcionMenu=strip(get_param("opcionMenu")); 
?>
<html>
<head>
   <title>Archivo - Manejo de prestamos y devoluciones</title>
         <!-- <link href="<?= $url_raiz . $ESTILOS_PATH2 ?>bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= $url_raiz . $_SESSION['ESTILOS_PATH_ORFEO'] ?>">  -->

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
<body class="PageBODY">
   <div class="card shadow mb-4">
      <form method="post" action="prestamo.php" name="menu">
         <input type="hidden" name="opcionMenu" value="1">      
         <input type="hidden" name="sFileName" value="<?=$sFileName?>"> 
         <input type="hidden"  value='<?=$krd?>' name="krd">
         <input type="hidden" value=" " name="radicado">  	          
         <script>
               // Inicializa la opcion seleccionada
               function seleccionar(i) {
                  document.menu.opcionMenu.value=i;
                  document.menu.submit();
            }
            var opcionM='<?=$opcionMenu?>';
            if(opcionM!=""){ seleccionar(opcionM); }
         </script>
         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 id="titulo" class="m-0 font-weight-bold text-primary">Prestamo y Control de Documentos</h6>
         </div>
         <div class="card-body">
               <a class="vinculos" href="javascript:seleccionar(1);">Prestamo de documentos</a>
               <a class="vinculos" href="javascript:seleccionar(2);">Devoluci&oacute;n de documentos</a>
               <a class="vinculos" href="javascript:seleccionar(0);">Generaci&oacute;n de reportes</a>
               <a class="vinculos" href="javascript:seleccionar(3);">Cancelar solicitudes</a>
         </div>
      </form>
   </div>  
</body>
</html>
