<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*Inicio de la reglas de ruteo de hospital*/
$route['Principal/Especialidad/(:any)'] = 'Principal/Especialidad/$1';
$route['principal'] = 'principal/index';
$route['recepcion'] = 'recepcion/create';
$route['clientes']='Spaax/clientes';
$route['validar_registro_c/(:any)'] = 'Spaax/validar_registro_c/$1';
$route['suspension']='Spaax/suspension';
$route['modificar_cliente/(:num)']=	'Spaax/modificar_cliente/$1';
$route['ajax_realizar_pago/(:any)']='Spaax/ajax_realizar_pago/$1';
$route['suspender_toma/(:any)']	='Spaax/suspender_toma/$1';
$route['pago_adeudo']='Spaax/pago_adeudo';
$route['reactivar_toma']='Spaax/reactivar_toma';
$route['validar_monto']='Spaax/validar_monto';
$route['consultar_adeudos']='Spaax/consultar_adeudos';
$route['pagar_bimestre/(:any)']='Spaax/pagar_bimestre/$1';
$route['consultar_adeudo']='Spaax/consultar_adeudo';
$route['pagar_adeudo']='Spaax/pagar_adeudo';
$route['pago_bimestral']='Spaax/pago_bimestral';
$route['verificar_pago']='Spaax/verificar_pago';
$route['ajax_pagar_bimestre']='Spaax/ajax_pagar_bimestre';
$route['pagar_ingreso']='Spaax/pagar_ingreso';
$route['agregar_adeudos']='Spaax/agregar_adeudos';
$route['reportes']='Spaax/reportes';
$route['consultar_reporte_pdf/(:any)']='Spaax/consultar_reporte_pdf/$1';
$route['generar_reporte_pdf/(:any)/(:any)/(:any)']='Spaax/generar_reporte_pdf/$1/$2/$3';
$route['generar_contrato_pdf/(:any)']='Spaax/generar_contrato_pdf/$1';
$route['generar_reporte_caja/(:any)/(:any)']='Spaax/generar_reporte_caja/$1/$2';
$route['caja']='Spaax/caja';
$route['registrar_gastos']='Spaax/registrar_gastos';
$route['consultar_gastos']='Spaax/consultar_gastos';
$route['consultar_reporte_caja']='Spaax/consultar_reporte_caja';
$route['registrar_empleado']='Users_create/registrar_empleado';
/*tablas*/
$route['tabla_clientes']=	'Spaax/ajax_tabla_clientes';
$route['tabla_pago']='Spaax/ajax_tabla_pago';
$route['tabla_cancelacion']='Spaax/ajax_tabla_suspension';
$route['tabla_adeudos']='Spaax/ajax_tabla_adeudos';
$route['ajax_tabla_reporte/(:any)']='Spaax/ajax_tabla_reporte/$1';
$route['tabla_empleados']='Users_create/ajax_tabla_empleados';