<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cidade_model extends CI_model
{
	private $tabela = 'cidades';

	public function __construct()
	{
		parent::__construct();
	}

	public function selecionar_por_estado($id_estado)
	{
		$this->db->select('id, nome');
		$this->db->where('estado_id', $id_estado);
		return $this->db->get($this->tabela)->result_array();
	}

	public function id($id, $campos = '*')
	{
		$this->db->select($campos);
		$this->db->where('id', $id);
		return $this->db->get($this->tabela)->result();
	}

	public function buscar($id_estado){
                
        $this->db->where('idestado', $id_estado);
        $this->db->select('id, nome');
        return $this->db->get('cidades')->result_array();

    }


    public function buscar_cidade($id){

        $this->db->where('id', $id);
        $this->db->select('nome');
        return $this->db->get('cidades')->row_array();

    }

}
?>