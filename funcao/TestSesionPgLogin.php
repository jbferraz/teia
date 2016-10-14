 <?php
  session_start();
        if (!isset($_SESSION['Login'])) {  
              header('Location:../Paginas/Login.php');
        }else{
           header('Location:../Paginas/Mostra_produtos.php');  
        }
 ?>


