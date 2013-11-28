<?php

Class search extends CI_Model
{

	
	function __construct(){} // Constructor
	
/*****************************************************************************************/	
	// Search for an Employer
	
	function FindEmployersFromOrganisationName($orgname)
	{
		$this->db -> select('idEmployer, first_name, last_name, organisation_name, sector, town,address1,
		 address2, postcode, email, phone_number, fax');
	    $this -> db -> from('employer'); 
	    $this -> db -> like('organisation_name', $orgname);
	    
		
		$query = $this -> db -> get();
		return $query->result(); 
		  
	} // FindEmployersFromOrganisationName()
	
	
	function FindEmployersFromSector($sector)
	{
		$this->db -> select('idEmployer, first_name, last_name, organisation_name, sector, town,address1,
		 address2, postcode, email, phone_number, fax');
	    $this -> db -> from('employer'); 
	    $this -> db -> like('sector', $sector);
	    
		
		$query = $this -> db -> get();
		return $query->result(); 
	} // FindEmployersFromSector()
	
	
	
	
/****************************************************************************************/	
	// Search for Job ads matching criterias, if a criteria is not known, use NULL
	
	function FindJobAdsFromForm($start_date, $end_date, $location, $description, $salary_amount, $salary_type, $educational_level, $years_of_experience, $contract_type)
	{

		$this -> db -> select('idJobAd, start_date, end_date, location, description, salary_amount,salary_type, educational_level, years_of_experience, contract_type, idEmployer');
		$this -> db -> from('job_ad');
		if ($start_date != NULL)
		{
			$this -> db -> where('start_date >=', $start_date);
		}
		if ($end_date != NULL)
		{
			$this -> db -> where('end_date <=', $end_date);
		}
		if ($location != NULL)
		{
			$this -> db -> where('location', $location);
		}
		if ($description != NULL)
		{
			$this -> db -> like('description', $description);
		}
		if ($salary_amount != NULL)
		{
			$this -> db -> where('salary_amount >=' , $salary_amount);
		}
		if ($salary_type != NULL)
		{
			$this -> db -> where('salary_type' , $salary_type);
		}
		if ($educational_level != NULL)
		{
			$this -> db -> where('educational_level' , $educational_level);
		}
		if ($years_of_experience != NULL)
		{
			$this -> db -> where('years_of_experience', $years_of_experience);
		}
		if ($contract_type != NULL)
		{
			$this -> db -> where ('contract_type', $contract_type);
		}
		
	    $query = $this -> db -> get();

	    return $query->result();
		
	}
	
	
/****************************************************************************************/	
	// Search for a JobSeeker

	function FindJobSeekersFromJobPreference($jobname)
	{
		$this -> db -> select('job_seeker.idJobSeeker, username, title, first_name, last_name, 
		date_of_birth,address1, address2, town, postcode, country, email, phone_number, eligibility_to_work, description');
		$this -> db -> from('job_seeker');
		$this -> db -> join('job_preference', 'job_preference.idJobSeeker = job_seeker.idJobSeeker');
		$this -> db -> join('job_title', 'job_preference.idJobTitle = job_title.idJobTitle');
		$this -> db -> like('name', $jobname);
	    $query = $this -> db -> get();

	    
	    return $query->result();
		
		
	}	// FindJobSeekerFromJobPreference()

	
	
		
}
?>
