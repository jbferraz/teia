    <?php
        include '../funcao/conecta.php';
        echo "id --- nome --- media <br>";
             $sql_user = mysql_query("SELECT * FROM `rank_list` WHERE 1");
        while ($User = mysql_fetch_object($sql_user)) {
            $UserId = $User->idUsuario;
            $UserNome = $User->nome;
            $UserImg= $User->media_poderada;
            $Usernota= ceil($UserImg);
            echo "$UserId --- $UserNome ---  $Usernota<br>";            
        }
        
        ?>
