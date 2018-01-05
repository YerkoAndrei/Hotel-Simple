<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>css/estilo.css">
	<title>Pagos</title>
</head>
<body>
<center>
	<div class="header">Bienvenido <?= $this->session->userdata('nombreCompleto')?>
		<div style=" float:left;margin-left: 10px; color:white;">
		<?= $this->session->userdata('error') ?></div>
	</div>

	<?php
		foreach ($reservas as $res)
		{
			foreach ($habitaciones as $hab) 
			{
				if($hab->id_habitacion == $res->id_habitacion)
				{
					if($res->estado == 'sin_pagar')
						$enabled = '';
					else
						$enabled = 'disabled';
	?>

<form action="<?= base_url() ?>pago_c/pagar" method="post">
	<?php
		$total = $hab->precio * $res->duracion;
	?>
	<input type="hidden" name="id_reserva" value="<?= $res->id_reserva?>">
	<input type="hidden" name="total" value="<?= $total?>">
	<input type="hidden" name="id_habitacion" value="<?= $hab->id_habitacion?>">
	<input type="hidden" name="duracion" value="<?= $res->duracion?>">

		<div class="habitaciones" style="height: 100%;">
			<table>
				<tr>
					<td><b>Id:</b></td>
					<td><?= $res->id_reserva?></td>
				</tr>
				<tr>
					<td><b>Reservado:</b></td>
					<td><?= $res->fecha_pedido?></td>
				</tr>
				<tr>
					<td><b>Para:</b></td>
					<td><?= $res->fecha_reserva?></td>
				</tr>
				<tr>
					<td><b>Duración:</b></td>
					<td><?= $res->duracion?> Días</td>
				</tr>
				<tr>
					<td><b>Habitación:</b></td>
					<td><?= $hab->numero?></td>
				</tr>
				<tr>
					<td><b>Tipo:</b></td>
					<td><?= $hab->tipo?></td>
				</tr>
				<tr>
					<td><b>Estado:</b></td>
					<td><?= $res->estado?></td>
				</tr>
				<tr>
					<td><b>Total:</b></td>
					<td><?= $total?></td>
				</tr>
				<tr>
					<td>
					<button name="accion" value="cancelar" <?= $enabled ?> style="font-size: xx-large ;height: 50px;">
					Cancelar</button>
					</td>
					<td>
					<button name="accion" value="pagar" <?= $enabled ?> style="font-size: xx-large ;height: 50px;">
					Pagar</button>
					</td>
				</tr>
			</table>
		</div>
	</form>
	<?php 
			}
		}
	}
	?>
	<a href="<?= base_url() ?>login"><button>Volver</button></a>
</center>
</body>
</html>