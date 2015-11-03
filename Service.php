<?php
ini_set("error_reporting", E_ALL); 
ini_set("display_errors", 1); 
session_start();
include('ClickClass.php');
include('ClassSessions.php');
$obj= new ClickClass();
date_default_timezone_set('America/New_York');
if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
	
	
	$obj->SessionID=nullif($_SESSION["id"]);
	$obj->clickType=nullif($_POST["clickType"]);
	$obj->EntryTime=date("Y-m-d H:i:s",time());
	$obj->ClickComment=nullif($_POST["ClickComment"]);
	$obj->CurrentPage=nullif($_POST["CurrentPage"]);
	$obj->clickContent=nullif($_POST["clickContent"]);
	$obj->Country=nullif($_POST["Country"]);
	$obj->City=nullif($_POST["City"]);
	
	
}
else{
	$_SESSION["id"]=ClassSessions::sessionSettor();
	
	$obj->SessionID=nullif($_SESSION["id"]);
	$obj->clickType=nullif($_POST["clickType"]);
	$obj->EntryTime=date("Y-m-d H:i:s",time());
	$obj->ClickComment=nullif($_POST["ClickComment"]);
	$obj->CurrentPage=nullif($_POST["CurrentPage"]);
	$obj->clickContent=nullif($_POST["clickContent"]);
	$obj->Country=nullif($_POST["Country"]);
	$obj->City=nullif($_POST["City"]);
	
}
//print_r($obj);

function nullif($var){
	if(isset($var) && !empty($var))
	{
	return $var;	
	}
	else {return null;}
}
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
$sql = "INSERT INTO  tbl_page_click_details".
"(session_id,ip_addr,curr_page_url,click_type,clicked_content,click_time,comments,Country,City)".
" VALUES ('"
.$obj->SessionID."','".$obj->IPAddress."','".$obj->CurrentPage."','"
		.$obj->clickType."','".$obj->clickContent."','".$obj->EntryTime."','"
				.$obj->ClickComment."','".$obj->Country."','".$obj->City."')";
if (!mysqli_query($con,$sql))
{
	die('Error: ' . mysqli_error($con));
}
echo "1 record added";
mysqli_close($con);

?>
