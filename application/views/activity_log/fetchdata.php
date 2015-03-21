    
<div class="container">
    <h2>Recent activity done by <?php echo $_POST['user_id'] ?></h2>


	 	<!--		<table align="center" border="1" style="margin-left: 330px; margin-top: 22px;">
	 		<thead>	<tr>
	 			<th>id</th>
	 			<th style="width: 132px;padding-left:10px;">source_id</th>
                <th style="width: 132px;padding-left:10px;">target_id</th>
                <th style="width: 132px;padding-left:10px;">event_id</th>
                <th style="width: 132px;padding-left:10px;">date_time</th>
	 			</tr></thead>
	 	-->
	 	        <table class="table table-hover table-condensed table-bordered">
	 	        <thead>
	 	        <tr>
	 	        <th>id</th>
	 	        <th>source_id</th>
	 	        <th>target_id</th>
	 	        <th>event_id</th>
	 	        <th>date_time</th>
	 	        </tr>
	 	        </thead>		
	 			<tbody>
	 			<?php foreach($result as $index => $ress): ?>
	 			<tr><td><?php echo $ress->id; ?></td>
	 			<td><?php echo $ress->source_id; ?></td>
	 			<td><?php echo $ress->target_id; ?></td>
	 			<td><?php echo $ress->event_id; ?></td>
	 			<td><?php echo $ress->date_time; ?></td></tr>  
                <?php endforeach; ?>
                </tbody>
	 			</table>
</div>
	 <!--	 <?php foreach($res as $index => $ress): ?>
			<div class='fc-event'><?php echo $ress->name; ?> </div>
			<?php endforeach; ?>


			<td><?echo $row['source_id']; ?></td>
	 			<td><?echo $row['target_id']; ?></td>
	 			<td><?echo $row['event_id']; ?></td>
	 			<td><?echo $row['date_time']; ?></td></tr>  -->