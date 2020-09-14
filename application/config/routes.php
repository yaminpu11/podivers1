<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'c_dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// template website alumin
$route['about'] = 'c_dashboard/about';
$route['contact'] = 'c_dashboard/contact';
$route['event'] = 'c_dashboard/event';
$route['event/(:num)'] = 'c_dashboard/details/$1';
$route['allevent'] = 'c_dashboard/allevent';
$route['allevent/(:num)'] = 'c_dashboard/details/$1';
$route['bem-news'] = 'c_dashboard/news';
$route['bem-news/(:num)'] = 'c_dashboard/details/$1';
$route['bpm-news'] = 'c_dashboard/news';
$route['bpm-news/(:num)'] = 'c_dashboard/details/$1';
$route['ukm-news'] = 'c_dashboard/news';
$route['ukm-news/(:num)'] = 'c_dashboard/details/$1';
$route['hima-news'] = 'c_dashboard/news';
$route['hima-news/(:num)'] = 'c_dashboard/details/$1';
$route['bem-event'] = 'c_dashboard/event';
$route['bem-event/(:num)'] = 'c_dashboard/details/$1';
$route['bpm-event'] = 'c_dashboard/event';
$route['bpm-event/(:num)'] = 'c_dashboard/details/$1';
$route['ukm-event'] = 'c_dashboard/event';
$route['ukm-event/(:num)'] = 'c_dashboard/details/$1';
$route['hima-event'] = 'c_dashboard/event';
$route['hima-event/(:num)'] = 'c_dashboard/details/$1';
$route['bem-gallery'] = 'c_dashboard/gallery';
$route['bem-gallery/(:num)'] = 'c_dashboard/details/$1';
$route['bpm-gallery'] = 'c_dashboard/gallery';
$route['bpm-gallery/(:num)'] = 'c_dashboard/details/$1';
$route['ukm-gallery'] = 'c_dashboard/gallery';
$route['ukm-gallery/(:num)'] = 'c_dashboard/details/$1';
$route['hima-gallery'] = 'c_dashboard/gallery';
$route['hima-gallery/(:num)'] = 'c_dashboard/details/$1';
// Testimonial 
$route['getDataTestimonial'] = 'c_branda/load_testimonial';
// News 
$route['getapinewsbyblog'] = 'c_branda/load_newsbyblog';
// Content 
$route['getDataContent'] = 'c_branda/load_content';
// Detail 
$route['getDataContentDetail'] = 'c_branda/load_details';

$route['portal'] = 'portal/c_portal/index';



// auth alumni
$route['auth/loginPodivers'] =  'c_login/login';
$route['auth/logoutPodivers'] =  'c_login/logout';

$route['portal/(:any)'] = 'portal/c_portal/menu_content';
// $route['portal/partner'] = 'portal/c_portal/partner';
// $route['portal/content'] = 'portal/c_portal/content';
// $route['portal/event'] = 'portal/c_portal/event';
// $route['portal/testimonial'] = 'portal/c_portal/testimonial';
// $route['portal/newsletter'] = 'portal/c_portal/newsletter';
// $route['portal/setting'] = 'portal/c_portal/setting';
// // left menu


// end action





