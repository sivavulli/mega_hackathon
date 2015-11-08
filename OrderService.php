<?php
if(isset($_POST["Filter"]))
{
$con=mysqli_connect("us-cdbr-iron-east-03.cleardb.net","b5cc7e24bc5291","4510e1e2","ad_b0866641ccff844");
if (mysqli_connect_errno($con))
{
	echo "fail";
}
$sql = "select 'true' from tbl_order_lookup where offer like '".$_POST["Filter"] ."' and enable='y'";
$result = $con->query($sql);


if (!$result ) {
	echo "fail";
	
	exit;
}

if (mysqli_num_rows($result) == 0) {
	echo "fail";
	exit;
}






/*
 while($col = mysqli_fetch_field($result))
 {
 echo "<pre>";
 print_r($col);
 echo "</pre>";
 echo $col->name;


 }
 */
// While a row of data exists, put that row in $row as an associative array
// Note: If you're expecting just one row, no need to use a loop
// Note: If you put extract($row); inside the following loop, you'll
//       then create $userid, $fullname, and $userstatus
while ($row = mysqli_fetch_array($result)) {
	/*for($i=0;$i<sizeof($row);$i++){
		echo($row[$i]);
		}*/
	if($row[0]=="true")
	{
		echo "success";
		
	}
		else{
			echo "fail";
		}
}



mysqli_close($con);
}

?>

