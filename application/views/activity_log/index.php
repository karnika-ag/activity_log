
 <h1>RECENT ACTIVITY DETAILS</h1>
    <br>
	USER_ID:   <input type="text" name="user_id" id="user_id"></br></br>
	TARGET_ID: <input type="text" name="target_id" id="target_id"></br></br>
	EVENT_OCC: <input type="textbox" name="event_occ" id="event_id"></br></br>
	         
    <button type="button" class="btn btn-info btn-fetch" id="sub1" > <span class="glyphicon glyphicon-refresh"></span> FETCH_INFO </button><br><br>
    <button type="button" class="btn btn-success btn-insert" id="sub2" > <span class="glyphicon glyphicon-refresh"></span> INSERT </button><br><br>
    <div id="div1"></div>		
  <script>
  function printfun(result)
  {

  }
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
	                  if(data== 0 )
						{
							console.log("error in fetching");
					//		showAlert("Some Error occured in fetching Facultys! Please reload/refresh the page and try again.");
						}
						else
						{
							var content="<h2>Recent activity done by"+data[0].source_id+"</h2>";
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
					return false;
				}
	      });
	    });
	});
  </script>  	