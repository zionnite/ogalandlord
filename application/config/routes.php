<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['Dashboard']             ='Dashboard/index';
$route['Property']              ='Dashboard/view_property';
$route['Property/add']          ='Dashboard/add_property';
$route['Request']               ='Request/index';
$route['View-Message']          ='Message/view_message';
$route['Connection']            ='Connection/index';
$route['view_property/(:any)']           ='Welcome/view_property/$1';
$route['sess_property']           ='Welcome/sess_property/';
$route['search_property/(:any)']           ='Welcome/search_property/$1';
$route['agent_property/(:any)/(:any)']                   ='Welcome/agent_property/$1/$2';
