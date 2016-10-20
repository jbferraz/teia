<?php 
include './conecta.php';

 $sql_1="  UPDATE `notificacao` SET `status`= 0 WHERE notificacao.data = CURRENT_DATE and notificacao.tipo = 2 and status = 1";
//executamos a instução SQL
            mysql_query("$sql_1") or die (mysql_error());
if ((isset($_POST['Entrar']))) {          
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $sql = "SELECT * FROM `usuario` WHERE `email` ='$email'";
           $res = mysql_query($sql);
            if ($row = mysql_fetch_array($res)){
                if ($senha == $row['senha']) {                                      
                  session_start();
                  $_SESSION['Login']=$email;
                  header('Location:../Paginas/Mostra_produtos.php');          
                    }
        else {
                    echo "senha incoreta";
             }            
                
            } else {
                    echo "email incoreta";
             } 

        }
?>