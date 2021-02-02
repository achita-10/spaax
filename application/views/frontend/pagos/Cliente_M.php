<div class="container">
		<?echo form_open('');?>
	    <div class="row" >
	    	<div class="col-md-12 " >
	    		<div class="card ">
			        <div class="card-header">Actualizar Datos del Cliente</div>
			        <div class="card-body">
		                <div class="form-row">
		                    <div class=" col-sm-6 col-md-6">
		                        <div class="form-group">
									<label for="Toma" class=" control-label input-group-addon">Toma</label>
										<input class="form-control" type="text" name="Toma" placeholder="Numero de Toma" id="Toma"  value="<?echo $valores->ID;?>" readonly>
								</div>
								<div class="form-group">
									<label for="nombre" class=" control-label input-group-addon">Nombre</label>
									<div class="">

										<input  class="form-control" type="text" name="Nombre" placeholder="Nombre" id="Nombre" autofocus="autofocus" value="<?echo $valores->Nombre;?>">
									</div><?echo form_error('Nombre','<span class="msj_error">','</span>')?>		
								</div>
		                   		<div class="form-group">
									<label for="Apellido_P" class="control-label input-group-addon">Apellido Paterno</label>
									<div class="">
										<input  class="form-control" type="text" name="Apellido_P" placeholder="Apellido Paterno" id="Apellido_P" value="<?echo $valores->Apellido_P;?>">
									</div><?echo form_error('Apellido_P','<span class="msj_error">','</span>')?>
								</div>
								<div class="form-group">
									<label for="Apellido_M" class="control-label input-group-addon">Apellido Materno</label>
									<div class="">
										<input  class="form-control" type="text" name="Apellido_M" placeholder="Apellido Materno" id="Apellido_M" value="<?echo $valores->Apellido_M;?>">
									</div><?echo form_error('Apellido_M','<span class="msj_error">','</span>')?>
								</div>
								
								
							</div>

							 <div class=" col-sm-6 col-md-6">
		                        
								<div class="form-group">
									<label for="Telefono" class=" control-label input-group-addon">Telefono</label>
									<div class="">
										<input  class="form-control" type="text" name="Telefono" placeholder="Telefono" id="Telefono" autofocus="autofocus" value="<?echo $valores->Telefono;?>">
									</div><?echo form_error('Telefono','<span class="msj_error">','</span>')?>		
								</div>
		                   		<div class=" form-group">
									<label for="Fecha_Nac" class="control-label input-group-addon">Fecha de nacimiento</label>
									<input  type="date" id="Fecha_Nac" name="Fecha_Nac"  class="form-control" placeholder="Fecha de Nacimiento" value="<?echo $valores->Fecha_Nac;?>"><?echo form_error('Fecha_Nac','<span class="msj_error">','</span>')?>
								</div>
								<br>
								<div class="form-group">
									<div class="form-row">
										<div class="col-xs-4 col-md-6" id="boton">					
											<button class="btn btn-block btn-success" type="submit" name="Actualizar" id="boton_cliente">Actualizar</button>
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
	    </div>
    	<?php echo form_close();?>
	</div>