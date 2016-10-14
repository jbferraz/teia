<?php
include '../funcao/conecta.php';
       $id_Prod = $_POST['prod_id'];     
       $sql = "DELETE FROM `produto`,trocaoferta WHERE `idProduto`  = $id_Prod and idProdutoOF = $id_Prod or idProdutoINT  = $id_Prod ";
    $res = mysql_query($sql);
if ($res){
    echo "<script>window.location='../Paginas/Meus_produtos.php';</script>";
}  else {
    echo "Falha ao tentar inserir".mysql_errno()." -- ".mysql_errno();
}   
