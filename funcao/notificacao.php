<?php
include '../funcao/conecta.php';
      session_start();
        if (!isset($_SESSION['Login'])) {  
            die('<h2>Sessão não iniciada</h2>'); 
        }
        
   $UserEmail = $_SESSION['Login'];
    $sql_user = mysql_query("SELECT * FROM `usuario` where `email` = '$UserEmail'");
        while ($User = mysql_fetch_object($sql_user)) {
            $UserId = $User->idUsuario;
            $UserNome = $User->nome;
            $UserImg= $User->idImagem;            
        }
        
$id_troca = $_POST['id_troca'];
        $id_not = $_POST['id_not'];
 $sql_up_toca= "UPDATE `notificacao` SET `status`= true  WHERE `id_troca` = $id_troca and  status <> 2 and user_i = $UserId  and id_notificacao = $id_not" ;
    //executamos a instução SQL
    mysql_query("$sql_up_toca") or die (mysql_error());
    header('Location:../Paginas/Mostra_produtos.php');
?>