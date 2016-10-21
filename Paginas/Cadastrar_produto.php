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
<script language="javascript" src="../funcao/JavaScript.js"></script>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/Sidenav.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap_personalizado.css">
    </head>
    <body id="bd">
     <nav class="navbar navbar-verde navbar-default  navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button onclick="menutoglle()" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="glyphicon glyphicon-th-list"></span>
      </button>
    </div>
      <div class="collapse navbar-collapse " id="myNavbar">
      <ul class="nav navbar-nav">
          <li><div class="well-sm">
             <div class="navbar-header">
                 <span id="menuSitemobile" class="btn-sidbar navbar-toggle" style="float:left;display:none" onclick="toogle()" data-toggle="collapse" data-target="#myNavbar"><span class="glyphicon glyphicon-th-list"></span></span>
            </div>    
                 <span id="menuSitepc" style="display:block" class="btn-sidbar navbar-collapse" onclick="toogle()"><span class="glyphicon glyphicon-th-list"></span></span><!--SITE NO NENU ABERTO-->
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
   
        <li><a href="Eco_Pontos.php">Ecopontos</a></li>
      </ul>
         <ul class="nav navbar-nav navbar-right">
         <?php 
        //teste 
        $sql_not = mysql_query("SELECT COUNT(id_notificacao) as notif FROM view_notificacao where user_i = $UserId and status = 0");
                    while ($Not= mysql_fetch_object($sql_not)) {
                        $Not_num = $Not->notif;
                        }                        
                        if ($Not_num != 0 ) {
              
                            
                        
       ?>
             <li class="dropdown" style="margin-right:30px;">
                 <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-envelope" style="font-size:20px;"></span><span class="badge"><?php echo $Not_num; ?></span></a>
                 <ul class="dropdown-menu" style="min-width:300px;">
        
        <?php 
        $sql_not_inf = mysql_query("SELECT * FROM view_notificacao where user_I = $UserId and status = 0");
                 
        while ($Not_inf = mysql_fetch_object($sql_not_inf)){
                    $id_not = $Not_inf->id_notificacao;
                  $id_troca = $Not_inf->idTroca;
                  $user_interece = $Not_inf->nome;  
                  $mensagem =  $Not_inf->mensagem;
                  $tipo = $Not_inf->tipo;
       ?>   
               <li><div class="col-sm-12" style="width:100%;padding:2px; border-bottom:0.5px solid black; margin-bottom: 5px">
                         <div>
                         <div class="col-sm-4" >
                           <span class="glyphicon glyphicon-tags" style="font-size:50px;margin:auto; margin-top:4px;">   
                         </div>                         
                                 <div class="col-sm-8 text-left" style="margin-top:4px;">
                            <?php echo "$user_interece $mensagem"; ?>
                                     
                         </div>
                             <?php
                                    if ($tipo == 0) {
                                        
                                   
                             ?>
                                  <form class="form-horizontal"  method="post"  enctype="multipart/form-data" action="../Paginas/Trocas.php">
                                      <input type="submit" class="btn btn-default" style="float: right; margin-right: 10px; margin-bottom: 5px" value="detales da oferta">
                                 <input type="hidden" name="id_troca" id="idtroca" value="<?php echo $id_troca; ?>">  
                                 <input type="hidden" name="id_not" id="idtroca" value="<?php echo $id_not; ?>"> 
                                 </form>
                                     
                         <?php
                                    }
                                        
                                   
                             ?>
                              <?php
                                    if ($tipo == 1) {
                                        
                                   
                             ?>
                             <form class="form-horizontal"  method="post"  enctype="multipart/form-data" action="../funcao/notificacao.php  ">
                                      <input type="submit" class="btn btn-default" style="float: right; margin-right: 10px; margin-bottom: 5px" value="Ok">
                                 <input type="hidden" name="id_troca" id="idtroca" value="<?php echo $id_troca; ?>">  
                                 <input type="hidden" name="id_not" id="idtroca" value="<?php echo $id_not; ?>"> 
                                 </form>
                                     
                         <?php
                                    }
                                        
                                   
                             ?>
                               <?php
                                    if ($tipo == 2) {
                                        
                                   
                             ?>
                             <form class="form-horizontal"  method="post"  enctype="multipart/form-data" action="../Paginas/troca_aceita.php ">
                                 <input type="submit" class="btn btn-default" style="float: right; margin-right: 10px; margin-bottom: 5px" value="detales da oferta">
                                 <input type="hidden" name="id_troca" id="idtroca" value="<?php echo $id_troca; ?>">  
                                 <input type="hidden" name="id_not" id="idtroca" value="<?php echo $id_not; ?>"> 
                                 </form>
                                     
                         <?php
                                    }
                                        
                                   
                             ?>
                         </div></div></li> 
                         
                         
           <?php 
                           }       
       ?>                            
          </ul>
             </li>             
          <?php
                        }  else {
            ?> 
                                <li class="dropdown" style="margin-right:30px;">
                 <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-envelope" style="font-size:20px;"></span><span class="badge"><?php echo $Not_num; ?></span></a>
                 <ul class="dropdown-menu" style="min-width:300px;">
                     <li><div class="col-sm-12" style="width:100%;padding:2px; border-bottom:0.5px solid black;">
                         <div><a href="#" style="color:black">
                                         
                                 <div class="col-sm-12 text-left" style="margin-top:4px; margin-bottom: 5px; margin: auto">
                             Não a o notifições para você.
                         </div>
                             </a>
                         </div></div></li>
          </ul>
             </li>
                 
            <?php
                        }
            ?>     
                 
             
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
      <li><img class="img-responsive " src="<?php echo"Listar.php?codigo=$UserImg"; ?>" alt="Chania" style="min-height:150px;max-height:200px;margin:auto;"></li>
      <li><?php echo $UserNome; ?></li>
      <hr style="width:75%;margin:10px auto">
      <li style="padding:10px">
          <h4>Rank</h4>
<form>
            <label><samp  class="glyphicon glyphicon-star" style="font-size:300%;"/></label>
            <label><samp  id="star2" class="glyphicon glyphicon-star-empty" style="font-size:300%;"/></label>
            <label><samp  id="star3" class="glyphicon glyphicon-star-empty" style="font-size:300%;"/></label>
            <label><samp  id="star4" class="glyphicon glyphicon-star-empty" style="font-size:300%;"/></label>
            <label><samp  id="star5" class="glyphicon glyphicon-star-empty" style="font-size:300%;"/></label>
        </form>
 
      </li>
      <li><div style="border:1px solid white;border-radius:10px; width:90%;margin:auto;margin-bottom:10px;"><a href="Mostra_produtos.php" style="margin:auto;font-size:18px;"><span class="glyphicon glyphicon-shopping-cart"></span>Produtos</a></div></li>
      <li><div style="border:1px solid white;border-radius:10px; width:90%;margin:auto;margin-bottom:10px;;"><a href="Cadastrar_produto.php" style="margin:auto;font-size:18px;"><span class="glyphicon glyphicon-plus"></span> Adicionar Produto</a></div></li>
      <li><div style="border:1px solid white;border-radius:10px; width:90%;margin:auto;margin-bottom:10px;;"><a href="Meus_produtos.php" style="margin:auto;font-size:18px;"><span class="glyphicon glyphicon-folder-open"></span> Meus Produto</a></div></li>
      <li><div style="border:1px solid white;border-radius:10px; width:90%;margin:auto;margin-bottom:10px;;"><a href="Historico_Oferta.php" style="margin:auto;font-size:18px;"><span class="glyphicon glyphicon-folder-open"></span> Histórico de ofertas</a></div></li>
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
