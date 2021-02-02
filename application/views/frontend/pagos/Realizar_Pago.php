	<h2 style="text-align: center;">REALIZAR PAGO</h2>
	<div class="container">
		<?echo form_open('Spaax/pagar_bimestre');?>
	    <div class="row" >
	    	<div class="col-md-12 " >
	    		<div class="card ">
			        
			        <div class="card-body">
		                <div class="form-row">
							<div class=" col-sm-3 col-md-4">
		                        <div class="form-group">
									<label for="Nombre" class=" control-label input-group-addon">Nombre</label>
									<div class="">
										<input  class="form-control" type="text" name="Nombre"  id="Nombre"  value="<?echo $valores->Nombre;?>" readonly>
									</div>	
								</div>
                   			</div>
							<div class=" col-sm-3 col-md-4">
								<div class="form-group">
									<label for="Apellido_P" class="control-label input-group-addon">Apellido Paterno</label>
									<div class="">
										<input  class="form-control" type="text" name="Apellido_P" id="Apellido_P" value="<?echo $valores->Apellido_P;?>" readonly>
									</div>
								</div> 
							</div>
							<div class=" col-sm-3 col-md-4">
								<div class="form-group">
									<label for="Apellido_M" class="control-label input-group-addon">Apellido Materno</label>
									<div class="">
										<input  class="form-control" type="text" name="Apellido_M" id="Apellido_M" value="<?echo $valores->Apellido_M;?>" readonly>
									</div>
								</div> 
							</div>
							<div class=" col-sm-3 col-md-4">
		                        <div class="form-group">
									<label for="Toma" class=" control-label input-group-addon">Número de toma</label>
										<input class="form-control" type="text" name="Toma" placeholder="Numero de Toma" id="Toma"  value="<?echo $valores->ID;?>" readonly>
								</div>
		                  	</div>
		                  	<div class=" col-sm-3 col-md-4">
		                        <div class="form-group">
									<label for="Monto" class=" control-label input-group-addon">Monto</label>
										<input class="form-control" type="text" name="Monto" placeholder="Monto a Pagar" id="Monto"  value="45" readonly>
								</div>
		                  	</div>
							<div class="col-md-4">	
								<div class="form-group">
									<label for="Bimestre" class="control-label input-group-addon">Bimestre.</label>
									<div class="">
										<select  name="Bimestre" id="Bimestre" class="form-control" autofocus="autofocus">
											<option value="" selected="selected">Seleccione el Bimestre</option>
											<option value="Enero-Febrero" <?echo set_select('Bimestre','Enero-Febrero');?>>Enero-Febrero</option>
											<option value="Marzo-Abril" <?echo set_select('Bimestre','Marzo-Abril');?>>Marzo-Abril</option>
											<option value="Mayo-Junio" <?echo set_select('Bimestre','Mayo-Junio');?>>Mayo-Junio</option>
											<option value="Julio-Agosto" <?echo set_select('Bimestre','Julio-Agosto');?>>Julio-Agosto</option>
											<option value="Septiembre-Octubre" <?echo set_select('Bimestre','Septiembre-Octubre');?>>Septiembre-Octubre</option>
											<option value="Noviembre-Diciembre" <?echo set_select('Bimestre','Noviembre-Diciembre');?>>Noviembre-Diciembre</option>
											
										</select>
									</div><?echo form_error('Bimestre','<span class="msj_error">','</span>');?>
								</div>
							</div>
							<div class="col-md-4">	
								<div class="form-group">
									<br>
									<div class="form-row">
										<div class="col-xs-4 col-md-6" id="boton">					
											<button class="btn btn-block btn-success" type="submit" name="Guardar" id="boton_cliente">Confirmar</button>
										</div>
										<div class="col-xs-4 col-md-6">
											<input class="btn btn-block btn-default" type="reset" name="Limpiar Valores" placeholder="" value="Limpiar">
										</div>
									</div>
								</div>
            				</div>
		                </div>
			        </div>
			    </div>
	    	</div>
	    </div>
    	<?php echo form_close();?>
	</div>
