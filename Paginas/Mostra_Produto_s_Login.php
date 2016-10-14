<!DOCTYPE html>
<?php 
include '../funcao/conecta.php';
     
?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <li><a href="Mostra_Produto_s_Login.php">Trocas</a></li>
        <li><a href="#">Ecopontos</a></li>
      </ul>
         <ul class="nav navbar-nav navbar-right">
         <li><a href="../Paginas/Cadastro.php"><span class="glyphicon glyphicon-user"></span> Cadastrar</a></li>
         <li><a href="../funcao/TestSesionPgLogin.php"><span class="glyphicon glyphicon-log-in"></span> Central do Usuario</a></li>

    </div>
  </div>
</nav>
    
<div class="col-sm-12" align="center">
        <div class="col-sm-2"></div>
        <div class="col-sm-8" >
       <div class="panel panel-default">
        <div class="panel-heading">
        <h3>Produtos disponiveis</h3>
        </div>
    </div>
    </div>
        <div class="col-sm-2" ></div>
    </div>
    
    <div class="col-sm-2" ></div>
    <div class="col-sm-8">
        <?php
        $sql = mysql_query("SELECT * FROM `listarproduto` ORDER BY `DataProduto` ASC");
                while ($Produtos = mysql_fetch_object($sql)) { 
                  $ProdId   = $Produtos->IdPoduto;
                  $ProdNome = $Produtos->NomeProduto;
                  $UserNome = $Produtos->NomeUsuario;
                  $ProdDecr = $Produtos->DescProduto;
                  $ProdCateg =  $Produtos->categoria;
                  $ProdEstado =  $Produtos->estado;
                  $ProdImg =  $Produtos->img;
                ?>
  <!-- Inicio da 1ª coluna de produtos-->
  <div class="col-sm-12" style="margin-bottom:30px;box-shadow:0px 4px 2px lightgray;padding:20px;">
        <div class="col-sm-1">
 </div>
      <div class="col-sm-4">
            <img class="img-responsive" src="<?php echo "Listar.php?codigo=$ProdImg";?>" alt="Chania" style="min-height:250px;max-height:250px;">
 </div>
     <div class="col-sm-1">
 </div>
       <div class="col-sm-4">
           <p class="text-left lead" style=""><h3><?php echo $ProdNome; ?></h3></p>
            <p class="text-left small" style=""><h3><?php echo "Estado do produto: $ProdEstado"; ?></h3><p/>
            <p class="text-left small" style=""><h3><?php echo "Categoria do produto: $ProdCateg"; ?></h3></p>
            <p class="text-left small" style=""><h4> <?php echo "$ProdDecr";?></h4></p>
       <form method="post" action="Cadastro.php">   
             
 </div>
         <div class="col-sm-1">
 </div>
 <!-- Fim do Produto -->
    </div>
  
  
  <?php 
  
                    }
  ?>
  </div>
      

     <div class="col-sm-2"></div>
     <div class="col-sm-12" align="center">
        <div class="col-sm-2"></div>
        <div class="col-sm-8" >
       <div class="panel panel-default" >
        <div class="panel-heading" style="background:black;color:white;">
          
            <div class="form-group">
                <input type="hidden" name="userI" value="<?php echo "$UserId";?>"/>
        <button type="submit" class="btn btn-default">Oferecer Troca</button>
    </div>   
            </form>
    </div>
    </div>
        <div class="col-sm-2" ></div>
    </div>
    
    <script>
        
    </script>
</body>
</html>

