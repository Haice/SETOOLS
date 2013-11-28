<?php

Class educational_qualification extends CI_Model
{

	private $id;
	private $type;
	private $course_name;
	private $name_of_institution;
	private $country_of_origin;
	private $start_date;
	private $end_date;
	private $result;
	private $idJobSeeker;




     
	


	function __construct($idEQ = null)
	{
		if ($idEQ == null)
		{
			$this->id = 0;

		}
		else 
		{
			$this->id = $idEQ;
			
			$this -> db -> select('type, course_name, name_of_institution, country_of_origin, start_date, end_date, result, idJobSeeker');
		    $this -> db -> from('educational_qualification');
		    $this -> db -> where('idEducationalQualification', $idEQ);
		    
		
		    $query = $this -> db -> get();
		 
		    if($query -> num_rows() == 1)
		    {
		      	$row = $query->row();
			  
				$this->type = $row->type;
				$this->course_name = $row->course_name;
				$this->name_of_institution= $row->name_of_institution;
				$this->country_of_origin= $row->country_of_origin;
				$this->start_date= $row->start_date;
				$this->end_date= $row->end_date;
				$this->result= $row->result;
				$this->idJobSeeker= $row->idJobSeeker;
		    }
			
		}


	} // Constructor
	
	function getId()
	{
		return $this->id;
	} // getId()
	
	function getIdJobSeeker()
    {
      return $this->idJobSeeker;
    } // getIdJobSeeker()



 	function getResult()
    {
      return $this->result;
    } // getResult()



	 function getEnd_date()
    {
      return $this->end_date;
    } // getEnd_date()



	 function getStart_date()
    {
      return $this->start_date;
    } // getStart_date()



 	function getCountry_of_origin()
    {
      return $this->country_of_origin;
    } // getCountry_of_origin()


	 function getName_of_institution()
    {
      return $this->name_of_institution;
    } // getName_of_institution()


	 function getCourse_name()
    {
      return $this->course_name;
    } // getCourse_name()


	 function getType()
    {
      return $this->type;
    } // getType()

    


	
	
	function SelectAll()
	{
		$this -> db -> select('idEducationalQualification, type, course_name, name_of_institution, country_of_origin, start_date, end_date, result, idJobSeeker');
		$this -> db -> from('educational_qualification');
	    $query = $this -> db -> get();

	    return $query->result();
		

	}
	
	function SelectAllFromIdJobSeeker($idJobSeeker)
	{
		$this -> db -> select('idEducationalQualification, type, course_name, name_of_institution, country_of_origin, start_date, end_date, result, idJobSeeker');
		$this -> db -> from('educational_qualification');
		$this -> db -> where('idJobSeeker', $idJobSeeker);
	    $query = $this -> db -> get();

	    return $query->result();
	}
	
	
	
/******************************* INSERT FUNCTIONS ******************************************/

	function Insert(
	 $type,
	 $course_name,
	 $name_of_institution,
	 $country_of_origin,
	 $start_date,
	 $end_date,
	 $result,
	 $idJobSeeker)
	{
		$data = array( 'type'=> $type, 'course_name' =>$course_name , 'name_of_institution'=> $name_of_institution,
		'country_of_origin' => $country_of_origin, 'start_date'=> $start_date
		, 'end_date'=> $end_date,'result' => $result, 'idJobSeeker'=> $idJobSeeker);
		$this -> db -> insert('educational_qualification', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return $this->db->insert_id();
		}
		else return -1;
	}

/***************************** DELETE FUNCTIONS ******************************************/

	function Delete($id)
	{
		$this-> db -> delete('educational_qualification', array('idEducationalQualification' => $id));
		return $this->db->affected_rows();
	}

	
}	


?>

	
