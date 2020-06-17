<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: error.php");
}
else{
    $usuario = $_SESSION['usuario'];
}
if(!isset($_GET['fichero']) || empty($_GET['fichero'])){
     header("Location: error.php");
}
$fichero= basename($_GET['fichero']);
$ruta= "almacen/$usuario/".$fichero;
if (is_file($ruta))
{
   header('Content-Type: application/force-download');
   header('Content-Disposition:attachment; filename='.$fichero);
   header('Content-Transfer-Encoding:binary');
   header('Content-Length: '.filesize($ruta));

    readfile($ruta);

}
else
   exit();
?>
