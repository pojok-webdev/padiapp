<?php
function adminmenus(){
    return array(
        array("name"=>"Dashboard","url"=>"/padiapp/dashboard","class"=>"icon-dashboard"),
        array("name"=>"Users","url"=>"/padiapp/users","class"=>"icon-text-width"),
    );    
}
function tsmenus(){
    return array(
        array("name"=>"Dashboard","url"=>"/padiapp/dashboard","class"=>"icon-dashboard"),
        array("name"=>"Surveys","url"=>"/padiapp/surveys","class"=>"icon-text-width"),
        array("name"=>"Installs","url"=>"/padiapp/installs","class"=>"icon-text-width"),
        array("name"=>"Tickets","url"=>"/padiapp/tickets","class"=>"icon-dashboard"),
        array("name"=>"Troubleshoots","url"=>"/padiapp/troubleshoots","class"=>"icon-dashboard"),
    );
}
function salesmenus(){
    return array(
        array("name"=>"Dashboard","url"=>"/padiapp/dashboard","class"=>"icon-dashboard"),
        array("name"=>"Suspects","url"=>"/padiapp/suspects","class"=>"icon-text-width"),
        array("name"=>"Prospects","url"=>"/padiapp/prospects","class"=>"icon-text-width"),
        array("name"=>"Surveys","url"=>"/padiapp/surveys","class"=>"icon-text-width"),
        array("name"=>"Installs","url"=>"/padiapp/installs","class"=>"icon-text-width"),
    );    
}
function getmenus($role){
    $ci = & get_instance();
    switch ($role){
        case 'TS':
            $menu = tsmenus();
        break;
        case 'Sales':
            $menu = salesmenus();
        break;
        case 'CRO':
            $menu = salesmenus();
        break;
        case 'EOS':
            $menu = tsmenus();
        break;
        case 'Administrator':
            $menu = adminmenus();
        break;
        case 'Umum dan Warehouse':
            $menu = salesmenus();
        break;
    }
    return $menu;
}
