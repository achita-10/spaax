<div class="container">
		<?echo form_open('');?>
	    <div class="row" >
	    	<div class="col-md-12 " >
	    		<div class="card ">
			        <div class="card-header">Actualizar Direccion del Cliente</div>
			        <div class="card-body">
		                <div class="form-row">
		                    <div class=" col-sm-6 col-md-6">
		                        <div class="form-group">
									<label for="Toma" class=" control-label input-group-addon">Toma</label>
										<input class="form-control" type="text" name="Toma" placeholder="Numero de Toma" id="Toma"  value="<?echo $valores->ID_C;?>" readonly>
								</div>
								
		                   		<div class="form-group">
									<label for="Calle" class="control-label input-group-addon">Calle</label>
									<div class="">
										<input  class="form-control" type="text" name="Calle" placeholder="Calle" id="Calle" value="<?echo $valores->Calle;?>">
									</div><?echo form_error('Calle','<span class="msj_error">','</span>')?>
								</div>
								<div class="form-group">
									<label for="Numero" class="control-label input-group-addon">Numero</label>
									<div class="">
										<input  class="form-control" type="text" name="Numero" placeholder="Numero" id="Numero" value="<?echo $valores->Numero;?>">
									</div><?echo form_error('Numero','<span class="msj_error">','</span>')?>
								</div>
								
								
							</div>

							 <div class=" col-sm-6 col-md-6">
		                        <div class="form-group">
									<label for="CP" class="control-label input-group-addon">Codigo Postal</label>
									<div class="">
										<input  class="form-control" type="text" name="CP" placeholder="Codigo Postal" id="CP" value="<?echo $valores->CP;?>">
									</div><?echo form_error('CP','<span class="msj_error">','</span>')?>
								</div>
								<div class="form-group">
									<label for="Localidad" class="control-label input-group-addon">Localidad</label>
									<div class="">
										<input  class="form-control" type="text" name="Localidad" placeholder="Localidad" id="Localidad" value="<?echo $valores->Localidad;?>">
									</div><?echo form_error('Localidad','<span class="msj_error">','</span>')?>
								</div>
								<div class="form-group">
									<label for="Municipio" class="control-label input-group-addon">Municipio</label>
									<div class="">
										<input  class="form-control" type="text" name="Municipio" placeholder="Municipio" id="Municipio" value="<?echo $valores->Municipio;?>">
									</div><?echo form_error('Municipio','<span class="msj_error">','</span>')?>
								</div>
								<div class="form-group">
									<label for="Entidad" class="control-label input-group-addon">Entidad Federativa</label>
									<div class="">
										<select  name="Entidad" id="Entidad" class="form-control" >
											<option value="<?echo $valores->Entidad;?>" selected="selected"><?echo $valores->Entidad;?></option>
											<option value="Aguascalientes" <?echo set_select('Entidad','Aguascalientes');?>>Aguascalientes</option>
											<option value="Baja California" <?echo set_select('Entidad','Baja California');?>>Baja California</option>
											<option value="Baja California Sur" <?echo set_select('Entidad','Baja California Sur');?>>Baja California Sur</option>
											<option value="Campeche" <?echo set_select('Entidad','Campeche');?>>Campeche</option>
											<option value="" <?echo set_select('Entidad','Chiapas');?>>Chiapas</option>
											<option value="Chihuahua" <?echo set_select('Entidad','Chihuahua');?>>Chihuahua</option>
											<option value="Ciudad de Mexico" <?echo set_select('Entidad','Ciudad de Mexico');?>>Ciudad de Mexico</option>
											<option value="Coahuila" <?echo set_select('Entidad','Coahuila');?>>Coahuila</option>
											<option value="Colima" <?echo set_select('Entidad','Colima');?>>Colima</option>
											<option value="Durango" <?echo set_select('Entidad','Durango');?>>Durango</option>
											<option value="Guanajuato" <?echo set_select('Entidad','Guanajuato');?>>Guanajuato</option>
											<option value="Guerrero" <?echo set_select('Entidad','Guerrero');?>>Guerrero</option>
											<option value="Hidalgo" <?echo set_select('Entidad','Hidalgo');?>>Hidalgo</option>
											<option value="Jalisco" <?echo set_select('Entidad','Jalisco');?>>Jalisco</option>
											<option value="Mexico" <?echo set_select('Entidad','Mexico');?>>Mexico</option>
											<option value="Michocan de Ocampo" <?echo set_select('Entidad','Michocan de Ocampo');?>>Michocan de Ocampo</option>
											<option value="Morelos" <?echo set_select('Entidad','Morelos');?>>Morelos</option>
											<option value="Nayarit" <?echo set_select('Entidad','Nayarit');?>>Nayarit</option>
											<option value="Nuevo Leon" <?echo set_select('Entidad','Nuevo Leon');?>>Nuevo Leon</option>
											<option value="Oaxaca" <?echo set_select('Entidad','Oaxaca');?>>Oaxaca</option>
											<option value="Puebla" <?echo set_select('Entidad','Puebla');?>>Puebla</option>
											<option value="Queretaro de Arteaga" <?echo set_select('Entidad','Queretaro de Arteaga');?>>Queretaro de Arteaga</option>
											<option value="Quintana Roo" <?echo set_select('Entidad','Quintana Roo');?>>Quintana Roo</option>
											<option value="San Luis Potosi" <?echo set_select('Entidad','San Luis Potosi');?>>San Luis Potosi</option>
											<option value="Sinaloa" <?echo set_select('Entidad','Sinaloa');?>>Sinaloa</option>
											<option value="Sonora" <?echo set_select('Entidad','Sonora');?>>Sonora</option>
											<option value="Tabasco" <?echo set_select('Entidad','Tabasco');?>>Tabasco</option>
											<option value="Tamaulipas" <?echo set_select('Entidad','Tamaulipas');?>>Tamaulipas</option>
											<option value="Tlaxcala" <?echo set_select('Entidad','Tlaxcala');?>>Tlaxcala</option>
											<option value="Veracruz" <?echo set_select('Entidad','Veracruz');?>>Veracruz</option>
											<option value="Yucatan" <?echo set_select('Entidad','Yucatan');?>>Yucatan</option>
											<option value="Zacatecas" <?echo set_select('Entidad','Zacatecas');?>>Zacatecas</option>
										</select>
									</div><?echo form_error('Entidad','<span class="msj_error">','</span>');?>
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
    	<?php echo form_close();?>
	</div>
