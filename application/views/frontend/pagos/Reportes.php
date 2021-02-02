<h2 style="text-align: center;">REPORTES</h2>
<div class="card">
    <div class="card-header">
       
    </div>
    <div class="card-body">
        <div class="card-block">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" id="base-pill1" data-toggle="pill" href="#pill1" aria-expanded="true">Reporte De Clientes Deudores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-pill2" data-toggle="pill" href="#pill2" aria-expanded="false">Reporte De Clientes Puntuales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-pill3" data-toggle="pill" href="#pill3" aria-expanded="false">Reporte De Clientes Suspendidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-pill4" data-toggle="pill" href="#pill4" aria-expanded="false">Reporte De Caja</a>
                </li>
            </ul>
            <div class="tab-content px-1 pt-1">
                <div role="tabpanel" class="tab-pane active" id="pill1" aria-expanded="true" aria-labelledby="base-pill1">
                	
                		<form action="#" id="form_reporte_d">
                			<div class="row">
	                			<div class="col-md-4">
		                			<div class="form-group">
		                				<label for="fecha_desde_d" class="control-label">Fecha Desde</label>
		                				<input type="date" id="fecha_desde_d" name="fecha_desde_d" class="form-control" >
		                			</div>
		                		</div>
		                		<div class="col-md-4">
		                			<div class="form-group">
		                				<label for="fecha_hasta_d" class="control-label">Fecha Hasta</label>
		                				<input type="date" id="fecha_hasta_d" name="fecha_hasta_d" class="form-control" >
		                			</div>
		                		</div>
		                		<div class="col-md-4">
		                			<div class="form-group">
		                				<input type="button" class="btn btn-block btn-success" value="Generar" id="btn_reporte_d">
		                			</div>
		                		</div>
	                		</div>
                		</form>
                	
                    
                        
                            <div id="cuerpo_tabla_deudores" class="table-responsive">
                        
                            </div>
                        
                    
                </div>
                <div class="tab-pane" id="pill2" aria-labelledby="base-pill2">
                   
                		<form action="#" id="form_reporte_p">
                			<div class="row">
	                			<div class="col-md-4">
		                			<div class="form-group">
		                				<label for="fecha_desde_p" class="control-label">Fecha Desde</label>
		                				<input type="date" id="fecha_desde_p" class="form-control" >
		                			</div>
		                		</div>
		                		<div class="col-md-4">
		                			<div class="form-group">
		                				<label for="fecha_hasta_p" class="control-label">Fecha Hasta</label>
		                				<input type="date" id="fecha_hasta_p" class="form-control" >
		                			</div>
		                		</div>
		                		<div class="col-md-4">
		                			<div class="form-group">
		                				<input type="button" class="btn btn-block btn-success" value="Generar" id="btn_reporte_p">
		                			</div>
		                		</div>
	                		</div>
                		</form>
                	
                    
                        <div id="cuerpo_tabla_puntuales" class="table-responsive">
                    
                        </div>
                    
                </div>
                <div class="tab-pane" id="pill3" aria-labelledby="base-pill3">
                   
                		<form action="#" id="form_reporte_p">
                			<div class="row">
	                			<div class="col-md-4">
		                			<div class="form-group">
		                				<label for="fecha_desde_s" class="control-label">Fecha Desde</label>
		                				<input type="date" id="fecha_desde_s" class="form-control" >
		                			</div>
		                		</div>
		                		<div class="col-md-4">
		                			<div class="form-group">
		                				<label for="fecha_hasta_s" class="control-label">Fecha Hasta</label>
		                				<input type="date" id="fecha_hasta_s" class="form-control" >
		                			</div>
		                		</div>
		                		<div class="col-md-4">
		                			<div class="form-group">
		                				<input type="button" class="btn btn-block btn-success" value="Generar" id="btn_reporte_s">
		                			</div>
		                		</div>
	                		</div>
                		</form>
                    
                        <div id="cuerpo_tabla_suspendidos" class="table-responsive">
                    
                        </div>
                    
                </div>
                <div class="tab-pane" id="pill4" aria-labelledby="base-pill4">
                   
                		<form action="#" id="form_reporte_c">
                			<div class="row">
	                			<div class="col-md-4">
		                			<div class="form-group">
		                				<label for="fecha_desde_c" class="control-label">Fecha Desde</label>
		                				<input type="date" id="fecha_desde_c" class="form-control" >
		                			</div>
		                		</div>
		                		<div class="col-md-4">
		                			<div class="form-group">
		                				<label for="fecha_hasta_p" class="control-label">Fecha Hasta</label>
		                				<input type="date" id="fecha_hasta_c" class="form-control" >
		                			</div>
		                		</div>
		                		<div class="col-md-4">
		                			<div class="form-group">
		                				<input type="button" class="btn btn-block btn-success" value="Generar" id="btn_reporte_c">
		                			</div>
		                		</div>
	                		</div>
                		</form>
                    
                        <div id="cuerpo_tabla_caja" class="table-responsive">
                    
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
