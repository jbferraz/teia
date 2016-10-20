     <?php
        include '../funcao/conecta.php';
        
        $id_troca = $_POST['id_troca'];        
        $user_i = $_POST['user_i'];
        $user_d = $_POST['user_d'];  
         $ProdId_1 = $_POST['ProdId_1'];
          $ProdId_2 = $_POST['ProdId_2'];
        $avaliação=$_POST['nota_Avaliacao'];
          echo "id_troca: $id_troca";
          echo "user_i: $user_i";
         
        
          $sql_1="UPDATE `notificacao` SET tipo = 0 ,`status`= 1  WHERE id_troca = $id_troca and user_i = $user_i";
//executamos a instução SQL
            mysql_query("$sql_1") or die (mysql_error());
         
            
            $sql_3="UPDATE `trocas` SET `status`= 3 WHERE `idTroca` = $id_troca";
//executamos a instução SQL
            mysql_query("$sql_3") or die (mysql_error());
            
            $sql_4="INSERT INTO rank(idTroca,Nota,idUsuario)VALUES('$id_troca','$nota','$user_i')";
      mysql_query("$sql_4") or die (mysql_error());
 
            header('Location:../Paginas/Mostra_produtos.php');
            
           
        ?>
 