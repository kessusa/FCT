<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="estilo2.css">
</head>
<body >
 <form action="procesar.php" method="post">
  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Entrar</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrarse</label>
		<div class="login-form"> 
                     
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Usuario</label>
					<input type="text"  name="usuario">
				</div>
				<div class="group">
					<label for="pass" class="label">Clave</label>
					<input  type="password" data-type="password" name="clave">
				</div>
				<div class="group">
					<input type="submit" name="enviar" value="Entrar">
				</div>
				<div class="hr"></div>
			</div>
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Usuario</label>
					<input  type="text"  name="usuarior">
				</div>
				<div class="group">
					<label for="pass" class="label">Clave</label>
					<input  type="password"  data-type="password" name="claver" >
				</div>
				<div class="group">
					<input type="submit" name="enviar" value="Registrarse">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div>
		</div>
	</div>
</form>
</div>

</body>
</html>

