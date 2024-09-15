<?php
include_once "utils.php";

if (isset($_GET['ip']) && isset($_GET['ip2']) && isset($_GET['response']) && $_GET['ip'] != null && $_GET['ip2'] != null && $_GET['response'] != null) {
	echo setRequestResponse($_GET["ip"], $_GET["ip2"], $_GET["response"]);
} else{
	echo logErr(array("error" => -1));
}
?>