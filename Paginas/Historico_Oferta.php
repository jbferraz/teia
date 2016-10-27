<?php 
include '../funcao/conecta.php';
session_start();
        if (!isset($_SESSION['Login'])) {
               
            die('<h2>Sessão não iniciada</h2>');
                
        }
        // header('Location:../Paginas/s.php');
 $UserEmail = $_SESSION['Login'];
    $sql_user = mysql_query("SELECT * FROM `usuario` where `email` = '$UserEmail'");
        while ($User = mysql_fetch_object($sql_user)) {
            $UserId = $User->idUsuario;
            $UserNome = $User->nome;
            $UserImg= $User->idImagem;
        }  
        $consulta = mysql_query("select * FROM `trocaoferta` WHERE `idUsuarioOF`= $UserId or idUsuarioINT = $UserId  ORDER BY `idTroca` ASC");
                $linhas = mysql_num_rows($consulta);
                //quantidade de conteudo exibido por pagina
		$qtitenspag = 10;
		$qtpaginas = ceil($linhas/$qtitenspag);
		   
               if ($_GET["pag"]){
                    $pagatual = $_GET["pag"]; 
                }  else {
                    header('Location:../Paginas/Historico_Oferta.php?pag=1');
                 
                    } 
                    if ($pagatual == 0) {
                        $pagatual =1;
    
                    }
                 
		$aPartirDeQual = ($qtitenspag * ($pagatual-1));
 
                $terminaEm = $aPartirDeQual+$qtitenspag;
		if($terminaEm > $linhas){
			$terminaEm = $linhas;
                }
?>
<script language="javascript" src="../funcao/JavaScript.js"></script>
<script> 
window.onload = function() {
   toogle();
};
</script>
<html>
    <head>
        <<meta charset="UTF-8">
        <title>Historico de Troca - Projeto teia</title>
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
            <span  id="menuSitemobile" class="btn-sidbar navbar-toggle" style="float:left;display:none" onclick="toogle()" data-toggle="collapse" data-target="#myNavbar"><span style="color:white" class="glyphicon glyphicon-th-list"></span></span>
            </div>    
                 <span id="menuSitepc" style="color:white" style="display:block" class="btn-sidbar navbar-collapse" onclick="toogle()"><span style="color:white" class="glyphicon glyphicon-th-list"></span></span><!--SITE NO NENU ABERTO-->
              </div></li>
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
        <img style="margin:0 auto" class="img-responsive" src="../Imagens/logo.png" alt="Chania">
    <hr style="width:75%">
</div> 
  <!--Menu central do usuario menu-sidnav-->
  <div id="mySidenav-tt" class="sidenav-tt">
  <div id="mySidenav" class="sidenav"align="center">
 
  <ul align="center" style="list-style:none;color:white;padding-left:5px"> 
      <li><img class="img-responsive" src="<?php echo" Listar.php?codigo=$UserImg"; ?>" alt="Chania" style="min-height:150px;max-height:200px;"></li>
      <li><?php echo $UserNome; ?></li>
     <hr style="width:75%;margin:10px auto">
      <li style="padding:10px">
          <h4>Rank</h4>
          
          <?php         
             $sql_user = mysql_query("SELECT * FROM `rank_list` WHERE idUsuario = $UserId");
        while ($User = mysql_fetch_object($sql_user)) {        
            $Usernota= $User->media_poderada;
            $Usernota= ceil($Usernota);
            
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
      <li><div style="border:1px solid white;border-radius:10px; width:90%;margin:auto;margin-bottom:10px;"><a href="Mostra_produtos.php?pag=1" style="margin:auto;font-size:18px;"><span class="glyphicon glyphicon-shopping-cart"></span>Produtos</a></div></li>
      <li><div style="border:1px solid white;border-radius:10px; width:90%;margin:auto;margin-bottom:10px;;"><a href="Cadastrar_produto.php" style="margin:auto;font-size:18px;"><span class="glyphicon glyphicon-plus"></span> Adicionar Produto</a></div></li>
      <li><div style="border:1px solid white;border-radius:10px; width:90%;margin:auto;margin-bottom:10px;;"><a href="../Paginas/Meus_produtos.php?pag=1" style="margin:auto;font-size:18px;"><span class="glyphicon glyphicon-folder-open"></span> Meus Produto</a></div></li>
      <li><div style="border:1px solid white;border-radius:10px; width:90%;margin:auto;margin-bottom:10px;;"><a href="Historico_Oferta.php?pag=1" style="margin:auto;font-size:18px;"><span class="glyphicon glyphicon-folder-open"></span> Histórico de ofertas</a></div></li>
  </ul>    
</div>
      <div class="btn-sidbar-tt">
          <button class="btn-sidbar-tt" onclick="toogle()" ></button>
      </div>
  </div>
  

    <!-- fim menu-->
   <div class="col-sm-12" align="center">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
       <div class="panel panel-default">
        <div class="panel-heading">
        <h3>Historico de Troca</h3>
        </div>
       
    </div>
    </div>
        
        <br>
        <div class="col-sm-1" ></div>
    </div>
    <!-- fim menu-->

    <div class="col-sm-12" >
   
    <?php
    
                   if ($linhas>0 ){
		//echo "$aPartirDeQual - $terminaEm";
			//selecione no banco as tabelas que deseja exibir
			for($i=$aPartirDeQual; $i< $terminaEm; $i++){
				$Prod_interece_id = mysql_result($consulta,$i,"idProdutoOF");
				$idUsuarioOF = mysql_result($consulta,$i,"idUsuarioOF");
				$idUsuarioINT = mysql_result($consulta,$i,"idUsuarioINT");
				$Prod_dono_id = mysql_result($consulta,$i,"idProdutoINT");
                                $status = mysql_result($consulta,$i,"status");
                                $idTroca = mysql_result($consulta,$i,"idTroca");
       
    $sql = mysql_query("SELECT * FROM `listarproduto`  WHERE IdProduto = $Prod_dono_id");
                while ($Produtos = mysql_fetch_object($sql)) { 
                  $ProdId_1   = $Produtos->IdProduto;
                  $ProdNome_1 = $Produtos->NomeProduto;
                  $UserNome_1 = $Produtos->NomeUsuario;
                  $ProdDecr_1 = $Produtos->DescProduto;
                  $ProdCateg_1 =  $Produtos->categoria;
                  $ProdEstado_1 =  $Produtos->estado;
                  $ProdImg_1 =  $Produtos->img;
                  $idImagemUser1 = $Produtos->idImagemUser;
                  $UserID_1 = $Produtos->idUsuario;
                }
                
    $sql = mysql_query("SELECT * FROM `listarproduto`  WHERE IdProduto = $Prod_interece_id");
                while ($Produtos2 = mysql_fetch_object($sql)) { 
                  $ProdId_2   = $Produtos2->IdProduto;
                  $ProdNome_2 = $Produtos2->NomeProduto;
                  $UserNome_2 = $Produtos2->NomeUsuario;
                  $ProdDecr_2 = $Produtos2->DescProduto;
                  $ProdCateg_2 =  $Produtos2->categoria;
                  $ProdEstado_2 =  $Produtos2->estado;
                  $ProdImg_2 =  $Produtos2->img;
                  $idImagemUser2 = $Produtos2->idImagemUser;
                  $UserID_2 = $Produtos2->idUsuario;
                  }
                ?>
              
   
    
    
    <div class="col-sm-12" align="center" >
        
            
       
        <div class="col-sm-2"></div>
     
       <div class="col-sm-8" >
           <div class="col-sm-12"style="background-color:#0d1e04;max-height:150;min-height:30px;margin-bottom:20px;padding:10px;color:#fff;font-size:20px;">
               <div class="col-sm-5">
           <img id="imguser" class="img-circle col-sm-3 " src="<?php echo "Listar.php?codigo=$idImagemUser1";?>"alt="Chania" style="min-height:3%;max-height:10%;margin:auto 0">
         
           <h4 style="margin:5px 5px;width:40%;float:left;"><?php echo "$UserNome_1"; ?></h4><BR>
             <h5 style="width:40%;float:left;">DONO</h5>
             
             <div class="col-sm-12">
         <?php         
             $sql_user1 = mysql_query("SELECT * FROM `rank_list` WHERE idUsuario = $UserID_1");
        while ($User1 = mysql_fetch_object($sql_user1)) {        
            $Usernota1= $User1->media_poderada;
            $Usernota1= ceil($Usernota1); 
            
            if (!empty($Usernota1)) {
                  
            
            if ($Usernota1 == 1) {
               
            }
            if ($Usernota1 == 2) {
                echo "<script>window.onload = function(){setrank2o()}</script>";
            }
            if ($Usernota1 == 3) {
                echo "<script>window.onload = function(){setrank3o()}</script>";
            }
            if ($Usernota1 == 4) {
                echo "<script>window.onload = function(){setrank4o()}</script>";
            }
            if ($Usernota1 == 5) {
                echo "<script>window.onload = function(){setrank5o()}</script>";
            }
            }  else {
                echo "<script>window.onload = function(){setranko   ()}</script>";
            }     
            
        }
          
          
          ?>  
            
            <label><samp  class="glyphicon glyphicon-star" style="font-size:20px;"/></label>
            <label><samp  id="star2o" class="glyphicon glyphicon-star-empty" style="font-size:20px;"/></label>
            <label><samp  id="star3o" class="glyphicon glyphicon-star-empty" style="font-size:20px;"/></label>
            <label><samp  id="star4o" class="glyphicon glyphicon-star-empty" style="font-size:20px;"/></label>
            <label><samp  id="star5o" class="glyphicon glyphicon-star-empty" style="font-size:20px;"/></label>
          
            
                 
             </div>
           </div>
               <div class="col-sm-1" >
       
  </div>
           
                <div class="col-sm-5">
           <img id="imguser" class="img-circle col-sm-3 " src="<?php echo "Listar.php?codigo=$idImagemUser2";?>"alt="Chania" style="min-height:3%;max-height:10%;margin:auto 0">
           <h4 style="margin:5px 5px;width:40%;float:left;"><?php echo "$UserNome_2"; ?></h4><BR>
          <h5 style="width:40%;float:left;">INTERESSADO</h5>
             <div class="col-sm-12">
         
             <?php         
             $sql_user2 = mysql_query("SELECT * FROM `rank_list` WHERE idUsuario = $UserID_2");
        while ($User2 = mysql_fetch_object($sql_user1)) {        
            $Usernota2= $User2->media_poderada;
            $Usernota2= ceil($Usernota2); 
            
            if (!empty($Usernota2)) {
                  
            
            if ($Usernota2 == 1) {
               
            }
            if ($Usernota2 == 2) {
                echo "<script>window.onload = function(){setrank2o1()}</script>";
            }
            if ($Usernota2 == 3) {
                echo "<script>window.onload = function(){setrank3o1()}</script>";
            }
            if ($Usernota2 == 4) {
                echo "<script>window.onload = function(){setrank4o1()}</script>";
            }
            if ($Usernota2 == 5) {
                echo "<script>window.onload = function(){setrank5o1()}</script>";
            }
            }  else {
                echo "<script>window.onload = function(){setranko1()}</script>";
            }     
            
        }
          
          
          ?>  
            
            <label><samp  class="glyphicon glyphicon-star" style="font-size:20px;"/></label>
            <label><samp  id="star2o" class="glyphicon glyphicon-star-empty" style="font-size:20px;"/></label>
            <label><samp  id="star3o" class="glyphicon glyphicon-star-empty" style="font-size:20px;"/></label>
            <label><samp  id="star4o" class="glyphicon glyphicon-star-empty" style="font-size:20px;"/></label>
            <label><samp  id="star5o" class="glyphicon glyphicon-star-empty" style="font-size:20px;"/></label>
          
            
  
    
             </div>
           
        </div>
       
    
           <div class="col-sm-12" id="25">
                                     <?PHP 
            if ($status == 0) {
               ?>        
           <div class="col-sm-12 right">
        
               <div class="col-sm-12">
            <form>         
            </form>
            <form action="../Paginas/Trocas.php" method="post">  
            <input class="btn-default " type="submit" value="Responder Proposta" style="min-width:50%;min-height:30px;background:transparent;border:0;color:white">
            <input type="hidden" name="id_troca" id="idtroca" value="<?php echo $idTroca; ?>">  
            </form>  </div>
          </div>
         <?PHP 
            }
               ?> 
           
                </div>
         </div>
           </div>
    </div>
    </div>
        
  
    
    <div class="col-sm-1" ></div>
    <div class="col-sm-1" ></div>
    <div class="col-sm-4 " style="margin-bottom:30px;margin-top:30px;">
  <!-- Inicio da 1ª coluna de produtos-->
  <div class="col-sm-12 " style="margin-bottom:50px">
  
      
      <div class="col-sm-5">
          <img class="img-responsive" src="<?php echo "Listar.php?codigo=$ProdImg_1";?>" alt="Chania" style="min-height:30%;max-height:80%;margin-top:25px;">
 </div>
     <div class="col-sm-1">
 </div>
       <div class="col-sm-4">          
           <p class="text-left lead" style=""><h4><?php echo $ProdNome_1; ?></h4></p>
            <p class="text-left small" style=""><h4><?php echo $ProdEstado_1; ?></h4><p/>
            <p class="text-left small" style=""><h4><?php echo $ProdCateg_1; ?></h4></p>
  
          
          
       <p class="text-left small" style=""><h5>Descricao <br> <?php echo $ProdDecr_1; ?></h5></p>
             <form method="post" action="../funcao/insere_troca.php">   
              
 </div>
         <div class="col-sm-1">
 </div>
 <!-- Fim do Produto -->
  </div>
      
    </div>
    
    <!-- Meio Entre as trocas-->


     <!-- Fim Meio Entre as trocas-->
     <div class="col-sm-4 " style="margin-bottom:30px;margin-top:30px;">
  <!-- Inicio da 2ª coluna de produtos-->
<div class="col-sm-12 " style="">

    
      <div class="col-sm-5">
        <img class="img-responsive" src="<?php echo "Listar.php?codigo=$ProdImg_2";?>" alt="Chania" style="min-height:30%;max-height:80%;margin-top:25px;">
 </div>
     <div class="col-sm-1">
 </div>
       <div class="col-sm-4">
          
           <p class="text-left lead" style=""><h4><?php echo $ProdNome_2; ?></h4></p>
            <p class="text-left small" style=""><h4><?php echo $ProdEstado_2; ?></h4><p/>
            <p class="text-left small" style=""><h4><?php echo $ProdCateg_2; ?></h4></p>
           
       <p class="text-left small" style=""><h5>Descricao <br> <?php echo $ProdDecr_2; ?></h5></p>
            
              
 </div>
         <div class="col-sm-1">
 </div>
 <!-- Fim do Produto -->
  </div>
        
    </div>
<div class="col-sm-1" ></div>
    
             
    
      <?PHP 
                   }}
    ?>
    
     </div>     
  
         <div class="col-lg-1" style="margin-bottom:100px"></div> 
   
     <div class="col-sm-12" align="center">
 
  <nav aria-label="Page navigation">
      <div style="margin:0 auto">
  <ul class="pagination pagination-lg">
         
    <?php 
    if ($pagatual > 1 ) {
         ?>
      <li>
      <a href="../Paginas/Historico_Oferta.php?pag=<?php echo $pagatual -1;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
     
       <?php 
     }
 for ($i = 1; $i <= $qtpaginas; $i++) {
     
     if ($pagatual == $i){      
   ?>  
      <li class="active"><a href="../Paginas/Historico_Oferta.php?pag=<?php echo "$i";?>"><?php echo "$i";?></a></li>
            <?php }  else {
 ?>
      <li><a href="../Paginas/Historico_Oferta.php?pag=<?php echo "$i";?>"><?php echo "$i";?></a></li>
    
 <?php } }

    if ($pagatual != $qtpaginas ) {
         ?>
      <li>
      <a href="../Paginas/Historico_Oferta.php?pag=<?php echo $pagatual +1;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
     
       <?php 
     }
 ?>    
  </ul>
      </div>
</nav>

  </div>
    </div>
    </body>
    
    
    
</html>