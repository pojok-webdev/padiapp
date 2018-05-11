<?php 
class btstower extends CI_Model{
    function __consctruct(){
        parent::__consctruct();
    }
    function get(){
        $sql = "select a.id,a.name,a.location,a.description,b.name branch, count(c.id)apcount,count(d.client_site_id)clcount from btstowers a ";
        $sql.= "left outer join branches b on b.id=a.branch_id ";
        $sql.= "left outer join aps c on c.btstower_id = a.id ";
        $sql.= "left outer join aps_client_sites d on d.ap_id=c.id ";
        $sql.= "group by a.id,a.name,a.location,a.description,b.name ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),
            'tot'=>$que->num_rows()
        );
    }
    function getap($btsid){
        $sql = "select a.id,a.name,a.ipaddr,a.description,count(c.client_site_id) clcount  ";
        $sql.= "from aps a ";
        $sql.= "left outer join btstowers b on b.id=a.btstower_id ";
        $sql.= "left outer join aps_client_sites c on c.ap_id=a.id ";
        $sql.= "where b.id = " . $btsid . " ";
        $sql.= "group by a.id,a.name,a.ipaddr,a.description ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return array(
            'res'=>$que->result(),
            'tot'=>$que->num_rows()
        );        
    }
}