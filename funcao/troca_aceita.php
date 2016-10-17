     <?php
        include '../funcao/conecta.php';
        
        $id_troca = $_POST['id_troca'];        
        $user_i = $_POST['user_i'];
        $user_d = $_POST['user_d'];  
         $ProdId_1 = $_POST['ProdId_1'];
          $ProdId_2 = $_POST['ProdId_2'];
             $sql_up_toca="INSERT INTO `trocas`(`user_I`, `User_d`,`idTroca`, `D_Primera_notif`, `D_Segunda_notif`, `D_Terceira_notif`, `status`)
                      VALUES ($user_i,$user_d ,$id_troca,ADDDATE( now(), INTERVAL 7 DAY),ADDDATE( now(), INTERVAL 10 DAY),ADDDATE( now(), INTERVAL 15 DAY),1)";
//executamos a instução SQL
            mysql_query("$sql_up_toca") or die (mysql_error());
             $sql_1="UPDATE `produto` SET `ativo`=0 WHERE `idProduto` = $ProdId_1";
//executamos a instução SQL
            mysql_query("$sql_1") or die (mysql_error());
            
   
             $sql_2="UPDATE `produto` SET `ativo`=0 WHERE `idProduto` = $ProdId_2";
//executamos a instução SQL
            mysql_query("$sql_2") or die (mysql_error());        
            
            header('Location:../Paginas/Mostra_produtos.php');
        ?>
