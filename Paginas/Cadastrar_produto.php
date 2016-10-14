<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
include '../funcao/conecta.php';
 session_start();
        if (!isset($_SESSION['Login'])) {
               
            die('<h2>Sessão não iniciada</h2>');
                
        }
   $UserEmail = $_SESSION['Login'];
    $sql_user = mysql_query("SELECT * FROM `usuario` where `email`='$UserEmail'");

        while ($User = mysql_fetch_object($sql_user)) {
            $UserId = $User->idUsuario;
            $UserNome = $User->nome;
            $UserImg= $User->idImagem;
        }
?>
<script>

function toogle(){
    var div = document.getElementById("mySidenav-tt");
    if (div.style.display !=='none'){
        div.style.display = 'none';
        document.getElementById("bd").style.overflow="auto";
    }
    else {
        div.style.display = 'block';
        document.getElementById("bd").style.overflow="hidden" ;
        
    }
}
window.onload = function() {
   toogle();
}
</script>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/Sidenav.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </head>
    <body id="bd">
        
 <nav class="navbar navbar-inverse navbar-fixed-top" >
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
          <li><div class="well-sm">
             <div class="navbar-header">
         <span class="btn-sidbar navbar-toggle" onclick="toogle()" data-toggle="collapse" data-target="#myNavbar"><span class="glyphicon glyphicon-tasks"></span></span>
            </div>    
     <span class="btn-sidbar navbar-collapse" onclick="toogle()"><span class="glyphicon glyphicon-tasks"></span></span><!--SITE NO NENU ABERTO-->
              </div></li>
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
               
             <li class="dropdown" style="margin-right:30px;">
                 <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-envelope" style="font-size:20px;"></span><span class="badge">1</span></a>
                 <ul class="dropdown-menu" style="min-width:300px;">
                     <li><div class="col-sm-12" style="width:100%;padding:2px; border-bottom:0.5px solid black;">
                         <div><a href="#" onclick="tFunction('')" style="color:black">
                         <div class="col-sm-4" >
                           <span class="glyphicon glyphicon-tags" style="font-size:50px;margin:auto; margin-top:4px;">   
                         </div>                         
                                 <div class="col-sm-8 text-left" style="margin-top:4px;">
                             Carlos Eduardo fez uma proposta de troca para você
                         </div>
                             </a>
                         </div></div></li>
            
                      
             
 
          </ul>

                 
        </li> 
        <li><a href="../funcao/sair.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
        
    </div>
  </div>
</nav>
    <!--Termina o menu -->
    <div class="jumbotron text-center" style="background:white; margin-top:40px;" align="center">
    <img class="img-responsive" src="../Imagens/logo.png" alt="Chania">
    <hr style="width:75%">
</div> 
  <!--Menu central do usuario menu-sidnav-->
  <div id="mySidenav-tt" class="sidenav-tt">
      <div id="mySidenav" class="sidenav" align="center">
          <ul align="center" style="list-style:none;color:white;padding-left:5px"> 
      <li><img class="img-responsive img-circle" src="<?php echo" Listar.php?codigo=$UserImg"; ?>" alt="Chania" style="min-height:150px;max-height:200px;"></li>
      <li><?php echo $UserNome; ?></li>
      <hr style="width:75%">
      <li><div style="border:1px solid white;border-radius:10px; width:90%;margin:auto;margin-bottom:10px;"><a href="Mostra_produtos.php" style="margin:auto;font-size:18px;"><span class="glyphicon glyphicon-shopping-cart"></span>Produtos</a></div></li>
      <li><div style="border:1px solid white;border-radius:10px; width:90%;margin:auto;margin-bottom:10px;;"><a href="Cadastrar_produto.php" style="margin:auto;font-size:18px;"><span class="glyphicon glyphicon-plus"></span> Adicionar Produto</a></div></li>
      <li><div style="border:1px solid white;border-radius:10px; width:90%;margin:auto;margin-bottom:10px;;"><a href="Meus_produtos.php" style="margin:auto;font-size:18px;"><span class="glyphicon glyphicon-folder-open"></span> Meus Produto</a></div></li>
  </ul> 
</div>
      <div class="btn-sidbar-tt">
          <button class="btn-sidbar-tt" onclick="toogle()" ></button>
      </div>
  </div>


    <!-- fim menu-->
    <div class="container">
    <div class="col-sm-4">
    </div> 
   <div class="col-sm-4">
  <h2>Cadastrar de produto</h2>
  <form class="form-horizontal"  method="post"  enctype="multipart/form-data" action="../funcao/cadastroProd.php" >
    <div class="form-group">
        <input type="text" name="ProdNome"class="form-control" id="email" placeholder="Nome do Produto">
    </div>
    <div class="form-group">
        <input name="ProdDesc" type="text" class="form-control" id="senha" placeholder="Descrição">
    </div>
    <div class="form-group">
      <select class="form-control" id="sel1" name="ProdEstado">
          <option value="" disabled selected>Selecione o estado</option>
        <?php
                        $sql = mysql_query("SELECT * FROM `produtoestado`");
                    while ($estado = mysql_fetch_object($sql)) {
                        $estado_id = $estado->idProdutoEstado;
                        $estado_desc = $estado->descricao;
                        echo "<option value='$estado_id'>$estado_desc</option> ";
                    }
                    ?>
      </select>
    
</div>
<div class="form-group">
      <select class="form-control" id="sel1" name="ProdCategoria">
        <option value="" disabled selected>Selecione a categoria</option>
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
          <input type="hidden" name="idUser" value="<?php echo $UserId;?>">
          <button type="submit" name="cadastrar"class="btn btn-default">Cadastrar</button>
      </div>
    </div>
    
  </form>
</div>
     <div class="col-sm-4">
    </div> 
        </div>
    </body>
</html>
