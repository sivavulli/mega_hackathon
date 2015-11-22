<?php

		
header("Content-type: text/csv");
/*header("Content-Disposition: attachment; filename=file.tsv");
header("Pragma: no-cache");
header("Expires: 0");*/

$con=mysqli_connect("us-cdbr-iron-east-03.cleardb.net","b5cc7e24bc5291","4510e1e2","ad_b0866641ccff844");
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_GET["type"]) && !empty($_GET["type"]))
{
  if($_GET["type"]=="Success")
  {
  $sql="select cast(`Date` as date) as 'date', cast(avg(`TimeSpent`) as decimal(18,3)) as 'close' from tbl_transaction_timespent_details where `Status` like 'Success' group by cast(`Date` as date) ";
  }
  if($_GET["type"]=="Failure")
  {
  $sql="select cast(`Date` as date) as 'date', cast(avg(`TimeSpent`) as decimal(18,3)) as 'close' from tbl_transaction_timespent_details where `Status` like 'Fail' group by cast(`Date` as date) ";
  }
}

$result = $con->query($sql);


if (!$result && !$resultcolumn) {
	echo "Could not successfully run query ($sql) from DB: " . $con->error;
	exit;
}

if (mysqli_num_rows($result) == 0) {
	echo "No rows found, nothing to print so am exiting";
	exit;
}


$counter=1;
while($col = mysqli_fetch_field($result))
{
	if($counter !=1){
		echo ",";
	}
	echo $col->name;
$counter++;

}
//echo "\r\n";


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
$counter2=1;
while ($row = mysqli_fetch_array($result)) {
	/*for($i=0;$i<sizeof($row);$i++){
		echo($row[$i]);
		}*/

	
	for($i=0;$i<sizeof($row)/2;$i++){
		if($i!=0){
			echo ",";
		}
		
		echo $row[$i];
		
	}
//	echo "\r\n";
}




mysqli_close($con);
		
?>
