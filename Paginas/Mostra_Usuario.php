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
        
         $_DonoPag=$_GET['idDono'];        
        $consulta = mysql_query("SELECT * FROM `listarproduto`  WHERE   `IdUsuario`='$_DonoPag' and `ativo` = 1 ORDER BY `DataProduto` DESC");
                    $linhas = mysql_num_rows($consulta);
                //quantidade de conteudo exibido por pagina
		$qtitenspag = 10;
		$qtpaginas = ceil($linhas/$qtitenspag);
		/*   
               if ($_GET["pag"]){
                    $pagatual = $_GET["pag"];
                }  else {
                    header('Location:../Paginas/Mostra_Usuario.php?pag=1');

                    } */
                $pagatual = $_GET["pag"];
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
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
      
      <div class="collapse navbar-collapse" id="myNavbar">
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
                                      <input type="submit" class="btn btn-default" style="float: right; margin-right: 10px; margin-bottom: 5px" value="detalhes da oferta">
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
                                 <input type="submit" class="btn btn-default" style="float: right; margin-right: 10px; margin-bottom: 5px" value="detalhes da oferta">
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
         </ul>
    </div>
  </div>
</nav>
    <!--Termina o menu -->
    <div class="jumbotron text-center" style="background:white; margin-top:40px;" align="center">
        <img class="img-responsive" src="Listar.php?codigo=0" alt="Chania" style="margin:0 auto">
    <hr style="width:75%">
</div> 
  <!--Menu central do usuario menu-sidnav-->
  <div id="mySidenav-tt" class="sidenav-tt">
  <div id="mySidenav" class="sidenav" align="center">
 
  <ul align="center" style="list-style:none;color:white;padding-left:5px"> 
      <li><img class="img-responsive " src="<?php echo"Listar.php?codigo=$UserImg"; ?>" alt="Chania" style="min-height:150px;max-height:200px;margin:auto;"></li>
      <li style="margin-top:10px;font-size:20px">
          <form method="get" action="Mostra_Usuario.php?pag=1">
                            <input name="idDono" type="hidden" id="idDono" value="<?php echo $UserId; ?>">
                            <input name="pag" type="hidden" id="idDono" value="1">                            
                            <input style="background:transparent;border:0" type="submit" value="<?php echo"$UserNome"; ?>">
                        </form>
      </li>
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
      <li><div style="border:1px solid white;border-radius:10px; width:90%;margin:auto;margin-bottom:10px;;"><a href="Meus_produtos.php?pag=1" style="margin:auto;font-size:18px;"><span class="glyphicon glyphicon-folder-open"></span> Meus Produto</a></div></li>
      <li><div style="border:1px solid white;border-radius:10px; width:90%;margin:auto;margin-bottom:10px;;"><a href="Historico_Oferta.php?pag=1" style="margin:auto;font-size:18px;"><span class="glyphicon glyphicon-folder-open"></span> Histórico de ofertas</a></div></li>
      
      </ul> 
</div>
      <!----------------------------------------------------------------------------------------------------------------->
      <div class="btn-sidbar-tt">
          <button class="btn-sidbar-tt" onclick="toogle()" ></button>
      </div>
  </div>
<?php
         $sqlDono = mysql_query("SELECT * FROM `listarproduto`  WHERE `IdUsuario`='$_DonoPag' and `ativo` = 1 ORDER BY `DataProduto` DESC");
                 
        while ($Userd = mysql_fetch_object($sqlDono)){
                    $usuarioPagNome = $Userd->NomeUsuario;
                  $usuarioPagImag = $Userd->idImagemUser;
        }
        
       ?> 
  <div class="col-sm-12">
      <div class="col-sm-4"></div>
      <div class="col-sm-4" align="center">
        <img class="img-responsive " src="<?php echo"Listar.php?codigo=$usuarioPagImag"; ?>" alt="Chania" style="min-height:150px;max-height:200px;margin:auto;">
        <div class="col-sm-12">
         <div class="col-sm-2"></div>
      <div class="col-sm-8" align="center">   
        <h3><?php echo $usuarioPagNome; ?></h3>
        </div>
      </div>
       
                 <h4>Rank</h4>
            <?php         
             $sql_user1 = mysql_query("SELECT * FROM `rank_list` WHERE idUsuario = $_DonoPag");
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
            <label><samp  class="glyphicon glyphicon-star" style="font-size:200%;"/></label>
            <label><samp  id="star2o" class="glyphicon glyphicon-star-empty" style="font-size:200%;"/></label>
            <label><samp  id="star3o" class="glyphicon glyphicon-star-empty" style="font-size:200%;"/></label>
            <label><samp  id="star4o" class="glyphicon glyphicon-star-empty" style="font-size:200%;"/></label>
            <label><samp  id="star5o" class="glyphicon glyphicon-star-empty" style="font-size:200%;"/></label>
        
      <div>
              <?php
                        if ($UserId == $_DonoPag ){
                 ?>           
          <form action="../Paginas/Editar_perfil.php">
              <input value="Editar perfil" type="submit" class="btn btn-default btn-lg" style="margin-top: 10px;" >              
          </form>
        
           <?php
                      }
    ?> 
          </div>      
      </div>
      
      <div class="col-sm-2"></div>
  
  </div>
  <div class="col-sm-2" ></div>
    <div class="col-sm-8">
                    <?php
                       if ($linhas>0 ){
                    //echo "$aPartirDeQual - $terminaEm";
                            //selecione no banco as tabelas que deseja exibir
                            for($i=$aPartirDeQual; $i< $terminaEm; $i++){
                                    $ProdId = mysql_result($consulta,$i,"IdProduto");
                                    $ProdNome = mysql_result($consulta,$i,"NomeProduto");
                                    $UserNome = mysql_result($consulta,$i,"NomeUsuario");
                                    $DonoId=mysql_result($consulta,$i,"idUsuario");
                                    $ProdDecr = mysql_result($consulta,$i,"DescProduto");
                                    $ProdCateg = mysql_result($consulta,$i,"categoria");
                                    $ProdDecr = mysql_result($consulta,$i,"DescProduto");
                                    $ProdEstado = mysql_result($consulta,$i,"estado");
                                     $ProdImg = mysql_result($consulta,$i,"img");
                                     $idImagemUser = mysql_result($consulta,$i,"idImagemUser");

                    ?>

      <!-- Inicio da 1ª coluna de produtos-->
      <div class="col-sm-12" style="margin-bottom:30px;box-shadow:0px 4px 2px lightgray;padding:20px;">
            <div class="col-sm-1">
     </div>
          <div class="col-sm-4">
                <img class="img-responsive" src="<?php echo "Listar.php?codigo=$ProdImg";?>" alt="Chania" style="min-height:30%;max-height:80%;">
     </div>
         <div class="col-sm-1">
     </div>
           <div class="col-sm-4">
               <p class="text-left lead" style=""><h3><?php echo $ProdNome; ?></h3></p>
                <p class="text-left small" style=""><h3><?php echo "Estado do produto: $ProdEstado"; ?></h3><p/>
                <p class="text-left small" style=""><h3><?php echo "Categoria do produto: $ProdCateg"; ?></h3></p>
           <div class="col-sm-12"style="float:left">
               <img id="imguser" class="img-thumbnail col-sm-4 " src="<?php echo "Listar.php?codigo=$idImagemUser";?>" alt="Chania" style="min-height:25%;max-height:50%;">
                    <div class="col-sm-8  text-left small">
                        <form></form>
                        <form method="get" action="Mostra_Usuario.php?pag=1">
                            <input name="idDono" type="hidden" id="idDono" value="<?php echo $DonoId; ?>">
                            <input name="pag" type="hidden" id="idDono" value="1">                            
                            <input style="background:transparent;border:0" type="submit" value="<?php echo"Dono:$UserNome"; ?>">
                        </form>
                    </div>
                </div>
           <br>
           <br>
           <br>
                <p class="text-left small" style=""><h5> <?php echo "$ProdDecr";?></h5></p>
        <?php
                        if ($UserId != $_DonoPag ){
    ?>         
           <form method="post" action="../funcao/p">   
                     <div>
                          <!-- Trigger the modal with a button -->
                <button id="btnOn" onclick="pegaIdProfd('<?php echo $ProdId;?>','<?php echo $ProdImg ;?>')" type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">Mostrar Interesse</button>
      <!-- Modal -->
                     </div>
                       </form>
           
           <?php
                        }
            ?>     
           </div>
             <div class="col-sm-1">
     </div>
     <!-- Fim do Produto -->
        </div>  



      <?php 
                       }

                            }
      ?>
  
  <div class="col-sm-12" align="center">
 
  <nav aria-label="Page navigation">
      <div style="margin:0 auto">
  <ul class="pagination pagination-lg">
         
    <?php 
    if ($pagatual > 1 ) {
         ?>
      <li>
      <a href="../Paginas/Mostra_Usuario.php?idDono=<?php echo $_DonoPag;?>&pag=<?php echo $pagatual -1;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
     
       <?php 
     }
 for ($i = 1; $i <= $qtpaginas; $i++) {
     
     if ($pagatual == $i){      
   ?>  
      <li class="active"><a href="../Paginas/Mostra_Usuario.php?idDono=<?php echo $_DonoPag;?>&pag=<?php echo "$i";?>"><?php echo "$i";?></a></li>
            <?php }  else {
 ?>
      <li><a href="../Paginas/Mostra_Usuario.php?idDono=<?php echo $_DonoPag;?>&pag=<?php echo "$i";?>"><?php echo "$i";?></a></li>
    
 <?php } }

    if ($pagatual != $qtpaginas ) {
         ?>
      <li>
      <a href="../Paginas/Mostra_Usuario.php?idDono=<?php echo $_DonoPag;?>&pag=<?php echo $pagatual +1;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
     
       <?php 
     }
 ?>    
  </ul>
      </div>
   <!--                     ---------------                                  --> 
         <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content" style="margin-top:35%">
            <div class="modal-header">

              <h4 class="modal-title">Escolha um produto</h4>
            </div>


            <div class="modal-body">
                <form></form>
                <form method="post" action="../funcao/insere_troca_user.php">

                    <select class="form-control" id="selctProdUser" name="prodDono" onchange="btnOferta()">
                      <option value="" disabled selected>Selecione um produto</option>
                <?php
                    $sqlUserI = mysql_query("SELECT * FROM `listarproduto`  WHERE `IdUsuario` = $UserId"); 
                    while ($Produtos = mysql_fetch_object($sqlUserI)) {
                        $produto_id = $Produtos->IdProduto;
                        $produto_nome = $Produtos->NomeProduto; 
                        $produto_img=$Produtos->img;
                        $GLOBALS['$produto_id']=$produto_img;
                       ?>
                 <option  value='<?php echo "$produto_id";?>' icon="icons/icon_cart.gif"><?php echo "$produto_nome";?></option> 
                     <?php     
                    }
                    ?>
          </select>
            <br>
               <div class="form-group">
            <input type="hidden" name="userI" value="<?php echo "$UserId";?>"/>
            <input type="hidden" name="idDono" value="<?php echo "$_DonoPag";?>"/>
             <input type="hidden" name="pag" value="<?php echo "$pagatual ";?>"/>
            <input id="ProdId" name="ProdutoId" type="hidden"/>
        </div>
          </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button id="btnOfer" type="submit" class="btn btn-default disabled">Oferecer Troca</button>
            </div>
               </form>
          </div>

        </div>
    </div>
  </body>
</html>
