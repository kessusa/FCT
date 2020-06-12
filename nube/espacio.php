<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: error.php");
}
else{
    $usuario = $_SESSION['usuario'];
}
$espacio=500;
$directorio = opendir("./almacen/$usuario");
$ocupado=0;
while (($nombre_archivo = readdir($directorio)) != FALSE) {
    if ($nombre_archivo != "." and $nombre_archivo != "..") {
          
              $ocupado=$ocupado +filesize("./almacen/$usuario/$nombre_archivo") / 1024 ;
                
    } 
}
closedir($directorio);
if($espacio>=$ocupado){
header("Location: pagina1.php");
}
else{
header("Location:pagina2.php");
}
?>
