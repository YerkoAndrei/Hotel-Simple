<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>css/estilo.css">
	<meta charset="utf-8">
	<title>Administración</title>
<body>
<center>
<div style="float:left">
<h3>Guía</h3>
	<table border=3>
		<tr>
			<td><b>Pago</b></td>
			<td>sin_pagar</td>
			<td>pagada</td>
			<td>terminada</td>
		</tr>
		<tr>
			<td><b>Habitación</b></td>
			<td>disponible</td>
			<td>en_espera</td>
			<td>por_confirmar</td>
			<td>ocupada</td>
		</tr>
	</table>
</div>
	<div>
	<form id="super" action="<?= base_url() ?>administracion_c/buscar">
		<button style="height:100px; width: 200px; font-size:xx-large">Actualizar</button>
	</form>
	<a href="<?= base_url() ?>login/cerrar"><button>Cerrar Sesión</button></a>
	</div> 	
</center>
</body>
</html>