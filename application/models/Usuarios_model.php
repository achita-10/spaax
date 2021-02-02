<?php
class Usuarios_model extends CI_Model{
	public function __construct(){
		parent:: __construct();
	}
	var $orden_columna = array('NSS','Nombre','Apellido_P','Apellido_M',null);
	var $busqueda_columna_join = array('Cliente.ID','Cliente.Nombre','Cliente.Apellido_P','Cliente.Apellido_M');


	public function consultar_row($id,$tabla){
		$consulta 	= $this->db->get_where($tabla,array('ID'=>$id));
		if($consulta->num_rows()>0){
			return $consulta->row();
		}
	}
	public function consultar_result($tabla,$forma){
		//$this->db->order_by('ID',$forma);
		$consulta 	= $this->db->get($tabla);
		if($consulta->num_rows()>0){
			return $consulta->result();
		}else{
			return FALSE;
		}
	}
	public function consultar_monto_row($tipo,$tabla){
		$consulta 	= $this->db->get_where($tabla,array('Tipo'=>$tipo));
		if($consulta->num_rows()>0){
			return $consulta->row();
		}else{
			return FALSE;
		}
	}
	public function consultar_monto($Tipo){
		$consulta 	= $this->db->get_where('Montos',array('Tipo'=>$Tipo));
		if($consulta->num_rows()>0){
			return $consulta->row();
		}
	}
	public function verificar_suspension($toma,$tabla){
		$consulta 	= $this->db->get_where($tabla,array('Toma'=>$toma,'Tipo'=>'1','Status'=>'1'));
		if($consulta->num_rows()>0){
			return $consulta->row();
		}else{
			return FALSE;
		}
	}
	public function verificar_pago($toma,$tabla){
		$consulta 	= $this->db->get_where($tabla,array('Toma'=>$toma,'Status'=>'1','Status_A'=>'1'));
		if($consulta->num_rows()>0){
			return $consulta->result();
		}else{
			return FALSE;
		}
	}
	public function verificar_adeudo_status_result($toma,$tabla){
		$consulta 	= $this->db->get_where($tabla,array('Toma'=>$toma,'Status'=>'1'));
		if($consulta->num_rows()>0){
			return $consulta->result();
		}else{
			return FALSE;
		}
	}
	public function verificar_adeudo_status($toma,$tabla){
		$consulta 	= $this->db->get_where($tabla,array('Toma'=>$toma,'Status'=>'1'));
		if($consulta->num_rows()>0){
			return $consulta->row();
		}else{
			return FALSE;
		}
	}
	public function verificar_adeudo_bimestral_status($toma,$bimestre,$tabla){
		$consulta 	= $this->db->get_where($tabla,array('Toma'=>$toma,'Status'=>'1','Bimestre'=>$bimestre));
		if($consulta->num_rows()>0){
			return $consulta->row();
		}else{
			return FALSE;
		}
	}
	public function verificar_pago_bimestral_status($toma,$bimestre,$tabla){
		$consulta 	= $this->db->get_where($tabla,array('Toma'=>$toma,'Status'=>'1','Bimestre'=>$bimestre,'Status_A'=>'1'));
		if($consulta->num_rows()>0){
			return $consulta->row();
		}else{
			return FALSE;
		}
	}
	public function verificar_num_adeudos($toma){
		$this->db->group_by('Toma');
		//$this->db->group_by($tabla.'.Fecha');
		$this->db->select('count(ID) as contador');
		$this->db->from('Pago_Adeudos');
		//$this->db->where($tabla.'.Fecha','2019-04-13');
		//Instruccion para hacer la busqueda por mes
		$this->db->where('Toma='.$toma.' AND Status=1');
		
		
		//Ejemplo para generar por Fechas
		//$this->db->where($tabla.'.Fecha','2019-04-12');
		
		
		$query = $this->db->get();
		return $query->row();
	}
	
	public function consultar_bimestral($id,$bimestre){
		$consulta=$this->db->get_where('Pago_Bimestral',array('Toma'=>$id,'Bimestre'=>$bimestre));
		if($consulta->num_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function consultar_suspension($id){
		$consulta 	= 	$this->db->get_where('Clientes_Suspendidos',array('Toma'=>$id,'Tipo'=>1,'Status'=>1));
		if($consulta->num_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function consultar_pago_ingreso($Toma,$tabla){
		$consulta=	$this->db->get_where($tabla,array('Toma'=>$Toma));
		if($consulta->num_rows()>0){
			return $consulta->row();
		}else{
			return FALSE;
		}
	}
	public function comparar_adeudo($toma,$bimestre){
		$consulta = $this->db->get_where('Pago_Adeudos',array('Toma'=>$toma,'Bimestre'=>$bimestre));
		if($consulta->num_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function agregar_adeudo_c($data){
		$this->db->insert('Pago_Adeudos',$data);
	}
	public function registrar_datos($data,$tabla){
		$this->db->insert($tabla,$data);
		return TRUE;	
	}
	public function consultar_direccion($id){
		$consulta 	= $this->db->get_where('Direccion_Cliente',array('ID_C'=>$id));
		if($consulta->num_rows()>0){
			return $consulta->row();
		}
	}
	public function reactivar($id){
		$this->db->where('Toma',$id);
		$this->db->delete('Clientes_Suspendidos');
	}
	public function actualizar_datos_id($id,$tabla,$data){
		$this->db->where('ID',$id);
		$this->db->update($tabla,$data);
		return $this->db->affected_rows();
	}
	
	public function actualizar_monto($Tipo,$data){
		$this->db->where('Tipo',$Tipo);
		$this->db->update('Montos',$data);
		return $this->db->affected_rows();
	}
	public function actualizar_cancelacion($toma,$data){
		$this->db->where('Toma',$toma);
		$this->db->where('Tipo','1');
		$this->db->where('Status','1');
		$this->db->update('Clientes_Suspendidos',$data);
		return $this->db->affected_rows();
	}
	public function consultar_cancelado($id){
		$consulta 	= $this->db->get_where('Clientes_Suspendidos',array('Toma'=>$id));
		if($consulta->num_rows()>0){
			return $consulta->row();
		}
	}
	public function cancelar($data){
		$this->db->insert('Clientes_Suspendidos',$data);
	}
	public function consultar_cliente_adeudo($id){
		$consulta 	= $this->db->get_where('Pago_Adeudos',array('Toma'=>$id));
		if($consulta->num_rows()>0){
			return 'Adeudo';
		}
	}
	public function verificar($Usuario,$Password){
		$consulta 	= $this->db->get_where('User',array('Usuario'=>$Usuario,'Password'=>$Password));
		if($consulta->num_rows()>0){
			return $consulta->row();
		}
	}
	public function consultar_toma(){
		$this->db->order_by('Numero','desc');
		$consulta 	=	$this->db->get('Toma');
		if($consulta->num_rows()>0){
			return $consulta->row();
		}
	}
	public function cliente($Cliente){
		$this->db->insert('Cliente',$Cliente);
	}
	public function direccion($Direccion){
		$this->db->insert('Direccion_Cliente',$Direccion);
	}
	public function toma($Toma){
		$this->db->insert('Toma',$Toma);
	}
	
	
	

	public function delete_by_id($id,$Bimestre)
	{
		$this->db->where('Toma', $id);
		$this->db->where('Bimestre', $Bimestre);
		$this->db->delete('Pago_Adeudos');

	}
	function _get_datatables_query_doc_recepcion($tabla){
		$orden='';
		if($tabla==='Toma' || $tabla==='Pagar'){
			$tabla='Toma';
			$orden='Numero';
			$this->db->select('Cliente.Nombre,Cliente.Apellido_P,Cliente.Apellido_M,'.$tabla.'.Numero, '.$tabla.'.ID_C, Cliente.ID '); 
			$this->db->from('Cliente');
			$this->db->join($tabla, $tabla.'.ID_C = Cliente.ID');
		}else if($tabla==='Suspension'){
			$tabla='Clientes_Suspendidos';
			$orden=$tabla.'.ID';
			$this->db->select('Cliente.Nombre,Cliente.Apellido_P,Cliente.Apellido_M,'.$tabla.'.Toma'); 
			$this->db->from('Cliente,Toma');
			$this->db->join($tabla, $tabla.'.Toma = Toma.Numero AND Toma.ID_C=Cliente.ID AND '.$tabla.'.Tipo=1 	AND '.$tabla.'.Status=1');
		}else if($tabla==='Adeudos'){
			$tabla='Pago_Adeudos';
			$orden=$tabla.'.ID';
			$this->db->select('Cliente.Nombre,Cliente.Apellido_P,Cliente.Apellido_M,'.$tabla.'.Toma, '.$tabla.'.ID'); 
			$this->db->from('Cliente');
			$this->db->join($tabla, $tabla.'.Toma=Cliente.ID AND '.$tabla.'.Status=1');
		}else if($tabla==='Reporte_Adeudos' || $tabla==='Reporte_Puntuales'){
			$Fecha  =   date('Y-m-d');
	        $separa = explode('-',$Fecha);
	        $año = $separa[0];
	        $mes = $separa[1];
	        if($mes==='01' || $mes==='03' || $mes==='05' || $mes==='07' || $mes==='08' || $mes==='10' || $mes==='12'){
	            $desde=$año.'-'.$mes.'-01';
	            $hasta=$año.'-'.$mes.'-31';
	        }else if($mes==='04' || $mes==='06' || $mes==='09' || $mes==='11'){
	            $desde=$año.'-'.$mes.'-01';
	            $hasta=$año.'-'.$mes.'-30';
	        }else{
	            $desde=$año.'-'.$mes.'-01';
	            $hasta=$año.'-'.$mes.'-28';
	        }
			if($tabla==='Reporte_Adeudos'){
	            $tabla='Pago_Adeudos';
	            $this->db->select('Cliente.Nombre,Cliente.Apellido_P,Cliente.Apellido_M,'.$tabla.'.Toma, '.$tabla.'.ID, '.$tabla.'.Fecha_Adeudo as Fecha'); 
			$this->db->from('Cliente');
			$this->db->where($tabla.'.Fecha_Adeudo BETWEEN "' . date('Y-m-d', strtotime($desde)) . '" and "' . date('Y-m-d', strtotime($hasta)) . '"');
	        }else{
	            $tabla='Pago_Bimestral';
	            $this->db->select('Cliente.Nombre,Cliente.Apellido_P,Cliente.Apellido_M,'.$tabla.'.Toma, '.$tabla.'.ID, '.$tabla.'.Fecha_Pago as Fecha'); 
			$this->db->from('Cliente');
			$this->db->where($tabla.'.Fecha_Pago BETWEEN "' . date('Y-m-d', strtotime($desde)) . '" and "' . date('Y-m-d', strtotime($hasta)) . '"');
	        }
			$orden=$tabla.'.ID';
			
			$this->db->join($tabla, $tabla.'.Toma=Cliente.ID ');
		}else if($tabla==='Empleado'){
			
			$tabla='Empleado';
	            $this->db->select('Empleado.ID,Empleado.Nombre_U,Empleado.Apellido_P_U,Empleado.Apellido_M_U'); 
			$this->db->from('Empleado');
			
			$orden=$tabla.'.ID';
			
			//$this->db->join($tabla, $tabla.'.Toma=Cliente.ID ');
		}else{
			
		}
		
		 
		$i = 0;
		foreach ($this->busqueda_columna_join as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->busqueda_columna_join) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->orden_columna[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else 
		{
			$this->db->order_by($orden,'desc');
		}
	}
	
	function get_datatables_doc_recepcion($tabla){
		$this->_get_datatables_query_doc_recepcion($tabla);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered_doc_recepcion($tabla){
		$this->_get_datatables_query_doc_recepcion($tabla);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function count_all_doc_recepcion($tabla){
		if($tabla==='Toma' || $tabla==='Pagar'){
			$tabla='Toma';
		}else if($tabla==='Suspension'){
			$tabla='Clientes_Suspendidos';
		}else if($tabla==='Adeudos'){
			$tabla='Pago_Adeudos';
		}else if($tabla==='Reporte_Adeudos'){
			$tabla='Pago_Adeudos';
		}else if($tabla==='Reporte_Puntuales'){
			$tabla='Pago_Bimestral';
		}else{
			$tabla='Empleado';
		}
		$this->db->select('*'); 
		$this->db->from($tabla); 
		return $this->db->count_all_results();
	}
	public function consultar_reporte($desde,$hasta,$tabla){
		
		if($tabla==='Pago_Adeudos'){
            $fecha='Fecha_Adeudo';
            $select='Cliente.Nombre,Cliente.Apellido_P,Cliente.Apellido_M,'.$tabla.'.Toma, '.$tabla.'.ID, '.$tabla.'.'.$fecha.' as Fecha, Direccion_Cliente.Calle, '.$tabla.'.Bimestre, '.$tabla.'.Monto';
        }else if($tabla==='Clientes_Suspendidos'){
        	$fecha='Fecha_Cancelacion';
        	$select='Cliente.Nombre,Cliente.Apellido_P,Cliente.Apellido_M,'.$tabla.'.Toma, '.$tabla.'.ID, '.$tabla.'.'.$fecha.' as Fecha, Direccion_Cliente.Calle, '.$tabla.'.Tipo';
        	$this->db->where($tabla.'.Status=1 AND '.$tabla.'.Tipo=1');
        }else{
            $fecha='Fecha_Pago';
            $select='Cliente.Nombre,Cliente.Apellido_P,Cliente.Apellido_M,'.$tabla.'.Toma, '.$tabla.'.ID, '.$tabla.'.'.$fecha.' as Fecha, Direccion_Cliente.Calle, '.$tabla.'.Bimestre, '.$tabla.'.Monto';
        }
		$this->db->select($select); 
		
		$this->db->from('Cliente,Direccion_Cliente');
	 

		$this->db->where($tabla.'.'.$fecha.' BETWEEN "' . date('Y-m-d', strtotime($desde)) . '" and "' . date('Y-m-d', strtotime($hasta)) . '"');
		$this->db->join($tabla, $tabla.'.Toma=Cliente.ID AND '.$tabla.'.Toma=Direccion_Cliente.ID_C');
		$consulta = $this->db->get();
		if($consulta->num_rows()>0){
			return $consulta->result();
		}else{
			return FALSE;
		}
	}
	public function consultar_reporte_caja($desde,$hasta,$tabla){
		$this->db->order_by('ID','asc');
        $select='ID,Descripcion,Gasto,Fecha_Gasto';
		$this->db->select($select); 
		$this->db->from('Gastos');
		$this->db->where($tabla.'.Fecha_Gasto BETWEEN "' . date('Y-m-d', strtotime($desde)) . '" and "' . date('Y-m-d', strtotime($hasta)) . '"');
		$consulta = $this->db->get();
		if($consulta->num_rows()>0){
			return $consulta->result();
		}else{
			return FALSE;
		}
	}
	public function consultar_clientes_join($tabla,$forma,$ID){
		if($ID===null){
			$this->db->order_by($tabla.'.ID',$forma);
			$this->db->select('*'); 	
		}else{
			$this->db->order_by($tabla.'.ID',$forma);
			$this->db->select('*'); 	
			$this->db->where($tabla.'.ID='.$ID);
		}
		
		$this->db->from('Direccion_Cliente');
		$this->db->join($tabla, $tabla.'.ID=Direccion_Cliente.ID_C ');
		$consulta = $this->db->get();
		if($consulta->num_rows()>0){
			return $consulta->result();
		}else{
			return FALSE;
		}
	}
	public function cosultar_gastos($tabla,$desde,$hasta){
		if($tabla==='Bimestral'){
			$tabla='Pago_Bimestral';
			$fecha='Fecha_Pago';
		}else if($tabla==='Ingreso'){
			$tabla='Pago_Ingreso';
			$fecha='Fecha';
		}else{
			$tabla='Gastos';
			$fecha='Fecha_Gasto';
		}
		$this->db->select('*');
		$this->db->from($tabla);
		$this->db->where($tabla.'.'.$fecha.' BETWEEN "' . date('Y-m-d', strtotime($desde)) . '" and "' . date('Y-m-d', strtotime($hasta)) . '"');
		$consulta = $this->db->get();
		if($consulta->num_rows()>0){
			return $consulta->result();
		}else{
			return FALSE;
		}
	}
}