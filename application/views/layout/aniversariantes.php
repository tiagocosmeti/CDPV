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

      <h3> Relatório de aniversariantes </h3>

        <div class="row">

        <div style = "color: red; padding-bottom: 10px; ">
          <?php echo validation_errors(); ?>
        </div> 

        <div style = "color: green; padding-bottom: 10px; font-size: 16px; ">
            <?php echo $this->session->flashdata('mensagem'); ?>
        </div>
          
        <?php echo form_open(base_url("contatos/aniversariantes"), array('method' => 'POST')); ?>

        <div class="col-md-4">
      
        </div>

       </form>
       </div>

       <div class = "row">
      
       <b> Filtros: </b>

       <?php echo anchor('contatos/aniversariantes?filtro=ASC', 'De Janeiro até Dezembro'); ?> | 
       <?php echo anchor('contatos/aniversariantes?filtro=DESC', 'De dezembro até janeiro'); ?>

        <table class="table table-striped table-bordered">
             <tr>
                <td> Nome </td>
                <td> E-mail </td>
                <td> Data de nascimento </span></td>
              </tr>
     
          <?php

          $total = count($resultado);

          if($total == 0)
          {
              echo "<span style = 'color: red;'> <h4> Não há contato cadastrado </h4> </span>";
          }


          else if($total > 0)
          {
              foreach($resultado as $auxiliar)
              {
               
       ?>
              <tr>
                <td> <?= $auxiliar['nome']; ?> </td>
                <td> <?= $auxiliar['email']; ?> </td>
                <td> <?= date('d/m/Y', strtotime($auxiliar['data_nascimento'])); ?> </td>
              </tr>

       <?php
              }
          }

       ?>      

         </table>  
       </div>

    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted espaco_superior"> CDPV - Soluções para a sua Empresa </p>
      </div>
    </footer>

  </body>
</html>