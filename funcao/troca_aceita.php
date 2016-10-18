     <?php
        include '../funcao/conecta.php';
        
        $id_troca = $_POST['id_troca'];        
        $user_i = $_POST['user_i'];
        $user_d = $_POST['user_d'];  
         $ProdId_1 = $_POST['ProdId_1'];
          $ProdId_2 = $_POST['ProdId_2'];
             $sql_up_toca="";
//executamos a instução SQL
            mysql_query("$sql_up_toca") or die ("sql: ".mysql_error());
             $sql_1="UPDATE `produto` SET `ativo`=0 WHERE `idProduto` = $ProdId_1";
//executamos a instução SQL
            mysql_query("$sql_1") or die ("sql1 ".mysql_error());
            
   
             $sql_2="UPDATE `produto` SET `ativo`=0 WHERE `idProduto` = $ProdId_2";
//executamos a instução SQL
            mysql_query("$sql_2") or die ("sql2 ".mysql_error());        
            
            header('Location:../Paginas/Mostra_produtos.php');
        ?>
