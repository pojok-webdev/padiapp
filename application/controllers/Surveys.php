<?php
class Surveys extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function edit(){
        $this->twig->display('sales/surveys/edit',array(
            'menus'=>getmenus($this->user->getcurrentgroup()),
            'user'=>humanize($this->session->userdata('username')),
            'groups'=>$this->user->groups($this->session->userdata('user_id')),
            'currentgroup'=>$this->user->getcurrentgroup()
        ));
    }
    function index(){
        $totalrows = $this->client->totalrows();
        $this->twig->display('sales/surveys/index', array(
            'objs'=>$this->client->gets(getsegment(),4),
            'totalrows'=>$totalrows,
            'links'=>getpaginationlink('/surveys/index',$totalrows),
            'menus'=>salesmenus(),
            'user'=>humanize($this->session->userdata('username')),
            'groups'=>$this->user->groups($this->session->userdata('user_id')),
            'currentgroup'=>$this->user->getcurrentgroup()
        ));
    }
    function installadd(){
        $this->twig->display('sales/surveys/installadd', array(
            'menus'=>getmenus($this->user->getcurrentgroup()),
            'user'=>humanize($this->session->userdata('username')),
            'groups'=>$this->user->groups($this->session->userdata('user_id')),
            'currentgroup'=>$this->user->getcurrentgroup()
        ));
    }
    function report(){
        $this->twig->display('sales/surveys/report/report',array(
            'menus'=>getmenus($this->user->getcurrentgroup()),
            'user'=>humanize($this->session->userdata('username')),
            'groups'=>$this->user->groups($this->session->userdata('user_id')),
            'currentgroup'=>$this->user->getcurrentgroup()
        ));
    }
}