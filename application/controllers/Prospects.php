<?php
class Prospects extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function edit(){
        $this->twig->display('sales/prospects/edit',array(
            'menus'=>getmenus($this->user->getcurrentgroup()),
            'user'=>$this->user->get($this->session->userdata('user_id')),
            'groups'=>$this->user->groups($this->session->userdata('user_id')),
            'currentgroup'=>$this->user->getcurrentgroup()
        ));
    }
    function index(){
        $totalrows = $this->client->totalrows();
        $this->twig->display('sales/prospects/index', array(
            'objs'=>$this->client->gets(getsegment(),4),
            'totalrows'=>$totalrows,
            'links'=>getpaginationlink('/prospects/index',$totalrows),
            'menus'=>getmenus($this->user->getcurrentgroup()),
            'user'=>$this->user->get($this->session->userdata('user_id')),
            'groups'=>$this->user->groups($this->session->userdata('user_id')),
            'currentgroup'=>$this->user->getcurrentgroup()
        ));
    }
    function installadd(){
        $this->twig->display('sales/prospects/installadd', array(
            'menus'=>getmenus($this->user->getcurrentgroup()),
            'user'=>$this->user->get($this->session->userdata('user_id')),
            'groups'=>$this->user->groups($this->session->userdata('user_id')),
            'currentgroup'=>$this->user->getcurrentgroup()
        ));
    }
    function report(){
        $this->twig->display('sales/prospects/report/report',array(
            'user'=>$this->user->get($this->session->userdata('user_id')),
            'groups'=>$this->user->groups($this->session->userdata('user_id')),
            'currentgroup'=>$this->user->getcurrentgroup()
        ));
    }
}