<?php
$id = $_GET['id'];

   if(isset($id)){
   include_once('../../db/conn2.php');
   $sql = "DELETE FROM arquivos WHERE id = '$id' ";
   mysqli_query($DB_CONECT,$sql);
 }

?>