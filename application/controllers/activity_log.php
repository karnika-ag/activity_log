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
   
   public function insert()
   {      
        $userid=$this->input->post('userid');
        $targetid=$this->input->post('targetid');
        $eventid=$this->input->post('eventid');
        echo $this->activity_log_model->activity_db_insert($userid,$targetid,$eventid);  
   }


    public function fetch()
    {
        $userid=$this->input->post('userid');
        $targetid=$this->input->post('targetid');
        if(!empty($userid))
            echo $this->activity_log_model->activity_db_fetch($userid,$targetid);
        else
            echo json_encode("0");
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