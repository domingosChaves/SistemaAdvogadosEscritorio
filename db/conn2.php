<?php
$DB_CONECT = mysqli_connect("localhost", "root", "") or die(mysqli_error("erro"));
$DB = mysqli_select_db($DB_CONECT, "sisjur") or die("erro na conexao");
?>