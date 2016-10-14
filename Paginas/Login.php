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
        <div class="jumbotron text-center" style="background:white">
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
          <li><a href="../Paginas/Cadastro.php"><span class="glyphicon glyphicon-user"></span> Cadastrar</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--Termina o menu -->
<div >
<div class="container">
    <div class="col-sm-4">
        
    </div> 
   <div class="col-sm-4">
  <h2>Login</h2>
  <form class="form-horizontal" method="post" action="../funcao/funcLogin.php">
    <div class="form-group">
        <input name="email" type="email" class="form-control" id="email" placeholder="E-mail">
    </div>
    <div class="form-group">
        <input name="senha" type="password" class="form-control" id="senha" placeholder="Senha">
    </div>
   
    <div class="form-group">
      <div class="col-sm-offset-4 col-sm-10">
          <button type="submit" name="Entrar" class="btn btn-default">Entrar</button>
      </div>
    </div>
  </form>
</div>
     <div class="col-sm-4">
        
    </div> 
    </body>
</html>
