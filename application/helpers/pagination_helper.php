<?php
function getpaginationlink($baseurl,$totalrows){
    $config['base_url'] = $baseurl;
    $config['total_rows'] = $totalrows;
    $config['per_page'] = 4;
    $config['attributes'] = array('class' => 'pagination');
    $config['display_pages'] = TRUE;
    $config['full_tag_open'] = '<div>';
    $config['full_tag_close'] = '</div>';
    $config['cur_tag_open'] = '<a class="pagination cur">';
    $config['cur_tag_close'] = '</a>';
    $config['prev_link'] = '<i class="icon-double-angle-left"></i>';
    $config['next_link'] = '<i class="icon-double-angle-right"></i>';
    $ci = & get_instance();
    $ci->pagination->initialize($config);
    return $ci->pagination->create_links();
}
function getsegment(){
    $ci = & get_instance();
    if($ci->uri->total_segments()<3){
        $segment = 0;
    }else{
        $segment = $ci->uri->segment(3);
    }
    return $segment;
}