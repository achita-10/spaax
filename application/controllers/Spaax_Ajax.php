<?php
class Spaax_Ajax extends MY_Controller{
	
	public function __Construct(){
		parent:: __construct();
		if(!$this->is_logged_in()){
			redirect(BASE_URL());
		}else{
			$this->load->model('Usuarios_model','modelo');
		}
	}
	public function ajax_tabla_cancelacion()
    {
        $list = $this->modelo->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->ID;
            $row[] = $person->Nombre;
            $row[] = $person->Apellido_P;
            $row[] = $person->Apellido_M;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="cancelacion('."'".$person->ID."'".')"><i class="fa fa-remove"></i> Cancelar</a>
            ';
        
            $data[] = $row;
        }
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->modelo->count_all(),
                        "recordsFiltered" => $this->modelo->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function cancelacion(){
		$datos['contenido']='pagos/Cancelacion';
		$this->load->view('frontend',$datos);
	}
    public function ajax_cancelacion($id){
    	$respuesta 			=	$this->modelo->consultar_cliente($id);
    	if($respuesta){
    		$cancelado 		=	$this->modelo->consultar_cancelado($id);
    		if($cancelado){
    			echo json_encode(array('status'=>TRUE));
    		}else{
    			echo json_encode($respuesta);
    		}
    	}else{
    		echo json_encode($respuesta);
    	}
    	
    }
    public function cancelar($ID){
    	$resp 	=	$this->modelo->consultar_cliente_adeudo($ID);
    	if($resp){
    		redirect('Spaax/pago_adeudos');
    	}else{
    		$Toma 				=	$ID;
	    	$Fecha_Cancelacion	=	$this->fecha();
	    	$data 				=[
	    							'Toma'					=>	$Toma,
	    							'Fecha_Cancelacion'		=>	$Fecha_Cancelacion
	    						];
	    	$this->modelo->cancelar($data);
			redirect('Spaax_Ajax/cancelacion');
    	}
    	
    }
    public function modificacion(){
		$datos['contenido']='pagos/Modificar';
		$this->load->view('frontend',$datos);
	}
	public function actualizar_datos(){
		$this->_validate();
		
			$Toma 				=	$this->input->post('Toma');
			$Nombre 			=	$this->input->post('Nombre');
			$Apellido_P 		=	$this->input->post('Apellido_P');
			$Apellido_M 		=	$this->input->post('Apellido_M');
			$Telefono 			=	$this->input->post('Telefono');
			$Correo 			=	$this->input->post('Correo');
			$Fecha_Nac 			=	$this->input->post('Fecha_Nac');

			$data 		= 	[
								
								'Nombre'		=>	$Nombre,
								'Apellido_P'	=>	$Apellido_P,
								'Apellido_M'	=>	$Apellido_M,
								'Telefono'		=>	$Telefono,
								'Correo'		=>	$Correo,
								'Fecha_Nac'		=>	$Fecha_Nac
							];
			$this->modelo->actualizar_cliente($Toma,$data);
		echo json_encode(array("status" => TRUE));
		
	}
	public function actualizar_direccion(){
		$this->_validate_direccion();
		$Toma 			=	$this->input->post('Toma');
		$Calle 			=	$this->input->post('Calle');
		$Numero 		=	$this->input->post('Numero');
		$Colonia 		=	$this->input->post('Colonia');
		$CP 			=	$this->input->post('CP');
		$Localidad 		=	$this->input->post('Localidad');
		$Municipio 		=	$this->input->post('Municipio');
		$Entidad 		=	$this->input->post('Entidad');
		$Direccion		=	[
								'Calle'			=>	$Calle,
								'Numero'		=>	$Numero,
								'CP'			=>	$CP,
								'Colonia'		=>	$Colonia,
								'Localidad'		=>	$Localidad,
								'Municipio'		=>	$Municipio,
								'Entidad'		=>	$Entidad
							];
		$this->modelo->actualizar_direccion_c($Toma,$Direccion);
		echo json_encode(array('status'	=>	TRUE));

	}
	public function modificar_datos($ID){
		$respuesta 	=	$this->modelo->consultar_cliente($ID);
		$datos['contenido']='Cliente_M';
		$datos['valores']=$respuesta;
		$this->load->view('frontend',$datos);
	}
	public function modificar_direccion($ID){
		$respuesta 	=	$this->modelo->consultar_direccion($ID);
		$datos['contenido']='Direccion_M';
		$datos['valores']=$respuesta;
		$this->load->view('frontend',$datos);
	}
	public function ajax_modificacion_datos_cliente($ID){
		$respuesta 	=	$this->modelo->consultar_cliente($ID);
    	echo json_encode($respuesta);
	}
	public function ajax_modificacion_direccion_cliente($ID){
		$respuesta 	=	$this->modelo->consultar_direccion($ID);
    	echo json_encode($respuesta);
	}
    public function ajax_tabla_modificacion()
    {
        $list = $this->modelo->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->ID;
            $row[] = $person->Nombre;
            $row[] = $person->Apellido_P;
            $row[] = $person->Apellido_M;
            $row[] = $person->Telefono;
            $row[] = $person->Fecha_Ingreso;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Edit" onclick="cliente_datos('."'".$person->ID."'".')"><i class="fa fa-edit"></i> Datos</a> 
            ';
            $row[] = '<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Edit" onclick="cliente_direccion('."'".$person->ID."'".')"><i class="fa fa-edit"></i> Direccion</a>';
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->modelo->count_all(),
                        "recordsFiltered" => $this->modelo->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function reactiva(){
    	$datos['contenido']='pagos/Reactivacion_C';
		$this->load->view('frontend',$datos);
    }
    public function ajax_reactivacion($ID){
    	$respuesta = $this->modelo->consultar_cancelado($ID);
    	if($respuesta){
    		echo json_encode($respuesta);
    	}else{
    		echo json_encode(array('status'=>TRUE));
    	}
    }
    public function respuesta_reactivacion($id){
    	$this->modelo->reactivar($id);
    	redirect('Spaax_Ajax/reactiva');
    }
    public function ajax_table_reactivacion()
    {
        $list = $this->modelo->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->ID;
            $row[] = $person->Nombre;
            $row[] = $person->Apellido_P;
            $row[] = $person->Apellido_M;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="reactivacion('."'".$person->ID."'".')"><i class="fa fa-remove"></i> Reactivar</a>
            ';
        
            $data[] = $row;
        }
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->modelo->count_all(),
                        "recordsFiltered" => $this->modelo->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    public function fecha(){
		$this->load->helper('date');
		$datestring = "%Y-%m-%d";
		return mdate($datestring);
	}
		private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('Nombre') == '')
		{
			$data['inputerror'][] = 'Nombre';
			$data['error_string'][] = 'El Nombre es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('Apellido_P') == '')
		{
			$data['inputerror'][] = 'Apellido_P';
			$data['error_string'][] = 'El Apellido Paterno requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('Apellido_M') == '')
		{
			$data['inputerror'][] = 'Apellido_M';
			$data['error_string'][] = 'El Apellido Materno requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('Telefono') == '')
		{
			$data['inputerror'][] = 'Telefono';
			$data['error_string'][] = 'El Telefono es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('Correo') == '')
		{
			$data['inputerror'][] = 'Correo';
			$data['error_string'][] = 'El Correo es requerido';
			$data['status'] = FALSE;
		}
		if($this->input->post('Fecha_Nac') == '')
		{
			$data['inputerror'][] = 'Fecha_Nac';
			$data['error_string'][] = 'Fecha de Nacimiento requerida';
			$data['status'] = FALSE;
		}
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	private function _validate_direccion()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('Calle') == '')
		{
			$data['inputerror'][] = 'Calle';
			$data['error_string'][] = 'la Calle es requerida';
			$data['status'] = FALSE;
		}

		if($this->input->post('Numero') == '')
		{
			$data['inputerror'][] = 'Numero';
			$data['error_string'][] = 'El Numero requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('CP') == '')
		{
			$data['inputerror'][] = 'CP';
			$data['error_string'][] = 'El Codigo Postal requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('Colonia') == '')
		{
			$data['inputerror'][] = 'Colonia';
			$data['error_string'][] = 'la Colonia es requerida';
			$data['status'] = FALSE;
		}

		if($this->input->post('Localidad') == '')
		{
			$data['inputerror'][] = 'Localidad';
			$data['error_string'][] = 'la Localidad es requerida';
			$data['status'] = FALSE;
		}
		if($this->input->post('Municipio') == '')
		{
			$data['inputerror'][] = 'Municipio';
			$data['error_string'][] = 'El Municipio es requerido';
			$data['status'] = FALSE;
		}
		if($this->input->post('Entidad') == '')
		{
			$data['inputerror'][] = 'Entidad';
			$data['error_string'][] = 'La Entidad es requerida';
			$data['status'] = FALSE;
		}
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}