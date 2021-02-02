<div class="container">
		<?echo form_open('Spaax/registrar_usuario');?>
    <div class="card">
        <div class="card-header">REGISTRAR USUARIO</div>
        <div class="card-body">
            <div class="form-row">
				<div class=" col-sm-6 col-md-6">
					<div class="form-group">
						<label for="Tipo" class="control-label input-group-addon">Tipo</label>
						<div class="">
							<select name="Tipo" id="Tipo" class="form-control" autofocus="autofocus">
								<option value="" selected>Seleccione</option>
								<option value="Secretario" <?echo set_select('Tipo','Secretario');?>>Secretario</option>
								<option value="Tesorero" <?echo set_select('Tipo','Tesorero');?>>Tesorero</option>
							</select>
						</div><?echo form_error('Tipo','<span class="msj_error">','</span>');?>
					</div>
					<div class="form-group">
						<label for="NSS" class=" control-label input-group-addon">NSS</label>
						<div class="">
							<input  class="form-control" type="text" name="NSS" placeholder="NSS" id="NSS" value="<?echo set_value('NSS');?>">
						</div><?echo form_error('NSS','<span class="msj_error">','</span>')?>
					</div>			
					<div class="form-group">
						<label for="Nombre" class=" control-label input-group-addon">Nombre</label>
						<div class="">
							<input  class="form-control" type="text" name="Nombre" placeholder="Nombre" id="Nombre" value="<?echo set_value('Nombre');?>">
						</div><?echo form_error('Nombre','<span class="msj_error">','</span>')?>
					</div>
					<div class="form-group">
						<label for="Apellido_P" class=" control-label input-group-addon">Apellido Paterno</label>
						<div class="">
							<input  class="form-control" type="text" name="Apellido_P" placeholder="Apellido Paterno" id="Apellido_P" value="<?echo set_value('Apellido_P');?>">
						</div><?echo form_error('Apellido_P','<span class="msj_error">','</span>')?>
					</div>
					<div class="form-group">
						<label for="Apellido_M" class=" control-label input-group-addon">Apellido Materno</label>
						<div class="">
							<input  class="form-control" type="text" name="Apellido_M" placeholder="Apellido Materno" id="Apellido_M" value="<?echo set_value('Apellido_M');?>">
						</div><?echo form_error('Apellido_M','<span class="msj_error">','</span>')?>
					</div>
				</div>
				<div class=" col-sm-6 col-md-6">
					<div class="form-group">
						<label for="RFC" class=" control-label input-group-addon">RFC</label>
						<div class="">
							<input  class="form-control" type="text" name="RFC" placeholder="RFC" id="RFC" value="<?echo set_value('RFC');?>">
						</div><?echo form_error('RFC','<span class="msj_error">','</span>')?>
					</div>
					<div class=" form-group">
						<label for="Fecha_Nac" class="control-label input-group-addon">Fecha de nacimiento</label>
						<input  type="date" id="ejemplo" name="Fecha_Nac"  class="form-control" placeholder="Fecha de Nacimiento" value="<?echo set_value('Fecha_Nac');?>">
						<?echo form_error('Fecha_Nac','<span class="msj_error">','</span>')?> 
					</div>
					<div class="form-group">
						<label for="Usuario" class=" control-label input-group-addon">Usuario</label>
						<div class="">
							<input  class="form-control" type="text" name="Usuario" placeholder="Nombre de Usuario" id="Usuario" value="<?echo set_value('Usuario');?>">
						</div><?echo form_error('Usuario','<span class="msj_error">','</span>')?>
					</div>
					<div class="form-group">
						<label for="Password" class=" control-label input-group-addon">Password</label>
						<div class="">
							<input  class="form-control" type="password" name="Password" placeholder="Ingrese el Password" id="Password" value="<?echo set_value('Password');?>">
						</div>
						<?echo form_error('Password','<span class="msj_error">','</span>')?>
					</div>
					<div class="form-group">
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
    <?php echo form_close();?>
</div>







