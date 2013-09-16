<?php
Class Checkin Extends CI_Model {
    
    function addCheckIn($id, $type){
        
        $this->db->set('clientId', $id);
        $this->db->set('classType', $type);

        if($this->db->insert('clientCheckIns')){
            return true;
        }

        return false;
    }
}