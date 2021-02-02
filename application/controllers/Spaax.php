<?php
class Spaax extends MY_Controller{

	public function __Construct(){
		parent::__construct();	
		if(!$this->is_logged_in()){
			redirect(BASE_URL());
		}else{
			$this->load->model('Usuarios_model','Modelo');
            $this->load->library('pdfgenerator');
		}
	}
	public function cargar_vista($titulo,$contenido,$datos){
        
        if($datos===null){
            $data                   =   new stdClass();
            $data->title            =   $titulo;
            $data->contenido        =   $contenido;
            $this->load->view('frontend',$data);
        }else{
            $data                   =   new stdClass();
            foreach ($datos as $key => $value) {
                $data->$key         =   $value;
            }
            $data->title            =   $titulo;
            $data->contenido        =   $contenido;
            $this->load->view('frontend',$data);
        }
        
    }
	public function registrar_cliente(){
		$respuesta	=	$this->Modelo->consultar_toma();
		if($respuesta){
			$datos 		=	array(
							'valor'		=>	$respuesta->Numero+1,
							'Fecha'		=>	date('Y-m-d')
						);
		}else{
			$datos 		=	array(
							'valor'		=>	1,
							'Fecha'		=>	date('Y-m-d')
						);
		}
        $titulo            =   "Registrar Signos Vitales";
        $contenido         =   'pagos/Registrar_Cliente';
        $this->cargar_vista($titulo,$contenido,$datos);
		
	}
	public function validar_registro_c($opcion){
		if(!$this->form_validation->run()){
            $json   =   array(
                        'Nombre' => form_error('Nombre','<span class="text-danger">','</span>'),
                        'Apellido_P' => form_error('Apellido_P','<span class="text-danger">','</span>'),
                        'Apellido_M' => form_error('Apellido_M','<span class="text-danger">','</span>'),
                        'Calle' => form_error('Calle','<span class="text-danger">','</span>'),
                        'Numero' => form_error('Numero','<span class="text-danger">','</span>'),
                        'Localidad' => form_error('Localidad','<span class="text-danger">','</span>'),
                        'Municipio' => form_error('Municipio','<span class="text-danger">','</span>'),
                        'Entidad' => form_error('Entidad','<span class="text-danger">','</span>'),
                        'Fecha_Nac' => form_error('Fecha_Nac','<span class="text-danger">','</span>'),
                        
                        'Telefono' => form_error('Telefono','<span class="text-danger">','</span>'),
                        
                    );
            $this->output->set_content_type('application/json')->set_output(json_encode($json));
        }else{
            $Toma 			=	$this->input->post('Toma');
            $Nombre 		=	$this->input->post('Nombre');
            $Apellido_P 	=	$this->input->post('Apellido_P');
            $Apellido_M 	=	$this->input->post('Apellido_M');
            $Calle 			=	$this->input->post('Calle');
            $Numero 		=	$this->input->post('Numero');
            $Localidad 		=	$this->input->post('Localidad');
            $Municipio 		=	$this->input->post('Municipio');
            $Entidad 		=	$this->input->post('Entidad');
            $Fecha_Nac 		=	$this->input->post('Fecha_Nac');
            $Fecha_Igr 		=	$this->input->post('Fecha_Igr');
            $Telefono 		=	$this->input->post('Telefono');

            $cliente 		=	[
            				'Nombre'		=>	$Nombre,
            				'Apellido_P'	=>	$Apellido_P,
            				'Apellido_M'	=>	$Apellido_M,
            				'Telefono'		=>	$Telefono,
            				'Fecha_Nac'		=>	$Fecha_Nac
            			];
            $cliente_d 		=	[
            				'ID_C'				=>	$Toma,
            				'Calle'				=>	$Calle,
            				'Numero'			=>	$Numero,
            				'Localidad'			=>	$Localidad,
            				'Municipio'			=>	$Municipio,
            				'Entidad'			=>	$Entidad,
            				'Fecha_Ingreso'		=>	date('Y-m-d')
            			];
           	$Toma_ 			=	[
           					'ID_C'	=>	$Toma
           				];
           	if($opcion==='Registrar'){
	            $this->Modelo->registrar_datos($cliente,'Cliente');
	            $this->Modelo->registrar_datos($cliente_d,'Direccion_Cliente');
	            $this->Modelo->registrar_datos($Toma_,'Toma');
           	}else{
           		$this->Modelo->actualizar_datos_id($Toma,'Cliente',$cliente);
           		$this->Modelo->actualizar_datos_id($Toma,'Direccion_Cliente',$cliente_d);
           	}
            echo json_encode(array('status'=>'Validado'));
        }
	}
	public function ajax_tabla_clientes(){
        $tabla='Toma';
        $list = $this->Modelo->get_datatables_doc_recepcion($tabla);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->Numero;
            $row[] = $person->Nombre;
            $row[] = $person->Apellido_P;
            $row[] = $person->Apellido_M;
            $row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Modifcar al cliente" onclick="modificar_cliente('."'".$person->Numero."'".",'".$person->ID_C."'".')"><i class="fas fa-arrow-alt-circle-down"></i> Cliente</a>
                ';
            $row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Generar Contrato de Agua" onclick="generar_contrato('."'".$person->ID."'".')"><i class="fas fa-arrow-alt-circle-down"></i> Contrato</a>
                ';
            $data[] = $row;
        }
        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->Modelo->count_all_doc_recepcion($tabla),
                        "recordsFiltered"   => $this->Modelo->count_filtered_doc_recepcion($tabla),
                        "data"              => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function clientes(){
    	$titulo            =   "Clientes Registrados";
        $contenido         =   'pagos/Clientes';
        $this->cargar_vista($titulo,$contenido,null);
    }
    public function modificar_cliente($id){
    	$Cliente 	=	$this->Modelo->consultar_row($id,'Cliente');
    	$Cliente_D 	=	$this->Modelo->consultar_row($id,'Direccion_Cliente'); 	
    	$datos['Cliente']	=	$Cliente;
    	$datos['Direccion']	=	$Cliente_D;
    	echo json_encode($datos);
    }

	/*   PAGOS BIMESTRALES  */
	public function ajax_tabla_pago(){
        $tabla='Pagar';
        $list = $this->Modelo->get_datatables_doc_recepcion($tabla);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->Numero;
            $row[] = $person->Nombre;
            $row[] = $person->Apellido_P;
            $row[] = $person->Apellido_M;
            $row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Realizar Pago" onclick="realizar_pago('."'".$person->Numero."'".",'".$person->ID_C."'".')"><i class="fas fa-arrow-alt-circle-down"></i> Pagar</a>
                  ';
            $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Suspender Toma" onclick="cancelar_toma('."'".$person->Numero."'".",'".$person->ID_C."'".')"><i class="fas fa-arrow-alt-circle-down"></i> Toma</a>
                  ';
            $data[] = $row;
        }
        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->Modelo->count_all_doc_recepcion($tabla),
                        "recordsFiltered"   => $this->Modelo->count_filtered_doc_recepcion($tabla),
                        "data"              => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function pago_bimestral(){

        $titulo            =   "Pagos Bimestrales";
        $contenido         =   'pagos/Pago_Bimestral';
        $this->cargar_vista($titulo,$contenido,null);
    }
    public function verificar_pago(){
        $Bimestre       =   $this->input->post('Bimestre');
        $Toma           =   $this->input->post('Toma_P');
        $Monto           =   $this->input->post('Monto_B');
        $Fecha           =   $this->input->post('Fecha_P');

        $adeudo     =   $this->Modelo->verificar_adeudo_bimestral_status($Toma,$Bimestre,'Pago_Adeudos');
        $pagado     =   $this->Modelo->verificar_pago_bimestral_status($Toma,$Bimestre,'Pago_Bimestral');
        $ingreso    =   $this->Modelo->consultar_pago_ingreso($Toma,'Pago_Ingreso');
        if($ingreso){
            if($adeudo){
                echo json_encode(array('status'=>'Adeudo'));
            }else if($pagado){
                echo json_encode(array('status'=>'Pagado'));
            }else{
                echo json_encode(array('status'=>'Completado'));
            }
        }else{
            echo json_encode(array('status'=>'Ingreso'));
        }
    }
    public function ajax_pagar_bimestre(){
        $Bimestre       =   $this->input->post('Bimestre');
        $Toma           =   $this->input->post('Toma_P');
        $Monto          =   $this->input->post('Monto_B');
        $Fecha          =   $this->input->post('Fecha_P');
        $datos          =   [
                        'Toma'          =>  $Toma,
                        'Monto'         =>  $Monto,
                        'Status'        =>  1,
                        'Status_A'      =>  1,
                        'Bimestre'      =>  $Bimestre,
                        'Fecha_Pago'    =>  $Fecha
                    ];
        $respuesta  =   $this->Modelo->registrar_datos($datos,'Pago_Bimestral');
        if($respuesta){
            echo json_encode(array('status'=>'Completado'));
        }else{
            echo json_encode(array('status'=>'Error'));
        }
    }
    public function pagar_ingreso(){
        $Toma           =   $this->input->post('Toma_P');
        $Monto          =   $this->input->post('Monto_I');
        $Fecha          =   $this->input->post('Fecha_P');
        $datos          =   [
                        'Toma'  =>  $Toma,
                        'Monto' =>  $Monto,
                        'Fecha' =>  $Fecha
                    ];
        $validar    =   $this->Modelo->consultar_pago_ingreso($Toma,'Pago_Ingreso');
        if($validar){
            echo json_encode(array('status'=>'Pagado'));    
        }else{
            $respuesta  =   $this->Modelo->registrar_datos($datos,'Pago_Ingreso');
            echo json_encode(array('status'=>'Completado')); 
        }
        
        
    }
    public function agregar_adeudos(){
        $Fecha  =   date('Y-m-d');
        $separa = explode('-',$Fecha);
        $mes = $separa[1];
        $dia = $separa[2];
        if($mes==='02'){
            $mes_comprar='1';
        }else if($mes==='04'){
            $mes_comprar='2';
        }else if($mes==='06'){
            $mes_comprar='3';
        }else if($mes==='08'){
            $mes_comprar='4';
        }else if($mes==='10'){
            $mes_comprar='5';
        }else{
            $mes_comprar='6';
        }
        
        if($mes==='02' || $mes==='04' || $mes==='06' || $mes==='08' || $mes==='10' || $mes==='12'){
            if($dia>'07' && $dia<'31'){
                $Clientes = $this->Modelo->consultar_result('Cliente','desc');
                $Monto      =   $this->Modelo->consultar_monto_row(1,'Montos');

                foreach ($Clientes as $key) {
                    $verificar_suspension= $this->Modelo->consultar_suspension($key->ID);
                    if(!$verificar_suspension){
                        /*$verificar_adeudo= $this->Modelo->verificar_adeudo_bimestral_status($key->ID,$mes_comprar,'Pago_Adeudos');*/
                        //Falto Agregar cuando el cliente ya esta suspendido se le siga agregando mas adeudos bimestrales y no lo pase a suspension
                        /*if(!$verificar_adeudo){*/
                            $respuesta =    $this->Modelo->verificar_pago_bimestral_status($key->ID,$mes_comprar,'Pago_Bimestral');
                            if($respuesta){
                                
                            }else{
                                $datos  =   [
                                        'Toma'          =>  $key->ID,
                                        'Monto'         =>  $Monto->Monto,
                                        'Bimestre'      =>  $mes_comprar,
                                        'Status'        =>  1,
                                        'Fecha_Adeudo'  =>  $Fecha
                                    ];
                                $registrar  =   $this->Modelo->registrar_datos($datos,'Pago_Adeudos');
                                $contador   = $this->Modelo->verificar_num_adeudos($key->ID);
                                if($contador->contador==='3'){
                                    $datos      =   [
                                        'Toma'  =>  $key->ID,
                                        'Tipo'  =>  1,
                                        'Status'    =>  1,
                                        'Fecha_Cancelacion' =>  date('Y-m-d')
                                    ];
                                    $suspender  =   $this->Modelo->registrar_datos($datos,'Clientes_Suspendidos');
                                }else{

                                }
                            }
                        }else{
                            $registrar=FALSE;
                        }
                    /*}else{
                        $registrar=FALSE;
                    }*/
                }
                if($registrar){
                    echo json_encode(array('status'=>'Completado'));
                }else{
                    echo json_encode(array('status'=>'No'));
                }
            }else{
                echo json_encode(array('status'=>'Dia'));
            }
        }else{
            echo json_encode(array('status'=>'Adeudo'));    
        } 
        
    }
    public function suspension(){
		$titulo            =   "Clientes Cancelados";
        $contenido         =   'pagos/Suspension';
        $this->cargar_vista($titulo,$contenido,null);
	}
	public function suspender_toma($toma){
		$datos 		=	[
						'Toma'	=>	$toma,
						'Tipo'	=>	1,
						'Status'	=>	1,
						'Fecha_Cancelacion'	=>	date('Y-m-d')
					];
        $validar    =   $this->Modelo->verificar_suspension($toma,'Clientes_Suspendidos');
        if($validar){
            echo json_encode(array('status'=>FALSE));
        }else{
            $respuesta  =   $this->Modelo->registrar_datos($datos,'Clientes_Suspendidos');
            echo json_encode(array('status'=>TRUE));
        }
		
	}
	public function ajax_tabla_suspension(){
		$tabla='Suspension';
        $list = $this->Modelo->get_datatables_doc_recepcion($tabla);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->Toma;
            $row[] = $person->Nombre;
            $row[] = $person->Apellido_P;
            $row[] = $person->Apellido_M;
            
            $row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Suspender Toma" onclick="reactivar_toma('."'".$person->Toma."'".')"><i class="fas fa-arrow-alt-circle-down"></i> Toma</a>
                  ';
            $data[] = $row;
        }
        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->Modelo->count_all_doc_recepcion($tabla),
                        "recordsFiltered"   => $this->Modelo->count_filtered_doc_recepcion($tabla),
                        "data"              => $data,
                );
        //output to json format
        echo json_encode($output);
	}
	public function ajax_realizar_pago($cliente){
		$Cliente 	=	$this->Modelo->consultar_row($cliente,'Cliente');
		if($Cliente){			
			$data['Cliente'] =   $Cliente;
			$data['Fecha']   =   date('Y-m-d');
			$data['M_B']     =	$this->Modelo->consultar_monto(1);
			$data['M_I']     =	$this->Modelo->consultar_monto(2);
              
			$Toma 	=	$this->input->post('Toma');
            $data['Pagado']  =  $this->Modelo->verificar_pago($Toma,'Pago_Bimestral'); 
            $data['Adeudo']  =  $this->Modelo->verificar_adeudo_status_result($Toma,'Pago_Adeudos');
			$respuesta 	=	$this->Modelo->verificar_suspension($Toma,'Clientes_Suspendidos');
			if ($respuesta) {
				echo json_encode(array('status'=>'Cancelado'));
			}else{
				echo json_encode($data);
			}
		}
		
	}
	public function reactivar_toma(){
		$Toma 	=	$this->input->post('Toma');
        $consulta   =   $this->Modelo->verificar_adeudo_status($Toma,'Pago_Adeudos');
		
		if (!$consulta) {
            $actualizar     =   [
                        'Status'    =>  0
                    ];
            $reactivado     =   [
                            'Toma'      =>  $Toma,
                            'Tipo'      =>  2,
                            'Status'    =>  1,
                            'Fecha_Cancelacion' =>  date('Y-m-d')

                        ];
            $this->Modelo->actualizar_cancelacion($Toma,$actualizar);
            $respuesta  =   $this->Modelo->registrar_datos($reactivado,'Clientes_Suspendidos');
			echo json_encode(array('status'=>TRUE));
		}else{
			echo json_encode(array('status'=>FALSE));
		}

	}
	public function validar_monto(){
		if(!$this->form_validation->run()){
            $json   =   array(
                        'Tipo_Monto' => form_error('Tipo_Monto','<span class="text-danger">','</span>'),
                        'Cantidad' => form_error('Cantidad','<span class="text-danger">','</span>'),
                    );
            $this->output->set_content_type('application/json')->set_output(json_encode($json));
        }else{
        	$actualizar='';
        	$Tipo 	=	$this->input->post('Tipo_Monto');
        	$Cantidad 	=	$this->input->post('Cantidad');
        	if($Tipo==='1'){
        		$actualizar 	=	[
        					'Monto'	=>	$Cantidad
        				];
        	}else{
        		$actualizar 	=	[
        					'Monto'	=>	$Cantidad
        				];
        	}
        	$respuesta 		=	$this->Modelo->actualizar_monto($Tipo,$actualizar);
        	if ($respuesta) {
        		echo json_encode(array('status'=>'Validado'));
        	}else{
        		echo json_encode(array('status'=>'Error'));
        	}
        	
        }
	}
	public function consultar_adeudos(){
		$data['Fecha']=date('Y-m-d');
		echo json_encode($data);
	}
    public function pago_adeudo(){
        $titulo            =   "Clientes Deudores";
        $contenido         =   'pagos/Adeudos';
        $this->cargar_vista($titulo,$contenido,null);
    }
    public function ajax_tabla_adeudos(){
        $tabla='Adeudos';
        $list = $this->Modelo->get_datatables_doc_recepcion($tabla);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->Toma;
            $row[] = $person->Nombre;
            $row[] = $person->Apellido_P;
            $row[] = $person->Apellido_M;
            
            $row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Pagar Adeudo" onclick="pagar_adeudo('."'".$person->ID."'".')"><i class="fas fa-arrow-alt-circle-down"></i> Adeudo</a>
                  ';
            $data[] = $row;
        }
        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->Modelo->count_all_doc_recepcion($tabla),
                        "recordsFiltered"   => $this->Modelo->count_filtered_doc_recepcion($tabla),
                        "data"              => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function consultar_adeudo(){
        $ID     =   $this->input->post('ID');
        $consulta   =   $this->Modelo->consultar_row($ID,'Pago_Adeudos');
        if($consulta){
            echo json_encode($consulta);
        }
    }
    function pagar_adeudo(){
        $ID         =   $this->input->post('ID_Adeudo');
        $Toma       =   $this->input->post('Toma_Adeudo');
        $Monto      =   $this->input->post('Monto_Adeudo');
        $Bimestre   =   $this->input->post('Bimestre_Adeudo');
        if($Bimestre==='Enero - Febrero'){
            $bime=1;
        }else if($Bimestre==='Marzo - Abril'){
            $bime=2;
        }else if($Bimestre==='Mayo - Junio'){
            $bime=3;
        }else if($Bimestre==='Julio - Agosto'){
            $bime=4;
        }else if($Bimestre==='Septiembre - Octubre'){
            $bime=5;
        }else {
            $bime=6;
        }
        $datos  =   [
                    'Status'    =>  0
                ];
        $registro   =   [
                        'Toma'          =>  $Toma,
                        'Monto'         =>  $Monto,
                        'Status'        =>  1,
                        'Status_A'      =>  1,
                        'Bimestre'      =>  $bime,
                        'Fecha_Pago'    =>  date('Y-m-d')
                    ];
        $this->Modelo->registrar_datos($registro,'Pago_Bimestral');
        $consulta   =   $this->Modelo->actualizar_datos_id($ID,'Pago_Adeudos',$datos);
        if($consulta){
            echo json_encode(array('status'=>'Validado'));
        }
    }
    public function reportes(){
        $titulo            =   "Generar Reportes";
        $contenido         =   'pagos/Reportes';
        $this->cargar_vista($titulo,$contenido,null);
    }
    public function ajax_tabla_reporte($tipo){
        if($tipo==='Adeudos'){
            $tabla='Reporte_Adeudos';
        }else{
            $tabla='Reporte_Puntuales';
        }
        
        $list = $this->Modelo->get_datatables_doc_recepcion($tabla);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->Toma;
            $row[] = $person->Nombre;
            $row[] = $person->Apellido_P;
            $row[] = $person->Apellido_M;
            $row[] = $person->Fecha;
            $data[] = $row;
        }
        $output = array(
                        "draw"              => $_POST['draw'],
                        "recordsTotal"      => $this->Modelo->count_all_doc_recepcion($tabla),
                        "recordsFiltered"   => $this->Modelo->count_filtered_doc_recepcion($tabla),
                        "data"              => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function consultar_reporte_pdf($tipo){
        if($tipo==='Adeudos'){
            $tabla='Pago_Adeudos';
        }else if($tipo==='Suspendidos'){
            $tabla='Clientes_Suspendidos';
        }else{
            $tabla='Pago_Bimestral';
        }
        $Desde = $this->input->post('Desde');
        $Hasta = $this->input->post('Hasta');
        $respuesta= $this->Modelo->consultar_reporte($Desde,$Hasta,$tabla);
        if($respuesta){
            echo json_encode($respuesta);
        }else{
            echo json_encode(array('status'=>FALSE));
        }
    }
    public function consultar_reporte_caja(){
        $tabla='Gastos';
        $Desde = $this->input->post('Desde');
        $Hasta = $this->input->post('Hasta');
        $respuesta= $this->Modelo->consultar_reporte_caja($Desde,$Hasta,$tabla);
        if($respuesta){
            echo json_encode($respuesta);
        }else{
            echo json_encode(array('status'=>FALSE));
        }
    }
    public function generar_reporte_caja($desde,$hasta){
        $tabla='Gastos';
        $Desde = $desde;
        $Hasta = $hasta;
        $data['registros']= $this->Modelo->consultar_reporte_caja($Desde,$Hasta,$tabla);
        if($data){
            $data['desde']=$desde;
            $data['hasta']=$hasta;
            $data['tabla']=$tabla;
            
            $html = $this->load->view('frontend/pagos/pagos_pdf/Gastos', $data, true);
            $filename = 'Clientes';
            $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
        }else{
            echo json_encode(array('status'=>FALSE));
        }
    }
    public function generar_reporte_pdf($desde,$hasta,$tabla){
        if($tabla==='Adeudos'){
            $tabla='Pago_Adeudos';
            $tipo=0;
        }else if($tabla==='Suspendidos'){
            $tabla='Clientes_Suspendidos';
            $tipo=1;
        }else{
            $tabla='Pago_Bimestral';
            $tipo=2;
        }
        $data['registros']= $this->Modelo->consultar_reporte($desde,$hasta,$tabla);
        $data['desde']=$desde;
        $data['hasta']=$hasta;
        $data['tabla']=$tabla;
        $data['tipo']=$tipo;
        $html = $this->load->view('frontend/pagos/pagos_pdf/Clientes_Deudores', $data, true);
        $filename = 'Clientes';
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function generar_contrato_pdf($ID){
        if($ID==='Registro'){
            $Clientes   =   $this->Modelo->consultar_clientes_join('Cliente','desc',null);
        }else{
            $Clientes   =   $this->Modelo->consultar_clientes_join('Cliente','desc',$ID);
        }
        $data['clientes']   =   $Clientes;
        $data['Fecha']      =   date('Y-m-d');
        
        $html = $this->load->view('frontend/pagos/pagos_pdf/Clientes', $data, true);
        $filename = 'Clientes';
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function caja(){
        $titulo            =   "Corte de Caja";
        $contenido         =   'pagos/Caja';
        $this->cargar_vista($titulo,$contenido,null);
    }
    public function registrar_gastos(){
        if(!$this->form_validation->run()){
            $json   =   array(
                        'Descripcion_Gasto' => form_error('Descripcion_Gasto','<span class="text-danger">','</span>'),
                        'Monto_Gasto' => form_error('Monto_Gasto','<span class="text-danger">','</span>'),
                        'Fecha_Gasto' => form_error('Fecha_Gasto','<span class="text-danger">','</span>'),
                    );
            $this->output->set_content_type('application/json')->set_output(json_encode($json));
        }else{
            $Descripcion_Gasto = $this->input->post('Descripcion_Gasto');
            $Monto_Gasto = $this->input->post('Monto_Gasto');
            $Fecha_Gasto = $this->input->post('Fecha_Gasto');

            $datos      =   [
                            'Descripcion'   =>  $Descripcion_Gasto,
                            'Gasto'         =>  $Monto_Gasto,
                            'Fecha_Gasto'   =>  $Fecha_Gasto
                        ];
            $respuesta=$this->Modelo->registrar_datos($datos,'Gastos');
            if($respuesta){
                echo json_encode(array('status'=>TRUE));
            }else{

            }
            
        }
    }
    public function consultar_gastos(){
        $Desde = $this->input->post('Desde');
        $Hasta = $this->input->post('Hasta');

        $Entradas   =   $this->Modelo->cosultar_gastos('Bimestral',$Desde,$Hasta);
        $Salidas    =   $this->Modelo->cosultar_gastos('Gastos',$Desde,$Hasta);
        $Ingreso    =   $this->Modelo->cosultar_gastos('Ingreso',$Desde,$Hasta);
        $data['Entradas']   =   $Entradas;
        $data['Salidas']    =   $Salidas;
        $data['Ingreso']    =   $Ingreso;
        if($Entradas){
            echo json_encode($data);    
        }else{
            echo json_encode(array('status'=>FALSE));
        }
        

    }
    
}