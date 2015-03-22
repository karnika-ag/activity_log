<?php

class activity_log extends CI_CONTROLLER
{

  public function __construct() {
        parent::__construct();
        $this->load->model('activity_log_model');
        $this->lang->load('activity','english');
    }

    public function index()
    {
        $this->home();
    }

    public function home()
    {
       
         $view_html = array(
            $this->load->view('activity_log/header'),
            $this->load->view('activity_log/index'),
            $this->load->view('activity_log/footer')
            );
        return $view_html;
    }
   
   public function insert()
   {      
        $userid=$this->input->post('userid');
        $targetid=$this->input->post('targetid');
        $eventid=$this->input->post('eventid');
        if(empty($userid) || empty($targetid) || empty($eventid))
        {
            echo $this->lang->line('ErrorInvalidParameter')." Userid or Targetid or Eventid is missing";
            return;
        }
        else
        {
        $val=$this->activity_log_model->activity_db_insert($userid,$targetid,$eventid);  
        if($val==TRUE)    
          echo TRUE;
        else
           echo $this->lang->line('ErrorDataInserting'); 
         return;
        }
        
   }


    public function fetch()
    {
        $userid=$this->input->post('userid');
        $targetid=$this->input->post('targetid');
        if(empty($userid))
        {
            
            $status=array();
            $status['errorid']=0;
            $status['message']=$this->lang->line('ErrorInvalidParameter')." Userid is missing";
            $ans[]=array();
            $ans[0]=$status;
            echo json_encode($ans);
            return;
        }
        else
        {
            $val=$this->activity_log_model->activity_db_fetch($userid,$targetid);
            if($val==FALSE)
            {
                $status[]=array();
                $status['errorid']=0;
                $status['message']=$this->lang->line('ErrorDataFetching');
                 $ans[]=array();
                 $ans[0]=$status;
                echo json_encode($ans);
            }
            else
                echo $val;

            return;

        }
        
    }



}