<?php
ini_set("error_reporting", E_ALL); 
ini_set("display_errors", 1); 


$con=mysqli_connect("us-cdbr-iron-east-03.cleardb.net","b5cc7e24bc5291","4510e1e2","ad_b0866641ccff844");
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "call cb1.split_string();";
$result = $con->query($sql);
$sql = " select splitted_Column from tbl_finallist where id='Group';";
$result = $con->query($sql);

if (!$result && !$resultcolumn) {
	echo "Could not successfully run query ($sql) from DB: " . $con->error;
	exit;
}

if (mysqli_num_rows($result) == 0) {
	echo "No rows found, nothing to print so am exiting";
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
	
	
	$table =$row[0];
}


echo  $table;

		mysqli_close($con);

?>
