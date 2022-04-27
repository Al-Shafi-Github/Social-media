<?php
ob_start(); // Turns on the output buffering
session_start();

$timezone = date_default_timezone_set("Asia/Dhaka");

$con = mysqli_connect ("localhost","root","","connectin");
if (mysqli_connect_errno())
{
	echo "Failed to connect:" .mysqli_connect_errno();
}
?>