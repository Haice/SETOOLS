<?php

Class Employer extends CI_Model
{

	private $id;
	private $first_name;
	private $last_name;
	private $organisation_name;
	private $sector;
	private $town;
	private $address1;
	private $address2;
	private $postcode;
	private $email;
	private $phone_number;
	private $fax;
	
	function __construct($idEmployer = null)
	{
		if ($idEmployer == null)
		{
			$this->id = 0;
			
		}
		else 
		{
			$this->id = $idEmployer;
			
			$this -> db -> select('idEmployer, first_name, last_name, organisation_name, sector, town,address1, address2, postcode, email, phone_number, fax');
		    $this -> db -> from('employer'); 
		    $this -> db -> where('idEmployer', $idEmployer);
		    
		
		   $query = $this -> db -> get();
		 
		    if($query -> num_rows() == 1)
		    {
		      	$row = $query->row();
			  
				$this->first_name = $row->first_name;
				$this->last_name = $row->last_name;
				$this->organisation_name= $row->organisation_name;
				$this->sector= $row->sector;
				$this->town= $row->town;
				$this->address1= $row->address1;
				$this->address2= $row->address2;
				$this->postcode= $row->postcode;
				$this->email= $row->email;
				$this->phone_number= $row->phone_number;
				$this->fax= $row->fax;
		    }
		}


	} // Constructor
	
	function getId()
	{
		return $this->id;
	} // getId()
	
	

 	function getFirst_name()
    {
      return $this->first_name;
    } // getFirst_name()



	 function getLast_name()
    {
      return $this->last_name;
    } // getLast_name()


 	function getOrganisation_name()
    {
      return $this->organisation_name;
    } // getOrganisation_name()


 	function getSector()
    {
      return $this->sector;
    } // getSector()

 	function getTown()
    {
      return $this->town;
    } // getTown()


 	function getAddress1()
    {
      return $this->address1;
    } // getAddress1()



 	function getAddress2()
    {
      return $this->address2;
    } // getAddress2()




 	function getPostcode()
    {
      return $this->postcode;
    } // getPostcode()


 	function getEmail()
    {
      return $this->email;
    } // getEmail()



 	function getPhone_number()
    {
      return $this->phone_number;
    } // getPhone_number()



 	function getFax()
    {
      return $this->fax;
    } // getFax()

    
	
	function SelectAll()
	{
		$this -> db -> select('idEmployer, first_name, last_name, organisation_name, sector, town,address1, address2, postcode, email, phone_number, fax');
		$this -> db -> from('employer'); 
	    $query = $this -> db -> get();

	    return $query->result();
		
		
	}
	
	function Login($user, $pass)
	{
		$shaPassword = sha1($pass);
		
		$this -> db -> select('idEmployer, first_name, last_name, organisation_name, sector, town,address1, address2,
		 postcode, email, phone_number, fax');
		$this -> db -> from('employer');
		$this -> db -> where('organisation_name', $user);
		$this -> db -> where('password', $shaPassword);

	    $query = $this -> db -> get();

		return $query -> num_rows() == 1 ? $query->row() : null;
	}
	
/******************************* INSERT FUNCTIONS ******************************************/

	function Insert(
	 $first_name,
	 $last_name,
	 $organisation_name,
	 $password,
	 $sector,
	 $town,
	 $address1,
	 $address2,
	 $postcode,
	 $email,
	 $phone_number,
	 $fax)
	{
		
		$shaPassword = sha1($password);
		
		
		$data = array( 'first_name'=> $first_name, 'last_name' =>$last_name , 'organisation_name'=> $organisation_name,
		'password' => $shaPassword, 'sector'=> $sector
		, 'town'=> $town,'address1' => $address1, 'address2'=> $address2,
		'postcode'=> $postcode,'email' => $email, 'phone_number'=> $phone_number,
		'fax'=> $fax);
		
		$tryInsert = $this -> db -> insert('employer', $data);
		
		return ($this->db->affected_rows() > 0 && $tryInsert)? $this->db->insert_id() : -1;
	}	

/***************************** DELETE FUNCTIONS ******************************************/

	function Delete($id)
	{
		$this-> db -> delete('employer', array('idEmployer' => $id));
		return $this->db->affected_rows();
	}
		
}
?>
