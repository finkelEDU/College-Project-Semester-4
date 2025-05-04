<?php
include "../models/AdminControl.php";
$AdminControl = new AdminControl();
	
if(isset($_GET["id"])){
	$AdminControl->deleteMember();
}

header("Location: admin.php");