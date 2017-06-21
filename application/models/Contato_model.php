<?php

class Contato_model extends CI_Model
{

	public $tabela = 'contatos';

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
        $this->db->where('id', $id); 
        if($this->db->update($this->tabela, $dados))
            return true;
        else
            return false;
    }

    public function gerenciar()
    {
        $this->db->from($this->tabela . ' c');
        $this->db->join('enderecos e', 'c.id = e.contato_id');
        $this->db->join('observacoes o', 'c.id = o.contato_id');
        $this->db->join('estados es', 'es.id = e.estado_id');
        $this->db->join('cidades ci', 'ci.id = e.estado_id');
        $this->db->select('c.*, e.*, ci.nome as nomecidade');

        return $this->db->get()->result_array();
    }

    public function buscar($termo, $campos)
    {

        $this->db->from($this->tabela . ' c');

        $this->db->join('enderecos e', 'c.id = e.contato_id');
        $this->db->join('observacoes o', 'c.id = o.contato_id');
        $this->db->join('estados es', 'es.id = e.estado_id');
        $this->db->join('cidades ci', 'ci.id = e.estado_id');

        $this->db->like('c.nome', $termo); 
        $this->db->or_like('c.sobrenome', $termo);
        $this->db->or_like('c.email', $termo);
        $this->db->or_like('c.telefone', $termo);
        $this->db->or_like('c.celular', $termo);
        $this->db->or_like('c.cargo', $termo);
        $this->db->or_like('c.empresa', $termo);

        $this->db->select($campos);

        return $this->db->get()->result_array();
    }


    public function detalhesId($termo, $campos, $id)
    {

        $this->db->from('contatos c');
        $this->db->join('enderecos e', 'c.id = e.contato_id');
        $this->db->join('observacoes o', 'c.id = o.contato_id');
        $this->db->join('estados es', 'es.id = e.estado_id');
        $this->db->join('cidades ci', 'ci.id = e.cidade_id');

        $this->db->select($campos);

        $this->db->where('c.id', $id);
        return $this->db->get()->result_array();
    }


    public function aniversariantes($filtro, $campos = '*')
    {
        $this->db->order_by('data_nascimento', $filtro);
        $this->db->select($campos);
        return $this->db->get($this->tabela)->result_array();
    }

    public function excluir($id)
    {
        
        $this->db->where('id', $id);
        $this->db->delete($this->tabela);

        if($this->db->affected_rows() == 1)
              return true;
        else
              return false;
    }


}

?>