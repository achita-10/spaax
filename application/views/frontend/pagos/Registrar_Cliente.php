<h2 style="text-align: center;">REGISTRAR CLIENTE</h2>
	<div class="container" id="div_formulario_regitro_c">
		<?php echo form_open('',array('name'=>'form_registro_clientes','id'=>'form_registro_clientes'));?>
	    <div class="row" >
	    	<div class="col-md-12 " >
	    		<div class="card ">
			        
			        <div class="card-body">
		                <div class="form-row">
		                	<div class="col-md-2">
		                        <div class="form-group">
									<label for="Toma" class=" control-label input-group-addon">Número de toma</label>
										<input class="form-control " type="text" name="Toma" placeholder="Numero de Toma" id="Toma"  value="<?php echo $valor;?>" readonly>
								</div>
		                	</div>
		                	<div class="col-md-5">
								<div class="form-group">
									<label for="Nombre" class=" control-label input-group-addon">Nombre</label>
									<div class="">

										<input  class="form-control cambiar-entrada" type="text" name="Nombre" placeholder="Nombre" id="Nombre" autofocus="autofocus" >
									</div>		
								</div>
		                	</div>
		                	<div class="col-md-5">
		                   		<div class="form-group">
									<label for="Apellido_P" class="control-label input-group-addon">Apellido Paterno</label>
									<div class="">
										<input  class="form-control cambiar-entrada" type="text" name="Apellido_P" placeholder="Apellido Paterno" id="Apellido_P" >
									</div>
								</div>
		                	</div>
		                	<div class="col-md-4">
								<div class="form-group">
									<label for="Apellido_M" class="control-label input-group-addon">Apellido Materno</label>
									<div class="">
										<input  class="form-control cambiar-entrada" type="text" name="Apellido_M" placeholder="Apellido Materno" id="Apellido_M" >
									</div>
								</div>
		                	</div>
		                	<div class="col-md-4">
								<div class="form-group">
									<label for="Calle" class="control-label input-group-addon">Calle</label>
									<div class="">
										<input  class="form-control cambiar-entrada" type="text" name="Calle" placeholder="Calle" id="Calle" >
									</div>
								</div>
		                	</div>
		                	<div class="col-md-4">
								<div class="form-group">
									<label for="Numero" class="control-label input-group-addon">Número</label>
									<div class="">
										<input  class="form-control cambiar-entrada" type="text" name="Numero" placeholder="N°" id="Numero" >
									</div>
								</div>
		                	</div>
		                    <div class="col-md-4">
								<div class="form-group">
									<label for="Localidad" class="control-label input-group-addon">Localidad</label>
									<div class="">
										<input  class="form-control cambiar-entrada" type="text" name="Localidad" placeholder="Localidad" id="Localidad" >
									</div>
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class="form-group">
									<label for="Municipio" class="control-label input-group-addon">Municipio</label>
									<div class="">
										<input  class="form-control cambiar-entrada" type="text" name="Municipio" placeholder="Municipio" id="Municipio" >
									</div>
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class="form-group">
									<label for="Entidad" class="control-label input-group-addon">Entidad Federativa</label>
									<div class="">
										<select  name="Entidad" id="Entidad" class="form-control cambiar-entrada" >
											<option value="" selected="selected">Seleccionar </option>
											<option value="2" >Veracruz </option>
										</select>
									</div>
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class=" form-group">
									<label for="Fecha_Nac" class="control-label input-group-addon">Fecha de Nacimiento</label>
									<input  type="date" id="Fecha_Nac" name="Fecha_Nac"  class="form-control cambiar-entrada" placeholder="Fecha de Nacimiento" >
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class=" form-group">
									<label for="Fecha_Igr" class="control-label input-group-addon">Fecha de Ingreso</label>
									<input  type="date" id="Fecha_Igr" name="Fecha_Igr"  class="form-control cambiar-entrada" placeholder="Fecha de ingreso" value="<?php echo $Fecha;?>" readonly="">
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class="form-group">
									<label for="Telefono" class="control-label input-group-addon">Teléfono</label>
									<div class="">
										<input  class="form-control cambiar-entrada" type="text" name="Telefono" placeholder="Telefono" id="Telefono" >
									</div>
								</div>
		                    </div>
							<div class=" col-sm-6 col-md-6">
								<div class="form-group">
									<div class="form-row">
										
										<div class="col-xs-4 col-md-6">
											<input class="btn btn-block btn-default" type="reset" name="Limpiar Valores" placeholder="" value="Limpiar">
										</div>
										<div class="col-xs-4 col-md-6" id="boton">			
											<button class="btn btn-block btn-success" type="submit" name="btn_registrar_c" id="btn_registrar_c">Confirmar</button>
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
