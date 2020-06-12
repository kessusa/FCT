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
$libre=$espacio-$ocupado;
if (is_uploaded_file($_FILES['fichero']['tmp_name'])) {
    $fTemporal=$_FILES['fichero']['tmp_name'];
    $ficheroes=filesize($fTemporal)/1024;
    echo "El fichero ocupa $ficheroes kb ";
    if(filesize($fTemporal)/1024 <$libre){
        copy($fTemporal, "./almacen/" . $usuario . "/" . $_FILES['fichero']['name']);
        header("Location:espacio.php");
}
   else{
      echo " No tienes suficiente espacio para subir este fichero";
   }
}
?>
