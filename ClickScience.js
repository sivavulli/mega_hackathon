var clickContent;
var clickType;
var ClickComment;
var PageLoadTime;
var aftrload;
var Country;
var City;
var TimeSpent;
var referrer;
var MovAway;
var ComeTo;
var AwayTime=0;
var WCogent={TransactionID:"",TransactionType:"",Comment:"",Status:"",
		Begin:function(trnstype,cmnt,sttus){
			this.TransactionType=trnstype;
			this.Comment=cmnt;
			this.Status=sttus;
			var trid="";
			 $.ajax({ 
			    	url: 'TransactionService.php',
			        data: {event:"begin",TransactionType: trnstype,Comment: cmnt, Status: sttus},
			        type: 'post',
			        success: function(output) {
			             if(output.length==32)
			            	 {
			            	 trid=output;
			            	 WCogent.TransactionID=trid;
			            	 
			            	 
			            	 }
			             else{this.Status="fail"}
			                 
			        }
					
			        ,
			        error:function(err){
			        	
			            }
			    });
			 
			},End:function(sttus){
				
				console.log("tr id "+WCogent.TransactionID);
				console.log("tr type "+WCogent.TransactionType);
				console.log("tr comment "+WCogent.Comment);
				console.log("tr comment "+sttus);
				if(this.Status=="fail"){sttus="fail"}
				$.ajax({ 
			    	url: 'TransactionService.php',
			        data: {event:"end",TransactionID:WCogent.TransactionID,TransactionType: WCogent.TransactionType,Comment: WCogent.Comment, Status: sttus},
			        type: 'post',
			        success: function(output) {
			                 
			                 },
			        error:function(err){
			        	
			            }
			    });
			}
			}

var CurrentPage  = window.location.href;
$(document).ready(function(){
referrer=document.referrer;	
	
}
);
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
	time = (aftrload - beforeload) / 1000.000
	PageLoadTime=time;
	
	}
	});

$(window).bind('beforeunload',function() {
    end =new Date().getTime();
    
    TimeSpent=(((end-aftrload)-AwayTime)/1000)
    
    $.ajax({ 
    	url: 'PerformaceService.php',
        data: {CurrentPage: CurrentPage,Country: Country, TimeSpent: TimeSpent,PageLoadTime: PageLoadTime,City: City,referrer : referrer},
        type: 'post',
        success: function(output) {
           //  alert(output);      
                 },
        error:function(err){
        	
            }
    });
    
  });
 
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



function SendClick(){
	
	/*$.ajax({ 
	url: 'sample.php',
    data: {clickType: clickType,clickContent:clickContent},
    type: 'post',
    success: function(output) {
                 alert(JSON.stringify(output));
             },
    error:function(err){
				alert(JSON.stringify(err));
        }
});
	*/
	
	var data = '{"action":"'+clickContent+'"}'; 
	
	
	$.ajax({ url: 'Service.php',
		type: "POST", 
		
		data: {clickType: clickType,clickContent:clickContent,ClickComment:ClickComment,CurrentPage : window.location.href,EntryTime:new Date().getTime(),Country : Country,City :City},
         success: function(output) {
        	// alert(output);
                 },
		error:function(error){}
});
	
	/*$.ajax({ url: 'sample.php',
        data: {action: 'test'},
        type: 'post',
        success: function(output) {
                     alert(JSON.stringify(output));
                 }
});*/
	}
