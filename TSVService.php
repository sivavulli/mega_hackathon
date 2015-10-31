<?php
header("Content-type: text/tsv");
/*header("Content-Disposition: attachment; filename=file.tsv");
header("Pragma: no-cache");
header("Expires: 0");*/

$con=mysqli_connect("localhost","root","","webanalytics");
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT cast(P.`click_time` as date) as date,"
    ." COUNT("
        ." CASE " 
            ."WHEN P.`curr_page_url` like '%GlobalClick%' " 
            ."THEN 1 " 
            ." ELSE NULL" 
        ." END "
    ." ) AS 'Global_Click', "
    ." COUNT("
        ." CASE" 
            ." WHEN P.`curr_page_url` like '%google.com%'" 
            ." THEN 1" 
            ." ELSE NULL" 
        ." END "
    ." ) AS 'Google_page',"
 ." COUNT("
        ." CASE" 
            ." WHEN P.`curr_page_url` like '%yahoo.com%'" 
            ." THEN 1" 
            ." ELSE NULL" 
        ." END"
    ." ) AS 'Yahoo_page'"
." FROM    `tbl_page_click_details` P"
." GROUP BY cast(P.`click_time` as date)";
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
		echo "\t";
	}
	echo $col->name;
$counter++;

}
echo "\r\n";


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
			echo "\t";
		}
		
		echo $row[$i];
		
	}
	echo "\r\n";
}




mysqli_close($con);

?>