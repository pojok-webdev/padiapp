<?php
class Main extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        redirect ('main/login');
    }
    function login(){
        $this->twig->display('login/login', []);
    }
    function logout(){
        redirect ('main/login');
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