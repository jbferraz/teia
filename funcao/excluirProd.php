<?php
include '../funcao/conecta.php';
       $id_Prod = $_POST['ProdIdExcluir'];     
       $sql = "UPDATE `produto` SET `ativo`= 3 WHERE `idProduto` = $id_Prod";
    $res = mysql_query($sql);
if ($res){
    echo "<script>window.location='../Paginas/Meus_produtos.php';</script>";
}  else {
    echo "Falha ao tentar inserir".mysql_errno()." -- ".mysql_errno();
}   
