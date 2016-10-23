<?php 

include '../funcao/conecta.php';
      session_start();
        if (!isset($_SESSION['Login'])) {  
            die('<h2>Sessão não iniciada</h2>'); 
        }
        
   $UserEmail = $_SESSION['Login'];
    $sql_user = mysql_query("SELECT * FROM `usuario` where `email` = '$UserEmail'");
        while ($User = mysql_fetch_object($sql_user)) {
            $UserId = $User->idUsuario;
            $UserNome = $User->nome;
            $UserImg= $User->idImagem; 
            
        }
        $id_troca = $_POST['id_troca'];
        $id_not = $_POST['id_not'];
        $sql_prod = mysql_query("SELECT * FROM `trocaoferta` WHERE `idTroca` = $id_troca");
        while ($prod = mysql_fetch_object($sql_prod)) {
            $Prod_interece_id = $prod->idProdutoOF;
            $idUsuarioOF = $prod->idUsuarioOF;
            $idUsuarioINT = $prod->idUsuarioINT;
            $Prod_dono_id = $prod->idProdutoINT ;            
        }
        
          $sql_up_toca="UPDATE `notificacao` SET `status`= 1 WHERE `id_notificacao` = $id_not";
//executamos a instução SQL
           //mysql_query("$sql_up_toca") or die (mysql_error());
       
           
    
?>
<script language="javascript" src="../funcao/JavaScript.js"></script>

<html>
    <head>
      <meta charset="UTF-8">
        <title>Validar troca - Projeto teia</title>
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
            <li><a href="../Paginas/Oprojeto.php">O Projeto</a></li>
            <li><a href="../Paginas/Colaboradores.php">Colaboradores</a></li>
            <!--<li><a href="#">Material Educacional</a></li>-->
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
  <div id="mySidenav" class="sidenav"align="center">
 
  <ul align="center" style="list-style:none;color:white;padding-left:5px"> 
      <li><img class="img-responsive img-circle" src="<?php echo" Listar.php?codigo=$UserImg"; ?>" alt="Chania" style="min-height:150px;max-height:200px;"></li>
      <li><?php echo $UserNome; ?></li>
    <hr style="width:75%;margin:10px auto">
        <li style="padding:10px">
          <h4>Rank</h4>
          
          <?php         
             $sql_user = mysql_query("SELECT * FROM `rank_list` WHERE idUsuario = $UserId");
        while ($User = mysql_fetch_object($sql_user)) {        
            $Usernota= $User->media_poderada;
            $Usernota= ceil($Usernota);
            echo "$Usernota";
            if (!empty($Usernota)) {
                  
            
            if ($Usernota == 1) {
               
            }
            if ($Usernota == 2) {
                 echo "<script>window.onload = function(){setrank2()}</script>";
            }
            if ($Usernota == 3) {
                echo "<script>window.onload = function(){setrank3()}</script>";
            }
            if ($Usernota == 4) {
                echo "<script>window.onload = function(){setrank4()}</script>";
            }
            if ($Usernota == 5) {
                echo "<script>window.onload = function(){setrank5()}</script>";
            }
            }     
            
        }
          
          
          ?>     
            
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
      <li><div style="border:1px solid white;border-radius:10px; width:90%;margin:auto;margin-bottom:10px;;"><a href="../Paginas/Meus_produtos.php" style="margin:auto;font-size:18px;"><span class="glyphicon glyphicon-folder-open"></span> Meus Produto</a></div></li>
      <li><div style="border:1px solid white;border-radius:10px; width:90%;margin:auto;margin-bottom:10px;;"><a href="Historico_Oferta.php" style="margin:auto;font-size:18px;"><span class="glyphicon glyphicon-folder-open"></span> Histórico de ofertas</a></div></li>
  </ul>    
</div>
      <div class="btn-sidbar-tt">
          <button class="btn-sidbar-tt" onclick="toogle()" ></button>
      </div>
  </div>
  <?php
      if ($idUsuarioINT == $UserId){
          $Prod_id_1 = $Prod_interece_id;
          $Prod_id_2 = $Prod_dono_id;
      } else {
          $Prod_id_1 = $Prod_dono_id;
          $Prod_id_2 = $Prod_interece_id;
      } 
  ?>

    <!-- fim menu-->
      <?php
    $sql = mysql_query("SELECT * FROM `listarproduto`  WHERE IdProduto = $Prod_id_1");
                while ($Produtos2 = mysql_fetch_object($sql)) { 
                  $ProdId_2   = $Produtos2->IdProduto;
                  $ProdNome_2 = $Produtos2->NomeProduto;
                  $UserNome_2 = $Produtos2->NomeUsuario;
                  $ProdDecr_2 = $Produtos2->DescProduto;
                  $ProdCateg_2 =  $Produtos2->categoria;
                  $ProdEstado_2 =  $Produtos2->estado;
                  $ProdImg_2 =  $Produtos2->img;
                 $idImagemUser2 = $Produtos2->idImagemUser;
                  }
     
    $sql = mysql_query("SELECT * FROM `listarproduto`  WHERE IdProduto = $Prod_id_2");
                while ($Produtos = mysql_fetch_object($sql)) { 
                  $ProdId_1   = $Produtos->IdProduto;
                  $ProdNome_1 = $Produtos->NomeProduto;
                  $UserNome_1 = $Produtos->NomeUsuario;
                  $ProdDecr_1 = $Produtos->DescProduto;
                  $ProdCateg_1 =  $Produtos->categoria;
                  $ProdEstado_1 =  $Produtos->estado;
                  $ProdImg_1 =  $Produtos->img;
                  $idImagemUser1 = $Produtos->idImagemUser;
                  }
                ?>
    <div class="col-sm-12" align="center">
        <div class="col-sm-2"></div>
        <div class="col-sm-8" >
       <div class="panel panel-default">
        <div class="panel-heading">
        <h3>Informe se ocorreu a troca por favor.</h3>
        </div>
        
    </div>
    </div>
        <br>
        <div class="col-sm-2" ></div>
    </div>
  
    
     <div class="col-sm-12" align="center">
        
            
       
        <div class="col-sm-2"></div>
     
       <div class="col-sm-8" >
           <div class="col-sm-12"style="background-color:#0d1e04;max-height:80px;min-height:30px;margin-bottom:20px;padding:10px;color:#fff;font-size:20px;">
               <div class="col-sm-5">
           <img id="imguser" class="img-circle col-sm-3 " src="<?php echo"Listar.php?codigo=$idImagemUser2";?>"alt="Chania" style="min-height:3%;max-height:10%;margin:auto 0">
         
           <h4 style="margin:10px 5px;width:40%;float:left;"><?php echo "$UserNome_2"; ?></h4> <BR> 
          <h5 style="width:40%;float:center;">DONO</h5>
           
           </div>
               <div class="col-sm-1" >
       
  </div>
           
                <div class="col-sm-4">
           <img id="imguser" class="img-circle col-sm-3 " src="<?php echo "Listar.php?codigo=$idImagemUser1";?>"alt="Chania" style="min-height:3%;max-height:10%;margin:auto 0">
          <h4 style="margin:10px 5px;width:40%;float:left;"><?php echo "$UserNome_1"; ?></h4>
           <h5 style="width:40%;float:center;">INTERESSADO</h5>
                  
                </div>
               <div class="col-lg-2" align="center">
            
            <p><h6>Avalie como foi sua troca</h6></p>
            
            <label><samp onmouseover="mudaclass()" class="glyphicon glyphicon-star" style="font-size:10px;"/></label>
            <label><samp onmouseover="mudaclass2()" id="vt2" class="glyphicon glyphicon-star-empty" style="font-size:10px;"/></label>
            <label><samp onmouseover="mudaclass3()" id="vt3" class="glyphicon glyphicon-star-empty" style="font-size:10px;"/></label>
            <label><samp onmouseover="mudaclass4()" id="vt4" class="glyphicon glyphicon-star-empty" style="font-size:10px;"/></label>
            <label><samp onmouseover="mudaclass5()" id="vt5" class="glyphicon glyphicon-star-empty" style="font-size:10px;"/></label>
            
  
        </div>
         
           </div>
    </div>
    </div>
    <div class="col-sm-1" ></div>
    <div class="col-sm-1" ></div>
         <div class="col-sm-1">
 </div>
    <div class="col-sm-4 ">
  <!-- Inicio da 1ª coluna de produtos-->
  <div class="col-sm-12 " style="margin-bottom:30px;">
    
      <div class="col-sm-5">
          <img class="img-responsive" src="<?php echo "Listar.php?codigo=$ProdImg_2";?>" alt="Chania" style="min-height:200px;max-height:200px; margin-top:25px;">
 </div>
     <div class="col-sm-1">
 </div>
       <div class="col-sm-4">          
           <p class="text-left lead" style=""><h5><?php echo $ProdNome_2; ?></h5></p>
            <p class="text-left small" style=""><h5><?php echo $ProdEstado_2; ?></h5<p/>
            <p class="text-left small" style=""><h5><?php echo $ProdCateg_2; ?></h5></p>
    
       <p class="text-left small" style=""><h6>Descricao <br> <?php echo $ProdDecr_2; ?></h6></p>
             <form method="post" action="../funcao/insere_troca.php">   
              
 </div>

 <!-- Fim do Produto -->
  </div>
        
    </div>
    <!-- Meio Entre as trocas-->

     <!-- Fim Meio Entre as trocas-->
    <div class="col-sm-4 ">
  <!-- Inicio da 2ª coluna de produtos-->
<div class="col-sm-12 " style="margin-bottom:30px;">

      <div class="col-sm-5">
          <img class="img-responsive" src="<?php echo "Listar.php?codigo=$ProdImg_1";?>" alt="Chania" style="min-height:200px;max-height:200px; margin-top:25px;">
 </div>
   
       <div class="col-sm-4">
          
           <p class="text-left lead" style=""><h5><?php echo $ProdNome_1; ?></h5></p>
            <p class="text-left small" style=""><h5><?php echo $ProdEstado_1; ?></h5><p/>
            <p class="text-left small" style=""><h5><?php echo $ProdCateg_1; ?></h5></p>
       <p class="text-left small" style=""><h6>Descricao <br> <?php echo $ProdDecr_1; ?></h6></p>
            
              
 </div>
         <div class="col-sm-1">
 </div>
 <!-- Fim do Produto -->
  </div>
        
    </div>
<div class="col-sm-1" ></div>
    <div class="col-sm-12" style="margin-top:20px;">
        <div class="col-lg-1"></div>
        <div class="col-lg-4"align="right">
            <form>         
            </form>
            <form action="../funcao/troca_aceita_nao.php" method="post">  
                <input class="btn-default " type="submit"  value="não" style="min-width:50%;min-height:30px">
            <input type="hidden" name="id_troca" id="idtroca" value="<?php echo $id_troca; ?>">
            <input type="hidden" name="user_i" id="idtroca" value="<?php echo $idUsuarioINT; ?>"> 
            <input type="hidden" name="user_d" id="idtroca" value="<?php echo $idUsuarioOF; ?>"> 
            <input type="hidden" name="ProdId_1" id="idtroca" value="<?php echo $ProdId_1; ?>"> 
            <input type="hidden" name="ProdId_2" id="idtroca" value="<?php echo $ProdId_2; ?>"> 
             <input type="hidden" name="id_not" id="idtroca" value="<?php echo $id_not; ?>"> 
             </form>
  
        </div>
        <div class="col-sm-2"></div>
        <form action="../funcao/troca_aceita_sim.php" method="post">
      
         <div class="col-lg-4 "align="left">
             
             <input class="btn-default left" type="submit" value="sim" style="min-width:50%;min-height:30px">
            <input type="hidden" name="id_troca" id="idtroca" value="<?php echo $id_troca; ?>"> 
             <input type="hidden" name="user_i" id="idtroca" value="<?php echo $idUsuarioINT; ?>"> 
            <input type="hidden" name="user_d" id="idtroca" value="<?php echo $idUsuarioOF; ?>">
            <input type="hidden" name="ProdId_1" id="idtroca" value="<?php echo $ProdId_1; ?>"> 
            <input type="hidden" name="ProdId_2" id="idtroca" value="<?php echo $ProdId_2; ?>"> 
            <input name="nota_Avaliacao" type="hidden" id="nota">
    </div>
                </form>
        <div class="col-sm-12"style="margin-bottom:100px"></div>
       <div class="col-lg-1"></div> 
       <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top:300px">
        <div class="modal-header">
  
          <h4 class="modal-title">Obrigado</h4>
        </div>
        <div class="modal-body">
            
            <P> Obrigado por nós informar sobre a troca</p>
            <P>Você será redirecionado para produtos disponiveis</p>
                        
                <input type="submit" value="Ok" class="btn btn-default btn-lg">             
            </form>
            
      </div>
      
    </div>
</div>
     </div>
    </body>
</html>
