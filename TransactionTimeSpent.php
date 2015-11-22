<?php

session_start();
include('TransactionClass.php');
include('ClassSessions.php');

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
				"(TransactionID,Status,TimeSpent)".
				" VALUES ('"
				.nullif($_POST["TransactionID"])."','"
				.nullif($_POST["Status"])."',".nullif($_POST["TimeSpent"]).")";

						if (!mysqli_query($con,$sql))
						{
							die('Error: ' . mysqli_error($con));
						}
						
						mysqli_close($con);

	
