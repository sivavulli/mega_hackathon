<?php

$con=mysqli_connect("us-cdbr-iron-east-03.cleardb.net","b5cc7e24bc5291","4510e1e2","ad_b0866641ccff844");
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "create table if not exists tbl_page_performance_details("
."session_id varchar(200),"
."ip_addr varchar(20),"
."entrytime      datetime,"
."country       varchar(100),"
."city           varchar(100),"
."curr_page_url varchar(200),"
."referrer_url varchar(200),"
."time_spent bigint,"
."page_load_time bigint);";

$result = $con->query($sql);

$sql = "create table if not exists tbl_page_click_details("
."session_id varchar(200),"
."country   varchar(100),"
."city        varchar(100),"
."ip_addr varchar(20),"
."curr_page_url varchar(200),"
."click_type varchar(20),"
."clicked_content varchar(200),"
."click_time datetime,"
."comments varchar(200));";

$resultcolumn = $con->query($sql);

if (!$result && !$resultcolumn) {
	echo "Could not successfully run query ($sql) from DB: " . $con->error;
	exit;
}




		mysqli_close($con);

?>
