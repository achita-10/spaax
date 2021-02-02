 var base_url = document.getElementById('base_url').value;
 var unico=1;
(function(){
    var base_url = document.getElementById('base_url').value;
    var actualizar; //for save method string
    var table_pagos,table_adeudo,table_cancelacion,tabla_clientes,table_reactivacion,table_pago_realizado;
    var table_adeudos,table_reporte_d,table_reporte_p,table_empleado;
    //tabla Empleado
    table_empleado = $('#tabla_empleados').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url+"tabla_empleados",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
    });
    
    //tabla Clientes
    tabla_clientes = $('#tabla_clientes').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url+"tabla_clientes",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
    });
    
    //pagos bimetrales
    table_pagos = $('#table_pagos').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url+"tabla_pago",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
    });
    
    /*     ADEUDOS    */
    //datatables
    table_adeudos = $('#table_adeudos').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url+"tabla_adeudos",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
    });
    //datatables
    table_cancelacion = $('#table_cancelacion').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url+"tabla_cancelacion/",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
     //Reportes 
    table_reporte_d = $('#table_reporte_d').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url+"ajax_tabla_reporte/Adeudos",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
    table_reporte_p = $('#table_reporte_p').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url+"ajax_tabla_reporte/Puntuales",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
    
    //Actualizar Las tablas Cada Cierto Tiempo
    $(document).ready(function(){
        window.setInterval(
            function(){
                table_pagos.ajax.reload(null,false); //reload datatable ajax 
                table_adeudos.ajax.reload(null,false); //reload datatable ajax 
                table_cancelacion.ajax.reload(null,false); //reload datatable ajax 
                tabla_clientes.ajax.reload(null,false); //reload datatable ajax
                table_empleado.ajax.reload(null,false);
            }
        ,10000);
    });

    
    function reload_table(){
        table_pagos.ajax.reload(null,false); //reload datatable ajax 
        table_adeudos.ajax.reload(null,false); //reload datatable ajax 
        table_cancelacion.ajax.reload(null,false); //reload datatable ajax 
        tabla_clientes.ajax.reload(null,false); //reload datatable ajax
        
    }
}());

    function modificar_cliente(toma,cliente){
        $.ajax({
            url:base_url+'modificar_cliente/'+cliente,
            type:'post',
            dataType: 'json',
            
        }).done(function(respuesta){
            if (respuesta.Cliente) {
                $('#Toma').val(toma);
                $('#Apellido_P').val(respuesta.Cliente.Apellido_P);
                $('#Apellido_M').val(respuesta.Cliente.Apellido_M);
                $('#Nombre').val(respuesta.Cliente.Nombre);
                $('#Telefono').val(respuesta.Cliente.Telefono);
                $('#Fecha_Nac').val(respuesta.Cliente.Fecha_Nac);

                $('#Calle').val(respuesta.Direccion.Calle);
                $('#Numero').val(respuesta.Direccion.Numero);
                $('#Localidad').val(respuesta.Direccion.Localidad);
                $('#Municipio').val(respuesta.Direccion.Municipio);
                $('#Fecha_Igr').val(respuesta.Direccion.Fecha_Ingreso);

                $('#modal_cliente_m').modal('show');
            }
        }).fail(function(){
            swal('Error Obteniendo Datos Ajax','','error');
        }); 
    }
    function realizar_pago(toma,cliente){
        $('#botones_pago').load(' #botones_pago');
        $.ajax({
            url:base_url+'ajax_realizar_pago/'+cliente,
            type:'post',
            dataType: 'json',
            data:'Toma='+toma,
        }).done(function(respuesta){
            if (respuesta.status==='Cancelado') {
                swal('Cliente Suspendido','','warning');
            }else{
                var uno='',dos='',tres='',cuatro='',cinco='',seis='';

                //uno=''
                //uno=success else uno=''

                $('#Nombre_P').val(respuesta.Cliente.Nombre);
                $('#Apellido_P_P').val(respuesta.Cliente.Apellido_P);
                $('#Apellido_M_P').val(respuesta.Cliente.Apellido_M);
                $('#Toma_P').val(toma);
                $('#Monto_B').val(respuesta.M_B.Monto);
                $('#Monto_I').val(respuesta.M_I.Monto);
                $('#Fecha_P').val(respuesta.Fecha);
                if(respuesta.Pagado){
                    var registros = eval(respuesta.Pagado);
                    for (var i = 0; i < registros.length; i++) {
                        if(registros[i]['Bimestre']==='1'){
                            uno='success';
                        }else if(registros[i]['Bimestre']==='2'){
                            dos='success';
                        }else if(registros[i]['Bimestre']==='3'){
                            tres='success';
                        }else if(registros[i]['Bimestre']==='4'){
                            cuatro='success';
                        }else if(registros[i]['Bimestre']==='5'){
                            cinco='success';
                        }else {
                            seis='success';
                        }
                    }
                }
                if (respuesta.Adeudo){
                   var registros = eval(respuesta.Adeudo);
                    for (var i = 0; i < registros.length; i++) {
                        if(registros[i]['Bimestre']==='1'){
                            uno='danger';
                        }else if(registros[i]['Bimestre']==='2'){
                            dos='danger';
                        }else if(registros[i]['Bimestre']==='3'){
                            tres='danger';
                        }else if(registros[i]['Bimestre']==='4'){
                            cuatro='danger';
                        }else if(registros[i]['Bimestre']==='5'){
                            cinco='danger';
                        }else {
                            seis='danger';
                        }
                    } 
                }
                var contador=7;
                
                setTimeout(function(){
                    for (var i = 1; i < contador; i++) {
                        var titulo
                        if(i===1){
                            titulo='Ene-Feb';
                            if(uno===''){
                                color='info';
                            }else{
                                color=uno;
                            }
                        }else if(i===2){
                            titulo='Mar-Abr';
                            if(dos===''){
                                color='info';
                            }else{
                                color=dos;
                            }
                        }else if(i===3){
                            titulo='May-Jun';
                            if(tres===''){
                                color='info';
                            }else{
                                color=tres;
                            }
                        }else if(i===4){
                            titulo='Jul-Ago';
                            if(cuatro===''){
                                color='info';
                            }else{
                                color=cuatro;
                            }
                        }else if(i===5){
                            titulo='Sep-Oct';
                            if(cinco===''){
                                color='info';
                            }else{
                                color=cinco;
                            }
                        }else {
                            titulo='Nov-Dic';
                            if(seis===''){
                                color='info';
                            }else{
                                color=seis;
                            }
                        }
                        jQuery('#botones_pago').append(
                        '<div class="col-xs-12 col-sm-4 col-md-4">'
                            +'<div class="form-group">'
                                +'<a class="btn  btn-'+color+'" href="javascript:void(0)" title="Pagar Bimestre" onclick="prueba_pagar('+"'"+i+"'"+')"> '+titulo+'</a>'
                            +'</div>'
                        +'</div>'
                        );
                    }
                },1000);
                
                $('#modal_realizar_pago').modal('show');
            }
        }).fail(function(){
            swal('Error Obteniendo Datos Ajax','','error');
        });
    }
    function cancelar_toma(toma){
        swal({
            title: "¿Desea Suspender La Toma "+toma+"?",
            text: "Presione Aceptar Para Confirmar, o Cancelar Para Regresar",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        }).then((Cambiar)=> {
            if(Cambiar.value){
                $.ajax({
                    url:base_url+'suspender_toma/'+toma,
                    type:'post',
                    dataType: 'json',
                    data:$('#form_actualizar_cliente').serialize(),
                }).done(function(respuesta){
                    if(respuesta.status){
                        swal('Cliente Suspendido','','success');
                        setTimeout(function(){ 
                            location.reload(true);
                        }, 2000);
                    }else{
                       swal('Este Cliente Ya Esta Suspendido','','info');
                    }
                }).fail(function(){
                    swal('Error Obteniendo Datos Ajax','','error');
                }); 
             }
        });
    }

    function reactivar_toma(toma){
        swal({
            title: "¿Desea Reactivar La Toma "+toma+"?",
            text: "Presione Aceptar Para Confirmar, o Cancelar Para Regresar",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        }).then((Cambiar)=> {
            if(Cambiar.value){
                $.ajax({
                    url:base_url+'reactivar_toma',
                    type:'post',
                    dataType: 'json',
                    data:'Toma='+toma,
                }).done(function(respuesta){
                    if(respuesta.status){
                        swal('Cliente Reactivado','','success');
                        setTimeout(function(){ 
                            location.href=base_url+'pago_bimestral'; 
                        }, 3000);
                    }else{
                       swal('Pagar Adeudos','','error');
                       setTimeout(function(){ 
                            location.href=base_url+'pago_adeudo'; 
                        }, 3000);
                    }
                }).fail(function(){
                    swal('Error Obteniendo Datos Ajax','','error');
                }); 
             }
        });
    }
    function pagar_adeudo(id){
        $.ajax({
            url:base_url+'consultar_adeudo',
            type:'post',
            dataType: 'json',
            data:'ID='+id,
        }).done(function(respuesta){
            if(respuesta){
                $('#ID_Adeudo').val(id);
                $('#Toma_Adeudo').val(respuesta.Toma);
                $('#Monto_Adeudo').val(respuesta.Monto);
                if(respuesta.Bimestre==='1'){
                    bimestre='Enero - Febrero';
                }else if(respuesta.Bimestre==='2'){
                    bimestre='Marzo - Abril';
                }else if(respuesta.Bimestre==='3'){
                    bimestre='Mayo - Junio';
                }else if(respuesta.Bimestre==='4'){
                    bimestre='Julio - Agosto';
                }else if(respuesta.Bimestre==='5'){
                    bimestre='Septiembre - Octubre';
                }else{
                    bimestre='Noviembre - Diciembre';
                }
                $('#Bimestre_Adeudo').val(bimestre);
                $('#Fecha_Adeudo').val(respuesta.Fecha_Adeudo);
                $('#modal_adeudo').modal('show');
            }else{
               swal('Ocurrio un Error','','error');
            }
        }).fail(function(){
            swal('Error Obteniendo Datos Ajax','','error');
        }); 
        
    }
    function prueba_pagar(bimestre){
        if(bimestre==='1'){
            titulo='Ene-Feb';
        }else if(bimestre==='2'){
            titulo='Mar-Abr';
        }else if(bimestre==='3'){
            titulo='May-Jun';
        }else if(bimestre==='4'){
            titulo='Jul-Ago';
        }else if(bimestre==='5'){
            titulo='Sep-Oct';
        }else {
            titulo='Nov-Dic';
        }
        
        $.ajax({
            url:base_url+'verificar_pago',
            type:'post',
            dataType: 'json',
            data:$('#form_realizar_pago').serialize()+'&Bimestre='+bimestre
        }).done(function(respuesta){
            if(respuesta.status==='Pagado'){
                swal('El Bimestre Ya Está Pagado','','info');
            }else if(respuesta.status==='Adeudo'){
                swal('Este Bimestre Debe Pagarse En La Vista Adeudos','','error');
                setTimeout(function(){ 
                    location.href=base_url+'pago_adeudo'; 
                }, 3000);
            }else if(respuesta.status==='Ingreso'){
                swal('Debe Realizar El Pago De Ingreso','','info');
                
            }else{
                swal({
                    title: "¿Desea Pagar El Bimestre "+titulo+"?",
                    text: "Presione Aceptar Para Confirmar, o Cancelar Para Regresar",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar'
                }).then((Cambiar)=> {
                    if(Cambiar.value){
                        $.ajax({
                            url:base_url+'ajax_pagar_bimestre',
                            type:'post',
                            dataType: 'json',
                            data:$('#form_realizar_pago').serialize()+'&Bimestre='+bimestre,
                        }).done(function(respuesta){
                            if(respuesta.status==='Completado'){
                                swal('Pago Realizado Correctamente','','success');
                                setTimeout(function(){ 
                                    location.href=base_url+'pago_bimestral'; 
                                }, 3000);
                            }else{
                               swal('Ocurrio un Error','','error');
                            }
                        }).fail(function(){
                            swal('Error Obteniendo Datos Ajax','','error');
                        }); 
                     }
                });
            }
            
        }).fail(function(){
            swal('Error Obteniendo Datos Ajax','','error');
        }); 
    }
    
    $('#fecha_desde_d').change(function () {
        desde=jQuery('#fecha_desde_d').val();
        hasta=jQuery('#fecha_hasta_d').val();
        tabla='tabla_deudores';
        cuerpo='cuerpo_tabla_deudores';
        tipo='Adeudos';
        mostrarReporte_recepcion(desde,hasta,tabla,cuerpo,tipo);
    });

    $('#fecha_hasta_d').change(function () {
        desde=jQuery('#fecha_desde_d').val();
        hasta=jQuery('#fecha_hasta_d').val();
        tabla='tabla_deudores';
        cuerpo='cuerpo_tabla_deudores';
        tipo='Adeudos';
        mostrarReporte_recepcion(desde,hasta,tabla,cuerpo,tipo);
    });

    $('#fecha_desde_p').change(function () {
        desde=jQuery('#fecha_desde_p').val();
        hasta=jQuery('#fecha_hasta_p').val();
        tabla='tabla_puntuales';
        cuerpo='cuerpo_tabla_puntuales';
        tipo='Puntuales';
        mostrarReporte_recepcion(desde,hasta,tabla,cuerpo,tipo);
    });

    $('#fecha_hasta_p').change(function () {
        desde=jQuery('#fecha_desde_p').val();
        hasta=jQuery('#fecha_hasta_p').val();
        tabla='tabla_puntuales';
        cuerpo='cuerpo_tabla_puntuales';
        tipo='Puntuales';
        mostrarReporte_recepcion(desde,hasta,tabla,cuerpo,tipo);
    });

    $('#fecha_desde_s').change(function () {
        desde=jQuery('#fecha_desde_s').val();
        hasta=jQuery('#fecha_hasta_s').val();
        tabla='tabla_suspendidos';
        cuerpo='cuerpo_tabla_suspendidos';
        tipo='Suspendidos';
        mostrarReporte_recepcion(desde,hasta,tabla,cuerpo,tipo);
    });

    $('#fecha_hasta_s').change(function () {
        desde=jQuery('#fecha_desde_s').val();
        hasta=jQuery('#fecha_hasta_s').val();
        tabla='tabla_suspendidos';
        cuerpo='cuerpo_tabla_suspendidos';
        tipo='Suspendidos';
        mostrarReporte_recepcion(desde,hasta,tabla,cuerpo,tipo);
    });
    $('#fecha_desde_c').change(function () {
        desde=jQuery('#fecha_desde_c').val();
        hasta=jQuery('#fecha_hasta_c').val();
        mostrarReporte_caja(desde,hasta);
    });

    $('#fecha_hasta_c').change(function () {
        desde=jQuery('#fecha_desde_c').val();
        hasta=jQuery('#fecha_hasta_c').val();
        mostrarReporte_caja(desde,hasta);
    });
    //script para mostrar tabla de ingreso a urgencia
    function mostrarReporte_caja(desde,hasta){
        
        $.ajax({
            url: base_url+"consultar_reporte_caja",
            type:"POST",
            data:{Desde:desde, Hasta: hasta},
            dataType:'json',
        }).done(function(respuesta){
            if(respuesta.status===false){

            }else{
                var registros = eval(respuesta);
                var encabezado='';
                html ="<table id='tabla_consulta_caja' class='table table-striped table-bordered table-hover' width='100%' >";
                
                html +="<thead ><tr><th>ID</th><th>Descripción</th><th>Monto</th><th >Fecha</th></tr></thead>";
                              
                html +="<tbody>";
                for (var i = 0; i < registros.length; i++) {
                    html +="<tr><td>"
                    +registros[i]["ID"]+"</td><td>"
                    +registros[i]["Descripcion"]+"</td><td>"
                    +registros[i]["Gasto"]+"</td><td >"
                    +registros[i]["Fecha_Gasto"]+"</td>"
                    ;
                };
               html +="</tbody></table>";
                $("#cuerpo_tabla_caja").html(html);
                $('#tabla_consulta_caja').dataTable();
            }
        });
    }
    //script para mostrar tabla de ingreso a urgencia
    function mostrarReporte_recepcion(desde,hasta,tabla,cuerpo,tipo){
        
        $.ajax({
            url: base_url+"consultar_reporte_pdf/"+tipo,
            type:"POST",
            data:{Desde:desde, Hasta: hasta},
            dataType:'json',
        }).done(function(respuesta){
            if(respuesta.status===false){

            }else{
                var registros = eval(respuesta);
                var encabezado='';
                html ="<table id='"+tabla+"' class='table table-striped table-bordered table-hover' width='100%' >";
                for(var i=0;i<registros.length;i++){
                    encabezado = registros[i]["Tipo"];
                }   
                if(encabezado==='1'){
                        html +="<thead ><tr><th>Toma</th><th>Nombre</th><th>Apellido_P</th><th >Apellido_M</th><th >Direccion</th><th >Fecha</th></tr></thead>";
                    }else{
                        html +="<thead ><tr><th>Toma</th><th>Nombre</th><th>Apellido_P</th><th >Apellido_M</th><th >Direccion</th><th >Monto</th><th >Bimestre</th><th >Fecha</th></tr></thead>";
                    }             
                html +="<tbody>";
                for (var i = 0; i < registros.length; i++) {
                    if(registros[i]["Tipo"]==='1'){
                        html +="<tr><td>"
                        +registros[i]["Toma"]+"</td><td>"
                        +registros[i]["Nombre"]+"</td><td>"
                        +registros[i]["Apellido_P"]+"</td><td >"
                        +registros[i]["Apellido_M"]+"</td><td>"
                        +registros[i]["Calle"]+"</td><td>"
                        
                        +registros[i]["Fecha"]+"</td></tr>";
                    }else{
                        html +="<tr><td>"
                        +registros[i]["Toma"]+"</td><td>"
                        +registros[i]["Nombre"]+"</td><td>"
                        +registros[i]["Apellido_P"]+"</td><td >"
                        +registros[i]["Apellido_M"]+"</td><td>"
                        +registros[i]["Calle"]+"</td><td>"
                        +registros[i]["Monto"]+"</td><td>"
                        +registros[i]["Bimestre"]+"</td><td>"
                        +registros[i]["Fecha"]+"</td></tr>";
                    }
                    
                };
               html +="</tbody></table>";
                $("#"+cuerpo).html(html);
                $('#'+tabla).dataTable( );
            }
        });
    }
    function generar_contrato(id){
        swal({
            title:'¿Desea Generar El Contrato del Cliente ?',
            text:'Presione Aceptar Para Confirmar, o Cancelar Para Regresar',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        }).then((Generar)=>{
            if(Generar.value){
                window.open(base_url+'generar_contrato_pdf/'+id, '_blank');
            }
        });
    }

    /*corte de caja*/
    
    $('#fecha_desde_e').change(function () {
        desde=jQuery('#fecha_desde_e').val();
        hasta=jQuery('#fecha_hasta_e').val();
        cuerpo='corte_caja';
        mostrarcortecaja(desde,hasta,cuerpo);
    });

    $('#fecha_hasta_e').change(function () {
        desde=jQuery('#fecha_desde_e').val();
        hasta=jQuery('#fecha_hasta_e').val();
        cuerpo='corte_caja';
        mostrarcortecaja(desde,hasta,cuerpo);
    });

    function mostrarcortecaja(desde,hasta,cuerpo){
        jQuery.ajax({
            url: base_url+"consultar_gastos",
            type:"POST",
            data:{Desde:desde, Hasta: hasta},
            dataType:'json',
        }).done(function(respuesta){
            if(respuesta.status===false){
                
            }else{
                var valor='';
                var Entradas=0,Salidas=0,Ingresos=0,T_Entradas=0,T_Salidas=0,T_Caja=0,T_Ingresos=0;
                $.each(respuesta.Entradas,function(input,value){
                    T_Entradas+=parseInt(value.Monto);
                    Entradas++;
                });
                $.each(respuesta.Salidas,function(input,value){
                    T_Salidas+=parseInt(value.Gasto);
                    Salidas++;
                });
                if(respuesta.Ingreso){
                    $.each(respuesta.Ingreso,function(input,value){
                        T_Ingresos+=parseInt(value.Monto);
                        Ingresos++;
                    });
                }else{
                    Ingresos=0;
                    T_Ingresos=0;
                }
                T_Caja=(T_Entradas+T_Ingresos)-T_Salidas;
                var html='<div class="col-sm-3 col-md-3"> <div class="form-group"> <label >Número de Entradas</label><input type="text" class="form-control" value='+Entradas+' readonly="" ></div></div>'
                html+='<div class="col-sm-3 col-md-3"> <div class="form-group"> <label >Total de Entradas</label><input type="text" class="form-control" value='+T_Entradas+' readonly="" ></div></div>'
                html+='<div class="col-sm-3 col-md-3"> <div class="form-group"> <label >Número de Salidas</label><input type="text" class="form-control" value='+Salidas+' readonly="" ></div></div>'
                html+='<div class="col-sm-3 col-md-3"> <div class="form-group"> <label >Total de Salidas</label><input type="text" class="form-control" value='+T_Salidas+' readonly="" ></div></div>'
                html+='<div class="col-sm-3 col-md-3"> <div class="form-group"> <label >Número de Ingresos</label><input type="text" class="form-control" value='+Ingresos+' readonly="" ></div></div>'
                html+='<div class="col-sm-3 col-md-3"> <div class="form-group"> <label >Total de Ingresos</label><input type="text" class="form-control" value='+T_Ingresos+' readonly="" ></div></div>'
                html+='<div class="col-sm-3 col-md-3"> <div class="form-group"> <label >Total en Caja</label><input type="text" class="form-control" value='+T_Caja+' readonly="" ></div></div>'
                html+='';
                $("#corte_caja").html(html);
                
            }
        }).fail(function(){

        });
    }

    function crear_usuario(ID){
        jQuery('#modal_crear_usuario').modal('show');
        jQuery('#id_empleado').val(ID);
    }

    /*$(document).ready(function(){
        window.setInterval(
            function(){
                $.ajax({
                    url:base_url+'consultar_adeudos',
                    type:'post',
                    dataType: 'json',
                    
                }).done(function(respuesta){
                    var nombres = respuesta.Fecha.split("-");
                    if(nombres[1]==='02' || nombres[1]==='04' || nombres[1]==='06' || nombres[1]==='08' || nombres[1]==='10' || nombres[1]==='12'){
                        if(nombres[2]==='07'){

                        }
                    }else{
                        swal('Otro Mes','','success');
                    }
                }).fail(function(){
                    swal('Error Obteniendo Datos Ajax','','error');
                }); 
            }
        ,5000);
    });
    $(document).ready(function(){
        window.setInterval(
            function(){
                $.ajax({
                    url:base_url+'consultar_adeudos',
                    type:'post',
                    dataType: 'json',
                    
                }).done(function(respuesta){
                    var nombres = respuesta.Fecha.split("-");
                    if(nombres[1]==='01' AND nombres[2]==='01'){
                        swal('Nuevos Pagos');
                    }else{
                        swal('Otro Mes','','success');
                    }
                }).fail(function(){
                    swal('Error Obteniendo Datos Ajax','','error');
                }); 
            }
        ,5000);
    });*/
    






