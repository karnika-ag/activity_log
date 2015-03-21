<?php

class activity_log extends CI_CONTROLLER
{

  public function __construct() {
        parent::__construct();
        $this->load->model('activity_log_model');
    }

    public function index()
    {
        $this->home();
    }

    public function home()
    {
        $data="";
        $this->_render_page('activity_log/index', $data);
    }

     public function todo()
    {
        if(isset($_POST['Submit']))
         {
             $work=$_POST['work'] ;

            if($work=="Fetch")
            {
                $userid= $_POST['user_id'];
                $res= $this->activity_log_model->activity_db_fetch($userid);    
                $data['result']=$res;
                $this->_render_page('activity_log/fetchdata', $data);
            }
            else
            {
                 $userid=$_POST['user_id'];
                 $targetid=$_POST['target_id'];
                 $event=$_POST['event_occ'];
                 $res= $this->activity_log_model->activity_db_insert($userid,$targetid,$event);  
                 $data['result']=$res;
                 $this->_render_page('activity_log/insertdata', $data);
            } 
        }    
    }


function _render_page($view, $data=null, $render=false)
{
        //$this->load->view($view, $data);
    $view_html = array(
        $this->load->view('activity_log/header', $data, $render),
        $this->load->view($view, $data, $render),
        $this->load->view('activity_log/footer', $data, $render)
        );
    if (!$render) return $view_html;
}

}