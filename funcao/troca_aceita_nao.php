     <?php
        include '../funcao/conecta.php';
        
        $id_troca = $_POST['id_troca'];        
        $user_i = $_POST['user_i'];
        $user_d = $_POST['user_d'];  
         $ProdId_1 = $_POST['ProdId_1'];
          $ProdId_2 = $_POST['ProdId_2'];
          $id_not = $_POST['id_not'];
          echo "id_troca: $id_troca";
          echo "user_i: $user_i";
         echo "id_not: $id_not";
        
          $sql_1="UPDATE `notificacao` SET tipo = 0 ,`status`= 1  WHERE id_troca = $id_troca and user_i = $user_i";
//executamos a instução SQL
            mysql_query("$sql_1") or die (mysql_error());
          
         
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
            
            $sql_4="UPDATE `trocaoferta` SET `status`=1 WHERE `idUsuarioINT` = $user_i";
//executamos a instução SQL
            mysql_query("$sql_4") or die ("sql2 ".mysql_error()); 
           
        ?>
 