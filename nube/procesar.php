<?php
session_start();
include_once 'conexion.php';
if(isset($_POST["enviar"])) 
{
    $usuario = $_POST["usuario"];
    $clave = password_hash ($_POST["clave"],PASSWORD_BCRYPT);

    if($_POST["enviar"] == "Entrar"){
        //buscar la fila en la base de datos
        $sqlBuscarUsuario ="SELECT clave FROM usuarios where usuario = '$usuario'";
        $resultado = mysqli_query($conn, $sqlBuscarUsuario);
        $row = mysqli_fetch_assoc($resultado);
        if (!$resultado){
            echo mysqli_error($conn);
        }
        if (mysqli_num_rows($resultado) == 1 and password_verify($_POST['clave'], $row['clave'])) {
            //El usuario existe
            //Registro correcto
            //Crear variables de sesion con usuario
            //Redirigir al contenido
            $_SESSION['usuario'] = $usuario;
            header("Location: espacio.php");
        }
        else{

            echo "Usuario y/o clave incorrecta.";
        }
    }
    elseif ($_POST["enviar"] == "Registrarse"){
        $usuario = $_POST["usuarior"];
        $clave = password_hash ($_POST["claver"],PASSWORD_BCRYPT);

        // 1 comprobar que el usuario no exista
        $sqlBuscarUsuario = "SELECT usuario FROM usuarios where usuario = '$usuario'";
        $resultado = mysqli_query($conn, $sqlBuscarUsuario);
        if (!$resultado){
            echo mysqli_error($conn);
        }
        if (mysqli_num_rows($resultado) == 1 ) {
            echo "El usuario ya existe.";
        }
        // 2 Si no existe,insertar fila
        else {
            $insert = "INSERT into usuarios (usuario,clave) values ('$usuario','$clave')";
            if (mysqli_query($conn, $insert)) {
                echo "Se ha creado el usuario con éxito.";
                mkdir("./almacen/".$usuario);
            } else {
                echo "Error: " . $insert . "<br>" . mysqli_error($conn);
            }
        }
    }
}
?>
