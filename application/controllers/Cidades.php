<?php

class Cidades extends CI_Controller {
  
    public function __construct(){
            parent::__construct();
            $this->load->model('cidade_model', 'cidade');
	}
        
     public function buscar(){
            
         $estado = $this->input->get('estado');
         
         $data['cidades'] = $this->cidade->buscar($estado);
        
         $this->load->view('candidato/cidades/buscar', $data);         
        
     }
    
}
