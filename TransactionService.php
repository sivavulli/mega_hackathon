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
$obj= new TransactionClass();
date_default_timezone_set('America/New_York');
if(isset($_POST["event"]) && !empty($_POST["event"]))
{
	if($_POST["event"]=="begin"){
		
	
if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){


	$obj->SessionID=nullif($_SESSION["id"]);
	$obj->Comment=nullif($_POST["Comment"]);
	
	$obj->Status=nullif($_POST["Status"]);
	$obj->TransactionType=nullif($_POST["TransactionType"]);
	


}
else{
	$_SESSION["id"]=ClassSessions::sessionSettor();

	$obj->SessionID=nullif($_SESSION["id"]);
	$obj->Comment=nullif($_POST["Comment"]);
	$obj->Status=nullif($_POST["Status"]);
	$obj->TransactionType=nullif($_POST["TransactionType"]);

}
//print_r($obj);


/*
 $sql = "INSERT INTO  tbl_page_click_details".
 "(session_id,ip_addr,curr_page_url,click_type,clicked_content,click_time,comments)".
 " VALUES ('"
 .$obj->SessionID."','".$obj->IPAddress."','".$obj->CurrentPage."','"
 .$obj->clickType."','".$obj->clickContent."','".$obj->EntryTime."','"
 .$obj->ClickComment."')";
 echo $sql;
 */
$con=mysqli_connect("us-cdbr-iron-east-03.cleardb.net","b5cc7e24bc5291","4510e1e2","ad_b0866641ccff844");
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "INSERT INTO  tbl_transation_performance_details".
				"(SessionID,EntryTime,TransactionID,TransactionType,Comment,Status)".
				" VALUES ('"
				.$obj->SessionID."',sysdate(),'".$obj->TransactionID."','"
				.$obj->TransactionType."','".$obj->Comment."','".$obj->Status."')";

						if (!mysqli_query($con,$sql))
						{
							die('Error: ' . mysqli_error($con));
						}
						echo $obj->TransactionID;
						mysqli_close($con);

	}
	
	else
	{
		

		if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
		
		
			$obj->SessionID=nullif($_SESSION["id"]);
			$obj->Comment=nullif($_POST["Comment"]);
			$obj->Status=nullif($_POST["Status"]);
			$obj->TransactionID=nullif($_POST["TransactionID"]);
			$obj->TransactionType=nullif($_POST["TransactionType"]);
		
		
		
		}
		else{
			$_SESSION["id"]=ClassSessions::sessionSettor();
		
			$obj->SessionID=nullif($_SESSION["id"]);
			$obj->Comment=nullif($_POST["Comment"]);
			$obj->Status=nullif($_POST["Status"]);
			$obj->TransactionID=nullif($_POST["TransactionID"]);
			$obj->TransactionType=nullif($_POST["TransactionType"]);
		
		}
		//print_r($obj);
		
		
		/*
		 $sql = "INSERT INTO  tbl_page_click_details".
		 "(session_id,ip_addr,curr_page_url,click_type,clicked_content,click_time,comments)".
		 " VALUES ('"
		 .$obj->SessionID."','".$obj->IPAddress."','".$obj->CurrentPage."','"
		 .$obj->clickType."','".$obj->clickContent."','".$obj->EntryTime."','"
		 .$obj->ClickComment."')";
		 echo $sql;
		 */
$con=mysqli_connect("us-cdbr-iron-east-03.cleardb.net","b5cc7e24bc5291","4510e1e2","ad_b0866641ccff844");
		if (mysqli_connect_errno($con))
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$sql = "INSERT INTO  tbl_transation_performance_details".
				"(SessionID,EntryTime,TransactionID,TransactionType,Comment,Status)".
				" VALUES ('"
				.$obj->SessionID."',sysdate(),'".$obj->TransactionID."','"
				.$obj->TransactionType."','".$obj->Comment."','".$obj->Status."')";
				if (!mysqli_query($con,$sql))
				{
				 die('Error: ' . mysqli_error($con));
				}
				echo "1 record added";
				mysqli_close($con);
						
	}
}
						?>