<?php

class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $this->twig->display('master/master_1/dashboard',array(
            'menus'=>getmenus($this->user->getcurrentgroup()),
            'user'=>$this->user->get($this->session->userdata('user_id')),
            'groups'=>$this->user->groups($this->session->userdata('user_id')),
            'currentgroup'=>$this->user->getcurrentgroup()
        ));
    }
}