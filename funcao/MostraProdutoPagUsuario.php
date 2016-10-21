<?php 
include '../funcao/conecta.php';
session_start();
        if (!isset($_SESSION['Login'])) {
               
            die('<h2>Sessão não iniciada</h2>');
                
        }
        $_idDono=$_GET["id"];
        if ($_GET["pag"]){
                    $pagatual = $_GET["pag"]; 
                }  else {
                  header('Location:../funcao/MostraProdutoPagUsuario.php?pag=1');
                }
 $UserEmail = $_SESSION['Login'];
    $sql_user = mysql_query("SELECT * FROM `usuario` where `email` = '$UserEmail'");
        while ($User = mysql_fetch_object($sql_user)) {
            $UserId = $User->idUsuario;
            $UserNome = $User->nome;
            $UserImg= $User->idImagem;
        }
        $consulta = mysql_query("SELECT * FROM `listarproduto`  WHERE `IdUsuario` = '$_idDono' and `ativo` = 1  ORDER BY `DataProduto` DESC");
                    $linhas = mysql_num_rows($consulta);
                //quantidade de conteudo exibido por pagina
		$qtitenspag = 10;
		$qtpaginas = ceil($linhas/$qtitenspag);
		 
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
  
    <div class="col-sm-12" align="center">
        <div class="col-sm-2"></div>
        <div class="col-sm-8" >
       <div class="panel panel-default">
        <div class="panel-heading">
        <h3>Meus produtos</h3>
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
  <div class="col-sm-12 " style="margin-bottom:30px;box-shadow:0px 4px 2px lightgray;padding:20px;">
        <div class="col-sm-1">
 </div>
      <div class="col-sm-4">
          <li style="list-style:none;"><img class="img-responsive " src="<?php echo"Listar.php?codigo=$ProdImg"; ?>" alt="Chania" style="min-height:30%;max-height:80%;"></li>
 </div>
     <div class="col-sm-1">
 </div>
       <div class="col-sm-4">
           <p class="text-left lead" style=""><h3><?php echo $ProdNome; ?></h3></p>
            <p class="text-left small" style=""><h3><?php echo "Estado do produto: $ProdEstado"; ?></h3><p/>
            <p class="text-left small" style=""><h3><?php echo "Categoria do produto: $ProdCateg"; ?></h3></p>
            <p class="text-left small" style=""><h4> <?php echo "$ProdDecr";?></h4></p>  
              
                 <div class="text-right" style="width:90%;margin:auto;margin-top:10px;">
                        
                     <form method="post" action="../Paginas/Editar_produto.php">
                           <input type="hidden" name="prod_id" value="<?php echo "$ProdId";?>"/>
                            <button type="submit" class="btn btn-default btn-lg">Editar</button> 
                        </form> 
                    </div>          
                    <div class="text-right" style="width:90%;margin:auto;margin-top:10px">
                        <form action="Meus_produtos.php" method="post">
                            
                             <button id="btnOn" onclick="pegaIdProfdExcluir('<?php echo $ProdId; ?>')" type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">Excluir</button>
                          
                        </form> 
                    </div>
 </div>
         <div class="col-sm-1">
 </div>
      
  </div>
  
  <!-- Fim da 1ª coluna de produtos-->
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
      <a href="../funcao/MostraProdutoPagUsuario.php?pag=<?php echo $pagatual -1;?>?id=<?php echo"$_DonoPag"?>" aria-label="Next">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
     
       <?php 
     }
 for ($i = 1; $i <= $qtpaginas; $i++) {
     
     if ($pagatual == $i){      
   ?>  
      <li class="active"><a href="../funcao/MostraProdutoPagUsuario.php?pag=<?php echo "$i";?>"><?php echo "$i";?></a></li>
            <?php }  else {
 ?>
      ../funcao/MostraProdutoPagUsuario.php?pag=1?id=<?php echo"$_DonoPag";?>
      <li><a href="../funcao/MostraProdutoPagUsuario.php?pag=<?php echo "$i";?>"><?php echo "$i";?></a></li>
    
 <?php } }

    if ($pagatual != $qtpaginas ) {
         ?>
      <li>
      <a href="../funcao/MostraProdutoPagUsuario.php?pag=<?php echo $pagatual +1;?>?id=<?php echo"$_DonoPag"?>" aria-label="Next">
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
      
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top:300px">
        <div class="modal-header">
  
          <h4 class="modal-title">Deseja Excluir</h4>
        </div>
        <div class="modal-body">
            <form></form>
            <form action="../funcao/excluirProd.php" method="post">
                <input name="ProdIdExcluir" id="ProdIdExcluir" type="hidden">
                <input type="submit" value="Confirmar" class="btn btn-default btn-lg">
             <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Cancelar</button>
            </form>
            
      </div>
      
    </div>
</div>
     </div>

     </div>
  
    </body>
</html>
