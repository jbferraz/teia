<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body >
    <div class="jumbotron text-center" style="background:white;">
        <img class="img-responsive" style="margin:0 auto" src="../Imagens/logo.png" alt="Chania">
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
        <li><a href="Mostra_Produto_s_Login.php?pag=1">Trocas</a></li>
        <li><a href="Eco_Pontos.php">Ecopontos</a></li>
      </ul>
         <ul class="nav navbar-nav navbar-right">
         <li><a href="../Paginas/Cadastro.php"><span class="glyphicon glyphicon-user"></span> Cadastrar</a></li>
         <li><a href="../funcao/TestSesionPgLogin.php"><span class="glyphicon glyphicon-log-in"></span> Central do Usuario</a></li>

    </div>
  </div>
</nav>
    
<div class="container">
  <div class="row">
      <div class="col-sm-12">
          <div class="container">
  <!--<h2>Responsive Embed</h2>-->
    
</div>
      </div>
</div>
    <div class="col-sm-12" align="center">
        <div class="col-sm-1"></div>
        <div class="col-sm-10" >
       <div class="panel panel-default">
        <div class="panel-heading">
        <h3>Colaboradores</h3>
        </div>
    </div>
    </div>
        <div class="col-sm-1" ></div>
    </div>
     <div class="col-sm-12" align="center">
        <div class="col-sm-1"></div>
        <div class="col-sm-10" >
    <!-- Left-aligned media object -->
  <div class="media"     <div class="media-body" style="margin-bottom:30px;box-shadow:0px 4px 3px lightgrey;padding:20px;border-radius:10px">

    <div class="media-left">
      <img src="" class="media-object" style="width:60px">
    </div>
    <div class="media-body" >
      <h4 class="media-heading text-justify">Tiago Marcos Alves</h4>
      <p class="text-justify"> Professor do curso Técnico em informática do SENAC/RS e desenvolvedor mobile auxiliou no desenvolvimento do aplicativo do projeto.</p>
    </div>
  </div>
    <!------->
  <div class="media" style="margin-bottom:30px;box-shadow:0px 4px 3px lightgrey;padding:20px;border-radius:10px">
    <div class="media-left">
        <img src="../Imagens/Colaboradores/Daiane.jpg" class="media-object" style="width:60px">
    </div>
    <div class="media-body">
      <h4 class="media-heading text-justify">Daiane Tavares</h4>
      <p class="text-justify">Professora do curso Técnico em meio ambiente, renomada na area de meio ambiente, é responsavel pelo auxilio e instrução dos palestrantes do projeto.</p>
    </div>
  </div>          
      <!------->
  <div class="media" style="margin-bottom:30px;box-shadow:0px 4px 3px lightgrey;padding:20px;border-radius:10px">
    <div class="media-left">
        <img src="../Imagens/Colaboradores/Jair.jpg" class="media-object" style="width:60px">
    </div>
    <div class="media-body">
      <h4 class="media-heading text-justify">Jair Ferraz</h4>
      <p class="text-justify">Coordenador dos cursos de informática do Senac Gravataí e desenvolvedor Web.</p>
    </div>
  </div>       
            
            
            
            
        <div class="col-sm-1" ></div>
    </div>
    
    
    <div class="col-sm-12" style="margin-bottom:100px"></div>
</body>
</html>
