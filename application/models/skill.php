<?php

Class skill extends CI_Model
{

	private $id;
	private $name;
	private $level;
	private $idJobSeeker;

    

	function __construct($idSkill = null)
	{
		if ($idSkill == null)
		{
			$this->id = 0;
			
		}
		else 
		{
			$this->id = $idSkill;
			
			$this -> db -> select('idSkill, name, level, idJobSeeker');
		    $this -> db -> from('skill'); 
		    $this -> db -> where('idSkill', $idSkill);	
		
		   $query = $this -> db -> get();
		 
		    if($query -> num_rows() == 1)
		    {
		      	$row = $query->row();
			  
				
				$this->name = $row->name;
				$this->level= $row->level;
				$this->idJobSeeker= $row->idJobSeeker;
				
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
    } // getName()

 		
     function getLevel()
    {
      return $this->level;
    } // getLevel()



     function getIdJobSeeker()
    {
      return $this->idJobSeeker;
    } // getIdJobSeeker()



	



    
	
	function getAllSkillsFromIdJobSeeker($idJobSeeker)
	{
		
		$this -> db -> select('idSkill, name, level, idJobSeeker');
	    $this -> db -> from('skill'); 
	    $this -> db -> where('idJobSeeker', $idJobSeeker);	

	    $query = $this -> db -> get();

	    return $query->result();
			
		
	}
	
/******************************* INSERT FUNCTIONS ******************************************/

	function Insert(
		$name,
		$level,
		$idJobSeeker)
	 {

		$data = array( 'name'=> $name, 'level' => $level ,'idJobSeeker' =>$idJobSeeker);
		$this -> db -> insert('skill', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return $this->db->insert_id();
		}
		else return -1;
	}		

/***************************** DELETE FUNCTIONS ******************************************/

	function Delete($id)
	{
		$this-> db -> delete('skill', array('idSkill' => $id));
		return $this->db->affected_rows();
	}

}
?>
