<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ecopontos - Projeto teia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap_personalizado.css">
</head>
<body>
    <div class="jumbotron text-center" style="background:white">
    <img class="img-responsive" src="../Imagens/logo.png" alt="Chania">
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
            <!--<li><a href="#">Material Educacional</a></li>-->
          </ul>
        </li>
        <li><a href="Mostra_Produto_s_Login.php">Trocas</a></li>
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
          <div class="col-sm-1"></div> 
          <div class="col-sm-4">
             <div class="col-sm-12"> 
              <div class="panel panel-default">
    <div class="panel-heading">Senac Gravataí</div>
   
    <div class="panel-body">
      <button style="z-index:1" type="button" class="panel-body" data-toggle="modal" data-target="#myModal">
      <iframe style="border:0;z-index:-1" class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3457.396381393985!2d-51.00047098443349!3d-29.93927518192075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95190b471d555555%3A0x2ea6a888bb7c3eb0!2sSenac!5e0!3m2!1spt-BR!2sbr!4v1476467404101" width="100%" height="250" frameborder="0"  allowfullscreen></iframe>
  </button>      
</div>
              </div>
            </div>
              <div class="col-sm-12">
      <div class="panel panel-default">
    <div class="panel-heading">Sindicato do Comércio Varejista de Gravataí</div>
   
    <div class="panel-body">
      <button style="z-index:1" type="button" class="panel-body" data-toggle="modal" data-target="#myModal2">
<iframe style="border:0;z-index:-1" class="embed-responsive-item" src="          https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27661.754809730093!2d-51.04618344215926!3d-29.929980793120855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951973a36e78f07f%3A0x716184fa0656a57e!2sSindicato+do+Com%C3%A9rcio+Varejista+de+Gravata%C3%AD!5e0!3m2!1spt-BR!2sbr!4v1477239347366
" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>  </button>      
</div>
              </div>
          </div>
 

  </div>
          <div class="col-sm-1"></div>
          <div class="col-sm-4">
               <div class="col-sm-12">
              <div class="panel panel-default">
    <div class="panel-heading">Sindilojas Gravataí</div>
   
    <div class="panel-body">
      <button style="z-index:1" type="button" class="panel-body" data-toggle="modal" data-target="#myModal2">
<iframe style="border:0;z-index:-1" class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3457.263530556864!2d-50.99814961290254!3d-29.9430975883858!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95190b47149e1c95%3A0x74854442174ce05c!2sSindilojas+Gravata%C3%AD!5e0!3m2!1spt-BR!2sbr!4v1477238962901" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>  </button>      
</div>
              </div>
          </div> 
         </div>  
  <!--<h2>Responsive Embed</h2>-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin:40% auto;height:65%;width:100%;">
        <div class="modal-header">
  
          <h4 class="modal-title">Senac Gravataí</h4>
        </div>
        <div class="modal-body">
       <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3457.396381393985!2d-51.00047098443349!3d-29.93927518192075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95190b471d555555%3A0x2ea6a888bb7c3eb0!2sSenac!5e0!3m2!1spt-BR!2sbr!4v1476467404101" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe></div>
    </div>
      </div>
 
        
      
      </div>
   <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin:40% auto;height:65%;width:100%;">
        <div class="modal-header">
  
          <h4 class="modal-title">Sindilojas Gravataí</h4>
        </div>
        <div class="modal-body">
       <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3457.263530556864!2d-50.99814961290254!3d-29.9430975883858!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95190b47149e1c95%3A0x74854442174ce05c!2sSindilojas+Gravata%C3%AD!5e0!3m2!1spt-BR!2sbr!4v1477238962901" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe></div>
    </div>
      </div>
 
        
      
      </div>
     <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin:40% auto;height:65%;width:100%;">
        <div class="modal-header">
  
          <h4 class="modal-title">Sindicato do Comércio Varejista de Gravataí</h4>
        </div>
        <div class="modal-body">
       <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27661.754809730093!2d-51.04618344215926!3d-29.929980793120855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951973a36e78f07f%3A0x716184fa0656a57e!2sSindicato+do+Com%C3%A9rcio+Varejista+de+Gravata%C3%AD!5e0!3m2!1spt-BR!2sbr!4v1477239347366" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe></div>
    </div>
      </div>
 
        
      
      </div>    
    </div>

</body>
</html>

