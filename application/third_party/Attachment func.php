function Fetch_Candidates($start, $limit, $keyword)
	{

		$this->db->limit($limit, $start);
		$this -> db -> select('job_seeker.idJobSeeker, username, title, first_name, last_name, 
		date_of_birth,address1, address2, town, postcode, country, email, phone_number, eligibility_to_work, description');
		$this -> db -> from('job_seeker');
		$this -> db -> join('work_experience', 'work_experience.idJobSeeker = job_seeker.idJobSeeker');
		$this -> db -> join('skill', 'skill.idJobSeeker = job_seeker.idJobSeeker');
		$this -> db -> join('educational_qualification', 'educational_qualification.idJobSeeker = job_seeker.idJobSeeker');
		$this -> db -> join('professional_qualification', 'professional_qualification.idJobSeeker = job_seeker.idJobSeeker');
		$this -> db -> like('description', $keyword);
		$this -> db -> or_like('skill.name', $keyword);
		$this -> db -> or_like('interests', $keyword);
		$this -> db -> or_like('educational_qualification.course_name', $keyword);
		$this -> db -> or_like('work_experience.position_name', $keyword);
		$this -> db -> or_like('professional_qualification.name', $keyword);
	    

	    $query = $this -> db -> get();
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}