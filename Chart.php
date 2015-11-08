<html>
<head>
<title>US Chart</title>
<script type="text/javascript" src="jquery-2.1.4.min.js"></script>

<script type="text/javascript" src="d3.js"></script>


</head>
<body>
<div id="chart" style="left:50px;width:500px;height:500px;">
<script type="text/javascript">

var datamart;
while(!d3){}
	
$(window).load(function(){
	
	var w = 500;
	var h = 500;

	//alert("before grab");
	
	



	

//alert("after grab");
	//Define map projection
	var projection = d3.geo.albersUsa()
						   .translate([w/2, h/2])
						   .scale([700]);

	//Define path generator
	var path = d3.geo.path()
					 .projection(projection);

	//Create SVG element
	var svg = d3.select("#chart")
				.append("svg")
				.attr("id","map")
				.attr("width", w)
				.attr("height", h);

	//Load in GeoJSON data

d3.json("us.json", function(json) {

	d3.json("ChartService.php", function(jsondata){
		//alert("inside json");
		datamart=jsondata;
		console.log(datamart);
		//Bind data and create one path per GeoJSON feature
		svg.selectAll("path")
		   .data(json.features)
		   .enter()
		   .append("path")
		   .attr("id",function(d){ return d.properties.name;})
		   .attr("stroke-width","1")
		   .attr("stroke","white")
		   .attr("d", path)
		    .attr('font-size','6pt')
		   .style("fill", "#C2C4C4")
		   .style("stroke","1px");
    
    
   
		//alert(JSON.stringify(datamart));
		//alert(JSON.stringify(datamart.data))
		//alert(JSON.stringify(datamart.data[0]))
		//alert(JSON.stringify(datamart.data[0].State))
		for(i=0;i<datamart.data.length;i++)
		{
	$("#"+datamart.data[i].State).css("fill","#e35656");
	$("#"+datamart.data[i].State).attr("value",datamart.data[i].Visits);
			}
		//d3.select("#".data.data[0].State).attr("dummy",function(){return data.data[0].Visits})
		});
		

	});



$("#map").click(function(e){ 
	
    var mouseX = e.pageX;
    var mouseY = e.pageY;
    $("#feed").hide();
    if($(e.target).attr("value") !=undefined){
    console.log($(e.target).attr("value"));
    tooltip(e.pageX,e.pageY,$(e.target).attr("value"))
    //alert($(e.target).attr("value"));
    }
    //$("#moverdiv").css({'top':mouseY, 'left':mouseX});
  });

function tooltip(x,y,value)
{
	$("#feed").hide();
	holder='<div style="position:absolute;left:'+(x+10)+'; top:'+(y)+';width:50px;height:50px;background-color:#edebe6;border-radius:5px;">';
	holder +='<p style="left:15px;position:relative;">'
	holder +=value;
	holder +="</p>";
	holder +="</div>";
	$("#feed").html(holder);
	
	$("#feed").show();
}

});


</script>
<div id="feed">

</div>
</div>
</body>
</html>