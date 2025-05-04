<?php
include "../models/AdminControl.php";
$AdminControl = new AdminControl();
	
if(isset($_GET["id"])){
	$AdminControl->deleteProduct();
}

header("Location: admin.php");