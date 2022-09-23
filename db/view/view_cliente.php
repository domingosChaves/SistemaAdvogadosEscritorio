<div class="content">
<?php
include_once("../../db/conn2.php");
$id = $_GET['id'];
if (empty($id)) {echo "Não há subclientes cadastrados";} else {
$sql_subcli = mysqli_query ($DB_CONECT, "SELECT DISTINCT subcliente.nome, subcliente.idsubcliente FROM sisjur.subcliente WHERE subcliente.idcliente = $id");
while ($subcli = mysqli_fetch_assoc($sql_subcli)) {
echo $subcli['nome']."<input type='checkbox' name='subclientes[]' checked='checked' value='".$subcli['idsubcliente']."' style='display: none;'><br>";
}
}
?>

</div>
