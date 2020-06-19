
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
	<form style="border:none" action="guardar.php" method="post">
	<textarea name="contenido" rows="10" cols="100" style="width: 100%">
	<?php 
	$fichero=$_GET['fichero'];
	$archivo=fopen("./almacen/$usuario/$fichero", "r");
	while (!feof($archivo)){
	    $linea = fgets($archivo);
	    echo $linea ;
	}
	fclose($archivo);
	?>
	</textarea>
	<input type="submit" value="Guardar">
  	<input type="hidden" name="fichero" value='<?php echo $fichero?>'>
	</form>
</body>
</html>

