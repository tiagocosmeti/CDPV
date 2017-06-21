<html>
<head>
 <title> CDPV </title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.maskedinput.min.js') ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/codigos.js') ?>"></script>

<link href= "<?php echo base_url("assets/css/complemento.css"); ?>" rel="stylesheet">

<body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li> <?php echo anchor(base_url('painel'), 'Home'); ?> </li>
            <li> <?php echo anchor(base_url('contatos/novo'), 'Novo contato'); ?> </li>
            <li> <?php echo anchor(base_url('contatos/buscar'), 'Busca & gerenciamento'); ?> </li>
            <li> <?php echo anchor(base_url('contatos/aniversariantes'), 'Relatório de aniversariantes'); ?> </li>
            <li> <?php echo anchor(base_url('usuarios/sair'), 'Sair'); ?> </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1> <?php echo img('assets/imgs/logo_cdpv.png'); ?> </h1>
      </div>

      <h1> Editar contato </h1>

        <div class="row">

        <div style = "color: red; padding-bottom: 10px; ">
          <?php echo validation_errors(); ?>
        </div> 

        <div style = "color: green; padding-bottom: 10px; font-size: 16px; ">
            <?php echo $this->session->flashdata('mensagem'); ?>
        </div>

         <h3> Dados pessoais </h3>
          
          <?php 
              echo form_open(base_url("contatos/alterar"), array('method' => 'POST')); 
              echo form_hidden('id', $resultado[0]['idcontato']);
          ?>

          <div class="col-md-4">
            <label class="sr-only">Nome </label>
             <?php echo form_input('nome', (set_value('nome') == '') ? $resultado[0]['nomecontato'] : set_value('nome'), 'placeholder= "Digite o seu nome" class="form-control espaco" autofocus');?>
          </div>

          <div class="col-md-4">
            <label class="sr-only">Sobrenome </label>
             <?php echo form_input('sobrenome', (set_value('sobrenome') == '') ? $resultado[0]['sobrenome'] : set_value('sobrenome'), 'placeholder= "Digite o sobrenome" class="form-control espaco"');?>
          </div>

          <div class="col-md-4">
            <label class="sr-only">E-mail </label>
             <?php echo form_input('email', (set_value('email') == '') ?  $resultado[0]['email'] : set_value('email'), 'placeholder= "Digite o e-mail" class="form-control espaco"');?>
          </div>

          <div class="col-md-4">
            <label class="sr-only">Data Nascimento </label>
             <?php echo form_input('data_nascimento', (set_value('data_nascimento') == '') ?  $resultado[0]['data_nascimento'] : set_value('data_nascimento'), 'placeholder= "Data de nascimento" class="form-control espaco data_nascimento"');?>
          </div>

          <div class="col-md-4">
            <label class="sr-only"> Cargo </label>
             <?php echo form_input('cargo', (set_value('cargo') == '') ?  $resultado[0]['cargo'] : set_value('cargo'), 'placeholder= "Cargo" class="form-control espaco"');?>
          </div>

          <div class="col-md-4">
            <label class="sr-only"> Empresa </label>
             <?php echo form_input('empresa', (set_value('empresa') == '') ?  $resultado[0]['empresa'] : set_value('empresa'), 'placeholder= "Empresa" class="form-control espaco"');?>
          </div>

          </div>

          <div class="row">
          <h3> Contato & Localização </h3>

          <div class="col-md-4">
            <label class="sr-only"> Telefone </label>
             <?php echo form_input('telefone',(set_value('telefone') == '') ?  $resultado[0]['telefone'] : set_value('telefone'), 'placeholder= "Telefone" class="form-control espaco telefone"');?>
          </div>

          <div class="col-md-4">
            <label class="sr-only"> Celular </label>
             <?php echo form_input('celular', (set_value('celular') == '') ?  $resultado[0]['celular'] : set_value('celular'), 'placeholder= "Celular" class="form-control espaco celular"');?>
          </div>

          </div>

          <div class="row">

          <div class="col-md-4">
            <label for="inputEmail" class="sr-only"> Bairro </label>
            <?php echo form_input('bairro', (set_value('bairro') == '') ?  $resultado[0]['bairro'] : set_value('nome'), 'placeholder= "Bairro" class="form-control espaco"');?>
          </div>

          <div class="col-md-4">
            <label for="inputEmail" class="sr-only"> Estado </label>
              <?php echo form_dropdown('estado', $estado, (set_value('estado') == '') ?  $resultado[0]['estado_id'] : set_value('estado'), "class='selecionar_cidade form-control' title = 'Selecione o Estado'");?>
          </div>


          <div class="col-md-4">
            <label for="inputEmail" class="sr-only"> Cidade </label>
              <?php echo form_dropdown('cidade', array('' => 'Selecione o seu Estado'), set_value('cidade'), "class='form-control tooltip2' title = 'Selecione a Cidade'");?>
              
              <?php echo form_hidden('callback_cidade', (set_value('cidade') == '') ? $resultado[0]['cidade_id'] : set_value('cidade')); ?>
          </div>
          </div>

          <div class="row">
          <h3> Observações </h3>
          
          <div class="col-md-12">
          <?php echo form_textarea('observacao', (set_value('observacao') == '') ? $resultado[0]['observacao'] : set_value('observacao'), 'placeholder= "Observações" class="form-control espaco"');?>
          </div>

          <div class="col-md-4">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Editar</button>
          </div>
     
       </form>
       </div>

    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted espaco_superior"> CDPV - Soluções para a sua Empresa </p>
      </div>
    </footer>

  </body>
</html>