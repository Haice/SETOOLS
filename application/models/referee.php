<?php

Class referee extends CI_Model
{

	private $id;
	private $title;
	private $first_name;
	private $last_name;
	private $email;
	private $phone_number;
	private $relationship;
	private $permission_to_contact;
	private $idJobSeeker;

    

	
	function __construct($idReferee = null)
	{
		if ($idReferee == null)
		{
			$this->id = 0;
			
		}
		else 
		{
			$this->id = $idReferee;
			
			$this -> db -> select('idReferee, title, first_name, last_name, email, phone_number,
			 relationship, permission_to_contact, idJobSeeker');
		    $this -> db -> from('referee'); 
		    $this -> db -> where('idReferee', $idReferee);
		    
		
		   $query = $this -> db -> get();
		 
		    if($query -> num_rows() == 1)
		    {
		      	$row = $query->row();
			  
				
				$this->title = $row->title;
				$this->first_name= $row->first_name;
				$this->last_name= $row->last_name;
				$this->email= $row->email;
				$this->phone_number= $row->phone_number;
				$this->relationship= $row->relationship;
				$this->permission_to_contact= $row->permission_to_contact;
				$this->idJobSeeker= $row->idJobSeeker;
		    }
		}


	} // Constructor
	
	function getId()
	{
		return $this->id;
	} // getId()


 	function getTitle()
    {
      return $this->title;
    } // getTitle()




 	function getFirst_name()
    {
      return $this->first_name;
    } // getFirst_name()



 	function getLast_name()
    {
      return $this->last_name;
    } // getLast_name()




    function getEmail()
    {
      return $this->email;
    } // getEmail()


 	function getPhone_number()
    {
      return $this->phone_number;
    } // getPhone_number()


	

 	function getRelationship()
    {
      return $this->relationship;
    } // getRelationship()


 	function getPermission_to_contact()
    {
      return $this->permission_to_contact;
    } // getPermission_to_contact()



 	function getIdJobSeeker()
    {
      return $this->idJobSeeker;
    } // getIdJobSeeker()

 	



    
	
	function getAllRefereesFromIdJobSeeker($idJobSeeker)
	{
		
		$this -> db -> select('idReferee, title, first_name, last_name, email, phone_number,
			 relationship, permission_to_contact, idJobSeeker');
	    $this -> db -> from('referee'); 
	    $this -> db -> where('idJobSeeker', $idJobSeeker);
	    
	
	   $query = $this -> db -> get();

	    return $query->result();
			
		
	}
	
/******************************* INSERT FUNCTIONS ******************************************/

	function Insert(
	 $title,
	 $first_name,
	 $last_name,
	 $email,
	 $phone_number,
	 $relationship,
	 $permission_to_contact,
	 $idJobSeeker)
	{
		
	
		$data = array( 'title'=> $title, 'first_name' =>$first_name , 'last_name'=> $last_name,
		'email' => $email, 'phone_number'=> $phone_number
		, 'relationship'=> $relationship,'permission_to_contact' => $permission_to_contact, 'idJobSeeker'=> $idJobSeeker);
		$this -> db -> insert('referee', $data);
		
		if($this->db->affected_rows() > 0)
		{
			return $this->db->insert_id();
		}
		else return -1;
	}
	

/***************************** DELETE FUNCTIONS ******************************************/

	function Delete($id)
	{
		$this-> db -> delete('referee', array('idReferee' => $id));
		return $this->db->affected_rows();
	}


}
?>
