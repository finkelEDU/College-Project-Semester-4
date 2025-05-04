<?php
include "../models/AdminControl.php";
$AdminControl = new AdminControl();
	
if(isset($_GET["id"])){
	$AdminControl->deleteOrder();
}

header("Location: admin.php");