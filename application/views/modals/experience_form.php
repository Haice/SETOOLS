<div class="modal fade" id="add_experience">
	&nbsp;
	<div class="modalContainer">
		<h3 align="center">Add Work Experience</h3>
		<?php echo form_open('jobseekers/addExperience'); ?>
			<span style="float:left; text-align: right">
				<input type="hidden" name="user_id" value="<?php echo $jobseeker->getId() ?>" />
			 	Organisation Name: <input type="text" name="organisation_name" required /><br /><br />
			 	Job Title: <select style="width: 250px;" name="job_id">
							<option>Select a Title..</option>
								<?php
									foreach ($jobs as $job)
									{
										echo "<option value='$job->idJobTitle'>$job->name</option>";
									}
								?>	
		    			   </select><br /><br />
			 	Date From: <input type="date" name="date_from" /><br /><br />
			</span>
			<span style="float:right; text-align: right">
			 	Organisation Location: <input type="text" name="organisation_location" /><br /><br />
			 	Position Held: <input style="width:250px;" type="text" name="position_held"/><br /><br />
			 	Date To <input type="date" name="date_to" /><br /><br />
			</span>
			<span class="clear" id="section">Job Description/Key Duties</span>
			<textarea name="job_description" rows="7" cols="70" placeholder="Make sure you tell the employer exactly what you did, how you did it and the outcome."></textarea><br />
			<div align="right"><input style="margin: 5px; padding: 4px; width: 100px" type="submit" value="Save" /></div>
		</form>
	</div>
</div>