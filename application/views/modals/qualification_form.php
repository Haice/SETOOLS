<div class="modal fade" id="add_qualification">
	&nbsp;
	<div class="modalContainer">
		<h3 align="center">Add Professional Qualification</h3>
		<?php echo form_open('jobseekers/addQualification'); ?>
			<input type="hidden" name="user_id" value="<?php echo $jobseeker->getId() ?>" />
			Qualification Name: <input style="width:500px;" type="text" name="qualification_name" /><br /><br />
			Awarding Body: <input style="width:525px;" type="text" name="awarded_by"/><br /><br />
			<span style="float:left; text-align: right">
			 	Date Obtained: <input type="date" name="date_obtained" /><br /><br />
			 	Result: <input type="text" name="result" /><br /><br />
			</span>
			<span style="float:right;">
			 	Industry/Sector: <select name="sector">
				<option>Chose a sector..</option>
				<?php
					foreach ($sectors as $sector)
					{
						echo "<option value='$sector->idSector'>$sector->name</option>";
					}
				?>	
		    </select>
			</span>
			<div class="clear" align="right"><input style="margin: 5px; padding: 4px; width: 100px" type="submit" value="Save" /></div>
		</form>
	</div>
</div>