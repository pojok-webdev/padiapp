<?php
class Users extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function createpassword(){
        $user = new User();
        echo $user->createpassword();
    }
    function edit(){
        $this->twig->display('admin/users/edit',array(
            'menus'=>getmenus($this->user->getcurrentgroup()),
            'user'=>humanize($this->session->userdata('username')),
            'groups'=>$this->user->groups($this->session->userdata('user_id')),
            'currentgroup'=>$this->user->getcurrentgroup()
        ));
    }
    function index(){
        $totalrows = $this->user->totalrows();
        $this->twig->display('admin/users/index', array(
            'objs'=>$this->user->gets(getsegment(),4),
            'totalrows'=>$totalrows,
            'links'=>getpaginationlink('/users/index',$totalrows),
            'menus'=>getmenus($this->user->getcurrentgroup()),
            'user'=>humanize($this->session->userdata('username')),
            'groups'=>$this->user->groups($this->session->userdata('user_id')),
            'currentgroup'=>$this->user->getcurrentgroup()
        ));
    }
    function setcurrentgroup(){
        $role = $this->uri->segment(3);
        $_SESSION['currentgroup'] = $role;
        switch ($role){
            case 'TS':
                redirect('/tickets');
            break;
            case 'Sales':
                redirect('/surveys');
            break;
            case 'CRO':
                redirect('/surveys');
            break;
            case 'EOS':
                redirect('/tickets');
            break;
            case 'Administrator':
                redirect('/users');
            break;
            case 'Umum dan Warehouse':
                redirect('/master');
            break;
        }
    }
    function getcurrentgroup(){
        echo $_SESSION['currentgroup'];
    }
}