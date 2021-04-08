<?php
/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/

$config['google']['client_id']        = '779754695121-js8vvaani2993p2up5lv6tep9bcqpifs.apps.googleusercontent.com';
$config['google']['client_secret']    = 'Cpv_oFW5cD7fHpS0SIxSHsk-';
$config['google']['redirect_uri']     = 'https://' . base_url() . '/user_authentication/login/';
$config['google']['application_name'] = 'Login to AssignmentDoctor.com';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();
?>