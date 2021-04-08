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

| example.com/class/method/id/

|

| In some instances, however, you may want to remap this relationship

| so that a different class/function is called than the one

| corresponding to the URL.

|

| Please see the user guide for complete details:

|

| https://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There are three reserved routes:

|

| $route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

| $route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router which controller/method to use if those

| provided in the URL cannot be matched to a valid route.

|

| $route['translate_uri_dashes'] = FALSE;

|

| This is not exactly a route, but allows you to automatically route

| controller and method names that contain dashes. '-' isn't a valid

| class or method name character, so it requires translation.

| When you set this option to TRUE, it will replace ALL dashes in the

| controller and method URI segments.

|

| Examples: my-controller/index -> my_controller/index

|   my-controller/my-method -> my_controller/my_method

*/

// $route['default_controller'] = 'welcome';

$route['default_controller'] = 'welcome';

$route['paypal'] = 'welcome/paypal';

$route['cms'] = 'login';

$route['members'] = 'members'; 
$route['members/signup'] = 'members/signup'; 

$route['download/(:any)'] = "/members/download/$1";
$route['download2/(:any)'] = "/members/download2/$1";


$route['order'] = 'welcome/order';

$route['review_order'] = 'welcome/review_order';

$route['process_order'] = 'welcome/process_order';

$route['listenpaypal'] = 'listener/paypal';

$route['product/(:any)'] = 'welcome/product_catalog';

$route['product/hardware/(:any)/(:any)'] = 'welcome/get_products/$1/$2';

$route['product/software/(:any)'] = 'welcome/get_products';

$route['product/solutions/(:any)'] = 'welcome/get_products';

$route['product/hardware/(:any)'] = 'welcome/product_catalog/$1/$2';

$route['news-and-updates'] = 'welcome/news_updates';

$route['news-and-updates/(:any)'] = 'welcome/get_news/$1';

$route['search'] = 'welcome/search';

//$route['(:any)'] = 'welcome/get_page/$1';

$route['dashboard'] = 'dashboard';

$route['distributor'] = 'welcome/distributors';

$route['contact-us'] = 'welcome/contactUs';

//$route['banners'] = 'banner_management';

$route['404_override'] = 'welcome/get_page';

$route['translate_uri_dashes'] = TRUE;


$route['stripe'] = "StripeController";
$route['stripePost']['post'] = "StripeController/stripePost";
$route['stripe/createsession'] = "StripeController/createCheckoutSession";
$route['stripe/paid'] = "StripeController/paid";
$route['stripe/listen'] = "StripeController/listen";
$route['stripe/success'] = "StripeController/success";

$route['confirmation'] = "Welcome/success_order";





/*

| -------------------------------------------------------------------------

| Sample REST API Routes

| -------------------------------------------------------------------------

*/

$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4

$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8

