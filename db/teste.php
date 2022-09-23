<?php

include_once('conn2.php');

$dados = $_GET['query'] = '0';
$sql = mysqli_query ($DB_CONECT, "SELECT procorigem FROM processos WHERE procorigem LIKE '%{$dados}%'");
while ($row = mysqli_fetch_assoc($sql)) {
	echo $row['procorigem']."<br>";
}


?>