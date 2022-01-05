<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


###CUSTOMS ROUTES
$route['register'] = 'Participant';
$route['Authentification'] = 'Login/Index';
$route['participants'] = 'Participant/list_view';
$route['gps'] = 'Gps';
$route['carte'] = 'Map_Couv';




