<?php

class Usuario_model extends CI_Model
{

	public $tabela = 'usuarios';

	public function __construct() 
    {
        parent::__construct();
    }

    public function salvar($dados)
    {

        if($this->db->insert($this->tabela, $dados))
            return $this->db->insert_id();
        else
            return false;
    }

    public function login($dados)
    {
    	$this->db->where($dados);
        $this->db->select('id, nome, email');
        
        $resultado = null;
        $resultado = $this->db->get($this->tabela)->row();

        if(count($resultado) == 1)
            return $resultado;

        else
            return false;
    }


}

?>