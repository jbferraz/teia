<html>
    <head>
        <meta charset="UTF-8">
        <title>Login - Projeto teia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap_personalizado.css">
    </head>
    <body>
        <div class="jumbotron text-center" style="margin-top:40px;background:#FFF" align="center">
            <img  style="margin:0 auto"class="img-responsive" src="../Imagens/logo.png" alt="Chania">
   
</div> 
  <nav class="navbar navbar-verde navbar-default  navbar-fixed-top">
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
           <li><a href="../Paginas/Oprojeto.php">O Projeto</a></li>
            <li><a href="../Paginas/Colaboradores.php">Colaboradores</a></li>
            <li><a href="../Paginas/Galeria.php">Galeria</a></li>
            <li><a href="../Paginas/Material_Educacional.php">Material Educacional</a></li>
          </ul>
        </li>
        
       <li><a href="Mostra_Produto_s_Login.php">Trocas</a></li>
        <li><a href="Eco_Pontos.php">Ecopontos</a></li>
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
