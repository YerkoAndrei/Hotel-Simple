<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>css/estilo.css">
	<title>Habitaciones</title>
</head>
<body>
<center>
	<h1>Habitaciones tipo <?= $this->input->post('tipo')?></h1>
	<?php 
		foreach ($habitaciones as $hab) 
		{
			echo '<img style="width:290px; height:200px;" src="../img/';
			echo $hab->tipo;
			echo '.jpg"><p>*Piloto (Imagen referencial)</p>';
			break;
		}
		$mañana = date("Y/m/d", strtotime("tomorrow"));
		$dosDias =  date("Y/m/d", strtotime($mañana. ' + 1 days'));

		foreach ($habitaciones as $hab) 
		{
			if($hab->estado == 'disponible')
			{
	?>
	<form action="<?= base_url() ?>reservar_c/insertar" method="post">
	<input type="hidden" name="id_habitacion" value="<?= $hab->id_habitacion?>">
		<div class="habitaciones" style="height: 100%;">
			<table>
				<tr>
					<td><b>Numero:</b></td>
					<td><?= $hab->numero?></td>
				</tr>
				<tr>
					<td><b>Tipo: </b></td>
					<td><?= $hab->tipo?></td>
				</tr>
				<tr>
					<td><b>Precio:</b></td>
					<td><?= $hab->precio?></td>
				</tr>
				<tr>
					<td><b>Reservar para: </b></td>
					<td><input type="radio" name="fecha_reserva" value="<?= $mañana?>" checked>Mañana</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="radio" name="fecha_reserva" value="<?= $dosDias?>">Dos Días</td>
				</tr>
				<tr>
					<td><b>Duración: </b></td>
					<td><input type="radio" name="duracion" value="1" checked>1 Día</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="radio" name="duracion" value="2">2 Días</td>
				</tr>
				<tr>
					<td></td>
					<td><button style="font-size: xx-large ;height: 50px;">Reservar</button></td>
				</tr>
			</table>
		</div>
	</form>
	<?php
		}
	}
	?>
	<a href="<?= base_url() ?>login"><button>Volver</button></a>
</center>
</body>
</html>