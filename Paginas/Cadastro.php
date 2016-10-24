<?php
include '../funcao/conecta.php';
?>
<script language="javascript" src="../funcao/JavaScript.js"></script>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap_personalizado.css">
    </head>
    <body>
<div class="jumbotron text-center" style="margin-top:40px;background:#FFF" align="center">
        <img  style="margin:0 auto"class="img-responsive" src="Listar.php?codigo=0" alt="Chania">
   
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
       <li><a href="../funcao/TestSesionPgLogin.php"><span class="glyphicon glyphicon-log-in"></span> Central do Usuario</a></li>
    </div>
  </div>
</nav>
    <!--Termina o menu -->

            <div class="container">
    <div class="col-sm-4">
    </div> 
   <div class="col-sm-4">
  <h2>Cadastrar</h2>
  <form class="form-horizontal"  method="post"  enctype="multipart/form-data" action="../funcao/cadastroUser.php">
    <div class="form-group">
        <input name="nome" required type="nome" class="form-control" id="email" placeholder="Nome Completo">
    </div>
    <div class="form-group">
        <input name="email" required type="email" class="form-control" id="email" placeholder="E-mail">
   
    </div>
    <div class="form-group">
        <input onchange="form.confirmarSenha.pattern = this.value;" name="senha" required pattern="[a-z]{5}" type="password" class="form-control" id="senha1" placeholder="Senha">
    </div>	

    <div class="form-group">
        <input style="margin-bottom:10px;" required pattern="[a-z]{5}" name="confirmarSenha"  type="password" class="form-control" id="Senha2" placeholder="Confirmar Senha">

    </div>
     <div class="form-group">
      <select class="form-control" id="sel1" name="ProdCategoria">
        <option value="" disabled selected>Selecione a categoria de interesse</option>
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
         <input type="text" class="text-center" value="Ao criar a conta você concorda com os termos de uso" disabled="true" style="background:transparent;border:0;width:100%;float:left">

     </div>
    <div class="form-group">
      <div class="col-sm-offset-4 col-sm-10">
          <br> <button id="Btn-Cadatrar" type="submit" class="btn btn-default" >Cadastrar</button>
      </div>
    </div>
    
  </form>
  <div class="col-sm-12">
      <div class="col-sm-2"></div> 
      <div class="col-sm-8">
        <button style="background:transparent;border:0;font-size:25px;margin-bottom:50px" data-toggle="modal" data-target="#myModal">Termos de Uso</button>
       </div> 
        <div class="col-sm-2"></div>
</div>
     <div class="col-sm-4">
    </div> 
        </div>
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="margin-top:300px;min-height:200px;">
        <div class="modal-header">
            <h4 class="modal-title">Termos de Uso</h4>
            </div>
          
        <div class="modal-body text-justify" style="overflow:auto">
 <p>Bem vindo ao aplicativo T.E.I.A., um aplicativo de troca de materiais eletr&ocirc;nicos em desuso. Para fazer parte desta T.E.I.A. &eacute; necess&aacute;rio que voc&ecirc; conhe&ccedil;a nossas pol&iacute;ticas, para isto, &eacute; importante que voc&ecirc; leia e compreenda os termos e condi&ccedil;&otilde;es de uso que o aplicativo T.E.I.A. prop&otilde;e.</p>

<p><strong>1.</strong>&nbsp;&nbsp;<strong>Aceite dos termos</strong></p>

<p>Ao usar informa&ccedil;&otilde;es, ferramentas, recursos e funcionalidades do&nbsp;<em>T.E.I.A. app</em>, voc&ecirc; concorda com este acordo. O termo &ldquo;Voc&ecirc;&rdquo; ou &ldquo;Usu&aacute;rio&rdquo; refere-se ao visitante ou membro. O termo &ldquo;N&oacute;s&rdquo; refere-se ao&nbsp;<em>T.E.I.A. App</em>. Caso n&atilde;o concorde com Todos os termos, n&atilde;o use este site e n&atilde;o fa&ccedil;a download do nosso aplicativo.</p>

<p>Por favor, revise todos os Termos com cuidado antes de utilizar nosso aplicativo.</p>

<p>Ao utilizar nosso aplicativo, voc&ecirc; concorda em seguir todos os termos:</p>

<p><strong>2. Contrata&ccedil;&atilde;o e limitativas de direitos:</strong></p>

<p>a. O <em>T.E.I.A. App </em>e site n&atilde;o &eacute; fornecededor de quaisquer materiais anunciados no site ou app. O aplicativo &eacute; uma ferramenta que oferece espa&ccedil;os para anunciantes ofertarem os seus pr&oacute;prios materiais que gostariam de trocar por outros, negociando exclusivamente entre si.</p>

<p>b. Os usu&aacute;rios somente poder&atilde;o anunciar produtos que tenham em estoque, estabelecendo diretamente os termos do anuncio e todas as suas caracter&iacute;sticas.</p>

<p>c. Para utilizar o <em>T.E.I.A. App </em>e site o usu&aacute;rio deve aceitar, expressamente as pol&iacute;ticas de uso e confidencialidade da informa&ccedil;&atilde;o quanto aos dados dos demais usu&aacute;rios.</p>

<p>d. O n&atilde;o cumprimento de qualquer &iacute;tem descrito neste termo poder&aacute; causar a exclus&atilde;o do usu&aacute;rio da plataforma <em>T.E.I.A. App </em>e site<em>.</em></p>

<p>e. &Eacute; vedado ao usu&aacute;rio realizar qualquer cobran&ccedil;a pelo produto ofertado.</p>

<p><strong>2. &nbsp;A Modifica&ccedil;&atilde;o dos termos</strong></p>

<p>Os propriet&aacute;rios e/ou mantenedores do aplicativo reservam o direito de modificar este termo de uso e qualquer pol&iacute;tica que afete ou perten&ccedil;a ao aplicativo&nbsp;<em>T.E.I.A. App </em>e site<em> a</em> qualquer tempo e independentemente de pr&eacute;vio aviso aos usu&aacute;rios. &nbsp;O uso continuado do aplicativo ap&oacute;s a mudan&ccedil;a no Termo de uso ser&aacute; considerado como uma aceita&ccedil;&atilde;o do contrato. Se voc&ecirc; n&atilde;o concordar ou n&atilde;o estiver satisfeito com as mudan&ccedil;as no Termo de uso, voc&ecirc; dever&aacute; cancelar sua conta. Dessa forma, o usu&aacute;rio concorda que periodicamente deve checar as eventuais modifica&ccedil;&otilde;es do Termo de Uso, disponibilizado na p&aacute;gina web ou no pr&oacute;prio aplicativo, e, ler as eventuais mensagens que o&nbsp;<em>T.E.I.A. app </em>e site lhe mandar em rela&ccedil;&atilde;o ao Termo de Uso.</p>

<p><strong>3. &nbsp;A pol&iacute;tica de uso</strong></p>

<p>N&atilde;o utilize indevidamente os nossos servi&ccedil;os, de modo que &eacute; apenas permitido ao usu&aacute;rio do aplicativo e site valer-se do que lhe &eacute; disponibilizado e dentro das condutas que n&atilde;o s&atilde;o vedadas pela Lei brasileira. Haver&aacute; a possibilidade de suspens&atilde;o ou cancelamento da presta&ccedil;&atilde;o do servi&ccedil;o ao usu&aacute;rio que descumprir nossos termos ou pol&iacute;ticas ou se estivermos investigando casos de suspeita de m&aacute; conduta.</p>

<p>A comercializa&ccedil;&atilde;o do servi&ccedil;o caber&aacute; apenas ao seu desenvolvedor ou distribuidor autorizado. Ao efetuar o&nbsp;<em>download</em>&nbsp;do aplicativo e concordar com o presente Termo de Uso, o usu&aacute;rio receber&aacute; uma licen&ccedil;a do propriet&aacute;rio para uso n&atilde;o comercial do servi&ccedil;o, o que em nenhuma hip&oacute;tese o tornar&aacute; propriet&aacute;rio do mesmo. N&atilde;o h&aacute; limita&ccedil;&atilde;o de acesso ao software.</p>

<p>Nossos servi&ccedil;os exibem alguns conte&uacute;dos que n&atilde;o s&atilde;o da&nbsp;<em>T.E.I.A. App </em>e site. Esses conte&uacute;dos s&atilde;o de exclusiva responsabilidade da entidade que os disponibiliza. Podemos revisar qualquer conte&uacute;do para determinar se &eacute; ilegal ou se infringe nossas pol&iacute;ticas, e podemos remover ou nos recusar a exibir conte&uacute;do que razoavelmente acreditamos violar nossas pol&iacute;ticas ou a Lei. Mas isso n&atilde;o significa, necessariamente, que revisaremos conte&uacute;do de terceiros.</p>

<p>A concord&acirc;ncia &agrave;s condi&ccedil;&otilde;es deste termo de uso autoriza o&nbsp;<em>T.E.I.A. App </em>e site a proceder com o envio de mensagens publicit&aacute;rias ou administrativas aos usu&aacute;rios, cabendo-lhes desativar o envio dessas notifica&ccedil;&otilde;es, quando de seu interesse.</p>

<p>Voc&ecirc; &eacute; respons&aacute;vel por qualquer atividade que ocorra em sua conta e voc&ecirc; concorda que voc&ecirc; n&atilde;o vai alienar, transferir, licenciar ou ceder a sua conta, nome e dados de usu&aacute;rio, ou quaisquer direitos a outrem, com a exce&ccedil;&atilde;o de pessoas ou empresas que est&atilde;o expressamente autorizadas a criar contas em nome de seus empregadores ou clientes. Voc&ecirc; tamb&eacute;m declara que todas as informa&ccedil;&otilde;es que fornece ao&nbsp;<em>T.E.I.A. App </em>e site ser&atilde;o verdadeiras, exatas, atuais e completas, sendo obriga&ccedil;&atilde;o do usu&aacute;rio as atualizar para manter a veracidade e exatid&atilde;o das informa&ccedil;&otilde;es.</p>

<p><strong>4. An&uacute;ncios</strong></p>

<p>O Usu&aacute;rio poder&aacute; anunciar a troca de produtos ou servi&ccedil;os em suas respectivas categorias e subcategorias. Os an&uacute;ncios podem conter gr&aacute;ficos, textos, descri&ccedil;&otilde;es, fotos, v&iacute;deos e outras informa&ccedil;&otilde;es relevantes do produto ou servi&ccedil;o oferecido, sempre que tal pr&aacute;tica n&atilde;o violar nenhum dispositivo previsto em lei, neste contrato, nas demais pol&iacute;ticas do <em>T.E.I.A App</em> e site. O produto ou servi&ccedil;o oferecido pelo Usu&aacute;rio vendedor deve ser descrito com clareza, contendo todas as caracter&iacute;sticas relevantes.</p>

<p>O usu&aacute;rio declara e reconhece que o processamento de troca &eacute; de responsabilidade pr&oacute;pria, bem como o envio da mercadoria que dever&aacute; ser tratado diretamente com o receptor do produto a ser trocado.</p>

<p><strong>5. Suportes t&eacute;cnicos</strong></p>

<p>Os suportes t&eacute;cnicos do aplicativo e do site ocorrer&atilde;o na medida em que eventuais falhas no servi&ccedil;o forem detectadas pelos programadores. Haver&aacute; o incentivo &agrave; utiliza&ccedil;&atilde;o e detec&ccedil;&atilde;o de problemas por parte dos usu&aacute;rios, por meio de disponibiliza&ccedil;&atilde;o de espa&ccedil;os espec&iacute;ficos para sugest&otilde;es, cr&iacute;ticas e elogios. A validade t&eacute;cnica para cada vers&atilde;o disponibilizada &eacute; por prazo indeterminado. Dentro desse per&iacute;odo, o usu&aacute;rio poder&aacute; informar problemas que estejam ocorrendo no aplicativo ou em seu uso, e assim ser atendido pelo suporte t&eacute;cnico que analisar&aacute; o pedido e responder&aacute; conforme a situa&ccedil;&atilde;o.</p>

<p>&nbsp;</p>
 </div>
      
    </div>
</div>
    </body>
</html>
