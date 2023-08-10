<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Frontend_Controller';

$route['admin'] = 'Admin_Controller';
$route['dashboard'] = 'Admin_Controller/dashboard';

$route['logout'] = 'Admin_Controller/logout';
$route['register'] = 'Admin_Controller/register';


//*resident------>*//
$route['dashboard/add-resident'] = 'Admin_Controller/add_resident';
$route['dashboard/view-residents'] = 'Admin_Controller/view_resident';
$route['dashboard/add-resident'] = 'Admin_Controller/add_resident/$1';
$route['dashboard/delete-resident/(:any)'] = 'Admin_Controller/delete_resident/$1';
$route['dashboard/edit-resident/(:any)'] = 'Admin_Controller/edit_resident/$1';

//*blotter------>*//
$route['dashboard/view-blotter'] = 'Admin_Controller/blotter_info';
$route['dashboard/add-blotter'] = 'Admin_Controller/addblotter';
$route['dashboard/delete-blotter/(:any)'] = 'Admin_Controller/delete_blotter/$1';
$route['dashboard/edit-blotter/(:any)'] = 'Admin_Controller/edit_blotter/$1';
$route['dashboard/update-blotter/(:any)'] = 'Admin_Controller/updateblotter/$1';


//*barangay officials------>*//
$route['dashboard/add-officials'] = 'Admin_Controller/addofficials';
$route['dashboard/view-officials'] = 'Admin_Controller/viewofficials';
$route['dashboard/delete-officials/(:any)'] = 'Admin_Controller/deleteofficials/$1';
$route['dashboard/update-officials/(:any)'] = 'Admin_Controller/updateofficials/$1';


/* AJAX  */
$route['dashboard/ajax-update-blotter-form']['post'] = 'Admin_Controller/ajax_update_blotter_form';
$route['dashboard/ajax-update-resident-form']['post'] = 'Admin_Controller/ajax_update_resident_form';
$route['dashboard/ajax-update-official-form']['post'] = 'Admin_Controller/ajax_update_official_form';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
