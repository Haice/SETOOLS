<div class="modal fade" id="add_skill">
	&nbsp;
	<div class="modalContainer">
		<h3 align="center">Add New Skill</h3>
		<?php echo form_open('jobseekers/addSkill'); ?>
			<input type="hidden" name="user_id" value="<?php echo $jobseeker->getId() ?>" />
			Skill Name: <input style="width:500px;" type="text" name="qualification_name" /><br /><br />
			Level: <select name="level">
						<option value="">Choose...</option>
						<option value="Beginner">Beginner</option>
		                <option value="Intermediate">Intermediate</option>
		                <option value="Advanced">Advanced</option>
		                <option value="Expert">Expert</option>
				   </select><br /><br />
			<div class="clear" align="right"><input style="margin: 5px; padding: 4px; width: 100px" type="submit" value="Save" /></div>
		</form>
	</div>
</div>