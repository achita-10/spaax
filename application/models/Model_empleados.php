<?php

class Model_empleados extends CI_Model
{
    /**
     * Model_empleados constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function save($datos){
        $campos = array(
            'Nombre_U' => $datos['Nombre_U'],
            'Apellido_P_U' => $datos['Apellido_P_U'],
            'Apellido_M_U' => $datos['Apellido_M_U'],
        );
        $this->db->insert('empleado',$campos);
        if ($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
    }


    function mostrar()
    {
        $query = $this->db->get('empleado');
        return $query->result();
    }

    function comprobar_usuario($valor){
        if($valor)
        {
            $query = $this->db->get_where('empleado',array('ID' => $valor,'ID_User !=' => 'null'));
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    function update_id_user($ID_User,$id_empleado){
        $campos = array(
            'ID_User' => $ID_User['ID_User']
        );

        $this->db->where('ID',$id_empleado);
        return $this->db->update('empleado',$campos);

    }

    public function obtener(){
        $this->db->select('Afiliado.NSS,Afiliado.Nombre,Afiliado.Apellido_P,Afiliado.Apellido_M'); 
        $this->db->from('Afiliado'); 
        $this->db->join('envio_uh', 'envio_uh.NSS = Afiliado.NSS AND envio_uh.Status_envio=1');
        $consulta = $this->db->get();
        if($consulta->num_rows()>0 ){
            return $consulta->result();
        }else {
            return FALSE;
        }
    }
    public function obtener_total(){
        $query=$this->db->get_where('envio_uh',array('Status_envio'=>'1'));

        return $query->num_rows();
            
        
    }

}