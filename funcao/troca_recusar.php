        <?php
        include '../funcao/conecta.php';
        
        $id_troca = $_POST['id_troca'];        
            $sql_up_toca=  "INSERT INTO `trocas`( `idTroca`,`data_da_prim_notif`, `data_da_seg_notif`, `data_da_terc_notif`, `status`)
                    VALUES ($id_troca,ADDDATE( now(), INTERVAL 7 DAY),ADDDATE( now(), INTERVAL 10 DAY),ADDDATE( now(), INTERVAL 15 DAY),0)";             
//executamos a instução SQL
            mysql_query("$sql_up_toca") or die (mysql_error());
            header('Location:../Paginas/Mostra_produtos.php');
        ?>