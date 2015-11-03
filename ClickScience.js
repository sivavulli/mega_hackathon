var clickContent;
var clickType;
var ClickComment;
var PageLoadTime;
var aftrload;
var Country;
var City;
var TimeSpent;
var referrer
var CurrentPage  = window.location.href;
$(document).ready(function(){
referrer=document.referrer;	
	
});
$(window).load(function(){
	
	if (window.XMLHttpRequest) xmlhttp = new XMLHttpRequest();
    else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.open("GET","http://api.hostip.info/get_html.php",false);
    xmlhttp.send();
    hostipInfo = xmlhttp.responseText.split("\n");
    
    countryinfo=hostipInfo[0].split(":");
    cityinfo=hostipInfo[1].split(":");
    Country=countryinfo[1];
    City=cityinfo[1];
    

    


	
$(document).click(function(event) {
	 if($(event.target).is("body")){} 
    else{
    if($(event.target).is(":button") || $(event.target).is(":submit"))
    {
    	clickType="Button";
    	clickContent=$(event.target).val()
        
    	 if($(event.target).attr("comment") !=null){
    		 
     			ClickComment=$(event.target).attr("comment");
     			
    	    	}
	}
    else{
    	clickType="HTML"
    	clickContent=$(event.target).text();
    	
    	if($(event.target).attr("comment") !=null){
        	
    		ClickComment=$(event.target).attr("comment");
    		
        	}
        }
    SendClick();
    
    }
});
});



$(function () {
	var beforeload = new Date().getTime();
	window.onload = gettimeload;

	function gettimeload() {
	 aftrload = new Date().getTime();
	// Time calculating in seconds
	time = (aftrload - beforeload) / 1000
	PageLoadTime=time;
	
	}
	});

$(window).bind('beforeunload',function() {
    end =new Date().getTime();
    TimeSpent=((end-aftrload)/1000)

    $.ajax({ 
    	url: 'PerformaceService.php',
        data: {CurrentPage: CurrentPage,Country: Country, TimeSpent: TimeSpent,PageLoadTime: PageLoadTime,City: City,referrer : referrer},
        type: 'post',
        success: function(output) {
 alert(output);
                 },
        error:function(err){
        	
            }
    });
    
  });
 
function SendClick(){
	
	/*$.ajax({ 
	url: 'sample.php',
    data: {clickType: clickType,clickContent:clickContent},
    type: 'post',
    success: function(output) {

             },
    error:function(err){

        }
});
	*/
	
	var data = '{"action":"'+clickContent+'"}'; 

	
	$.ajax({ url: 'Service.php',
		type: "POST", 
		
		data: {clickType: clickType,clickContent:clickContent,ClickComment:ClickComment,CurrentPage : window.location.href,EntryTime:new Date().getTime(),Country : Country,City :City},
         success: function(output) {
alert(output);
                 },
		error:function(error){}
});
	
	/*$.ajax({ url: 'sample.php',
        data: {action: 'test'},
        type: 'post',
        success: function(output) {

                 }
});*/
	}
