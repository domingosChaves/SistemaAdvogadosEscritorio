<?php
include_once 'db/conn2.php';
mysqli_close($DB_CONECT);
session_destroy();
header("Location:index.php");
?>