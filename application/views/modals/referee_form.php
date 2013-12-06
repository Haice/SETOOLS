<div class="modal fade" id="add_referee">
	&nbsp;
	<div class="modalContainer">
		<h3 align="center">Add New Referee</h3>
		<?php echo form_open('jobseekers/addReferee'); ?>
			<span style="float:left; text-align: right">
				<input type="hidden" name="user_id" value="<?php echo $jobseeker->getId() ?>" />
				Title: <select style="width:50px;" name="referee_title">
							<option value="Mr.">Mr</option>
						    <option value="Mrs.">Mrs</option>
						    <option value="Miss.">Miss</option>
			    			<option value="Dr.">Dr</option>
			    			<option value="Other">Other</option>	
					   </select><br /><br />
				Last Name: <input style="width:200px;"  type="text" name="referee_lastname" /><br /><br />
				Phone Number: <input style="width:200px;" type="text" name="referee_phone" /><br /><br />
			 	<input type="checkbox" name="referee_permission" value="1"> Permission to Contact
			</span>
			<span style="float:right;text-align: right">
				First Name: <input style="width:200px;" type="text" name="referee_firstname" /><br /><br />
				Email Address: <input style="width:200px;" type="email" name="referee_email" /><br /><br />
			 	Relationship: <input style="width:200px;" type="text" name="referee_relationship" /><br /><br />
			</span>
			<div class="clear" align="right"><input style="margin: 5px; padding: 4px; width: 100px" type="submit" value="Save" /></div>
		</form>
	</div>
</div>