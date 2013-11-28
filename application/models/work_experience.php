<?php

Class work_experience extends CI_Model
{

	private $id;
	private $position_name;
	private $start_date;
	private $end_date;
	private $name_of_organisation;
	private $organisation_location;
	private $key_duties;
	private $idJobSeeker;
	private $idJobTitle;
	
	function __construct($idWorkExperience = null)
	{
		if ($idWorkExperience == null)
		{
			$this->id = 0;
			
		}
		else 
		{
			$this->id = $idWorkExperience;
			
			$this -> db -> select('idWorkExperience, position_name, start_date, end_date, name_of_organisation, 
			organisation_location, key_duties, idJobSeeker, idJobTitle');
		    $this -> db -> from('work_experience'); 
		    $this -> db -> where('idWorkExperience', $idWorkExperience);
		    
		
		   $query = $this -> db -> get();
		 
		    if($query -> num_rows() == 1)
		    {
		      	$row = $query->row();
			  
				$this->position_name = $row->position_name;
				$this->start_date = $row->start_date;
				$this->end_date= $row->end_date;
				$this->name_of_organisation= $row->name_of_organisation;
				$this->organisation_location= $row->organisation_location;
				$this->key_duties= $row->key_duties;
				$this->idJobSeeker= $row->idJobSeeker;
				$this->idJobTitle= $row->idJobTitle;
			
		    }
		}


	} // Constructor
	
	function getId()
	{
		return $this->id;
	} // getId()



 	function getPosition_name()
    {
      return $this->position_name;
    } // getPosition_name()


 	function getStart_date()
    {
      return $this->start_date;
    } // getStart_date()




 	function getEnd_date()
    {
      return $this->end_date;
    } // getEnd_date()


 	function getName_of_organisation()
    {
      return $this->name_of_organisation;
    } // getName_of_organisation()




 	function getOrganisation_location()
    {
      return $this->organisation_location;
    } // getOrganisation_location()


 	function getKey_duties()
    {
      return $this->key_duties;
    } // getKey_duties()


    function getIdJobSeeker()
    {
      return $this->idJobSeeker;
    } // getIdJobSeeker()



	 function getIdJobTitle()
    {
      return $this->idJobTitle;
    } // getIdJobTitle()

	function getAllWorkExperiencesFromIdJobSeeker($idJobSeeker)
	{
		
		$this -> db -> select('idWorkExperience, position_name, start_date, end_date, name_of_organisation, 
		organisation_location, key_duties, idJobSeeker, idJobTitle');
	    $this -> db -> from('work_experience'); 
	    $this -> db -> where('idJobSeeker', $idJobSeeker);	

	    $query = $this -> db -> get();

	    return $query->result();
			
		
	}
	
/******************************* INSERT FUNCTIONS ******************************************/

	function Insert(
	 $position_name,
	 $start_date,
	 $end_date,
	 $name_of_organisation,
	 $organisation_location,
	 $key_duties,
	 $idJobSeeker,
	 $idJobTitle)
	{		
		$data = array( 'position_name'=> $position_name, 'start_date' =>$start_date , 'end_date'=> $end_date,
		'name_of_organisation' => $name_of_organisation, 'organisation_location'=> $organisation_location
		, 'key_duties'=> $key_duties,'idJobSeeker' => $idJobSeeker, 'idJobTitle'=> $idJobTitle);
		$this -> db -> insert('work_experience', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return $this->db->insert_id();
		}
		else return -1;
	}	
	
/***************************** DELETE FUNCTIONS ******************************************/

	function Delete($id)
	{
		$this-> db -> delete('work_experience', array('idWorkExperience' => $id));
		return $this->db->affected_rows();
	}
		
}
?>
