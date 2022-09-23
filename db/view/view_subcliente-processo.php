<div class="content">
<?php
include_once("../../db/conn2.php");
$processo 	=	$_GET['processo'];
$cliente = $_GET['cliente'];
$subcliente = $_GET['subcliente'];

if (empty($subcliente)) {echo "Não há subclientes cadastrados";} else {
$sql = "SELECT proc_subcli.subcliente FROM sisjur.proc_subcli WHERE subcliente = $subcliente";
$sql_subcli = mysqli_query ($DB_CONECT, "SELECT DISTINCT subcliente.nome, subcliente.idsubcliente FROM sisjur.subcliente WHERE subcliente.idsubcliente in($sql)") or die(mysqli_error($DB_CONECT));
while ($subcli = mysqli_fetch_assoc($sql_subcli)) {
echo $subcli['nome']."<input type='checkbox' name='subclientes[]' checked='checked' value='".$subcli['idsubcliente']."' style='display: none;'><br>";
}
}
?>
</div>
