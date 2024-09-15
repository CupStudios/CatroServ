<?php
include_once "utils.php";

if (isset($_GET['ip']) && isset($_GET['type']) && $_GET['ip'] != null && $_GET['type'] != null) {
	echo getRequests($_GET['ip'], $_GET['type']);
} else {
	echo logErr(array("error" => -1)); // IP not provided
}
?>