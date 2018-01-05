<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?= base_url()?>css/estilo.css">
	<title>Configuración de usuario</title>
</head>
<body>
<center>
	<div class="header">Bienvenido <?= $this->session->userdata('nombreCompleto')?>
		<div style=" float:left;margin-left: 10px; color:white;">
		<?= $this->session->userdata('error') ?></div>
	</div>

	<form action="<?= base_url() ?>modificar_c/modificar" method="post">
	<div class="habitaciones" style="height:100%">
		<table>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre_mod" maxlength="50" value="<?= $this->session->userdata('nombre')?>"></td>
			</tr>
			<tr>
				<td>Apellidos</td>
				<td><input type="text" name="apellidos_mod" maxlength="100" value="<?= $this->session->userdata('apellidos')?>"></td>
			</tr>
			<tr>
				<td>Nueva Contraseña</td>
				<td><input type="password" name="pass_mod" maxlength="30" required min="3"></td>
			</tr>
			<tr>
				<td>Confirmar Nueva Contraseña</td>
				<td><input type="password" name="pass_mod2" maxlength="30" required min="3"></td>
			</tr>
			<tr>
				<td>Vincular Tarjeta de Credito</td>
				<td><input type="number" name="tarjeta_mod" maxlength="30" value="<?= $this->session->userdata('tareta')?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><button>Cambiar Datos</button></td>
			</tr>
		</table>
		<p>Cierre sesión para actualizar</p>
	</div>
	</form>
	<a href="<?= base_url() ?>login"><button>Volver</button></a>
</center>
</body>
</html>