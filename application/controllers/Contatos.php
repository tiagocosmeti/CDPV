<?php

class Contatos extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('contato_model', 'contato');
		$this->load->model('estado_model', 'estado');
		$this->load->model('endereco_model', 'endereco');
		$this->load->model('observacao_model', 'observacao');

        $this->load->library('funcoes');
        $this->funcoes->sessao(null, 'login');

	}

	public function novo()
	{
		$data['estado'] = $this->funcoes->prepara_resultado_banco('nome', $this->estado->selecionar(), 'id', $selecione = "Selecione o seu Estado");
		$this->load->view('layout/novo-contato.php', $data);
	}

	public function salvar()
	{
		$this->form_validation->set_rules('nome', 'nome', 'required');
		$this->form_validation->set_rules('sobrenome', 'sobrenome', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|is_unique[contatos.email]');
		$this->form_validation->set_rules('data_nascimento', 'data de nascimento', 'required');
		$this->form_validation->set_rules('cargo', 'cargo', 'required');
		$this->form_validation->set_rules('empresa', 'empresa', 'required');
		$this->form_validation->set_rules('telefone', 'telefone', 'required');
		$this->form_validation->set_rules('celular', 'celular', 'required');
		$this->form_validation->set_rules('bairro', 'bairro', 'required');
		$this->form_validation->set_rules('estado', 'Estado', 'required');
		$this->form_validation->set_rules('cidade', 'Cidade', 'required');
        
        if(!$this->form_validation->run())
        {
            $this->novo();
        }

        else
        {

        	$contato = null;
        	$contato['nome']  = $this->input->post('nome');
        	$contato['sobrenome'] = $this->input->post('sobrenome');
        	$contato['email'] = $this->input->post('email');
        	$contato['data_nascimento'] =  $this->funcoes-> data_americana($this->input->post('data_nascimento'), $separador = '/');
        	$contato['cargo'] = $this->input->post('cargo');
        	$contato['empresa'] = $this->input->post('empresa');
        	$contato['telefone'] = $this->input->post('telefone');
        	$contato['celular'] = $this->input->post('celular');
        	$contato['data_inclusao'] = date('Y-m-d H:i:s');

        	if(is_int($id_contato = $this->contato->salvar($contato)))
            {
            	// cadastrar endereço

            	$endereco = null;
				$endereco['contato_id'] = $id_contato;
	        	$endereco['bairro'] = $this->input->post('bairro');
	        	$endereco['estado_id'] = $this->input->post('estado');
	        	$endereco['cidade_id'] = $this->input->post('cidade');

	        	$this->endereco->salvar($endereco);

        		$observacao = $this->input->post('observacao');

        		if($observacao != '')
        		{
        			$observacao = null;
        			$observacao['contato_id'] = $id_contato;
        			$observacao['observacao'] = $this->input->post('observacao');
        			$this->observacao->salvar($observacao);
        		}

            	$this->session->set_flashdata('mensagem', 'Contato cadastrado com sucesso');
            	redirect('contatos/novo');
            }
        }

	} 

	public function editar($id)
	{

		$data['estado'] = $this->funcoes->prepara_resultado_banco('nome', $this->estado->selecionar(), 'id', $selecione = "Selecione o seu Estado");

		$resultado = $this->contato->detalhesId($this->input->post('termo'), $campos = '*, ci.nome as nome_cidade, c.nome as nomecontato, c.id as idcontato', $id);

		// formatando data para padrão brasileiro.
		$resultado[0]['data_nascimento'] =  $this->funcoes->conversao_data_mes_ano($resultado[0]['data_nascimento'], $formato = 'd/m/Y');

		$data['resultado'] = $resultado;
		$this->load->view('layout/editar-contato.php', $data);
	}


	public function alterar()
	{
		$this->form_validation->set_rules('nome', 'nome', 'required');
		$this->form_validation->set_rules('sobrenome', 'sobrenome', 'required');
		$this->form_validation->set_rules('data_nascimento', 'data de nascimento', 'required');
		$this->form_validation->set_rules('cargo', 'cargo', 'required');
		$this->form_validation->set_rules('empresa', 'empresa', 'required');
		$this->form_validation->set_rules('telefone', 'telefone', 'required');
		$this->form_validation->set_rules('celular', 'celular', 'required');
		$this->form_validation->set_rules('bairro', 'bairro', 'required');
		$this->form_validation->set_rules('estado', 'Estado', 'required');
		$this->form_validation->set_rules('cidade', 'Cidade', 'required');
        
        if(!$this->form_validation->run())
        {
            $this->editar($this->input->post('id'));
        }

        else
        {

        	$contato = null;
        	$contato['nome']  = $this->input->post('nome');
        	$contato['sobrenome'] = $this->input->post('sobrenome');
        	$contato['email'] = $this->input->post('email');
        	$contato['data_nascimento'] =  $this->funcoes-> data_americana($this->input->post('data_nascimento'), $separador = '/');
        	$contato['cargo'] = $this->input->post('cargo');
        	$contato['empresa'] = $this->input->post('empresa');
        	$contato['telefone'] = $this->input->post('telefone');
        	$contato['celular'] = $this->input->post('celular');

        	if($this->contato->alterar($this->input->post('id'), $contato))
            {
            	// atualizar endereço

            	$endereco = null;
	        	$endereco['bairro'] = $this->input->post('bairro');
	        	$endereco['estado_id'] = $this->input->post('estado');
	        	$endereco['cidade_id'] = $this->input->post('cidade');

	        	$this->endereco->alterar($this->input->post('id'), $endereco);

        		$observacao = $this->input->post('observacao');

        		if($observacao != '')
        		{
        			$observacao = null;
        			$observacao['observacao'] = $this->input->post('observacao');
        			$this->observacao->alterar($this->input->post('id'), $observacao);
        		}

            	$this->session->set_flashdata('mensagem', 'O contato de ' . $this->input->post('nome') . ' foi editado com sucesso.');
            	redirect('contatos/buscar');
            }
        }

	} 

	public function excluir($id)
	{
		$this->contato->excluir($id);
		$this->session->set_flashdata('mensagem', 'O contato foi deletado com sucesso.');
        redirect('contatos/buscar');

	}	

	public function login()
	{
		$this->load->view('layout/login.php');
	}

	public function logar()
	{
		$data['email'] = $this->input->post('email');
        $data['senha'] = $this->input->post('senha');

		$resultado 	   = $this->usuario->login($data);
		
		if(!$resultado)
		{
			$this->session->set_flashdata('mensagem', 'Login inválido');
            redirect(base_url('usuarios/login'));
		}

		else
		{
			$data = null;
			$data['email'] = $resultado->email;
			$data['nome']  = $resultado->nome;

			$this->funcoes->sessao($data, 'criar');
            redirect('painel');
		}

	}

	public function gerenciar()
	{
		$this->funcoes->sessao(null, 'login');

	}

	public function buscar()
	{
		$this->funcoes->sessao(null, 'login');

		if($this->input->post())
		{
			$data['resultado'] = $this->contato->buscar(strtolower($this->input->post('termo')), $campos = "c.id as id, c.nome as nome, email");
			$this->load->view('layout/buscar.php', $data);
		}

		else
		{
			$data['resultado'] = null;
			$this->load->view('layout/buscar.php', $data);
		}

	}

	public function detalhes($id)
	{
		$this->funcoes->sessao(null, 'login');

		$data['resultado'] = $this->contato->detalhesId($this->input->post('termo'), $campos = '*, ci.nome as nome_cidade, c.nome as nomecontato', $id);

		$this->load->view('layout/detalhes.php', $data);
	}


	public function aniversariantes()
	{

		$this->funcoes->sessao(null, 'login');

		$filtro = $this->input->get('filtro');

		if(!isset($filtro))
		{
			
			$filtro = 'ASC';
		}

	    $data['resultado'] = $this->contato->aniversariantes($filtro, $campos = '*');
		$this->load->view('layout/aniversariantes.php', $data);
	}

	public function painel()
	{
		$this->funcoes->sessao(null, 'login');

		$this->load->view('layout/painel.php');
	
	}    

	public function sair()
	{
		$this->funcoes->sessao(null, 'excluir');
		$this->session->set_flashdata('mensagem', 'Deslogado com sucesso.');
        redirect(base_url('usuarios/login'));		
	}    
	
}