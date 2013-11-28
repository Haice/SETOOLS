<?php

Class sector extends CI_Model
{

	private $id;
	private $name;

	function __construct($idsector = null)
	{
		if ($idsector == null)
		{
			$this->id = 0;
			$this->name = "N/A";
		}
		else 
		{
			$this->id = $idsector;
			
			$this -> db -> select('name');
		    $this -> db -> from('sector');
		    $this -> db -> where('idSector', $idsector);
		    
		
		    $query = $this -> db -> get();
		 
		    if($query -> num_rows() == 1)
		    {
		      $res = $query->row();
			  $this->name = $res->name;
		    }
			else $this->name = "N/A";
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
	
	function SelectAll()
	{
		$this -> db -> select('idSector, name');
	    $this -> db -> from('sector');
	    $query = $this -> db -> get();

	    return $query->result();
		
		//To retrieve the elements, you can write $results = $Sector->SelectAll() then access
		// for each $results as $res : $res->idSector or $res->name...
	}
	

/******************************* INSERT FUNCTIONS ******************************************/

	function Insert($name)
	 {

		$data = array( 'name'=> $name);
		$this -> db -> insert('sector', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return $this->db->insert_id();
		}
		else return -1;
	}	


/***************************** DELETE FUNCTIONS ******************************************/

	function Delete($id)
	{
		$this-> db -> delete('sector', array('idSector' => $id));
		return $this->db->affected_rows();
	}
	
}
?>
