<?php
Class Member Extends CI_Model {
	
	function addMember($first, $middle, $last, $birth, $address, $phone, $school, $grade, $email, $church, $p1, $p2, $pc1, $pc2, $points){
		$this->db->set('first', $first);
		$this->db->set('middle', $middle);
		$this->db->set('last', $last);
		$this->db->set('dateOfBirth', $birth);
		$this->db->set('address', $address);
		$this->db->set('phone', $phone);
		$this->db->set('school', $school);
		$this->db->set('grade', $grade);
		$this->db->set('email', $email);
		$this->db->set('church', $church);
		$this->db->set('parent1', $p1);
		$this->db->set('parent2', $p2);
		$this->db->set('parent1Contact', $pc1);
		$this->db->set('parent2Contact', $pc2);
		$this->db->set('points', $points);
		
		if($this->db->insert('clients')){
			return true;
		}

		return false;
	}

	function getAllMembers(){
    	$query = $this->db->get('clients');

	    if (!$query->num_rows() > 0) {
	        die("There are no students in the database.");
	    }

    	return $query->result();	
	}

	function getMemberById($id){
		$this->db->where('id', $id);

		$query = $this->db->get('clients');

		return $query->result();
	}

	
}
?>