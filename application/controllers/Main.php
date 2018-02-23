<?php
class Main extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function choosegroup(){
        $this->twig->display('login/choosegroup',array(
            'groups'=>$this->user->groups($this->session->userdata('user_id')),
        ));
    }
    function index(){
        redirect ('main/login');
    }
    function login(){
        $this->twig->display('login/login', []);
    }
    function logout(){
        $this->ion_auth->logout();
        redirect ('main/login');
    }
    function profile(){
        $this->twig->display('admin/users/profile', array(
            'menus'=>getmenus($this->user->getcurrentgroup()),
            'user'=>$this->user->get($this->session->userdata('user_id')),
            'groups'=>$this->user->groups($this->session->userdata('user_id')),
            'currentgroup'=>$this->user->getcurrentgroup()
        ));
    }
    function signin(){
        $params = $this->input->post();
        if($this->ion_auth->login($params['email'],$params['password'])){
            echo 'sukses';
        }else{
            echo 'tidak sukses';
        }
    }
}