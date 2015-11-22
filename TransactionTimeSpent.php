<?php

session_start();

ini_set("error_reporting", E_ALL); 
ini_set("display_errors", 1); 
date_default_timezone_set('America/New_York');
function nullif($var){
	if(isset($var) && !empty($var))
	{
		return $var;
	}
	else {return null;}
}

$con=mysqli_connect("us-cdbr-iron-east-03.cleardb.net","b5cc7e24bc5291","4510e1e2","ad_b0866641ccff844");
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "INSERT INTO  tbl_transaction_timespent_details".
				"(TransactionID,Date,Status,TimeSpent)".
				" VALUES ('"
				.nullif($_POST["TransactionID"])."',".sysdate().",'"
				.nullif($_POST["Status"])."',".nullif($_POST["TimeSpent"]).")";

						if (!mysqli_query($con,$sql))
						{
							die('Error: ' . mysqli_error($con));
						}
						
						mysqli_close($con);

	
