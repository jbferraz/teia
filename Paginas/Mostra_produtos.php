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
function pegaIdProfd(x){
document.getElementById("ProdId").value=x;  
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
         <span class="btn-sidbar navbar-toggle" onclick="toogle()" data-toggle="collapse" data-target="#myNavbar"><span class="glyphicon glyphicon-th-list"></span></span>
            </div>    
     <span class="btn-sidbar " onclick="toogle()"><span class="glyphicon glyphicon-th-list"></span></span><!--SITE NO NENU ABERTO-->
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
       <?php 
        $sql_not = mysql_query("SELECT COUNT(idUsuarioINT) as notif FROM `trocaoferta`where `idUsuarioINT`= $UserId and status = 0");
                    while ($Not= mysql_fetch_object($sql_not)) {
                        $Not_num = $Not->notif;
                        }                        
                        if ($Not_num != 0 ) {
                            
                        
       ?>
             <li class="dropdown" style="margin-right:30px;">
                 <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-envelope" style="font-size:20px;"></span><span class="badge"><?php echo $Not_num; ?></span></a>
                 <ul class="dropdown-menu" style="min-width:300px;">
                     <?php 
        $sql_not_inf = mysql_query("SELECT idtroca , idUsuarioOF as id_interesse , usuario.nome as interesse ,idProdutoOF,idProdutoINT as prodI FROM `trocaoferta` , usuario WHERE `idUsuarioOF` = usuario.idUsuario and `idUsuarioINT` = $UserId and status = 0");
                 
        while ($Not_inf = mysql_fetch_object($sql_not_inf)){
                  $id_troca = $Not_inf->idtroca;
                  $user_interece = $Not_inf->interesse;
                  $Prod_interece = $Not_inf->idProdutoOF; 
                  $Prod_dono = $Not_inf->prodI; 
                   
       ?>   
               <li><div class="col-sm-12" style="width:100%;padding:2px; border-bottom:0.5px solid black; margin-bottom: 5px">
                         <div>
                         <div class="col-sm-4" >
                           <span class="glyphicon glyphicon-tags" style="font-size:50px;margin:auto; margin-top:4px;">   
                         </div>                         
                                 <div class="col-sm-8 text-left" style="margin-top:4px;">
                            <?php echo "$user_interece fez uma proposta de troca para você"; ?>
                                     
                         </div>
                                  <form class="form-horizontal"  method="post"  enctype="multipart/form-data" action="../Paginas/Trocas.php">
                                      <input type="submit" class="btn btn-default" style="float: right; margin-right: 10px; margin-bottom: 5px" value="detales da oferta">
                                 <input type="hidden" name="id_troca" id="idtroca" value="<?php echo $id_troca; ?>">
                                  <input type="hidden" name="Prod_interece" id="idtroca" value="<?php echo $Prod_interece; ?>">
                                   <input type="hidden" name="Prod_dono" id="idtroca" value="<?php echo $Prod_dono; ?>">
                                 </form>
                                     
                         
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
    <img class="img-responsive" src="../Imagens/logo.png" alt="Chania">
    <hr style="width:75%">
</div> 
  <!--Menu central do usuario menu-sidnav-->
  <div id="mySidenav-tt" class="sidenav-tt">
  <div id="mySidenav" class="sidenav"align="center">
 
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
        $sql = mysql_query("SELECT * FROM `listarproduto`  WHERE `IdUsuario` <> '$UserId' ORDER BY `DataProduto` DESC");
                while ($Produtos = mysql_fetch_object($sql)) { 
                  $ProdId   = $Produtos->IdProduto;
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
             <form method="post" action="../funcao/p">   
                 <div>
                      <!-- Trigger the modal with a button -->
            <button id="btnOn" onclick="pegaIdProfd('<?php echo $ProdId; ?>')" type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">Mostrar Interesse</button>
  <!-- Modal -->
  
                 </div>
                   </form>
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
            
        </div>
    </div>
    </div>
        <div class="col-sm-2" ></div>
    </div>
    <!--                     ---------------                                  --> 
     <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top:300px">
        <div class="modal-header">
  
          <h4 class="modal-title">Escolha um produto</h4>
        </div>
        <div class="modal-body">
            <form></form>
            <form method="post" action="../funcao/insere_troca.php">
            <div class="form-group">
              <select class="form-control" id="sel1" name="prodDono">
             <option value="" disabled selected>Selecione um produto</option>
            <?php
                $sqlUserI = mysql_query("SELECT * FROM `listarproduto`  WHERE `IdUsuario` = $UserId"); 
                while ($Produtos = mysql_fetch_object($sqlUserI)) {
                    $produto_id = $Produtos->IdProduto;
                    $produto_nome = $Produtos->NomeProduto;
                    
                   ?>
                  echo "<option value='<?php echo "$produto_id";?>'><?php echo "$produto_nome";?></option> ";  
              <?php     
                }
                
                ?>
      </select>
        <br>
            <div class="form-group">
        <input type="hidden" name="userI" value="<?php echo "$UserId";?>"/>
        <input id="ProdId" name="ProdutoId" type="hidden"/>
        
    </div>
      </div>
 
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-default">Oferecer Troca</button>
        </div>
           </form>
      </div>
      
    </div>
</div>
    </body>
</html>
