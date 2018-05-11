<?php
class Btses extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('btstower');
    }
    function index(){
        $bts = $this->btstower->get();
        $this->twig->display('admin/btses/index',array(
            'menus'=>getmenus($this->user->getcurrentgroup()),
            'user'=>$this->user->get($this->session->userdata('user_id')),
            'groups'=>$this->user->groups($this->session->userdata('user_id')),
            'objs'=>$bts["res"],
            'totalrows'=>$bts["tot"],
            'currentgroup'=>$this->user->getcurrentgroup(),
            'breadcrumb'=>array(
                array('url'=>'/','name'=>'Home'),
                array('url'=>'/btses','name'=>'BTS'),
                array('url'=>'/btses/index','name'=>'List')
            )
        ));
    }
    function ap(){
        $btsid = $this->uri->segment(3);
        $apbts = $this->btstower->getap($btsid);
        $this->twig->display('admin/btses/aps',array(
            'menus'=>getmenus($this->user->getcurrentgroup()),
            'user'=>$this->user->get($this->session->userdata('user_id')),
            'groups'=>$this->user->groups($this->session->userdata('user_id')),
            'objs'=>$apbts["res"],
            'totalrows'=>$apbts["tot"],
            'currentgroup'=>$this->user->getcurrentgroup(),
            'breadcrumb'=>array(
                array('url'=>'/','name'=>'Home'),
                array('url'=>'/btses','name'=>'BTS'),
                array('url'=>'/btses/aps','name'=>'APs')
            )
        ));
    }
}