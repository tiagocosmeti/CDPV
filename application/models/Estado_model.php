<?php

class Estado_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function selecionar()
    {  
        $this->db->select('id, nome');
        return $this->db->get('estados')->result_array();
    }

    public function buscar_estado($id)
    {
        $this->db->where('id', $id);
        $this->db->select('nome, uf');
        return $this->db->get('estados')->row_array();
    }
    
}