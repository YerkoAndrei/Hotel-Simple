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

	<div class="administracion" >
	<h1>Reservas</h1>
	<table border=1>
	<tr bgcolor= "#2EFE2E">
	<td>Id Reserva</td>
	<td>Email Usuario</td>
	<td>Fecha Pedido</td>
	<td>Fecha Reserva</td>
	<td>Duración</td>
	<td>Estado</td>
	<td>Id Habitacion</td>
	</tr>
	<?php
		foreach ($reservas as $res) {
			echo '<tr>';
			echo '<td>'.$res->id_reserva.'</td>';
			echo '<td>'.$res->email_usuario.'</td>';
			echo '<td>'.$res->fecha_pedido.'</td>';
			echo '<td>'.$res->fecha_reserva.'</td>';
			echo '<td>'.$res->duracion.'</td>';
			echo '<td>'.$res->estado.'</td>';
			echo '<td>'.$res->id_habitacion.'</td>';
			echo '</tr>';
		}
	?>
	</table>
	</div>

	<div class="administracion">
	<h1>Pagos</h1>
	<table border=1>
	<tr bgcolor= "#2EFE2E">
	<td>Id Pago</td>
	<td>Email Usuario</td>
	<td>Id Reserva</td>
	<td>Total</td>
	</tr>
	<?php
		foreach ($pagos as $pag) {
			echo '<tr>';
			echo '<td>'.$pag->id_pago.'</td>';
			echo '<td>'.$pag->email_usuario.'</td>';
			echo '<td>'.$pag->id_reserva.'</td>';
			echo '<td>'.$pag->total.'</td>';
			echo '</tr>';
		}
	?>
	</table>
	</div>

	<div class="administracion" style="float:right;">
	<h1>Habitaciones</h1>
	<table border=1>
	<tr bgcolor= "#2EFE2E">
	<td>Id Habitacion</td>
	<td>Numero</td>
	<td>Tipo</td>
	<td>Estado</td>
	<td>Precio</td>
	<td>Acción</td>
	</tr>
	<?php
		foreach ($habitaciones as $hab) {
			echo '<tr>';
			echo '<td>'.$hab->id_habitacion.'</td>';
			echo '<td>'.$hab->numero.'</td>';
			echo '<td>'.$hab->tipo.'</td>';
			echo '<td>'.$hab->estado.'</td>';
			echo '<td>'.$hab->precio.'</td>';
			echo '<td>';
			if($hab->estado == 'por_confirmar')
			{
				echo '<form action="'.base_url().'administracion_c/confirmar" method="post">
				<input type="hidden" name="id_habitacion" value="'.$hab->id_habitacion.'">
				<button>Confirmar</button>
				</form>';
			}
			else if($hab->estado == 'ocupada')
			{
				echo '<form action="'.base_url().'administracion_c/desocupar" method="post">
				<input type="hidden" name="id_habitacion" value="'.$hab->id_habitacion.'">
				<button>Desocupar</button>
				</form>';
			}
			echo '</td>';
			echo '</tr>';
		}
	?>
	</table>	
	</div> 	
</center>
</body>
</html>