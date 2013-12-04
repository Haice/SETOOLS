/**
 * @author Oloruntoba Ojo
 */
$(document).ready(function()
{
	// initialize Datatable
	$('.datatable').dataTable(
		{"sDom": "",
		 "bSort": false,
		 "oLanguage": {"sEmptyTable": "No Records Found in the Zont Database"}
    });
    // Handle Work Experience
    $('.addExperience').click(function(e){
		e.preventDefault();
		$('#add_experience').modal('show');
	});
	$('.delExperience').click(function(e){
		e.preventDefault();
		var ID = $(this).attr('id');
		window.location.href = 'deleteExperience/'+ID;
	});
	//Handle Educational Records
	$('.addEducation').click(function(e){
		e.preventDefault();
		$('#add_education').modal('show');
	});
	$('.delEducation').click(function(e){
		e.preventDefault();
		var ID = $(this).attr('id');
		window.location.href = 'deleteEducation/'+ID;
	});
	// Handle Professional Qualifications
	$('.addQualification').click(function(e){
		e.preventDefault();
		$('#add_qualification').modal('show');
	});
	$('.delQualification').click(function(e){
		e.preventDefault();
		var ID = $(this).attr('id');
		window.location.href = 'deleteQualification/'+ID;
	});
	// Handle Professional Skills
	$('.addSkill').click(function(e){
		e.preventDefault();
		$('#add_skill').modal('show');
	});
	$('.delSkill').click(function(e){
		e.preventDefault();
		var ID = $(this).attr('id');
		window.location.href = 'deleteSkill/'+ID;
	});
	// Handle Referee Details
	$('.addReferee').click(function(e){
		e.preventDefault();
		$('#add_referee').modal('show');
	});
	$('.delReferee').click(function(e){
		e.preventDefault();
		var ID = $(this).attr('id');
		window.location.href = 'deleteReferee/'+ID;
	});
});