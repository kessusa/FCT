# FCT
Programación de un servidor web donde los usuarios podrán almacenar, visualizar y editar ficheros de manera privada.
Recordad que tendreis que crear un directorio almacen que será donde se guarden los archivos de los usuarios.
Es importante que a el directorio almacen,le cambiemos el usuario al que usa la aplicación para que pueda crear leer y escribir dentro del directorio, en mi caso es www-data que es el usuario que usa apache2.
En el fichero conexión tengo un ejemplo de como se rellenaría,pero tened en cuenta que el usuario que useis para la conexión debería tner solo privilegios para la o las bases de datos que necesite usar por motivos de seguridad y evidentemente la clave debería ser mejor.
