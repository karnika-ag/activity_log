<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class activity_log_model extends CI_Model {

	

    public function activity_db_fetch($userid,$targetid) {

        $db_register = $this->db;

        if(!empty($targetid))
        {
        $query= $db_register->select('*')
							->from('activity')
	  			     	  	->where(array('source_id' => $userid,'target_id' => $targetid))
							->get();
         if($query->num_rows()>0)
                return json_encode($query->result('array'));
            else
                return FALSE;                    
	    }
        else
        {
         $query= $db_register->select('*')
                            ->from('activity')
                            ->where(array('source_id' => $userid))
                            ->get(); 
          if($query->num_rows()>0)
                return json_encode($query->result('array'));
            else
                return FALSE;                      
        }

           
    }


    public function activity_db_insert($userid,$targetid,$event) {

        $db_register = $this->db;
        $data = array(
         'source_id' => $userid ,
         'target_id' => $targetid ,
         'event_id' => $event
         );
        $query= $db_register->insert('activity',$data);

	    if($query)
            return TRUE;
          else
            return FALSE;
		
    }

	}
