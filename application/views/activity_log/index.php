<div class="notification-container fap-edit-alert hidden-print" style="display: none">
		<span class='message'>
     	</span>
</div>



 <h1>RECENT ACTIVITY DETAILS</h1>
    <br>
	USER_ID:   <input type="text" name="user_id" id="user_id"></br></br>
	TARGET_ID: <input type="text" name="target_id" id="target_id"></br></br>
	EVENT_OCC: <input type="textbox" name="event_occ" id="event_id"></br></br>
	         
    <button type="button" class="btn btn-info btn-fetch" id="sub1" > <span class="glyphicon glyphicon-refresh"></span> FETCH_INFO </button><br><br>
    <button type="button" class="btn btn-success btn-insert" id="sub2" > <span class="glyphicon glyphicon-refresh"></span> INSERT </button><br><br>
    <div id="div1"></div>		
  <script>
 
	$(document).ready(function(){
	    $("#sub1").click(function(){
	    	var user_id = $("input#user_id").val();
            var target_id = $("input#target_id").val();

	        $.ajax({
	        	url: "index.php/activity_log/fetch", 
	        	type: "POST",
                data: {'userid': user_id, 'targetid': target_id},
	        	success: function(data){
	        		data = JSON.parse(data);
	        		console.log("success");
	                  if( data[0].errorid == 0 )
						{
							console.log("error in fetching");
							showAlert(data[0].message);
						}
						else
						{
							var content;
							if(target_id)
							content="<h2>Recent activity done by "+data[0].source_id+" on target "+target_id+"</h2>";
						    else
						    content="<h2>Recent activity done by "+data[0].source_id+"</h2>";	

							content+='<table class="table table-hover table-condensed table-bordered"><tbody><thead><tr><th>id</th><th>source_id</th><th>target_id</th><th>event_id</th><th>date_time</th></tr></thead>';
							for(var i = 0; i < data.length; i++)
							{
							content+="<tr><td>"+data[i].id+"</td><td>"+data[i].source_id+"</td><td>"+data[i].target_id+"</td><td>"+data[i].event_id+"</td><td>"+data[i].date_time+"</td></tr>";	
							}
							content+="</tbody></table>";
							$('#div1').html(content);
						}
	            },
	            error: function (jqXHR, textStatus, errorThrown)
				{		
					console.log("not good");
					showAlert("Some Error occured! Please reload/refresh the page and try again.");
					return false;
				}
	      });
	    });
        $("#sub2").click(function(){
	    	var user_id = $("input#user_id").val();
            var target_id = $("input#target_id").val();
            var event_id= $("input#event_id").val();
	        $.ajax({
	        	url: "index.php/activity_log/insert", 
	        	type: "POST",
                data: {'userid': user_id, 'targetid': target_id, 'eventid': event_id},
	        	success: function(data){
	        		console.log("success");
	        		if(data==1)
	        		{
                            var content="DATA SUCCESFULLY INSERTED";
                        	$('#div1').html(content);
	        		}
	        		else
	        		{
	        		        var content="DATA NOT INSERTED";
	        		        showAlert(data);
	        		        console.log(data);
                        	$('#div1').html(content);
                        	
	        		}
	        		
	            },
	            error: function (jqXHR, textStatus, errorThrown)
				{		
					console.log("not good");
					showAlert("Some Error occured! Please reload/refresh the page and try again.");
					return false;
				}
	      });
	    });
	});

function showAlert( message )
{
	$('.fap-edit-alert .message').html( message );
	$('.fap-edit-alert').show();
}


  </script>  	