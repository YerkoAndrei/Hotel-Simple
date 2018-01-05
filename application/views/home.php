<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>css/estilo.css">
	<script src="<?= base_url()?>css/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#ingreso").hide();
            $("#registro").hide();
            var ing = 0;
            var reg = 0;
            $("#ing").click(
            	function () {
            	if(ing === 0){
                	$("#ingreso").fadeIn(100);
                	ing = 1;
            	}
            	else{
                	$("#ingreso").hide(100);
                	ing = 0;
            	}
            });
            $("#reg").click(
            	function () {
            	if(reg === 0){
                	$("#registro").fadeIn(100);
                	reg = 1;
            	}
            	else{
                	$("#registro").hide(100);
                	reg = 0;
            	}
            });
        });
    </script>
	<meta charset="utf-8">
	<title>Inicio</title>
<body>
	<div class="header" style="position: fixed;">
		<div style=" float:left;margin-left: 10px; color:white;"><?php echo $this->session->userdata('error'); ?></div>
		<div id="reg" class="head">Registrar</div>
		<div id="ing" class="head">Ingresar</div>
	</div>
	<div id="logo"></div>

    <center>
	<div>
	<div id="ingreso" class="login">
	<form action="<?= base_url() ?>login/validar" method='post'>
		<h3>Ingreso</h3>
		<table>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" placeholder="Ingrese su e-mail" required="true"></td>
			</tr>
			<tr>
				<td>Contraseña</td>
				<td><input type="password" name="pass" placeholder="Ingrese su Contraseña" required="true"></td>
			</tr>
			<tr>
				<td></td>
				<td><button>Ingresar</button></td>
			</tr>
		</table>
	</form>
	</div>

	<div id="registro" class="login">
	<form action="<?= base_url() ?>login/registrar" method='post'>
		<h3>Registro</h3>
		<table>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" placeholder="Ingrese su e-mail" maxlength="50" required="true"></td>
			</tr>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre" placeholder="Ingrese su Nombre" maxlength="30" required="true"></td>
			</tr>
			<tr>
				<td>Apellidos</td>
				<td><input type="text" name="apellidos" placeholder="Ingrese sus Apellidos" maxlength="100" required="true"></td>
			</tr>
			<tr>
				<td>Contraseña</td>
				<td><input type="password" name="pass" placeholder="Ingrese su Contraseña" maxlength="30" required="true" min="3"></td>
			</tr>
			<tr>
				<td>Confirme Contraseña</td>
				<td><input type="password" name="pass2" placeholder="Confirme su Contraseña" maxlength="30" 
				min="3"></td>
			</tr>
			<tr>
				<td></td>
				<td><button>Registrar</button></td>
			</tr>
		</table>
	</form>
	</div>
	</div>
	
    </center>
</body>
</html>