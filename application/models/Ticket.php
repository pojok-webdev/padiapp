<?php
class Ticket extends CI_Model{
    var $name,$address;
    function __construct(){
        parent::__construct();
    }
    function gets($offset,$segment){
        $sql = "select a.kdticket,a.clientname,a.location,a.subject from tickets a ";
        $sql.= "limit " . $offset . " , " . $segment . " ";
        $ci = & get_instance();
        $qry = $ci->db->query($sql);
        return $qry->result();
    }
    function totalrows(){
        $sql ="select id from tickets ";
        $ci = & get_instance();
        $qry = $ci->db->query($sql);
        return $qry->num_rows();
    }
}