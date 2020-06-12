<?php
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $fichero=$_POST['fichero'];
    $contenido=$_POST['contenido'];
    
    $archivo=fopen("./almacen/$usuario/$fichero","w");
    fwrite($archivo,$contenido);
    fclose($archivo);
    
    header("Location:pagina1.php");
    
}
else{
    header("Location: error.php");
}
?>
