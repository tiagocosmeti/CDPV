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

<link href= "<?php echo base_url("assets/css/complemento.css"); ?>" rel="stylesheet">

<body>
 <div class="container">

      <?php echo img('assets/imgs/logo_cdpv.png'); ?>

      <?php echo form_open(base_url("usuarios/logar"), array('method' => 'POST', 'class'=> 'form-signin')); ?>

      <h2 class="form-signin-heading">Área adminstrativa</h2>

       <div style = "color: red; padding-bottom: 10px; ">
        <?php echo validation_errors(); ?>
        <?php echo $this->session->flashdata('mensagem'); ?>
      </div>  
        
      <label for="inputEmail" class="sr-only">E-mail</label>
      <?php echo form_input('email', set_value('email'), 'placeholder= "Digite o seu e-mail" class="form-control espaco" required autofocus');?>

      <label for="inputPassword" class="sr-only">Senha</label>

      <?php echo form_password('senha', set_value('senha'), 'placeholder= "Digite a sua senha" class="form-control espaco" required autofocus');?>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>

      <div style = "padding-top: 20px;">
        <?php echo anchor('usuarios', 'Novo usuário? clique aqui'); ?>
      </div>

      </form>


    </div> <!-- /container -->
</body>
</html>