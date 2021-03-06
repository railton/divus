<?php

require "conexao.php";


$alerts = [];
$nome = "";
$email = "";
$senha = "";

if($_POST){

  $nome = $_POST['inputNome'];
  $email = $_POST['inputEmail'];
  $senha = $_POST['inputSenha'];

  if(empty($nome)){
    $alerts[] = ['type' => 'danger' , 'message' => "É necessário digitar um nome!"];
  }

  if(empty($email)){
    $alerts[] = ['type' => 'danger' , 'message' => "É necessário digitar um e-mail!"];
  }

  if(empty($senha)){
    $alerts[] = ['type' => 'danger' , 'message' => "É necessário digitar uma senha!"];
  }


  // Inserir no banco
  if(count($alerts) == 0){

    $sql = "INSERT INTO usuario(nome, email, senha) 
    VALUES ('$nome', '$email', '$senha')";

    $success = $dbh->exec($sql);

    if($success){
      $alerts[] = ['type' => 'success' , 'message' => "Usuário cadastrado com sucesso!"];
      $nome = "";
      $email = "";
      $senha = "";
    }

  }

}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Exemplo</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Projeto</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
         
        </div><!--/.navbar-collapse -->
      </div>
    </nav>


    <div class="container">
      <!-- Example row of columns -->
      <div class="row">

        <div class="col-md-12">

        <?php
          if(count($alerts) > 0):

            foreach($alerts as $alert):

        ?>

          <div class="alert alert-<?= $alert['type'] ?> alert-dismissible" role="alert">

            <?php
                echo "<strong>". $alert['message'] . "</strong><br>";
            ?>

          </div>

        <?php
            endforeach;

          endif;
        ?>
          
          <h1>Usuário <small>cadastro</small></h1>

          <form method="POST" class="form-horizontal">
            <div class="form-group">
              <label for="inputNome" class="col-sm-2 control-label">Nome</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="inputNome" id="inputNome" placeholder="Nome" value="<?= $nome ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" value="<?= $email ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="inputSenha" id="inputSenha" placeholder="Senha" value="<?= $senha ?>">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Cadastrar</button>
              </div>
            </div>
          </form>

        </div>

      </div>

      <hr>

      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
