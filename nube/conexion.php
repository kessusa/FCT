<?php
// Create connection
$conn = mysqli_connect("localhost","root","root","registrados");
// Check connection
if (!$conn) {
    die("Conexión fallida " . mysqli_connect_error());
}
$sql = "SELECT id,usuario,clave  FROM usuarios";
$result = mysqli_query($conn, $sql);

// Si ponemos mal algún dato esto nos indicará el error
if(!$result){
    echo mysqli_error($conn);
}
?>
