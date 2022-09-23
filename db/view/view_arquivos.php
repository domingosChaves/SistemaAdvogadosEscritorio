<div class="content">
	<script type="text/javascript">
		$(document).ready(function(){
			excluir_arq();
		})
	</script>
<?php
include_once("../../db/conn2.php");
$id = $_GET['id'];
if (empty($id)) {echo "Não há arquivos anexados";} else {
$arq_in = mysqli_query ($DB_CONECT, "SELECT * FROM arquivos WHERE processo = $id ");
while ($arq = mysqli_fetch_assoc($arq_in)) {
?>
<div class="alert alert-default" style="padding: 1%; border: solid 1px rgba(0,0,0,0.1)"><button type="button" class="close" aria-hidden="true" value="<?php echo $arq['id'];?>"> &times; </button> <?php  echo $arq['nome']; 	?> </div>
<?php
};
}
?>
</div>
