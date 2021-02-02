<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: AndresPava
 * Date: 20/10/2018
 * Time: 06:24 PM
 */
?>
<!-- /.modal incio registrar gastos -->
<div class="modal fade" id="modal_gasto" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Registrar Gasto</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_gasto" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12" >
                                <div class="form-group" >
                                    <label for="Descripcion_Gasto" class="control-label">Descripción</label>
                                    <textarea name="Descripcion_Gasto" id="Descripcion_Gasto"  class="form-control cambiar-entrada" ></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="Monto_Gasto" class="control-label">Monto</label>
                                    <input type="text" class="form-control cambiar-entrada" name="Monto_Gasto" id="Monto_Gasto" placeholder="Costo" >
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="Fecha_Gasto" class="control-label">Fecha</label>
                                    <input type="date" class="form-control" name="Fecha_Gasto" id="Fecha_Gasto"  >
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btn_registrar_gastos" >Registrar</button>
                <button type="button" class="btn btn-info" data-dismiss="modal">Aceptar</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal fin registrar gastos-->
<!-- /.modal incio pagar adeudo -->
<div class="modal fade" id="modal_adeudo" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Pagar Adeudo</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_adeudo" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-row">
                            <div class="col-sm-6 col-md-6" style="display: none;">
                                <div class="form-group" >
                                    <label for="ID_Adeudo" class="control-label">ID</label>
                                    <input type="text" class="form-control" name="ID_Adeudo" id="ID_Adeudo"  readonly="">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="Toma_Adeudo" class="control-label">Toma</label>
                                    <input type="text" class="form-control" name="Toma_Adeudo" id="Toma_Adeudo"  readonly="">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="Monto_Adeudo" class="control-label">Monto</label>
                                    <input type="text" class="form-control" name="Monto_Adeudo" id="Monto_Adeudo"  readonly="">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="Bimestre_Adeudo" class="control-label">Bimestre</label>
                                    <input type="text" class="form-control" name="Bimestre_Adeudo" id="Bimestre_Adeudo"  readonly="">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="Fecha_Adeudo" class="control-label">Fecha de Adeudo</label>
                                    <input type="text" class="form-control" name="Fecha_Adeudo" id="Fecha_Adeudo"  readonly="">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btn_pagar_adeudo" >Pagar</button>
                <button type="button" class="btn btn-info" data-dismiss="modal">Aceptar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal fin pagar adeudo-->
<div class="modal fade" id="modal_cliente_m" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Modificar Cliente</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_actualizar_cliente" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-row">
                            <div class="col-sm-6 col-md-2">
                                <div class="form-group">
                                    <label for="Toma" class="control-label">Toma</label>
                                    <input type="text" class="form-control" name="Toma" id="Toma" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <div class="form-group">
                                    <label for="Nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" name="Nombre" id="Nombre" >
                                    
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <div class="form-group">
                                    <label for="Apellido_P" class="control-label">Apellido Paterno</label>
                                    <input type="text" class="form-control" name="Apellido_P" id="Apellido_P" >
                                    
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="Apellido_M" class="control-label">Apellido Materno</label>
                                    <input type="text" class="form-control" name="Apellido_M" id="Apellido_M" >
                                    
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="Telefono" class="control-label">Teléfono</label>
                                    <input type="text" class="form-control" name="Telefono" id="Telefono" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="Fecha_Nac" class="control-label">Fecha_Nac</label>
                                    <input type="date" class="form-control" name="Fecha_Nac" id="Fecha_Nac" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="Calle" class="control-label">Calle</label>
                                    <input type="text" class="form-control" name="Calle" id="Calle" >
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
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="Numero" class="control-label">Número</label>
                                    <input type="text" class="form-control" name="Numero" id="Numero" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="Localidad" class="control-label">Localidad</label>
                                    <input type="text" class="form-control" name="Localidad" id="Localidad" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="Municipio" class="control-label">Municipio</label>
                                    <input type="text" class="form-control" name="Municipio" id="Municipio" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="Fecha_Igr" class="control-label">Fecha de Ingreso</label>
                                    <input type="text" class="form-control" name="Fecha_Igr" id="Fecha_Igr" readonly="">
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn  btn-success"  value="Actualizar" id="btn_Actualizar_Cliente">
                <button type="button" class="btn btn-info" data-dismiss="modal">Aceptar</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal_realizar_pago" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Realizar Pago </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_realizar_pago" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-row">
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="Toma_P" class="control-label">Toma</label>
                                    <input type="text" class="form-control" name="Toma_P" id="Toma_P" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="Nombre_P" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" name="Nombre_P" id="Nombre_P" >
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="Apellido_P_P" class="control-label">Apellido Paterno</label>
                                    <input type="text" class="form-control" name="Apellido_P_P" id="Apellido_P_P" >
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="Apellido_M_P" class="control-label">Apellido Materno</label>
                                    <input type="text" class="form-control" name="Apellido_M_P" id="Apellido_M_P" >
                                    
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label for="Fecha_P" class="control-label">Fecha</label>
                                    <input type="date" class="form-control" name="Fecha_P" id="Fecha_P" readonly="">
                                    
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 pago_bimestral" > 
                                <div class="form-group">
                                    <label for="Monto_B" class="control-label">Monto</label>
                                    <input type="text" class="form-control" name="Monto_B" id="Monto_B" readonly="" >
                                    
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 pago_ingreso" style="display: none;">
                                <div class="form-group">
                                    <label for="Monto_I" class="control-label">Monto</label>
                                    <input type="text" class="form-control" name="Monto_I" id="Monto_I" readonly=""  >
                                    
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="radio" name="tipo" id="tipo_bimestral">Pago Bimestral
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="radio" name="tipo" id="tipo_ingreso">Pago de Ingreso
                                </div>
                            </div>
                            <div  class="col-sm-12 col-md-12 pago_bimestral" style="text-align: center;">
                                <div class="row" id="botones_pago">
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn " id="cambiar_monto">Monto</button>
                <button type="button" class="btn btn-success" id="btn_pagar_ingreso" style="display: none;">Pagar</button>
                <button type="button" class="btn btn-warning " data-dismiss="modal">Aceptar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal_pagar_adeudo" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Person Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_pagar_adeudo" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Toma" class="control-label">Toma</label>
                                    <input type="text" class="form-control" name="Toma" id="Toma" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" name="Nombre" id="Nombre" value="" readonly>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Apellido_P" class="control-label">Apellido Paterno</label>
                                    <input type="text" class="form-control" name="Apellido_P" id="Apellido_P" value="" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Apellido_M" class="control-label">Apellido Materno</label>
                                    <input type="text" class="form-control" name="Apellido_M" id="Apellido_M" value="" readonly>
                                    
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn  btn-success" onclick="ventana_pagar_adeudo();" value="Pagar Adeudo" id="btnAdeudo">
                <button type="button" class="btn btn-info" data-dismiss="modal">Aceptar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="modal_informacion" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Person Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_informacion" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Toma" class="control-label">Toma</label>
                                    <input type="text" class="form-control" name="Toma" id="Toma" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" name="Nombre" id="Nombre" value="" readonly>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Apellido_P" class="control-label">Apellido Paterno</label>
                                    <input type="text" class="form-control" name="Apellido_P" id="Apellido_P" value="" readonly>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Apellido_M" class="control-label">Apellido Materno</label>
                                    <input type="text" class="form-control" name="Apellido_M" id="Apellido_M" value="" readonly>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Aceptar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal_monto" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Actualizar Monto</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_monto" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Tipo_Monto" class="control-label">Tipo de monto</label>
                                    <select name="Tipo_Monto" id="Tipo_Monto" class="form-control">
                                        <option value="" selected="">Seleccionar</option>
                                        <option value="1">Bimestral</option>
                                        <option value="2">Ingreso</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Cantidad" class="control-label">Cantidad</label>
                                    <input type="text" class="form-control" name="Cantidad" id="Cantidad" placeholder="Nuevo monto">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btn_act_monto" >Actualizar</button>
                <button type="button" class="btn btn-info" data-dismiss="modal">Aceptar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">¿Esta seguro de que quiere Cerrar Sesi&oacuten?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="<?php echo base_url();?>login/logout">Cerrar Sesi&oacuten</a>
            </div>
        </div>
    </div>
</div>
<!--modal para registrar empleado-->

<div class="modal fade" id="registrar_nuevo_empleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body move form">
              <form class="form-control" role="form" action="#"  method="POST"  id="form_registrar_empleado">
               <div class="form-body">
                   <div class="form-row">

                         

                       <div class="col-sm-12 col-md-12 ">
                            <div class="form-group">
                                <?php echo form_label('Nombre')?>
                                    <input type="text" class="form-control convertirmayuscula" id="nombre_empleado" name="nombre_empleado" value="">
                            </div>
                       </div>
                       <div class="col-md-6">
                            <div class="form-group">
                                <?php echo form_label('Apellido Paterno')?>
                                    <input type="text" class="form-control  convertirmayuscula" id="appaterno_empleado" name="appaterno_empleado" value="">
                            </div>
                       </div>
                       <div class="col-md-6">
                            <div class="form-group">
                                <?php echo form_label('Apellido Materno')?>
                                    <input type="text" class="form-control convertirmayuscula" id="apmaterno_empleado" name="apmaterno_empleado" value="" >
                            </div>
                       </div>
                   </div>
               </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success " value="Guardar" id="btn_registrar_empleado">Guardar</button>
                        <a class="btn btn-danger" href="#" data-dismiss="modal">Cancelar</a>
                    </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>



<!--Modal para registrar nuevo usuario-->
<div class="modal fade" id="modal_crear_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body form">
                <form class="form-control" role="form" action="<?php echo base_url()?>users_create/save" id="datos_usuario" method="POST">
                    <div class="form-body">
                        <div class="form-row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="id_empleado" name="id_empleado"  readonly="readonly" style="display: none;">
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo form_label('Nombre de Usuario')?>
                                    <input type="text" class="form-control convertirmayuscula" id="nombre_usuario" name="nombre_usuario"  autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo form_label('Contraseña')?>
                                    <input type="password" class="form-control" id="passwd" name="passwd"  autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo form_label('Repetir Contraseña')?>
                                    <input type="password" class="form-control" id="r_passwd" name="r_passwd" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo form_label('Correo')?>
                                    <input type="text" class="form-control" id="correo" name="correo"  autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo form_label('Rol: ') ;?>
                                    <select class="form-control" name="role_level" id="role_level">
                                        <option value="" selected="selected">Seleccionar</option>
                                        <option value="11">Presidente</option>
                                        <option value="1">Secretario</option>
                                        <option value="2">Tesorero</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success " value="Guardar">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
