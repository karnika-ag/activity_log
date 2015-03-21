<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class activity_log_model extends CI_Model {

	

    public function activity_db_fetch($userid) {

        $db_register = $this->db;
        $query= $db_register->select('*')
							->from('activity')
	  			     	  	->where(array('source_id' => $userid))
							->get();
	
		    $data=$query->result();
			return $data;	
    }


    public function activity_db_insert($userid,$targetid,$event) {

        $db_register = $this->db;
        $data = array(
         'source_id' => $userid ,
         'target_id' => $targetid ,
         'event_id' => $event
         );
        $query= $db_register->insert('activity',$data);
	    return $query;
		
		
    }

	}
