<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {
	public function index()
	{
		$this->load->library('unit_test');

		/********  EDUCATIONAL QUALIFICATION  **************************************/

		$this->load->model('educational_qualification','' , TRUE );

		$this->unit->run($this->educational_qualification->getId(), 0, 'educational_qualification Id init should be 0');

		$educational_qualificationID = $this->educational_qualification->Insert(	 'testtype',
																					 'testcoursename',
																					 'testinstitution',
																					 'testcountryoforigin',
																					 '01/01/2000',
																					 '01/01/2001',
																					 'testresult',
																					 rand(1, 100000));

		$this->unit->run( $educational_qualificationID != -1, TRUE, 'test insert educational_qualification'); 
		$this->unit->run( $this->educational_qualification->delete($educational_qualificationID), 1, 'test delete educational_qualification');

		/********  WORK EXPERIENCE  **************************************/

		$this->load->model('work_experience','' , TRUE );

		$this->unit->run($this->work_experience->getId(), 0, 'work_experience Id init should be 0');

		$work_experienceID = $this->work_experience->Insert(	 'testpositionname',
																 '01/01/2000',
																 '01/01/2001',
																 'testorganisation',
																 'testlocation',
																 'testkeyduties',
																 rand(1, 100000),
																 rand(1, 100000));

		$this->unit->run( $work_experienceID != -1, TRUE, 'test insert work_experience');
		$this->unit->run( $this->work_experience->delete($work_experienceID), 1, 'test delete work_experience');

		/********  EMPLOYER  **************************************/

		$this->load->model('employer','' , TRUE );

		$this->unit->run($this->employer->getId(), 0, 'employer Id init should be 0');

		$employerID = $this->employer->Insert(	 'testfirstname',
													 'testlastname',
													 'testorganisation',
													 'testpassword',
													 'testsector',
													 'testtown',
													 'testaddress1',
													 'testaddress2',
													 'AB1CD2',
													 'test@email.co.uk',
													 '0707070707',
													 '0808080808');

		$this->unit->run( $employerID != -1, TRUE, 'test insert employer');
		$this->unit->run( $this->employer->delete($employerID), 1, 'test delete employer');

		/********  JOB AD  **************************************/

		$this->load->model('job_ad','' , TRUE );

		$this->unit->run($this->job_ad->getId(), 0, 'job_ad Id init should be 0');

		$job_adID = $this->job_ad->Insert(	 '01/01/2000',
												 '01/01/2001',
												 'testlocation',
												 'testdescription',
												 '10000',
												 'testsalarytype',
												 'testeducationallevel',
												 0,
												 'testcontracttype',
												 rand(0, 100000));

		$this->unit->run( $job_adID != -1, TRUE, 'test insert job_ad');
		$this->unit->run( $this->job_ad->delete($job_adID), 1, 'test delete job_ad');


		/********  SECTOR  **************************************/

		$this->load->model('sector','' , TRUE );

		$this->unit->run($this->sector->getId(), 0, 'sector Id init should be 0');

		$sectorID = $this->sector->Insert('testsector');

		$this->unit->run( $sectorID != -1, TRUE, 'test insert sector');
		$this->unit->run( $this->sector->delete($sectorID), 1, 'test delete sector');

		/********  JOB TITLE  **************************************/

		$this->load->model('job_title','' , TRUE );

		$this->unit->run($this->job_title->getId(), 0, 'job_title Id init should be 0');

		$job_titleID = $this->job_title->Insert('testjobtitle',
												 rand(0, 100000));

		$this->unit->run( $job_titleID != -1, TRUE, 'test insert job_title'); 
		$this->unit->run( $this->job_title->delete($job_titleID), 1, 'test delete job_title');


		/******** JOB PREFERENCE ************************************/

		$this->load->model('job_preference', '', TRUE);

		$job_preferenceTITLEID = rand(0, 100000);
		$job_preferenceSEEKERID = rand(0, 100000);

		$this->unit->run($this->job_preference->Insert($job_preferenceTITLEID,
												 $job_preferenceSEEKERID) > 0, TRUE, 'test insert job_preference');
		$this->unit->run( $this->job_preference->delete($job_preferenceTITLEID, $job_preferenceSEEKERID), 1, 'test delete job_preference');

		/********  JOB SEEKER  **************************************/

		$this->load->model('jobseeker','' , TRUE );

		$this->unit->run($this->jobseeker->getId(), 0, 'jobseeker Id init should be 0');

		$jobseekerID = $this->jobseeker->Insert(	 'testusername',
													 'testpassword',
													 'testtitle',
													 'testfirstname',
													 'testlastname',
													 '01/01/2000',
													 'testaddress1',
													 'testaddress2',
													 'testtown',
													 'AB1CD2',
													 'testcountry',
													 'test@email.co.uk',
													 '0707070707',
													 'yes',
													 'testdescription');

		$this->unit->run($jobseekerID != -1, TRUE, 'test insert jobseeker'); 
		$this->unit->run( $this->jobseeker->delete($jobseekerID), 1, 'test delete jobseeker');

		/********  PROFESSIONAL QUALIFICATIONS  **************************************/

		$this->load->model('professional_qualifications','' , TRUE );

		$this->unit->run($this->professional_qualifications->getId(), 0, 'professional_qualifications Id init should be 0');

		$professional_qualificationsID = $this->professional_qualifications->Insert(	 'testprofessionalqualification',
																						 'testawardingbody',
																						 'testyearobtained',
																						 'testresult',
																						 rand(0, 100000),
																						 rand(0, 100000));

		$this->unit->run($professional_qualificationsID != -1, TRUE, 'test insert professional_qualifications');
		$this->unit->run( $this->professional_qualifications->delete($professional_qualificationsID), 1, 'test delete professional_qualifications');



		/******** SKILL  **************************************/

		$this->load->model('skill','' , TRUE );

		$this->unit->run($this->skill->getId(), 0, 'skill Id init should be 0');

		$skillID = $this->skill->Insert(	 'testname',
											 'testlevel',
											 rand(0, 100000));

		$this->unit->run($skillID != -1, TRUE, 'test insert skill');
		$this->unit->run( $this->skill->delete($skillID), 1, 'test delete skill');

		/********  REFEREE  **************************************/

		$this->load->model('referee','' , TRUE );

		$this->unit->run($this->referee->getId(), 0, 'referee Id init should be 0');

		$refereeID = $this->referee->Insert(	 'testtitle',
												 'testfirstname',
												 'testlastname',
												 'test@email.co.uk',
												 '070707070707',
												 'testrelationship',
												 'yes',
												 rand(0,100000));

		$this->unit->run( $refereeID != -1, TRUE, 'test insert referee');
		$this->unit->run( $this->referee->delete($refereeID), 1, 'test delete referee');









		echo $this->unit->report();
		
	}
}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */