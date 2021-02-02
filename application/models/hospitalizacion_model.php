<?php
defined('BASEPATH') OR exit('No se Permite el Acceso Directo al Script');
class Hospitalizacion_model extends CI_Model{
	public function __construct()
	{
		parent:: __construct();
	}
	var $table = 'Afiliado';
	var $column_order = array('NSS','Nombre','Apellido_P','Apellido_M',null); //set column field database for datatable orderable
	var $column_search = array('Nombre','Apellido_P','Apellido_M'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('NSS' => 'desc'); // default order 
	function Afiliado($NSS){
		$query =$this->db->get_where('Afiliado',array('NSS'=>$NSS));
		if($query->num_rows()>0){
			return $query->result();
		}
	}
	function busqueda_especialidad_nss($NSS,$Especialidad){
		$query = $this->db->get_where('Afiliado',array('NSS'=>$NSS));
		if($query->num_rows()>0){
			$consulta = $this->db->get_where('Especialidad_Pacientes',array('NSS'=>$NSS,'Especialidad_A'=>$Especialidad));
			if($consulta->num_rows()>0){
				return $query->result();
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}
	function busqueda_especialidad_nombre($Nombre,$Paterno,$Materno){
		$query = $this->db->get_where('Afiliado',array('Nombre'=>$Nombre,'Apellido_P'=>$Paterno,'Apellido_M'=>$Materno));
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return FALSE;
		}
	}
	function Busqueda_Hospitalaria_NSS($NSS){
		$query = $this->db->get_where('Afiliado',array('NSS'=>$NSS));
		if($query->num_rows()>0){
			$consulta = $this->db->get_where('Especialidad_Pacientes',array('NSS'=>$NSS));
			if($consulta->num_rows()>0){
				$empresa = $this->db->get_where('Empresa_Hospitalizados',array('NSS'=>$NSS));
				if($empresa->num_rows()>0){
					return 'FAMILIAR';
				}else{
					return 'EMPRESA';
				}
			}else{
				return 'ESPECIALIDAD';
			}
		}else{
			return 'AFILIADO';
		}
	}
	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
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

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}