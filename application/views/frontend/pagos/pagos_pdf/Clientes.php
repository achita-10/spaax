<?php
	$contador=1;
	foreach ($clientes as $key) {
		if($contador===1){
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?
		echo 'Toma_'.$key->ID;
	?></title>
	<style>
		.alta-img{
			display: inline-block;
			margin-top: 6px;
			
		}
		.clausula-1{
			text-transform: uppercase;
			font-weight: bold;
		}
		.instituto{
			display: block;
			font-size: 16px;
			padding-bottom: 10px;
			text-transform: uppercase;
		}
		.cuerpo{
			width: 90%;
			margin:auto;
			text-align: justify;
		}
		.cuerpo-titulo{
			
			font-size: 15px;
		}
		.alta-titulo{
			display: inline-block;
			
			
			text-align: center;
		}
		.alta-encabezado{
			width: 70%;
			margin: auto;
		}
		.firmas{
			width: 90%;
			margin: auto;
			margin-top: 300px;
		}
		.hr1-firmas{
			width: 40%;
			float: left;
			text-align: center;
		}
		.hr2-firmas{
			width: 40%;
			float: right;
			text-align: center;
		}
		.pie{
			display: block;
			margin-top: 20px;
			float: left;
				
		}
		table{
			border-collapse: collapse;
			padding: 2px;
		}
		hr.new3 {
			border-color: black;
			margin: 0;
			width: 100%;
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
	<div class="cuerpo cuerpo-titulo">
		<table border="0"  width="40%" cellspacing="10" cellpadding="5" >
			<tr class="text-uppercase">
								<td colspan="2" >
					<table   width="100%">
						<tr class="text-uppercase">
							<td rowspan="2" width="15%" ><b>N° de Contrato: </b></td>
							<td style="text-align: center;" ><?php echo $key->ID;?></td>
						</tr>
						<tr >
							<td    width="10%" ><hr class="new3"></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	
		<span >
			AGENCIA MUNICIPAL NACIMIENTOS DE XOGAPAN con domicilio en la Calle Francisco villa S/N  municipio San Andrés Tuxtla y que en el curso del presente documento me denominare COMITÉ DE SERVICIO DE AGUA POTABLE.
		</span>
		<br><br>
		<span >
			Por este medio hacemos constar el presente contrato de servicio de agua potable, el cual consta de las siguientes cláusulas: 
		</span>
		<br><br>
		<span class="clausula-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Servicio a Ofrecer.</span>
		<br>
		<span >Mediante el presente contrato el comité se compromete a brindar al cliente el servicio de abastecimiento de agua que incluye:</span>
		<div>
			<p>El abastecimiento de agua potable al cliente <b><?php echo $key->Nombre.' '.$key->Apellido_P.' '.$key->Apellido_M;?></b> con fecha de ingreso <b><?php echo $key->Fecha_Ingreso;?></b> ubicado en el domicilio <b><?php echo $key->Calle.' N° '.$key->Numero;?></b> con teléfono <b><?php echo $key->Telefono;?></b></p>
		</div>
		<div>
			<p>A) El mantenimiento necesario al sistema de agua.</p>
			<p>B) La vigilancia sobre la calidad y sanidad del agua con que se abastece.</p>
			<p>C) Realizar los pagos necesarios de operación del sistema de agua (energía eléctrica, cloración).</p>
			
		</div>
		<span class="clausula-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;II&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OBLIGACIONES DEL COMITE.</span>
		<div>
			<p>A) Vigilar, limpiar y mantener las fuentes de abastecimiento, tanque, sistema de bombeo y otras obras de las que consta el sistema de agua.</p>
			<p>B) Anticipar al cliente los cortes del servicio que deban realizarse.</p>
			<p>C) Reparar todo deterioro o desperfecto, tanto en línea de distribución, siempre y cuando, no haya sido provocada por los clientes.</p>
			
		</div>
		<span class="clausula-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;III&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FACULTADES DEL COMITE.</span>
		<div>
			<p>A) Podrá brindar el servicio a que se refiere este contrato a través de una Junta por parte del COMITÉ, el cual queda reconocido por los clientes para correcta administración del sistema de agua.</p>
			
			
		</div>
		<span class="clausula-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IV&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OBLIGACIONES DEL CLIENTE.</span>
		<div>
			<p>A) Pagar puntualmente su cuota por el servicio de agua. </p>
			<p>B) Mantener las instalaciones internas en buenas condiciones.</p>
			<p>C) No dañar las instalaciones del sistema de agua potable.</p>
		</div>
		<p style="page-break-before: always;">
			<span class="clausula-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;V&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROHIBICIONES DEL CLIENTE.</span>
			<div>
				<p>A) La ramificación de la conexión domiciliar sin autorización del COMITÉ, a través de la Junta.</p>
				<p>B) La utilización de agua para otros fines que no sean domésticos, entendido esto como el consumo humano, es decir, para baño, cocina y lavado de ropa. </p>
				<p>C) La utilización del agua para fines agroindustriales. </p>
				<p>D) Comerciar con el agua. </p>
			</div>
			<span class="clausula-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COSTO DEL SERVICIO.</span>
			<p>
				El servicio de agua tendrá una tarifa de acuerdo a la Junta con los clientes por parte del COMITÉ. La tarifa mencionadas podrán ser modificada por la Junta  realizado por el COMITÉ  siempre que haya motivos justificados para ello y previa notificación al cliente. El servicio será pagado con el tesorero perteneciente al COMITÉ a través de cuotas bimestrales pagaderas en los primeros 7 días del inicio de cada bimestre.  
			</p>
			<span class="clausula-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VII&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TERMINACIÓN DEL CONTRATO.</span>
			<p>A) Acuerdo de ambas partes. </p>
			<p>
				<?php
					$separa = explode('-',$Fecha);
				    $año = $separa[0];
				    $mes = $separa[1];
				    $dia = $separa[2];
				?>
				No habiendo más que hacer constar, para dejar constancia firmamos el presente contrato a los días <b><?php echo $dia; ?></b> del mes de <b><?php echo $mes; ?></b> del año <b><?php echo $año; ?></b>
			</p>
			<div class="firmas">
				<div class="hr1-firmas" >
					<hr><br>
					<span >Nombre y firma <br>Cliente</span>
				</div>
				<div class="hr2-firmas">
					<hr><br>
					<span >Nombre, firma y sello <br>Comité de Servicio de Agua <br>Potable</span>
				</div>
			</div>
			
		</p>
	</div>
</body>
</html>
	<?php
		}
	$contador++;
	}
?>