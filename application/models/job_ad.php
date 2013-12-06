<?php

Class job_ad extends CI_Model
{

	private $id;
	private $start_date;
	private $end_date;
	private $location;
	private $description;
	private $salary_amount;
	private $salary_type;
	private $educational_level;
	private $years_of_experience;
	private $contract_type;
	private $idEmployer;
	private $idJobTitle;

	
	function __construct($idJobAd = null)
	{
		if ($idJobAd == null)
		{
			$this->id = 0;
			
		}
		else 
		{
			$this->id = $idJobAd;
			
			$this -> db -> select('idJobAd, start_date, end_date, location, description, salary_amount,salary_type, educational_level, years_of_experience, contract_type, idEmployer, idJobTitle');
		    $this -> db -> from('job_ad'); 
		    $this -> db -> where('idJobAd', $idJobAd);
		    
		
		   $query = $this -> db -> get();
		 
		    if($query -> num_rows() == 1)
		    {
		      	$row = $query->row();
			  
				$this->start_date = $row->start_date;
				$this->end_date = $row->end_date;
				$this->location= $row->location;
				$this->description= $row->description;
				$this->salary_amount= $row->salary_amount;
				$this->salary_type= $row->salary_type;
				$this->educational_level= $row->educational_level;
				$this->years_of_experience= $row->years_of_experience;
				$this->contract_type= $row->contract_type;
				$this->idEmployer= $row->idEmployer;
				$this->idJobTitle= $row->idJobTitle;
		    }
		}


	} // Constructor
	
	function getId()
	{
		return $this->id;
	} // getId()



 	function getStart_date()
    {
      return $this->start_date;
    } // getStart_date()



	 function getEnd_date()
    {
      return $this->end_date;
    } // getEnd_date()


	 function getLocation()
    {
      return $this->location;
    } // getLocation()




	 function getDescription()
    {
      return $this->description;
    } // getDescription()



	 function getSalary_amount()
    {
      return $this->salary_amount;
    } // getSalary_amount()


 	function getSalary_type()
    {
      return $this->salary_type;
    } // getSalary_type()



    function getEducational_level()
    {
      return $this->educational_level;
    } // getEducational_level()



 	function getYears_of_experience()
    {
      return $this->years_of_experience;
    } // getYears_of_experience()



 	function getContract_type()
    {
      return $this->contract_type;
    } // getContract_type()



    function getIdEmployer()
    {
      return $this->idEmployer;
    } // getIdEmployer()

    function getIdJobTitle()
	{
		return $this->idJobTitle;
	}
    
	
	function SelectAll()
	{
		$this -> db -> select('idJobAd, start_date, end_date, location, description, salary_amount,salary_type, educational_level, years_of_experience, contract_type, idEmployer, idJobTitle');
		$this -> db -> from('job_ad');
	    $query = $this -> db -> get();

	    return $query->result();		
		
	}
	
	function SelectAllFromIdEmployer($idEmployer)
	{
		$this -> db -> select('idJobAd, start_date, end_date, location, description, salary_amount,salary_type, educational_level, years_of_experience, contract_type, idEmployer, idJobTitle');
		$this -> db -> from('job_ad');
		$this -> db -> where('idEmployer', $idEmployer);
		
	    $query = $this -> db -> get();

	    return $query->result();
		
		
	}
	 public function record_count()
	 {
        return $this->db->count_all('job_ad');
     }
 
    public function fetch_jobs($limit, $start, $start_date, $end_date, $location, $description, $salary_amount, $salary_type, $educational_level, $years_of_experience, $contract_type, $job_title, $purpose)
	{
		if ($purpose == NULL)
			$this->db->limit($limit, $start);
		$this -> db -> select('idJobAd, start_date, end_date, location, description, salary_amount,salary_type, educational_level, years_of_experience, contract_type, idEmployer, job_title.name');
		$this -> db -> from('job_ad');
		$this -> db -> join('job_title', 'job_ad.idJobTitle = job_title.idJobTitle');
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
			$this -> db -> like('location', $location);
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
		if ($job_title != NULL)
		{
			$this -> db -> like ('job_title.name', $job_title);
		}
		
	    $query = $this -> db -> get();
		
 		if ($purpose != NULL)
			return $query->num_rows();
		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
     } 
	
/******************************* INSERT FUNCTIONS ******************************************/

	function Insert(
	 $start_date,
	 $end_date,
	 $location,
	 $description,
	 $salary_amount,
	 $salary_type,
	 $educational_level,
	 $years_of_experience,
	 $contract_type,
	 $idEmployer,
	 $idJobTitle)
	{
		$data = array( 'start_date'=> $start_date, 'end_date' =>$end_date , 'location'=> $location,
		'description' => $description, 'salary_amount'=> $salary_amount
		, 'salary_type'=> $salary_type,'educational_level' => $educational_level, 'years_of_experience'=> $years_of_experience,
		'contract_type' => $contract_type,'idEmployer'=> $idEmployer, 'idJobTitle'=> $idJobTitle);
		$this -> db -> insert('job_ad', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return $this->db->insert_id();
		}
		else return -1;
	}	

/***************************** DELETE FUNCTIONS ******************************************/

	function Delete($id)
	{
		$this-> db -> delete('job_ad', array('idJobAd' => $id));
		return $this->db->affected_rows();
	}


}
?>
