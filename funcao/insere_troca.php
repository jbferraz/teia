<?php
include '../funcao/conecta.php';
$ProdD = $_POST['prodDono'];
$UserI = $_POST['userI'];
$ProdInt = $_POST['ProdutoId'];
$data = date('y-m-d H:i:s'); //pega data atual do sistema
 $sqlUserI = mysql_query("SELECT * FROM `produto`  WHERE `idProduto` = $ProdInt");
                    
                while ($Produtos = mysql_fetch_object($sqlUserI)) {
                    $ProdIdUser = $Produtos->idUsuario;                   
                    
                }
        $sql = "INSERT INTO `trocaoferta`(`idUsuarioOF`, `idProdutoOF`, `idUsuarioINT`, `idProdutoINT`, `dataOferta`, `status`)
        VALUES ('$UserI','$ProdD','$ProdIdUser','$ProdInt','$data',0)";
        $res = mysql_query($sql);
        if ($res) {
         header('Location:../Paginas/Mostra_produtos.php');
        }
    ?>
