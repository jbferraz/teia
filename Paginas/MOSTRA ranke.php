    <?php
     $sql="INSERT INTO rank(idTroca,Nota,idUsuario)VALUES('1','$nota','3')";
      mysql_query("$sql") or die (mysql_error());
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <form>
            <label><samp class="glyphicon glyphicon-star" style="font-size:50px;"/></label>
            <label><samp id="star2" class="glyphicon glyphicon-star-empty" style="font-size:50px;"/></label>
            <label><samp id="star3" class="glyphicon glyphicon-star-empty" style="font-size:50px;"/></label>
            <label><samp id="star4" class="glyphicon glyphicon-star-empty" style="font-size:50px;"/></label>
            <label><samp  id="star5" class="glyphicon glyphicon-star-empty" style="font-size:50px;"/></label>
        </form>

    </body>
</html>
