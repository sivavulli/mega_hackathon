<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Execute Non Query</title>

</head>
<body>
<form action="Query.php" method="post">
<textarea id="textfield" type="text" name="Execute"  rows="100" cols="800" >
</textarea>
<input type="submit" name="querysubmit" value="Execute" />
</form>
<?php
echo "<pre>";
//print_r($_POST);
echo "</pre>";
if(isset($_POST["querysubmit"]) && isset($_POST["Execute"]))
{
$con=mysqli_connect("us-cdbr-iron-east-03.cleardb.net","b5cc7e24bc5291","4510e1e2","ad_b0866641ccff844");
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql =$_POST["Execute"];
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
}
?>

</body>
</html>
