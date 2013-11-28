<?php

Class professional_qualifications extends CI_Model
{

	private $id;
	private $name;
	private $awarding_body;
	private $year_obtained;
	private $result;
	private $idSector;
	private $idJobSeeker;
	


	function __construct($idPQ = null)
	{
		if ($idPQ == null)
		{
			$this->id = 0;

		}
		else 
		{
			$this->id = $idPQ;
			
			$this -> db -> select('name, awarding_body, year_obtained, result, idSector, idJobSeeker');
		    $this -> db -> from('professional_qualifications');
		    $this -> db -> where('idProfessionalQualifications', $idPQ);
		    
		
		    $query = $this -> db -> get();
		 
		    if($query -> num_rows() == 1)
		    {
		      $row = $query->row();
			  
			  $this->name = $row->name;
			  $this->awarding_body = $row->awarding_body;
			  $this->year_obtained = $row->year_obtained;
			  $this->result = $row->result;
			  $this->idSector = $row->idSector;
			  $this->idJobSeeker = $row->idJobSeeker;
		    }
			
		}


	} // Constructor
	
	function getId()
	{
		return $this->id;
	} // getId()
	
	function getName()
	{
		return $this->name;
	} //getName()
	
		
    function getYear_obtained()
    {
      return $this->year_obtained;
    } // getYear_obtained()


    function getResult()
    {
      return $this->result;
    } // getResult()

			
 	function getIdSector()
    {
      return $this->idSector;
    } // getIdSector()


	 function getIdJobSeeker()
    {
      return $this->idJobSeeker;
    } // getIdJobSeeker()


	 function getAwarding_body()
    {
      return $this->awarding_body;
    } // getAwarding_body()



	
	
	function SelectAll()
	{
		$this -> db -> select('idProfessionalQualifications,name, awarding_body, year_obtained, result, idSector, idJobSeeker');
		$this -> db -> from('professional_qualifications');
	    $query = $this -> db -> get();

	    return $query->result();
		

	}
	
	function SelectAllFromIdJobSeeker($idJobSeeker)
	{
		$this -> db -> select('idProfessionalQualifications, name, awarding_body, year_obtained, result, idSector, idJobSeeker');
		$this -> db -> from('professional_qualifications');
		$this -> db -> where('idJobSeeker', $idJobSeeker);
	    $query = $this -> db -> get();

	    return $query->result();
	}
	
	
/******************************* INSERT FUNCTIONS ******************************************/

	function Insert(
	 $name,
	 $awarding_body,
	 $year_obtained,
	 $result,
	 $idSector,
	 $idJobSeeker)
	{

		
		$data = array( 'name'=> $name, 'awarding_body' => $awarding_body 
		,'year_obtained' =>$year_obtained , 'result'=> $result,
		'idSector' => $idSector, 'idJobSeeker'=> $idJobSeeker);
		$this -> db -> insert('professional_qualifications', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return $this->db->insert_id();
		}
		else return -1;
	}	

/***************************** DELETE FUNCTIONS ******************************************/

	function Delete($id)
	{
		$this-> db -> delete('professional_qualifications', array('idProfessionalQualifications' => $id));
		return $this->db->affected_rows();
	}
	
}	


?>

	
