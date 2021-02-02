<?

class Usuario_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function validar($Usuario,$Password){
		$consulta 	= $this->db->get_where('Usuarios',array('Usuario'=>$Usuario,'Password'=>$Password));
		if($consulta->num_rows()>0){
			return $consulta->row();
		}
	}
}