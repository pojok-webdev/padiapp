<?php
class User extends CI_Model{
    var $auth0client_id = 'KP8LNulC5elIugFvdwH8O7JWa7H5G7AC';
    var $username,$email,$id,$password,$salt;
    function __construct($id = null){
        parent::__construct();
        if($id!=null){
            $this->id = $id;
        }
    }
    function createpassword(){
        $rand = random_string('alnum',10);
        return sha1($rand);
    }
    function getcurrentgroup(){
        if(isset($_SESSION['currentgroup'])){
            return $_SESSION['currentgroup'];
        }
        redirect('/main/login');
    }
    function get($id){
        $sql = "select id,username,email,password,salt from users ";
        $sql.= "where id=".$id." ";
        $ci = & get_instance();
        $qry = $ci->db->query($sql);
        if($qry->num_rows()>0){
            $obj_ = $qry->result();
            $obj = $obj_[0];
            $this->username = $obj->username;
            $this->id = $obj->id;
            $this->email = $obj->email;
            return $this;
        }
        return false;
    }
    function gets($offset,$segment){
        $sql = "select id,username,email,password,salt from users ";
        $sql.= "where active='1' ";
        $sql.= "order by username asc ";
        $sql.= "limit " . $offset . " , " . $segment . " ";
        $ci = & get_instance();
        $qry = $ci->db->query($sql);
        return $qry->result();
    }
    function _groups($userid){
        $sql = "select c.id,c.name,c.description from users a ";
        $sql.= "left outer join groups_users b on b.user_id=a.id ";
        $sql.= "left outer join groups c on c.id=b.group_id ";
        $sql.= "where a.id=".$userid." ";
        $sql.= "order by c.name asc ";
        $ci = & get_instance();
        $qry = $ci->db->query($sql);
        return $qry->result();
    }
    function groups($userid){
        return $this->_groups($userid);
    }
    function totalrows(){
        $sql ="select id from users ";
        $sql.= "where active='1' ";
        $ci = & get_instance();
        $qry = $ci->db->query($sql);
        return $qry->num_rows();
    }}