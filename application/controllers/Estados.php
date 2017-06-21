<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estados extends CI_Controller
{
	public function pesquisar()
	{
		if($this->input->get('estado'))
		{
			$this->load->model('Cidade_model', 'cidade');
			$cidades = $this->cidade->selecionar_por_estado((int) $this->input->get('estado'));
			$resultado['cidade'] = $cidades;
		}
		else
		{
			$resultado['cidade'] = null;
		}

		echo json_encode($resultado);

	}
}

?>