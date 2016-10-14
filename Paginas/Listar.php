<?php
include '../funcao/conecta.php';
//recuperar o codigo do arquivo atraves do metodo GET
$codigo= $_GET['codigo'];
 
$consulta = "SELECT `Arquivo`,`Tipo` FROM `imagem` WHERE idImagem= ' ".$codigo." ' ";
$resultado = mysql_query($consulta);
 
$dados = mysql_fetch_array($resultado);
$tipo = $dados['Tipo'];
$Arquivo = $dados['Arquivo'];
 
   //EXIBE ARQUIVO  - se o navegador não oferecer suporte para a extensão sera solicita dowload do arquivo
   header("Content-type: ".$tipo."");
   echo $Arquivo;
 ?>