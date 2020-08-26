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
// Testimonial 
$route['getDataTestimonial'] = 'c_branda/load_testimonial';
// News 
$route['getapinewsbyblog'] = 'c_branda/load_newsbyblog';
// Content 
$route['getDataContent'] = 'c_branda/load_content';
// Detail 
$route['getDataContentDetail'] = 'c_branda/load_details';

$route['portal'] = 'portal/c_portal/profile';
$route['portal/profile'] = 'portal/c_portal/profile';
$route['portal/profile/about-me'] = 'portal/c_portal/about_me';
$route['portal/profile/biodata'] = 'portal/c_portal/biodata';
$route['portal/profile/education'] = 'portal/c_portal/education';
$route['portal/profile/skills'] = 'portal/c_portal/skills';
$route['portal/profile/work-experience'] = 'portal/c_portal/work_experience';
$route['portal/profile/setting'] = 'portal/c_portal/setting';

// Questionnaire
$route['portal/questionnaire'] = 'portal/c_questionnaire/questionnaire';


// Alumni Forum
$route['portal/alumni-forum'] = 'portal/c_alumni_forum/alumni_forum';
$route['forum/detail-topic/(:any)'] = 'portal/c_alumni_forum/detail_topic/$1';


// Alumni Forum
$route['portal/testimony'] = 'portal/c_testimony/testimony';


// Notification
$route['portal/notification'] = 'portal/c_notification/notification';


// auth alumni
$route['auth/loginAlumni'] =  'c_login/login';
$route['auth/logoutAlumni'] =  'c_login/logout';


// left menu
$route['get_picture'] = 'portal/c_portal/get_picture';

// action
$route['get_picture'] = 'portal/c_portal/get_picture';
$route['action1/change_photo'] = 'portal/c_action1/change_photo';
$route['action1/about_me'] = 'portal/c_action1/about_me';
$route['action1/load_data_alumni'] = 'portal/c_action1/load_data_alumni';
$route['action1/submit_biodata'] = 'portal/c_action1/submit_biodata';
$route['action1/load_data_education'] = 'portal/c_action1/load_data_education';
$route['action1/submit_education'] = 'portal/c_action1/submit_education';
$route['action1/load_data_skills'] = 'portal/c_action1/load_data_skills';
$route['action1/submit_skills'] = 'portal/c_action1/submit_skills';
$route['action1/load_data_forum'] = 'portal/c_action1/load_data_forum';
$route['action1/submit_forum_alumni'] = 'portal/c_action1/submit_forum_alumni';
$route['action1/get_detail_topic'] = 'portal/c_action1/get_detail_topic';
$route['action1/submit_comment_forum'] = 'portal/c_action1/submit_comment_forum';
$route['action1/Testimony'] = 'portal/c_action1/Testimony';
$route['action1/load_work_experience'] = 'portal/c_action1/load_work_experience';
$route['action1/submit_work_experience'] = 'portal/c_action1/submit_work_experience';
$route['action1/Form_addCompany'] = 'portal/c_action1/Form_addCompany';
$route['action1/submit_add_company'] = 'portal/c_action1/submit_add_company';

// end action





