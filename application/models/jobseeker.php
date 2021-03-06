<?php

Class JobSeeker extends CI_Model
{

	private $id;
	private $username;
	private $title;
	private $first_name;
	private $last_name;
	private $date_of_birth;
	private $address1;
	private $address2;
	private $town;
	private $postcode;
	private $country;
	private $email;
	private $phone_number;
	private $eligibility_to_work;
	private $description;
	private $interests;
	
	function __construct($idJobSeeker = null)
	{
		if ($idJobSeeker == null)
		{
			$this->id = 0;
			
		}
		else 
		{
			$this->id = $idJobSeeker;
			
			$this -> db -> select('idJobSeeker, username, title, first_name, last_name, date_of_birth,address1,
			 address2, town, postcode, country, email, phone_number, eligibility_to_work, description, interests');
		    $this -> db -> from('job_seeker'); 
		    $this -> db -> where('idJobSeeker', $idJobSeeker);
		    
		
		   $query = $this -> db -> get();
		 
		    if($query -> num_rows() == 1)
		    {
		      	$row = $query->row();
			  
				$this->username = $row->username;
				$this->title = $row->title;
				$this->first_name= $row->first_name;
				$this->last_name= $row->last_name;
				$this->date_of_birth= $row->date_of_birth;
				$this->address1= $row->address1;
				$this->address2= $row->address2;
				$this->town= $row->town;
				$this->postcode= $row->postcode;
				$this->country= $row->country;
				$this->email= $row->email;
				$this->phone_number= $row->phone_number;
				$this->eligibility_to_work= $row->eligibility_to_work;
				$this->description= $row->description;
				$this->interests= $row->interests;
		    }
		}


	} // Constructor
	
	function getId()
	{
		return $this->id;
	} // getId()

	function getUsername()
    {
      return $this->username;
    } // getUsername()



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


 	function getDate_of_birth()
    {
      return $this->date_of_birth;
    } // getDate_of_birth()



 	function getAddress1()
    {
      return $this->address1;
    } // getAddress1()


 	function getAddress2()
    {
      return $this->address2;
    } // getAddress2()


 	function getTown()
    {
      return $this->town;
    } // getTown()


 	function getPostcode()
    {
      return $this->postcode;
    } // getPostcode()



	 function getCountry()
    {
      return $this->country;
    } // getCountry()


    function getEmail()
    {
      return $this->email;
    } // getEmail()


 	function getPhone_number()
    {
      return $this->phone_number;
    } // getPhone_number()



 	function getEligibility_to_work()
    {
      return $this->eligibility_to_work;
    } // getEligibility_to_work()



 	function getDescription()
    {
      return $this->description;
    } // getDescription()
    
    function getInterests()
    {
      return $this->interests;
    } // getInterests()

	function Login($user, $pass)
	{
		$shaPassword = sha1($pass);
		
		$this -> db -> select('idJobSeeker, username, title, first_name, last_name, 
		date_of_birth,address1, address2, town, postcode, country, email, phone_number, eligibility_to_work, description');
		$this -> db -> from('job_seeker');
		$this -> db -> where('username', $user);
		$this -> db -> where('password', $shaPassword);

	    $query = $this -> db -> get();

	    if($query -> num_rows() == 1)
	    {
	      	return $query->row();
		}
		else return -1;
			
		
	}
	
/******************************* INSERT FUNCTIONS ******************************************/

	function Insert(
	 $username,
	 $password,
	 $title,
	 $first_name,
	 $last_name,
	 $date_of_birth,
	 $address1,
	 $address2,
	 $town,
	 $postcode,
	 $country,
	 $email,
	 $phone_number,
	 $eligibility_to_work,
	 $description)
	{
		$shaPassword = sha1($password);

		
		
		$data = array( 'username'=> $username, 'password' => $shaPassword 
		,'title' =>$title , 'first_name'=> $first_name,
		'last_name' => $last_name, 'date_of_birth'=> $date_of_birth
		, 'address1'=> $address1,'address2' => $address2, 'town'=> $town,
		'postcode' => $postcode,'country'=> $country,'email' => $email, 'phone_number'=> $phone_number,
		'eligibility_to_work' => $eligibility_to_work,'description' => $description);
		
		$tryInsert = $this -> db -> insert('job_seeker', $data);

		return ($this->db->affected_rows() > 0 && $tryInsert)? $this->db->insert_id() : -1;
	}
	
/***************************** DELETE FUNCTIONS ******************************************/

	function Delete($id)
	{
		$this-> db -> delete('job_seeker', array('idJobSeeker' => $id));
		return $this->db->affected_rows();
	}
	
/***************************** UPDATE FUNCTIONS ******************************************/

	function UpdateDescription($id, $data)
	{
		$this->db->where('idJobSeeker', $id);
		$this->db->update('job_seeker', array('description'=> $data));
		
		return $this->db->affected_rows() > 0 ? 1 : -1;
	}

	function UpdateInterest($id, $data)
	{
		$this->db->where('idJobSeeker', $id);
		$this->db->update('job_seeker', array('interests'=> $data));
		
		return $this->db->affected_rows() > 0 ? 1 : -1;
	}
	
	/***** Search Functions *****/
	public function record_count()
	{
        return $this->db->count_all('job_seeker');
    }
	 
	function fetch_jobseekers($limit, $start, $keyword, $purpose)
	{
		if ($purpose == NULL)
			$this->db->limit($limit, $start);
		$this -> db -> select('job_seeker.idJobSeeker, username, title, first_name, last_name, 
		date_of_birth,address1, address2, town, postcode, country, email, phone_number, eligibility_to_work, description');
		$this -> db -> from('job_seeker');
		$this -> db -> join('work_experience', 'work_experience.idJobSeeker = job_seeker.idJobSeeker');
		$this -> db -> join('skill', 'skill.idJobSeeker = job_seeker.idJobSeeker');
		$this -> db -> join('educational_qualification', 'educational_qualification.idJobSeeker = job_seeker.idJobSeeker');
		$this -> db -> join('professional_qualifications', 'professional_qualifications.idJobSeeker = job_seeker.idJobSeeker');
		$this -> db -> like('description', $keyword);
		$this -> db -> or_like('skill.name', $keyword);
		$this -> db -> or_like('interests', $keyword);
		$this -> db -> or_like('town', $keyword);
		$this -> db -> or_like('educational_qualification.course_name', $keyword);
		$this -> db -> or_like('work_experience.position_name', $keyword);
		$this -> db -> or_like('professional_qualifications.name', $keyword);
	    

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
	/****************************/
}

?>