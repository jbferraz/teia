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
                    header('Location:../Paginas/Noticias.php?pag=1');
                 
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
  <title>Noticias - Projeto teia</title>
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
            <li><a href="../Paginas/Galeria.php">Galeria</a></li>
            <li><a href="../Paginas/Material_Educacional.php">Material Educacional</a></li>
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
    <div class="col-sm-12">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 ">
           <div class="panel panel-default">
               <div class="panel-heading" style="font-size:50px">Titulo</div>
   
    <div class="panel-body">
        <img class="img-responsive" src="../Imagens/fotos/10.JPG" style="max-height:400px;margin:auto auto"> 
       
</div>
      <div class="panel-footer">
        <la<p>A&nbsp;<a href="http://www.techtudo.com.br/tudo-sobre/apple.html">Apple</a>&nbsp;revelou a dia do lan&ccedil;amento do&nbsp;<a href="http://www.techtudo.com.br/tudo-sobre/iphone-7.html">iPhone 7</a>:&nbsp;o smartphone chega ao Brasil em 11 de novembro, quase dois meses depois do in&iacute;cio das vendas nos Estados Unidos. A expectativa &eacute; de que, at&eacute; l&aacute;, sejam informados os pre&ccedil;os da aposta da empresa para 2016. Por ora n&atilde;o se sabe quanto ele vai custar por aqui, mas circulam especula&ccedil;&otilde;es de que os valores podem ser mais baixos do que os praticados at&eacute; pouco tempo atr&aacute;s para o&nbsp;<a href="http://www.techtudo.com.br/tudo-sobre/iphone-6s.html">iPhone 6S</a>. A data apareceu nesta sexta-feira (28) no site oficial.</p>

<p><a href="http://www.techtudo.com.br/noticias/noticia/2016/09/testamos-o-iphone-7-o-celular-da-apple-com-novo-botao-home.html" target="_self">Testamos o iPhone 7, o celular da Apple com bot&atilde;o Home renovado</a></p>

<p>&nbsp;</p>

<p><a href="http://www.techtudo.com.br/tudo-sobre/techtudo.html?utm_source=link_app_materia&amp;utm_medium=materia_tt&amp;utm_campaign=link_app_techtudo" target="_self">Aplicativo do TechTudo</a>: receba as melhores dicas e &uacute;ltimas not&iacute;cias no seu celular</p>

<p>O&nbsp;<a href="http://www.techtudo.com.br/tudo-sobre/iphone-7.html">iPhone 7</a>&nbsp;(4,7 polegadas) &eacute; uma evolu&ccedil;&atilde;o natural do 6S. Pouca coisa mudou no design, que permanece o j&aacute; conhecido do grande p&uacute;blico. H&aacute; novas op&ccedil;&otilde;es de cores &ndash; preto fosco e preto brilhante &ndash;, em adi&ccedil;&atilde;o ao dourado, prata e ouro rosa. O&nbsp;<a href="http://www.techtudo.com.br/tudo-sobre/iphone-7-plus.html">iPhone 7 Plus</a>, modelo com tela de 5,5 polegadas, recebeu um diferencial: a c&acirc;mera dupla, tendo como principal benef&iacute;cio o zoom &oacute;tico de duas vezes. Devido &agrave; lente grande angular, ele &eacute; capaz de criar retratos com o fundo esfuma&ccedil;ado, recurso que se aproxima da tecnologia de c&acirc;meras fotogr&aacute;ficas profissionais.</p>

        </label>
</div>
        
              </div>
         </div>
        <div class="col-sm-3"></div>

    </div>
    
   
    
    
  <div class="col-sm-12" align="center">
 
  <nav aria-label="Page navigation">
      <div style="margin:0 auto">
  <ul class="pagination pagination-lg">
      <?php 
    if ($pagatual > 1 ) {
         ?>
      <li>
      <a href="../Paginas/Noticias.php?pag=<?php echo $pagatual -1;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>   
    <?php
    }
 for ($i = 1; $i <= $qtpaginas; $i++) {     
     if ($pagatual == $i){        
     
   ?>  
      <li class="active"><a href="..Paginas/Noticias.php?pag=<?php echo "$i";?>"><?php echo "$i";?></a></li>
            <?php }  else {
 ?>
      <li><a href="../Paginas/Noticias.php?pag=<?php echo "$i";?>"><?php echo "$i";?></a></li>
    
 <?php } }
 
if ($pagatual != $qtpaginas ) {
         ?>
      <li>
      <a href="../Paginas/Noticias.php?pag=<?php echo $pagatual +1;?>" aria-label="Next">
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

