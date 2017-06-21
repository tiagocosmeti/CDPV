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

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1> <?php echo img('assets/imgs/logo_cdpv.png'); ?> </h1>
      </div>

      <h3> Detalhes sobre  <?= $resultado[0]['nomecontato']; ?> </h3>

       <div class = "row">

        <table class="table table-striped table-bordered">          
          <tr>
            <td> Nome </td>
            <td> <?= $resultado[0]['nomecontato'] . ' '. $resultado[0]['sobrenome']; ?> </td>
          </tr>

          <tr>
            <td> Empresa </td>
            <td> <?= $resultado[0]['empresa']; ?> </td>
          </tr>

          <tr>
            <td> Cargo </td>
            <td> <?= $resultado[0]['cargo']; ?> </td>
          </tr>

          <tr>
            <td> E-mail </td>
            <td> <?= $resultado[0]['email']; ?> </td>
          </tr>

           <tr>
            <td> Data de nascimento </td>
            <td> <?= $this->funcoes->conversao_data_mes_ano($resultado[0]['data_nascimento'], $formato = 'dd/m/Y'); ?> </td>
          </tr>

          <tr>
            <td> Telefone </td>
            <td> <?= $resultado[0]['telefone']; ?> </td>
          </tr>

          <tr>
            <td> Celular </td>
            <td> <?= $resultado[0]['celular']; ?> </td>
          </tr>


          <tr>
            <td> Cidade / Estado </td>
            <td> <?= $resultado[0]['nome_cidade'] .'/'.  $resultado[0]['uf']; ?> </td>
          </tr>


          <tr>
            <td> Data de inclusão </td>
            <td> <?= $this->funcoes->conversao_data_mes_ano($resultado[0]['data_inclusao'], $formato = 'dd/m/Y'); ?> </td>
          </tr>

           <tr>
            <td> Observações </td>
            <td> <?= $resultado[0]['observacao']; ?>  </td>
          </tr>

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