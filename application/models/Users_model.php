<?php

/**
 * Created by PhpStorm.
 * User: AndresPava
 * Date: 25/11/2018
 * Time: 12:07 AM
 */
class Users_model extends CI_Model
{
    /**
     * Users_model constructor.
     */
    public function __construct()
    {
        parent::__construct();

    }



    public function save($datos){
        $campos = array(
            'user_id' => $datos['user_id'],
            'username' => $datos['username'],
            'email' => $datos['email'],
            'auth_level' => $datos['auth_level'],
            'passwd' => $datos['passwd'],
            'created_at' => $datos['created_at']
        );

        $this->db->insert('users',$campos);
        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
        return $this->db->insert_id();

    }

}