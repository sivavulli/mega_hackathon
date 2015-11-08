<?php
?>

<!DOCTYPE html>
<meta charset="utf-8">
<head>
<style>

body {
  font: 10px sans-serif;
}

.arc path {
  stroke: #fff;
}

</style>
<script type="text/javascript" src="jquery-2.1.4.min.js"></script>
</head>
<body>
<div id="donut" style="left:50px;width:500px;height:500px;">
<script src="//d3js.org/d3.v3.min.js"></script>
<script>
function DonutToolTip(trans,value,x,y)
{
	
var holder='<div style="width:80px;position:absolute;left:'+(x+10)+'px;top:'+y+'px;border-radius:5px;height:auto;border-color:white;background-color:black;color:white;font-family:calibri;">'
+'<span style="position:relative;left:10px;width:40px;background-color:black;font-size: 14px;;color:white;font-weight:bold;font-family:calibri;">'
+(trans)+'</span><br/>'+
'<span style="position:relative;left:10px;width:40px;background-color:black;font-size: 14px;color:white;font-family:calibri;font-weight:bold;">'
+value+
'</span></div>'
$("#feedback").show();
$("#feedback").html(holder);
	}
var width = 400,
    height = 400,
    radius = Math.min(width, height) / 2;

var color = d3.scale.ordinal()
    .range(["#379154", "#bd1304"]);

var arc = d3.svg.arc()
    .outerRadius(radius - 10)
    .innerRadius(radius - 70);

var pie = d3.layout.pie()
    .sort(null)
    .value(function(d) { return d.count; });

var svg = d3.select("#donut").append("svg")
    .attr("width", width)
    .attr("height", height)
  .append("g")
    .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

d3.csv("DonutData.php", function(error, data) {

  data.forEach(function(d) {
	  
    d.count = +d.count;
  });

  var g = svg.selectAll(".arc")
      .data(pie(data))
    .enter().append("g")
      .attr("class", "arc")
      .on('mousemove', function (d) {
    	  var coordinates = [0, 0];
    	  coordinates = d3.mouse(this);
    	  var x = coordinates[0];
    	  var y = coordinates[1];
    	  
    	  DonutToolTip(d.data.transaction,d.data.count,d3.event.pageX,d3.event.pageY);      
})
.on("mouseout",function(){
	$("#feedback").hide()
});

  g.append("path")
      .attr("d", arc)
      .style("fill", function(d) { return color(d.data.transaction); });

  

});

</script>
<div id="feedback">
</div>
</div>

</body>
