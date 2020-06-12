<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: error.php");
}
else{
    $usuario = $_SESSION['usuario'];
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<?php
echo "<h1>Bienvenido a tu nube "  . $usuario ."</h1>";
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
echo "<table style='width: 100%'>";
echo"<tr><th>Usuario</th><th>Espacio contratado</th><th>Espacio Libre</th><th>Visor de Imágenes</th></tr>";
echo"<tr><td>$usuario</td><td>$espacio</td><td>$libre</td><td><a href='visorimagenes.php'>Ver fotos</a></td></tr>";
echo"</table>";
function archivo_ver($nombre_archivo) {
    if (substr("$nombre_archivo",-4) == ".txt" || substr("$nombre_archivo",-5) == ".html" || substr("$nombre_archivo",-4) == ".php"|| substr("$nombre_archivo",-3) == ".sh") {
        return "<a href= 'ver.php?fichero=$nombre_archivo'><img class='icono' src='imagenes/ojo.jpg'/></a>";
    }
}
function archivo_editar($nombre_archivo) {
    if (substr("$nombre_archivo",-4) == ".txt" || substr("$nombre_archivo",-5) == ".html" || substr("$nombre_archivo",-4) == ".php" || substr("$nombre_archivo",-3) == ".sh") {
        return "<a href= 'editar.php?fichero=$nombre_archivo'><img class='icono' src='imagenes/lapiz.png'/></a>";
    }
}
echo "<table style='width: 100%'>";
echo "<tr>";
echo "<th>Nombre archivo</th>";
echo "<th>Tamaño archivo</th>";
echo "<th>Ver</th>";
echo "<th>Editar</th>";
echo "<th>Borrar</th>";
echo "</tr>";
$directorio = opendir("./almacen/$usuario");
while (($nombre_archivo = readdir($directorio)) != FALSE) {
    if ($nombre_archivo != "." and $nombre_archivo != "..") {
            echo "<tr>";
                echo "<td>" . $nombre_archivo . "</td>";
                echo "<td>" . filesize("./almacen/$usuario/$nombre_archivo") / 1024 . " kb" . "</td>";
                echo "<td>"  . archivo_ver($nombre_archivo) . "</td>";
                echo "<td>"  . archivo_editar($nombre_archivo) . "</td>";
                echo "<td>" . "<a href= 'borrar.php?fichero=$nombre_archivo'><img class='icono' src='imagenes/papelera.png'/></a>"."</td>";
            echo "</tr>";
        
    } 
}
echo "</table>";
closedir($directorio);
?>
<form action="subirfichero.php" method="post" enctype="multipart/form-data">
    Selecciona archivo para subir:
    <input type="file" name="fichero">
    <input type="submit" value="Subir Archivo" name="submit">
</form>
</body>
</html>

