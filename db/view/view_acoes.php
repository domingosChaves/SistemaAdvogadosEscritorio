<div class="content">
<?php
include_once("../../db/conn2.php");
$id = $_GET['id'];
if (empty($id)) {} else {
$sql_tip = "SELECT DISTINCT tipoacao FROM processos WHERE id = $id";
$tip_in = mysqli_query ($DB_CONECT, "SELECT * FROM tipoacao WHERE id in($sql_tip)");
while ($tip = mysqli_fetch_assoc($tip_in)) {
echo $tip['descricao'].'<br>';
}
}
?>
</div>
