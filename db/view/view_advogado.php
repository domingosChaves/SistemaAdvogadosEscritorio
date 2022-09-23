<div class="content">
<?php
include_once("../../db/conn2.php");
$id = $_GET['id'];
if (empty($id)) {echo "Não há Advogados cadastrados";} else {
$sql_adv = "SELECT DISTINCT advogado FROM proc_adv WHERE processo = $id";
$adv_in = mysqli_query ($DB_CONECT, "SELECT * FROM advogados WHERE id in($sql_adv)");
while ($adv = mysqli_fetch_assoc($adv_in)) {
echo $adv['nome']."<input type='checkbox' name='advogados[]' checked='checked' value='".$adv['id']."' style='display: none;'><br>";
}

}
?>
</div>
