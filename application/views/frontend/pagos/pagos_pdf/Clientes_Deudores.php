<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
		<?php 
			if($tabla==='Pago_Adeudos'){
				$titulo= 'Deudores';
			}else if($tabla==='Clientes_Suspendidos'){
				$titulo= 'Suspendidos';
			}else{
				$titulo='Puntuales';
			}
		?>
		<h2>Clientes <?php echo $titulo;?></h2>
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
				<th>N°</th>
				<th>Toma</th>
				<th>Nombre</th>
				<th>Apellido_P</th>
				<th>Apellido_M</th>
				<th>Dirección</th>
				<?php
					if($tipo===1){

					}else{
				?>
				<th>Monto</th>
				<th>Bimestre</th>
				<?php	
					}
				?>
				
				<th>Fecha</th>
			</tr>
			<?php
				$total = 0;
				$contador=1;
					foreach ($registros as $key ) {
				?>
			<tr>
				<td><?php echo $contador;?></td>
				<td><?php echo $key->Toma;?></td>
				<td><?php echo $key->Nombre;?></td>
				<td><?php echo $key->Apellido_P;?></td>
				<td><?php echo $key->Apellido_M;?></td>
				<td><?php echo $key->Calle;?></td>
				<?php
					if($tipo===1){

					}else{
				?>
				<td><?php echo $key->Monto;?></td>
				<td><?php echo $key->Bimestre;?></td>
				<?php	
					}
				?>
				
				<td><?php echo $key->Fecha;?></td>
				
			</tr>
			<?php
				$contador++;
				$total = $total + ((int) $key->Monto);
				}
			?>
		</table>
	</div>
	<div>
		<p>
			<?php
				if($tipo===0){
			?>
			Total de adeudos : <?php echo $total?>
			<?php
				}else{
			?>
			Total de ingresos : <?php echo $total?>
			<?php

				}
			?>	
		</p>
	</div>
</body>
</html>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		 @page { margin: 70px 50px; }
    #header { position: fixed; left: 0px; top: -30px; right: 0px; height: 60px;  text-align: center; }
    #footer { position: fixed; left: 0px; bottom: -65px; right: 0px; height: 35px; /*background-color: lightblue;*/ text-align: center; }
    #footer .page:after { content: counter(page, upper-roman); }
    .contenido-tabla{
    	margin-top: 180px;
    }
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
		.contenido{
			margin-top: 180px;
		}
	</style>
</head>
<body>
	<div id="header">
		<div class="alta-encabezado">
			<div class="alta-img">
				<img  src="./assets/img/ahorro-agua.png" alt="" width="50" height="70">
			</div>
			<div class="alta-titulo">
				<span class="instituto"><strong>Agencia Municipal Nacimientos De Xogapan Municipio De San Andrés Tuxtla</strong></span>
				
			</div>
		</div>
		<div class="titulo">
			<?php 
				if($tabla==='Pago_Adeudos'){
					$titulo= 'Deudores';
				}else if($tabla==='Clientes_Suspendidos'){
					$titulo= 'Suspendidos';
				}else{
					$titulo='Puntuales';
				}
			?>
			<h2>Clientes <?php echo $titulo;?></h2>
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
	</div>
	<div id="footer">
    <p class="page">Página </p>
  </div>
	<div id="content">
		<div class="contenido-tabla">
			<table width="100%" border="1" style="text-align: center;">
				<tr>
					<th>N°</th>
					<th>Toma</th>
					<th>Nombre</th>
					<th>Apellido_P</th>
					<th>Apellido_M</th>
					<th>Dirección</th>
					<?php
						if($tipo===1){

						}else{
					?>
					<th>Monto</th>
					<th>Bimestre</th>
					<?php	
						}
					?>
					
					<th>Fecha</th>
				</tr>
				<?php
					$contador=1;
						foreach ($registros as $key ) {
					?>
				<tr>
					<td><?php echo $contador;?></td>
					<td><?php echo $key->Toma;?></td>
					<td><?php echo $key->Nombre;?></td>
					<td><?php echo $key->Apellido_P;?></td>
					<td><?php echo $key->Apellido_M;?></td>
					<td><?php echo $key->Calle;?></td>
					<?php
						if($tipo===1){

						}else{
					?>
					<td><?php echo $key->Monto;?></td>
					<td><?php echo $key->Bimestre;?></td>
					<?php	
						}
					?>
					
					<td><?php echo $key->Fecha;?></td>
					
				</tr>
				<?php
					$contador++;
					}
				?>
			</table>
			
		</div>
		<p style="page-break-before: always;">
				<?php
					if($contador>=18){
				?>
				<table width="100%" border="1" style="text-align: center;">
				<tr>
					<th>N°</th>
					<th>Toma</th>
					<th>Nombre</th>
					<th>Apellido_P</th>
					<th>Apellido_M</th>
					<th>Dirección</th>
					<?php
						if($tipo===1){

						}else{
					?>
					<th>Monto</th>
					<th>Bimestre</th>
					<?php	
						}
					?>
					
					<th>Fecha</th>
				</tr>
				<?php
					$contador=1;
						foreach ($registros as $key ) {
					?>
				<tr>
					<td><?php echo $contador;?></td>
					<td><?php echo $key->Toma;?></td>
					<td><?php echo $key->Nombre;?></td>
					<td><?php echo $key->Apellido_P;?></td>
					<td><?php echo $key->Apellido_M;?></td>
					<td><?php echo $key->Calle;?></td>
					<?php
						if($tipo===1){

						}else{
					?>
					<td><?php echo $key->Monto;?></td>
					<td><?php echo $key->Bimestre;?></td>
					<?php	
						}
					?>
					
					<td><?php echo $key->Fecha;?></td>
					
				</tr>
				<?php
					$contador++;
					}
				?>
			</table>

				<?php
					}
				?>
		</p>
	</div>
	
</body>
</html>-->