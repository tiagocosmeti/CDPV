<?php

class Observacao_model extends CI_Model
{

	public $tabela = 'observacoes';

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

    public function alterar($id, $dados)
    {   
        $this->db->where('contato_id', $id); 
        if($this->db->update($this->tabela, $dados))
            return true;
        else
            return false;
    }
}

?>