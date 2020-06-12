<?php 
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
}
else{
    header("Location: error.php");
}
$fichero = $_GET['fichero'];
unlink("./almacen/$usuario/$fichero");
header("Location: espacio.php");
?>
