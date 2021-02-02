<?php
$config =   array(
    'Login/validar_usuario'=>array(
        array('field'=>'Usuario','label'=>'Usuario','rules'=>'trim|required|min_length[6]|max_length[12]|xss_clean'),
        array('field'=>'Password','label'=>'Password','rules'=>'trim|required|min_length[4]|max_length[9]|xss_clean')
    ),
    'Users_create/registrar_empleado'=>array(
        array('field'=>'nombre_empleado','label'=>'Nombre','rules'=>'trim|required|xss_clean'),
        array('field'=>'appaterno_empleado','label'=>'Apellido Paterno','rules'=>'trim|required|xss_clean'),
        array('field'=>'apmaterno_empleado','label'=>'Apellido Materno','rules'=>'trim|required|xss_clean'),
    ),
    'Spaax/validar_registro_c'=>array(
        array('field'=>'Nombre','label'=>'Nombre','rules'=>'trim|required|min_length[3]|max_length[20]|xss_clean'),
        array('field'=>'Apellido_P','label'=>'Apellido Paterno','rules'=>'trim|required|min_length[3]|max_length[20]|xss_clean'),
        array('field'=>'Apellido_M','label'=>'Apellido Materno','rules'=>'trim|required|min_length[3]|max_length[20]|xss_clean'),
        array('field'=>'Calle','label'=>'Calle','rules'=>'trim|required|min_length[3]|max_length[20]|xss_clean'),
        array('field'=>'Numero','label'=>'Numero','rules'=>'trim|required|numeric|min_length[1]|max_length[5]|xss_clean'),
        array('field'=>'Localidad','label'=>'Localidad','rules'=>'trim|required|min_length[5]|max_length[30]|xss_clean'),
        array('field'=>'Municipio','label'=>'Municipio','rules'=>'trim|required|min_length[5]|max_length[30]|xss_clean'),
        array('field'=>'Entidad','label'=>'Entidad Federativa','rules'=>'trim|required|xss_clean'),
        array('field'=>'Fecha_Nac','label'=>'Fecha de Nacimiento','rules'=>'trim|required|xss_clean'),
        array('field'=>'Telefono','label'=>'Telefono','rules'=>'trim|required|numeric|min_length[10]|max_length[10]|xss_clean'),
        
    ),
    'Spaax/registrar_usuario'=>array(
        array('field'=>'Tipo','label'=>'Tipo','rules'=>'trim|required|xss_clean'),
        array('field'=>'NSS','label'=>'NSS','rules'=>'trim|required|min_length[11]|max_length[11]|xss_clean'),
        array('field'=>'Nombre','label'=>'Nombre','rules'=>'trim|required|min_length[3]|max_length[20]|xss_clean'),
        array('field'=>'Apellido_P','label'=>'Apellido Paterno','rules'=>'trim|required|min_length[3]|max_length[20]|xss_clean'),
        array('field'=>'Apellido_M','label'=>'Apellido Materno','rules'=>'trim|required|min_length[3]|max_length[20]|xss_clean'),
        array('field'=>'RFC','label'=>'RFC','rules'=>'trim|required|min_length[13]|max_length[13]|xss_clean'),
        array('field'=>'Fecha_Nac','label'=>'Fecha de Nacimiento','rules'=>'trim|required|xss_clean'),
        array('field'=>'Usuario','label'=>'Usuario','rules'=>'trim|required|min_length[6]|max_length[12]|xss_clean'),
        array('field'=>'Password','label'=>'Password','rules'=>'trim|required|min_length[6]|max_length[12]|xss_clean')
    ),
    'Spaax/pagar_bimestre'=>array(
        array('field'=>'Bimestre','label'=>'Bimestre','rules'=>'trim|required|xss_clean')
    ),
    'Spaax/validar_monto'=>array(
        array('field'=>'Tipo_Monto','label'=>'Tipo','rules'=>'trim|required|xss_clean'),
        array('field'=>'Cantidad','label'=>'Numero','rules'=>'trim|required|numeric|min_length[2]|max_length[4]|xss_clean'),
        
    ),
    'Spaax/registrar_gastos'=>array(
        array('field'=>'Descripcion_Gasto','label'=>'Descripción','rules'=>'trim|required|xss_clean'),
        array('field'=>'Monto_Gasto','label'=>'Monto','rules'=>'trim|required|numeric|xss_clean'),
        array('field'=>'Fecha_Gasto','label'=>'Fecha','rules'=>'trim|required|xss_clean'),
    )
);