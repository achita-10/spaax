<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gastos</title>
	<style>
		.alta-img{
			display: inline-block;
			margin-top: 6px;
			
		}
		.titulo{
			text-align: center;
		}
		.instituto{
			display: block;
			font-size: 16px;
			padding-bottom: 10px;
			text-transform: uppercase;
		}
		.alta-titulo{
			display: inline-block;
			
			
			text-align: center;
		}
		.alta-encabezado{
			width: 70%;
			margin: auto;
		}
		table{
			border-collapse: collapse;
			padding: 2px;
		}
	</style>
</head>
<body>
	<div class="alta-encabezado">
		<div class="alta-img">
			<img  src="./assets/img/ahorro-agua.png" alt="" width="50" height="70">
		</div>
		<div class="alta-titulo">
			<span class="instituto"><strong>Agencia Municipal Nacimientos De Xogapan Municipio De San Andrés Tuxtla</strong></span>
			
		</div>
	</div>
	<div class="titulo">
		
		<h2>Gastos</h2>
	</div>
	<div class="fechas">
		<table border="0"  width="100%" cellspacing="10" cellpadding="5" >
			<tr class="text-uppercase">
								<td colspan="2" >
					<table   width="100%">
						<tr class="text-uppercase">
							<td rowspan="2" colspan="2"><b>Fecha Desde: </b></td>
							<td style="text-align: center;" colspan="2"><?php echo $desde;?></td>
						</tr>
						<tr >
							<td   colspan="2" width="60%" ><hr class="new3"></td>
						</tr>
					</table>
				</td>
				<td colspan="2">
					<table   width="100%">
						<tr class="text-uppercase">
							<td rowspan="2" colspan=""><b>Fecha Hasta:</b></td>
							<td style="text-align: center;" colspan="3"><?php echo $hasta;?></td>
						</tr>
						<tr >
							<td  width="60%" colspan="3" ><hr class="new3"></td>
						</tr>
					</table>
				</td>
			</tr>
			
		</table>
	</div>
	<div>
		<table width="100%" border="1" style="text-align: center;">
			<tr>

				<th>ID</th>
				<th>Descripción</th>
				<th>Monto</th>
				<th>Fecha</th>
				
				
			</tr>
			<?php
				$contador=1;
				$total = 0;
					foreach ($registros as $key ) {
				?>
			<tr>
				<td><?php echo $contador;?></td>
				<td><?php echo $key->Descripcion;?></td>
				<td><?php echo $key->Gasto;?></td>
				<td width="15%"><?php echo $key->Fecha_Gasto;?></td>
				
			</tr>
			<?php
				$contador++;
				$total = $total + ((int) $key->Gasto);
				}
			?>
		</table>
	</div>
	<div>
		<p>
			Total de gastos : <?php echo $total;?>	
		</p>
	</div>
	
</body>
</html>
