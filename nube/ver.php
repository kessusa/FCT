
<?php 
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
}
else{
    header("Location: error.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilos1.css">
</head>
<body>
<?php 
$fichero=$_GET['fichero'];
$archivo=fopen("./almacen/$usuario/$fichero", "r");
while (!feof($archivo)){
            $linea = fgets($archivo);
	     echo $linea ."<br>";
	}
	fclose($archivo);
        echo "<a href='espacio.php'>Volver</a>";
	?>
</body>
</html>

