<!DOCTYPE html>
<?php 
include '../funcao/conecta.php';
     $consulta = mysql_query("SELECT * FROM `listarproduto` where`ativo` = 1");
                    $linhas = mysql_num_rows($consulta);
                //quantidade de conteudo exibido por pagina
		$qtitenspag = 10;
		$qtpaginas = ceil($linhas/$qtitenspag);		   
               if ($_GET["pag"]){
                    $pagatual = $_GET["pag"]; 
                }  else {
                    header('Location:../Paginas/Mostra_Produto_s_Login.php?pag=1');
                 
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
<html lang="en">
<head>
  <title>Produtos disponíveis- Projeto teia</title>
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
        <li><a href="Mostra_Produto_s_Login.php?pag=1">Trocas</a></li>
        <li><a href="Eco_Pontos.php">Ecopontos</a></li>
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
                   if ($linhas>0 ){
		//echo "$aPartirDeQual - $terminaEm";
			//selecione no banco as tabelas que deseja exibir
			for($i=$aPartirDeQual; $i< $terminaEm; $i++){
				$ProdId = mysql_result($consulta,$i,"IdProduto");
				$ProdNome = mysql_result($consulta,$i,"NomeProduto");
				$UserNome = mysql_result($consulta,$i,"NomeUsuario");
				$ProdDecr = mysql_result($consulta,$i,"DescProduto");
                                $ProdCateg = mysql_result($consulta,$i,"categoria");
                                $ProdDecr = mysql_result($consulta,$i,"DescProduto");
                                $ProdEstado = mysql_result($consulta,$i,"estado");
                                 $ProdImg = mysql_result($consulta,$i,"img");
		                
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
           <p class="text-left lead" style=""><h4><?php echo $ProdNome; ?></h4></p>
            <p class="text-left small" style=""><h4><?php echo "Estado do produto: $ProdEstado"; ?></h4><p/>
            <p class="text-left small" style=""><h4><?php echo "Categoria do produto: $ProdCateg"; ?></h4></p>
            <p class="text-left small" style=""><h5> <?php echo "$ProdDecr";?></h5></p>
      
          
 </div>
      <form></form>
      <form class="col-sm-12" align="center"style="margin-top:20px">    
      <button id="btnOn" onclick="" type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">Mostrar Interesse</button>
      </form>
         <div class="col-sm-1">
 </div>
 <!-- Fim do Produto -->
    </div>
  
 
  
  <?php 
                   }
                   
                        }
  ?>
   </div>
  <div class="col-sm-12" align="center">
 
  <nav aria-label="Page navigation">
      <div style="margin:0 auto">
  <ul class="pagination pagination-lg">
      <?php 
    if ($pagatual > 1 ) {
         ?>
      <li>
      <a href="../Paginas/Mostra_Produto_s_Login.php?pag=<?php echo $pagatual -1;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>   
    <?php
    }
 for ($i = 1; $i <= $qtpaginas; $i++) {     
     if ($pagatual == $i){        
     
   ?>  
      <li class="active"><a href="../Paginas/Mostra_Produto_s_Login.php?pag=<?php echo "$i";?>"><?php echo "$i";?></a></li>
            <?php }  else {
 ?>
      <li><a href="../Paginas/Mostra_Produto_s_Login.php?pag=<?php echo "$i";?>"><?php echo "$i";?></a></li>
    
 <?php } }
 
if ($pagatual != $qtpaginas ) {
         ?>
      <li>
      <a href="../Paginas/Mostra_Produto_s_Login.php?pag=<?php echo $pagatual +1;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
     
       <?php 
     }
 ?> 
  </div>
     <div class="col-sm-2"></div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="margin-top:300px;min-height:200px;">
        <div class="modal-header">
            <div style="width:100%;height:100%;margin:0 auto" align="center" >
            <h4 class="modal-title">Antes de oferecer uma troca faça login ou cadastro</h4>
            </div>
             </div>
        <div class="modal-body" >
         <div class="col-sm-12" style="padding:25px;">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
            <form method="post" action="Login.php">
                <input class="btn btn-default btn-lg" type="submit" value="Entrar" style="min-width:90%">
            </form>
                </div>
            <div class="col-sm-2"></div>
             <div class="col-sm-4">
            <form method="post" action="Cadastro.php">
                <input class="btn btn-default btn-lg" type="submit" value="Criar nova conta" style="min-width:90%">
            </form>
             </div>
            <div class="col-sm-1"></div>
            </div>
      </div>
      
    </div>
</div>
     </div>
</body>
</html>

