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
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/Sidenav.css">
  <script src="../bootstrap-3.3.7-dist/js/jquery-3.1.1.js"></script>
  <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    </head>
    <body>

     
        <script>
        window.onload = function() { 
        submitform()    
            };
        
        function image(x){
        <?php $GLOBALS["'"+x+"'"]?>  
        document.getElementById("dados").value=x};

        </script>
        <button value="teste" onclick="image(64)">
        <img id='img200' style="max-height:150px" class="img-responsive" src="">
    </body>
</html>
