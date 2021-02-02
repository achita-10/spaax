(function(){
	var base_url = document.getElementById('base_url').value;
    //Tipo de Pago
    $("#tipo_bimestral").on( 'change', function() {
        if( $(this).is(':checked') ) {
            $('.pago_bimestral').show();
            $('.pago_ingreso').css('display','none');
            $('#btn_pagar_ingreso').css('display','none');
        } 
    });
    $("#tipo_ingreso").on( 'change', function() {
        if( $(this).is(':checked') ) {
            $('.pago_ingreso').show();
            $('#btn_pagar_ingreso').show();
            $('.pago_bimestral').css('display','none');
        }
    });

    // Pagar Adeudo
    $('#btn_pagar_adeudo').on('click',function(e){
        e.preventDefault();
        swal({
            title: "¿Desea Pagar El Adeudo?",
            text: "Presione Aceptar Para Confirmar, o Cancelar Para Regresar",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        }).then((Cambiar)=> {
            if(Cambiar.value){
                $.ajax({
                    url:base_url+'pagar_adeudo',
                    type:'post',
                    dataType: 'json',
                    data:$('#form_adeudo').serialize(),
                }).done(function(respuesta){
                    if(respuesta.status==='Validado'){
                        swal('Pago Realizado Exitosamente','','success');
                        $('#modal_adeudo').modal('hide');
                    }else{
                        swal('Ocurrio un Error','','error');
                    }
                }).fail(function(){
                    swal('Error Obteniendo Datos Ajax','','error');
                }); 
             }
        });
    });
    var titulo='';
    // Boton para mostrar el modal de cambio de montos
    $('#cambiar_monto').on('click',function(e){
     
        $('#modal_monto').modal("show");
        $('#modal_realizar_pago').modal("hide");    
    });
    // Actualizar Monto
    $('#btn_act_monto').on('click',function(e){
        e.preventDefault();
        swal({
            title: "¿Desea Actualizar el Monto?",
            text: "Presione Aceptar Para Confirmar, o Cancelar Para Regresar",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        }).then((Cambiar)=> {
            if(Cambiar.value){
                $.ajax({
                    url:base_url+'validar_monto',
                    type:'post',
                    dataType: 'json',
                    data:$('#form_monto').serialize(),
                }).done(function(respuesta){
                    if(respuesta.status==='Validado'){
                        swal('Monto Actualizado','','success');
                        $('#modal_monto').modal('hide');
                    }else{
                        $.each(respuesta,function(input,value){
                            var elementos=$('#'+input); 
                            elementos.closest('div.form-group')
                                .removeClass('has-error')
                                .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                .find('.text-danger')
                                .remove();
                            elementos.after(value);
                        });
                    }
                }).fail(function(){
                    swal('Error Obteniendo Datos Ajax','','error');
                }); 
             }
        });
    });
	// Hospital Registrar Nuevo Cliente en la BD
    $('#btn_registrar_c').on('click',function(e){
        e.preventDefault();
        swal({
            title: "¿Desea Registrar un Nuevo Cliente?",
            text: "Presione Aceptar Para Confirmar, o Cancelar Para Regresar",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        }).then((Cambiar)=> {
            if(Cambiar.value){
                $.ajax({
                    url:base_url+'validar_registro_c/Registrar',
                    type:'post',
                    dataType: 'json',
                    data:$('#form_registro_clientes').serialize(),
                }).done(function(respuesta){
                    if(respuesta.status==='Validado'){
                        swal('Cliente Registrado Correctamente','','success');
                        setTimeout(function(){ 
                            $('#div_formulario_regitro_c').load(' #div_formulario_regitro_c');
                            window.open(base_url+'generar_contrato_pdf/Registro' , '_blank');
                        }, 2000);
                    }else{
                        $.each(respuesta,function(input,value){
                            var elementos=$('#'+input); 
                            elementos.closest('div.form-group')
                                .removeClass('has-error')
                                .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                .find('.text-danger')
                                .remove();
                            elementos.after(value);
                        });
                    }
                }).fail(function(){
                    swal('Error Obteniendo Datos Ajax','','error');
                }); 
             }
        });
    });
    // Actualizar Datos del Cliente
    $('#btn_Actualizar_Cliente').on('click',function(e){
        e.preventDefault();
        swal({
            title: "¿Desea Actualizar la Información del Cliente?",
            text: "Presione Aceptar Para Confirmar, o Cancelar Para Regresar",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        }).then((Cambiar)=> {
            if(Cambiar.value){
                $.ajax({
                    url:base_url+'validar_registro_c/Actualizar',
                    type:'post',
                    dataType: 'json',
                    data:$('#form_actualizar_cliente').serialize(),
                }).done(function(respuesta){
                    if(respuesta.status==='Validado'){
                        swal('Cliente Actualizado Correctamente','','success');
                        setTimeout(function(){ 
                            location.reload(true);
                        }, 2000);
                    }else{
                        $.each(respuesta,function(input,value){
                            var elementos=$('#'+input); 
                            elementos.closest('div.form-group')
                                .removeClass('has-error')
                                .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                .find('.text-danger')
                                .remove();
                            elementos.after(value);
                        });
                    }
                }).fail(function(){
                    swal('Error Obteniendo Datos Ajax','','error');
                }); 
             }
        });
    });
     // Pagar Ingreso
    $('#btn_pagar_ingreso').on('click',function(e){
        e.preventDefault();
        swal({
            title: "¿Desea Realizar El Pago De Nuevo Ingreso?",
            text: "Presione Aceptar Para Confirmar, o Cancelar Para Regresar",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        }).then((Cambiar)=> {
            if(Cambiar.value){
                $.ajax({
                    url:base_url+'pagar_ingreso',
                    type:'post',
                    dataType: 'json',
                    data:$('#form_realizar_pago').serialize(),
                }).done(function(respuesta){
                    if(respuesta.status==='Completado'){
                        swal('Pago Realizado Exitosamente','','success');
                        $('#modal_realizar_pago').modal('hide');
                    }else if(respuesta.status==='Pagado'){
                        swal('Ya Se Realizo El Pago De Nuevo Ingreso','','info');
                    }else{
                        swal('Ocurrio un Error','','error');
                    }
                }).fail(function(){
                    swal('Error Obteniendo Datos Ajax','','error');
                }); 
             }else{

             }
        });
    });
    // Agregar Adeudo
    $('#btn_agregar_adeudos').on('click',function(e){
        e.preventDefault();
        swal({
            title: "¿Desea Agregar Los Adeudos Del Bimestre?",
            text: "Presione Aceptar Para Confirmar, o Cancelar Para Regresar",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        }).then((Cambiar)=> {
            if(Cambiar.value){
                $.ajax({
                    url:base_url+'agregar_adeudos',
                    type:'post',
                    dataType: 'json',
                    data:$('#form_realizar_pago').serialize(),
                }).done(function(respuesta){
                    if(respuesta.status==='Completado'){
                        swal('Adeudos Agregados Correctamente','','success');
                    }else if(respuesta.status==='Adeudo'){
                        swal('No Se Pueden Agregar Los Adeudos En Este Mes','','info');
                    }else if(respuesta.status==='Dia'){
                        swal('No Se Pueden Agregar Adeudos Antes De La Fecha Limite','','info');
                    }else if(respuesta.status==='No'){
                        swal('Los Adeudos Del Bimestre Ya Se Registraron','','info');
                    }else{
                        swal('Ocurrio un Error','','error');
                    }
                }).fail(function(){
                    swal('Error Obteniendo Datos Ajax','','error');
                }); 
             }else{
                
             }
        });
    });
    // Reporte de Deudores
    $('#btn_reporte_p').on('click',function(e){
        e.preventDefault();
        swal({
            title: 'Desea Generar El Reporte De Clientes Puntuales?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                desde=jQuery('#fecha_desde_p').val();
                hasta=jQuery('#fecha_hasta_p').val();
                $.ajax({
                    url: base_url+'consultar_reporte_pdf/Puntuales',
                    type: 'post',
                    data: 'Desde='+desde+'&Hasta='+hasta,
                    dataType: 'json',
                }).done(function(respuesta){
                    if(respuesta.status===false){
                        swal('No Existen Registros','','error');
                    }else{
                        window.open(base_url+'generar_reporte_pdf/'+desde+'/'+hasta+'/Puntuales' , '_blank');
                    }
                });
            }
        });
    });
    // Reporte de Puntuales
    $('#btn_reporte_d').on('click',function(e){
        e.preventDefault();
        swal({
            title: 'Desea Generar El Reporte De Clientes Deudores?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                desde=jQuery('#fecha_desde_d').val();
                hasta=jQuery('#fecha_hasta_d').val();
                $.ajax({
                    url: base_url+'consultar_reporte_pdf/Adeudos',
                    type: 'post',
                    data: 'Desde='+desde+'&Hasta='+hasta,
                    dataType: 'json',
                }).done(function(respuesta){
                    if(respuesta.status===false){
                        swal('No Existen Registros','','error');
                    }else{
                        window.open(base_url+'generar_reporte_pdf/'+desde+'/'+hasta+'/Adeudos' , '_blank');
                        
                    }
                });
            }
        });
    });
    // Reporte de Suspendidos
    $('#btn_reporte_s').on('click',function(e){
        e.preventDefault();
        swal({
            title: 'Desea Generar El Reporte De Clientes Suspendidos?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                desde=jQuery('#fecha_desde_s').val();
                hasta=jQuery('#fecha_hasta_s').val();
                $.ajax({
                    url: base_url+'consultar_reporte_pdf/Suspendidos',
                    type: 'post',
                    data: 'Desde='+desde+'&Hasta='+hasta,
                    dataType: 'json',
                }).done(function(respuesta){
                    if(respuesta.status===false){
                        swal('No Existen Registros','','error');
                    }else{
                        window.open(base_url+'generar_reporte_pdf/'+desde+'/'+hasta+'/Suspendidos' , '_blank');
                        
                    }
                });
            }
        });
    });
    // Reporte de caja
    $('#btn_reporte_c').on('click',function(e){
        e.preventDefault();
        swal({
            title: 'Desea Generar El Reporte De Gastos?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                desde=jQuery('#fecha_desde_c').val();
                hasta=jQuery('#fecha_hasta_c').val();
                $.ajax({
                    url: base_url+'consultar_reporte_caja',
                    type: 'post',
                    data: 'Desde='+desde+'&Hasta='+hasta,
                    dataType: 'json',
                }).done(function(respuesta){
                    if(respuesta.status===false){
                        swal('No Existen Registros','','error');
                    }else{
                        window.open(base_url+'generar_reporte_caja/'+desde+'/'+hasta , '_blank');
                        
                    }
                });
            }
        });
    });
    jQuery('#btn_mostrar_gasto').on('click',function(){
        jQuery.ajax({
            url: base_url+'consultar_adeudos',
            type: 'post',
            dataType: 'json',
        }).done(function(respuesta){
            jQuery('#modal_gasto').modal('show');
            jQuery('#Fecha_Gasto').val(respuesta.Fecha);
        }).fail(function(){

        });
        
    });
    // Registrar Gastos
    $('#btn_registrar_gastos').on('click',function(e){
        e.preventDefault();
        swal({
            title: 'Desea Registrar el Gasto?',
            text: "Presione Aceptar Para Confirmar, o Cancelar Para Regresar",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        }).then(function (result) {
            if (result.value) {
                
                $.ajax({
                    url: base_url+'registrar_gastos',
                    type: 'post',
                    data: jQuery('#form_gasto').serialize(),
                    dataType: 'json',
                }).done(function(respuesta){
                    if(respuesta.status){
                        jQuery("#form_gasto").get(0).reset();
                        jQuery('#modal_gasto').modal('hide');
                        swal('Gasto Registrado Correctamente','','success');
                    }else{
                        $.each(respuesta,function(input,value){
                            var elementos=$('#'+input); 
                            elementos.closest('div.form-group')
                                .removeClass('has-error')
                                .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                .find('.text-danger')
                                .remove();
                            elementos.after(value);
                        });  
                    }
                }).fail(function(){
                    swal('Error Obteniendo Datos Ajax','','error');
                });
            }
        });
    });
    $('.cambiar-entrada').on('keyup',function(){
		$(this).parents('.form-group').find('.text-danger').html(" ");
	});
    // Pagar Adeudo
    $('#btn_registrar_empleado').on('click',function(e){
        e.preventDefault();
        swal({
            title: "¿Desea Registrar Empleado?",
            text: "Presione Aceptar Para Confirmar, o Cancelar Para Regresar",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        }).then((Cambiar)=> {
            if(Cambiar.value){
                $.ajax({
                    url:base_url+'registrar_empleado',
                    type:'post',
                    dataType: 'json',
                    data:$('#form_registrar_empleado').serialize(),
                }).done(function(respuesta){
                    if(respuesta.status==='Validado'){
                        swal('Empleado Registrado','','success');
                        $('#registrar_nuevo_empleado').modal('hide');
                    }else{
                        $.each(respuesta,function(input,value){
                            var elementos=$('#'+input); 
                            elementos.closest('div.form-group')
                                .removeClass('has-error')
                                .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                .find('.text-danger')
                                .remove();
                            elementos.after(value);
                        }); 
                    }
                }).fail(function(){
                    swal('Error Obteniendo Datos Ajax','','error');
                }); 
             }
        });
    });
}());
    