<?php
class Master extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function dashboard(){
        $this->twig->display('master/master_1/dashboard');
    }
    function index(){
        $this->twig->display('master/master_1/index');
    }
}