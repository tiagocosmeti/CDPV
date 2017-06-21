<?php

class Funcoes
{

    public function __construct(){

        $this->CI = &get_instance();

    }

    public function sessao($dados, $acao = 'criar')
    {

        switch ($acao) {
            
            case 'criar':

               $data = null;
               $data['email'] = $dados['email'];
               $data['nome'] =  $dados['nome'];
               $data['logado'] = TRUE;
               $this->CI->session->set_userdata($data); 

            break;

            case 'excluir':
                $this->CI->session->sess_destroy();

            break;

            case 'login':
            if(!array_key_exists('logado', $this->CI->session->userdata())) {
                $this->CI->session->set_flashdata('mensagem', 'Área restrita. É necessário logar para acessar o conteúdo desejado.');
                redirect(base_url('usuarios/login'));
    }       break;

            case 'imprimir':
                var_dump($this->CI->session->userdata());
            break;
        }

    }


        function prepara_resultado_banco($coluna, $dados, $id = true, $selecione = false)
        {
            $lista = null;

            if(is_string($selecione))
            {  
                $lista[''] = $selecione;
            }

            else if($selecione != false)
            {
                $lista[''] = 'Selecione';
            }

            foreach($dados as $auxiliar)
            {
                if(is_bool($id))
                {
                    $lista[ $auxiliar['id'] ] = trim($auxiliar[$coluna]);
                }

                elseif(is_string($id)){

                    $lista[ $auxiliar[$id] ] = trim($auxiliar[$coluna]);
                }

                else
                {
                    $lista[] = trim($auxiliar[$coluna]);
                }
            }

            return($lista);
        }


        public function data_americana($data, $separador = '/')
        {   
            $data = explode($separador, $data);

            if(checkdate($data[1],$data[0], $data[2]))
            {
                return $data[2] .'-'. $data[1] .'-'. $data[0];
            }
            else
                return false;
        }


        function conversao_data_mes_ano($data, $formato = 'default')
        {

            switch ($formato) 
            {
                
                case 'dd/Y':
                    return date('m/Y', strtotime($data));
                
                break;
                
                case 'dd/m/Y h:i:s':
                    return date('d/m/Y h:i:s', strtotime($data));
                
                break;

                case 'dd/m/Y':
                    return date('d/m/Y', strtotime($data));
                
                break;
                
                default:
                    
                    $nova_data = explode('-', $data);
                    return $nova_data[2] .'/'.  $nova_data[1] .'/'.  $nova_data[0]; 

                break;
            }
    
        }

       
}

?>
