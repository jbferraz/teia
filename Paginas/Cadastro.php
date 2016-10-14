<?php
include '../funcao/conecta.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </head>
    <body>
<div class="jumbotron text-center">
    <img class="img-responsive" src="../Imagens/logo.png" alt="Chania">
</div> 
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <li ><a href="../Paginas/index.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sobre nos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">O Projeto</a></li>
            <li><a href="#">Historia</a></li>
            <li><a href="#">Material Educacional</a></li>
          </ul>
        </li>
        
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
         <ul class="nav navbar-nav navbar-right">
       <li><a href="../funcao/TestSesionPgLogin.php"><span class="glyphicon glyphicon-log-in"></span> Central do Usuario</a></li>
    </div>
  </div>
</nav>
    <!--Termina o menu -->

            <div class="container">
    <div class="col-sm-4">
    </div> 
   <div class="col-sm-4">
  <h2>Cadastrar</h2>
  <form class="form-horizontal"  method="post"  enctype="multipart/form-data" action="../funcao/cadastroUser.php">
    <div class="form-group">
        <input name="nome" required type="nome" class="form-control" id="email" placeholder="Nome Completo">
    </div>
    <div class="form-group">
        <input name="email" required type="email" class="form-control" id="email" placeholder="E-mail">
    </div>
    <div class="form-group">
        <input name="senha" required type="password" class="form-control" id="senha" placeholder="Senha">
    </div>
    <div class="form-group">
        <input name="confirmarSenha" required type="password" class="form-control" id="Senha" placeholder="Confirmar Senha">
    </div>
     <div class="form-group">
      <select class="form-control" id="sel1" name="ProdCategoria">
        <option value="" disabled selected>Selecione a categoria de interesse</option>
        <?php
                    $sql = mysql_query("SELECT * FROM `categoria`");
                    while ($Categ = mysql_fetch_object($sql)) {
                        $Categ_id = $Categ->idCategoria;
                        $Categ_nome = $Categ->descricao;
                        echo "<option value='$Categ_id'>$Categ_nome</option> ";
                    }
                    ?>
      </select>
    
</div>
     <div class="form-group">
         <div class="col-sm-offset-1 col-sm-10">
             <div class="well-lg">
                 <input type="file" name="file"> 
              </div> 
    </div>
     </div>
    <div class="form-group">
      <div class="col-sm-offset-4 col-sm-10">
        <button type="submit" class="btn btn-default">Cadastrar</button>
      </div>
    </div>
    
  </form>
</div>
     <div class="col-sm-4">
    </div> 
        </div>
    </body>
</html>
