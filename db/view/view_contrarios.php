<div class="content">
<?php
include_once("../../db/conn2.php");
$id = $_GET['id'];
if (empty($id)) {echo "Não há contrários cadastrados";} else {
$sql_con = "SELECT DISTINCT contrario FROM proc_con WHERE processo = $id";
$con_in = mysqli_query ($DB_CONECT, "SELECT * FROM contrarios WHERE id in($sql_con)");
while ($contrarios = mysqli_fetch_assoc($con_in)) {
echo $contrarios['nome']."<input type='checkbox' name='contrarios[]' checked='checked' value='".$contrarios['id']."' style='display: none;'><br>";
}
}
?>
</div>
