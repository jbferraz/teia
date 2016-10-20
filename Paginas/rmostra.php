<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../funcao/conecta.php';
        $nota=$_GET['nota'];
     $sql="INSERT INTO rank(idTroca,Nota,idUsuario)VALUES('1','$nota','3')";
      mysql_query("$sql") or die (mysql_error());
        ?>
        <script>
           window.close();
        </script>
    </body>
</html>
