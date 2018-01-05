<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>css/estilo.css">
		<meta charset="utf-8">
	<title>Usuario</title>
<body>
<center>
	<div class="header">Bienvenido <?= $this->session->userdata('nombreCompleto')?>
		<div style=" float:left;margin-left: 10px; color:white;">
		<?= $this->session->userdata('error') ?></div>
	</div>

	<h2>Revisa tu Cuenta</h2>
	<form action="<?= base_url() ?>vistasReservas/buscar" method="post">
	<button class="habitaciones">Tus<br>Reservas</button></form>

	<form action="<?= base_url() ?>mostrar_c/mod" method="post">
	<button class="habitaciones">Tu<br>Cuenta</button></form>
    	
	<h2>Reserva una Habitación</h2>
	<form action="<?= base_url() ?>mostrar_c/buscar" method="post">
		<input type="hidden" name="tipo" value="normal">
		<button class="habitaciones">Habitaciones<br>Normales</button></form>

	<form action="<?= base_url() ?>mostrar_c/buscar" method="post">
		<input type="hidden" name="tipo" value="gold">
		<button class="habitaciones">Habitaciones<br>Gold</button></form>

	<form action="<?= base_url() ?>mostrar_c/buscar" method="post">
		<input type="hidden" name="tipo" value="vip">
		<button class="habitaciones">Habitaciones<br>VIP</button></form>

	<form action="<?= base_url() ?>mostrar_c/buscar" method="post">
		<input type="hidden" name="tipo" value="lujo">
		<button class="habitaciones">Habitaciones<br>de Lujo</button></form>

	<a href="<?= base_url() ?>login/cerrar"><button>Cerrar Sesión</button></a>
</center>
</body>
</html>