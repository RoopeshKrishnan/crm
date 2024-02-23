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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'login_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'login_controller/index';
$route['login-check'] = 'login_controller/login';
$route['dashboard'] = 'login_controller/dashboard';
$route['logout'] = 'login_controller/logout';
$route['user-profile'] = 'user/user_profile/index';
$route['privilege-type'] = 'admin/privileges/privilege_type/index';
$route['privilege-group'] = 'admin/privileges/privilege_group/index';
$route['privilege-group-type'] = 'admin/privileges/privilege_group_type/index';
$route['customer-registration'] = 'user/user_controller/customer_registration';
$route['customer-item-order'] = 'user/customer_registration/customer_item';
$route['customer-order-conformation'] = 'user/user_controller/customer_order_conformation';
$route['user-creation'] = 'user/user_creation/index';
$route['user-creation-employment'] = 'user/user_creation/user_creation_employment';
$route['create-shift'] = 'admin/shift/index';
$route['create-designation'] = 'admin/designation/index';
$route['create-department'] = 'admin/department/index';
$route['create-social-media'] = 'admin/social_media/index';
$route['create-website'] = 'admin/website/index';
$route['create-other-source'] = 'admin/other_source/index';
$route['privilege-to-user'] = 'admin/privileges/privilege_to_user/index';
$route['all-users'] = 'user/all_users/index';
$route['selected-user'] = 'user/all_users/selected_user';
$route['create-category'] = 'admin/category/index';
$route['create-sub-category'] = 'admin/sub_category/index';
$route['create-tax'] = 'admin/tax/index';
$route['create-tax-type'] = 'admin/tax_type/index';
$route['create-category-type'] = 'admin/admin_controller/create_category_type';
$route['customer-registration'] = 'user/customer_registration/index';
$route['installment'] = 'admin/installment/index';
$route['required-documents'] = 'admin/required_documents/index';
$route['rent'] = 'admin/rent/index';
$route['service'] = 'admin/service/index';
$route['item'] = 'admin/item/index';
$route['category-type'] = 'admin/category_type/index';
$route['discount'] = 'admin/discount/index';
$route['commission'] = 'admin/commission/index';
$route['discount_type'] = 'admin/discount_type/index';


$route['installment_check'] = 'admin/installment/installment_check';
$route['installment_billDate'] = 'admin/installment/installment_billDate';

