<?php
include 'ChartClass.php';
header('Content-type:application/json;charset=utf-8');

$con=mysqli_connect("localhost","root","","webanalytics");
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT right(`city`,2) state ,count(1) visits FROM `tbl_page_click_details` WHERE `country` like '%UNITED STATES%' group by right(`city`,2) order by state";
$result = $con->query($sql);


if (!$result ) {
	echo "Could not successfully run query ($sql) from DB: " . $con->error;
	exit;
}

if (mysqli_num_rows($result) == 0) {
	echo "No rows found, nothing to print so am exiting";
	exit;
}

$holder=array();

 
// While a row of data exists, put that row in $row as an associative array
// Note: If you're expecting just one row, no need to use a loop
// Note: If you put extract($row); inside the following loop, you'll
//       then create $userid, $fullname, and $userstatus
$i=0;
while ($row = mysqli_fetch_array($result)) {

	
	$obj=new ChartClass();
		$obj->State=$row[0];
		$obj->Visits=$row[1];
		$holder[$i]=$obj;
		$i++;
	
}

$obj2= new ChartHolder();
$obj2->data=$holder;
echo json_encode($obj2);
mysqli_close($con);


?>
