		

		<section id="main-content">
          <section class="wrapper">
              <section class="registrar-usuario row">
					<div id="titulo" class="container col-md-12" style="text-align: center;">
							<p><h2>Realizar Pago Bimestral</h2></p>
							
					</div>
						<section class="datos-usuario col-md-8" id="recargar">
						<!--NOTA:e Si a la etiqueta form se agrega la clase form-horizontal los cotenedores Datos personales y Otros datos ocuparan todo el ancho, pero si se le quita entonces se agregara un margen -->
							<?echo form_open('Spaax/registrar_usuario');?>
								<section class="datos-usuario col-md-6 col-md-offset-6 ">
									
									<div class="form-group">
										<div class="input-group">
												<label for="Toma" class=" control-label input-group-addon">Toma</label>
												<div class="">
													<input  class="form-control" type="text" name="Toma" placeholder="Toma" id="Toma" value="<?echo set_value('Toma');?>">
												</div>
										</div><?echo form_error('Toma','<span class="msj_error">','</span>')?>
									</div>			
									<div class="form-group">
										<div class="input-group">
												<label for="Nombre" class=" control-label input-group-addon">Nombre</label>
												<div class="">
													<input  class="form-control" type="text" name="Nombre" placeholder="Nombre" id="Nombre" value="<?echo set_value('Nombre');?>">
												</div>
										</div><?echo form_error('Nombre','<span class="msj_error">','</span>')?>
									</div>
									<div class="form-group">
										<div class="input-group">
												<label for="Apellido_P" class=" control-label input-group-addon">Apellido Paterno</label>
												<div class="">
													<input  class="form-control" type="text" name="Apellido_P" placeholder="Apellido Paterno" id="Apellido_P" value="<?echo set_value('Apellido_P');?>">
												</div>
										</div><?echo form_error('Apellido_P','<span class="msj_error">','</span>')?>
									</div>
									<div class="form-group">
										<div class="input-group">
												<label for="Apellido_M" class=" control-label input-group-addon">Apellido Materno</label>
												<div class="">
													<input  class="form-control" type="text" name="Apellido_M" placeholder="Apellido Materno" id="Apellido_M" value="<?echo set_value('Apellido_M');?>">
												</div>
										</div><?echo form_error('Apellido_M','<span class="msj_error">','</span>')?>
									</div>
									<div class="form-group">
										<div class="input-group">
												<label for="RFC" class=" control-label input-group-addon">RFC</label>
												<div class="">
													<input  class="form-control" type="text" name="RFC" placeholder="RFC" id="RFC" value="<?echo set_value('RFC');?>">
												</div>
										</div><?echo form_error('RFC','<span class="msj_error">','</span>')?>
									</div>
									<div class=" form-group">
										<div class="input-group">
											<label for="Fecha_Nac" class="control-label input-group-addon">Fecha de nacimiento</label>
												<input  type="date" id="ejemplo" name="Fecha_Nac"  class="form-control" placeholder="Fecha de Nacimiento" value="<?echo set_value('Fecha_Nac');?>">
										</div><?echo form_error('Fecha_Nac','<span class="msj_error">','</span>')?> 
									</div>
									<div class="form-group">
										<div class="input-group">
												<label for="Usuario" class=" control-label input-group-addon">Usuario</label>
												<div class="">
													<input  class="form-control" type="text" name="Usuario" placeholder="Nombre de Usuario" id="Usuario" value="<?echo set_value('Usuario');?>">
												</div>
										</div><?echo form_error('Usuario','<span class="msj_error">','</span>')?>
									</div>
									<div class="form-group">
										<div class="input-group">
												<label for="Password" class=" control-label input-group-addon">Password</label>
												<div class="">
													<input  class="form-control" type="password" name="Password" placeholder="Ingrese el Password" id="Password" value="<?echo set_value('Password');?>">
												</div>
										</div><?echo form_error('Password','<span class="msj_error">','</span>')?>
									</div>
									<div class="form-group botones">
										<div class="col-xs-4 col-xs-offset-2  col-md-5 col-md-offset-2" id="boton">
											<button class="btn btn-block btn-success" type="submit" name="Guardar"  id="boton_usuario">Registrar</button>
										</div>
										<div class="col-xs-4  col-md-4 " id="boton">		
											<input class="btn btn-block btn-default" type="reset" name="Limpiar Valores" placeholder="" value="Limpiar">
										</div>
										
									</div>		
								</section>		
								
      						</form>
						</section>
				</section><! --/row -->
          </section>
     	</section>