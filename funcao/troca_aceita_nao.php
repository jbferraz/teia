     <?php
        include '../funcao/conecta.php';
        
        $id_troca = $_POST['id_troca'];        
        $user_i = $_POST['user_i'];
        $user_d = $_POST['user_d'];  
         $ProdId_1 = $_POST['ProdId_1'];
          $ProdId_2 = $_POST['ProdId_2'];            

          
             $sql_1="UPDATE `produto` SET `ativo`= 1 WHERE `idProduto` = $ProdId_1";
//executamos a instução SQL
            mysql_query("$sql_1") or die (mysql_error());
            
   
             $sql_2="UPDATE `produto` SET `ativo`= 1 WHERE `idProduto` = $ProdId_2";
//executamos a instução SQL
            mysql_query("$sql_2") or die (mysql_error());        
            
            $sql_3="UPDATE `trocas` SET `status`= 0 WHERE `idTroca` = $id_troca";
//executamos a instução SQL
            mysql_query("$sql_3") or die (mysql_error());
            header('Location:../Paginas/Mostra_produtos.php');
            
            
        ?>
