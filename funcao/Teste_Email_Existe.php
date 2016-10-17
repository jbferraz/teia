<?php
include '../funcao/conecta.php';
$_id=$_GET['id'];
$sql3 = "SELECT `email` FROM `usuario` WHERE `email`='$_id'";
//executamos a instução SQL
$teste=mysql_query("$sql3") or die (mysql_error());
echo json_encode('utf8_encode',$teste);