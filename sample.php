<?php
session_start();
include 'ClassSessions.php';
echo md5(uniqid(rand(), true));

?>
<html>
<head>
<title>
</title>
<script type="text/javascript" src="jquery-2.1.4.min.js"></script>
<script type="text/javascript" >
var MovAway;
var ComeTo;
var AwayTime=0;
var start=new Date().getTime();
$(window).blur(function(e) {
    // Do Blur Actions Here
    
    MovAway=new Date().getTime();
    console.log("moving away"+ MovAway);
});
$(window).focus(function(e) {
    // Do Focus Actions Here
    
    ComeTo=new Date().getTime();
    console.log("coming to" +ComeTo );
    AwayTime +=ComeTo-MovAway;
    console.log("away time "+AwayTime);
});
$(window).bind('beforeunload',function(){

console.log("Time Span "+ start);
console.log("time spent " +(((new Date().getTime())-start)-AwayTime));
	return false;
});
</script>
</head>
<body>

</body>
</html>