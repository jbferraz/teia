<?php
include '../funcao/conecta.php';
    $Nome = $_POST['ProdNome'];
    $Desc = $_POST['ProdDesc']; 
    $Catg = $_POST['ProdCategoria'];
    $estado = $_POST['ProdEstado'];
    $id_p = $_POST['prod_id'];     
    $data = date('y-m-d H:i:s'); //pega data atual do sistema
    $img_nome = "Prod_$Nome".$data;    
    
    if($_FILES['file']){        
    $file_tmp = $_FILES["file"]["tmp_name"];
 //NOME DO ARQUIVO NO COMPUTADOR
$file_name = $_FILES["file"]["name"];
//TAMANHO DO ARQUIVO
$file_size = $_FILES["file"]["size"];
//MIME DO ARQUIVO
$file_type = $_FILES["file"]["type"];
 
//antes de ler o conteudo do arquivo você pode fazer upload para compactar em .ZIP ou .RAR, no caso de imagem você poderá redimensionar o tamanho antes de gravar no banco. Claro que depende da sua necessidade.
 
//Para fazer UPLOAD poderá usar COPY ou MOVE_UPLOADED_FILE
//copy($file_tmp, "caminho/pasta/$file_name");
//move_uploaded_file($file_tmp,"caminho/pasta/$file_name");
 
//lemos o  conteudo do arquivo usando afunção do PHP  file_get_contents
$binario = file_get_contents($file_tmp);
// evitamos erro de sintaxe do MySQL
$binario = mysql_real_escape_string($binario);
 
//montamos o SQL para envio dos dados
$sql = "INSERT INTO `imagem`(`nomeArquivo`, `descricao`, `arquivo`, `tipo`, `tamanho`, `dataEnvio`)
    VALUES ('$img_nome','$file_name','$binario','$file_type','$file_size', '$data')";
//executamos a instução SQL
mysql_query("$sql") or die (mysql_error());    

$sql2 = mysql_query("SELECT * FROM `imagem` WHERE nomeArquivo ='".$img_nome."'");
                    while ($img = mysql_fetch_object($sql2)) {
                    $imgID = $img->idImagem;
                    }
                    echo $imgID;


$sql3 = "UPDATE `produto` SET `idProdutoEstado`=$estado, `idCategoria`=$Catg, `nomeProduto`='$Nome', 
            `descricao`='$Desc',`idImagem`= $imgID WHERE `idProduto`= '$id_p'";
    
    $res = mysql_query($sql3);
   
if ($res){
    echo "<script>window.location='../Paginas/Meus_produtos.php';</script>";
}  else {
    echo "Falha ao tentar inserir".mysql_errno()." -- ".mysql_errno();
}   
        
    }  else {
     $sql3 = "UPDATE `produto` SET `idProdutoEstado`=$estado, `idCategoria`=$Catg, `nomeProduto`='$Nome', 
            `descricao`='$Desc' WHERE `idProduto`= '$id_p'";
    
    $res = mysql_query($sql3);
   
if ($res){
    echo "<script>window.location='../Paginas/Meus_produtos.php';</script>";
}  else {
    echo "Falha ao tentar inserir".mysql_errno()." -- ".mysql_errno();
}   
}
    
?>