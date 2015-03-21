	<h1>RECENT ACTIVITY DETAILS</h1>
	<!--<?php 
             echo form_open('activity_log/todo');{ ?>

	 		 	USER_ID: <input type="textbox" name="user_id" id="user_id"></br></br></br>
	 		 	TARGET_ID: <input type="textbox" name="target_id" id="target_id"></br></br></br>
	 		 	EVENT_OCC: <input type="textbox" name="event_occ" id="event_id"></br></br></br>
	 		 	<select name="work" width="50">
					<option name="fetch">Fetch</option>
					<option name="insert">Insert</option>
				</select></br></br></br>

				<!--<input type="submit" name="Submit" value="submit" id="submit">
                   <?php echo form_close(); }?>-->
			
       <?php   
          
            
             $userid=122;
             $targetid=822123;
             $eventid=2;
             $val=" ";

          
            ?>
    		 <ul>
    		    <li><?php echo anchor('activity_log/fetch/'.$userid.$val.$targetid,'FETCH_DATA')?></li>
                <li><?php echo anchor('activity_log/insert/'.$userid.$val.$targetid.$val.$eventid,'INSERT_DATA')?></li>                                        
             </ul>