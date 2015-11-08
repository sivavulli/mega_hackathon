<?php 
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
 $sql = "INSERT INTO  tbl_chathistory (Chat,Account_id,TimeStamp,Latitude,Longitude) VALUES ('"	.nullif($_POST["Chat"])."',222115,sysdate(),40.91709,-72.709457)";
 						if (!mysqli_query($con,$sql))
 						{
 							die('Error: ' . mysqli_error($con));
 						}
 						echo "1 record added";
 						mysqli_close($con);
 

 ?>