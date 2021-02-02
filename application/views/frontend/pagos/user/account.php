<div>
    <form class="count">
        <img src="<?php echo base_url().'assets/img/add-user.png'?>" width="10%" >
        <div class="form-group">
            <!-- Nombre -->
            <label for="name" class="col-sm-3 control-label" ><b>Nombre(s)</b></label>
            <div class="col-sm-3 form">
                <input type="text" class="form-control" name="name" id="name" >
            </div>
        </div>
        <div class="form-group">
            <!-- Apellidos-->
            <label for="last-name" class="col-sm-3 control-label"><b>Apellidos</b></label>
            <div class="col-sm-3 form">
                <input type="text" class="form-control" name="last-name" id="last-name" >
            </div>
        </div>
        <div class="form-group">
            <!-- Nombre de usuario -->
            <label for="user-name" class="col-sm-3 control-label"><b>Nombre de Usuario</b></label>
            <div class="col-sm-2 form">
                <input type="text" class="form-control" name="user-name" id="user-name" >
            </div>
        </div>
        <div class="form-group">
            <!-- Contraseña -->
            <label for="pass" class="col-sm-3 control-label"><b>Contrase&ntildea</b><font size="2px">&#160;(Numero de Matricula)</font></label>
            <div class="col-sm-2 form">
                <input type="password" class="form-control" name="pass" id="pass" >
            </div>
        </div>
        <div class="form-group">
            <!-- Repetir Contraseña -->
            <label for="rep-pass" class="col-sm-3 control-label"><b>Repetir Contrase&ntildea</b></label>
            <div class="col-sm-2 form">
                <input type="password" class="form-control" name="rep-pass" id="rep-pass" >
            </div>
        </div>
        <div class="form-group text-center" >
            <div class=" col-sm-8 col-xs-5 but">
                <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"></i>&#160;Crear</button>&#160;&#160;
                <button type="submit" class="btn btn-lg btn-danger"><i class="fa fa-close"></i>&#160;Cancelar</button>
        </div>
            </div>
    </form>

</div>
