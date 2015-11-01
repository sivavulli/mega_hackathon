<html>
<head>
<title>
good luck
</title>

<style> 
table, th {
    border: 1px solid black;
    padding:10px;
    font-family:  calibri, Serif;
}
table, td {
    border: 1px solid black;
    padding:5px;
    font-family:  calibri, Serif;
}
</style>
</head>
<body>
<?php

$con=mysqli_connect("sql5.freemysqlhosting.net","sql595057","uA3!mR9%","sql595057");
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT cast(`click_time` as date) as Date,Country,City,count(distinct `session_id` ) as 'No. of Viewers' from `tbl_page_click_details` group by cast(`click_time` as date),country,city";
$result = $con->query($sql);


if (!$result && !$resultcolumn) {
	echo "Could not successfully run query ($sql) from DB: " . $con->error;
	exit;
}

if (mysqli_num_rows($result) == 0) {
	echo "No rows found, nothing to print so am exiting";
	exit;
}

$table="<table style=\"border-collapse:collapse;border: 1px solid black;\">";
$table .="<tr style=\"align:centre;background-color:#518bdb;color:white;font-weight:bold;padding:10px;\">";
while($col = mysqli_fetch_field($result))
{
$table .= "<th>".$col->name."</th>";


}
$table .="<tr>";


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
	
	$table .="<tr>";
	for($i=0;$i<sizeof($row)/2;$i++){
	$table .= "<td>";
	$table .=$row[$i];
	$table . "</td>";
	}
	$table .="</tr>";
}
$table .="</table>";

echo $table;

		mysqli_close($con);

?>
</body>
</html>