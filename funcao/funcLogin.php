<?php 
include './conecta.php';
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