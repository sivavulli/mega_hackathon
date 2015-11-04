<?php
?>

<html>
<head>
<title>
Reports 
</title>
<script type="text/javascript" src="jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="ClickScience.js"></script>
<script type="text/javascript" >
$(window).load(function(){

$("#visit").click(function(){
	 
	$("#container").attr("src","gridview.php");
	
});




$("#timespent").click(function(){
	$("#container").attr("src","TimespentReport.php");
	
});

$("#pageload").click(function(){
	$("#container").attr("src","pageload.php");
	
});


$("#chart").click(function(){
	$("#container").attr("src","Chart.php");
	
});
	
});
</script>
</head>
<body>
<div style="background-color:gray;width:100%;height:50px;">
<div id="visit" style="margin-left:50px;float:left;width:150px;height:50px;">
<p style="top:15;color:white;">
Page Visit Report
</p>
</div>
<div id="timespent" style="float:left;width:150px;height:50px;">
<p style="top:15;color:white;">
Time Spent report
</p>
</div>


<div id="pageload" style="float:left;width:150px;height:50px;">
<p style="top:15;color:white;">
Page Load report
</p>
</div>

<div id="chart" style="float:left;width:150px;height:50px;">
<p style="top:15;color:white;">
Vist Chart
</p>
</div>


</div>
<div  style="width:800px;height:1000px;left:200px;position:relative;" >
<iframe id="container" src="" style="width:800px;height:1000px;"></iframe>
</div>

</body>
</html>