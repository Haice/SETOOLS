<?php

Class job_title extends CI_Model
{

	private $id;
	private $name;
	private $idSector;

    

	
	function __construct($idJobTitle = null)
	{
		if ($idJobTitle == null)
		{
			$this->id = 0;
			
		}
		else 
		{
			$this->id = $idJobTitle;
			
			$this -> db -> select('idJobTitle, name, idSector');
		    $this -> db -> from('job_title'); 
		    $this -> db -> where('idJobTitle', $idJobTitle);
			
		   	$query = $this -> db -> get();
		 
		    if($query -> num_rows() == 1)
		    {
		      	$row = $query->row();
			  
				
				$this->name = $row->name;
				$this->idSector= $row->idSector;
				
		    }
		}


	} // Constructor
	
	function getId()
	{
		return $this->id;
	} // getId()

  	function getIdSector()
    {
      return $this->idSector;
    } // getIdSector()


 	function getName()
    {
      return $this->name;
    } // getName()


	function getAllJobTitlesFromIdSector($idSector)
	{
		
		$this -> db -> select('idJobTitle, name, idSector');
	    $this -> db -> from('job_title'); 
	    $this -> db -> where('idSector', $idSector);

	    $query = $this -> db -> get();

	    return $query->result();
	}
	
	function getAllJobTitles()
	{
		
		$this -> db -> select('idJobTitle, name, idSector');
	    $this -> db -> from('job_title');
		
	    $query = $this -> db -> get();

	    return $query->result();
	}
	
/******************************* INSERT FUNCTIONS ******************************************/

	function Insert(
	 $name,
	 $idSector)
	{

		$data = array( 'name'=> $name, 'idSector' =>$idSector);
		$tryInsert = $this -> db -> insert('job_title', $data);
		
		return ($this->db->affected_rows() > 0 && $tryInsert)? $this->db->insert_id() : -1;
	}		

/***************************** DELETE FUNCTIONS ******************************************/

	function Delete($id)
	{
		$this-> db -> delete('job_title', array('idJobTitle' => $id));
		return $this->db->affected_rows();
	}

}
?>
