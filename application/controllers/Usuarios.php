<?php

class Usuarios extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('usuario_model', 'usuario');
        $this->load->library('funcoes');

	}

	public function index()
	{
		$this->load->view('layout/novo-usuario.php');
	}

	public function salvar()
	{

		$this->form_validation->set_rules('nome', 'Nome Fantasia', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|is_unique[usuarios.email]');
        $this->form_validation->set_rules('senha', 'senha', 'required|min_length[6]');
        
        if(!$this->form_validation->run())
        {
            $this->index();
        }

        else
        {
        	$data['nome']  = $this->input->post('nome');
        	$data['email'] = $this->input->post('email');
        	$data['senha'] = $this->input->post('senha');

        	if(is_int($this->usuario->salvar($data)))
            {
            	$this->funcoes->sessao($data);
            	redirect('painel');
            }
        }

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