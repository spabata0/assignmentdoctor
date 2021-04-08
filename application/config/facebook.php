<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['facebook_app_id']                = '270134654586182';
$config['facebook_app_secret']            = '6d6162c7c61c1bbaa01f6c65ea1787fa';
$config['facebook_login_redirect_url']    = 'members/fb_login/';
$config['facebook_logout_redirect_url']   = 'user_authentication/logout';
$config['facebook_login_type']            = 'web';
$config['facebook_permissions']           = array('email');
$config['facebook_graph_version']         = 'v3.2';
$config['facebook_auth_on_load']          = TRUE;

?>