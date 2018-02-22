<?php
class Client extends CI_Model{
    var $name,$address;
    function __construct(){
        parent::__construct();
    }
    function gets($offset,$segment){
        $sql ="select id,name,address,activedate from clients ";
        $sql.= "limit " . $offset . " , " . $segment . " ";
        $ci = & get_instance();
        $qry = $ci->db->query($sql);
        return $qry->result();
    }
    function totalrows(){
        $sql ="select id from clients ";
        $ci = & get_instance();
        $qry = $ci->db->query($sql);
        return $qry->num_rows();
    }
}