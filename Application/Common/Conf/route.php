<?php
return array(
	//'配置项'=>'配置值'
    'URL_ROUTER_ON'   => true, 
    'URL_ROUTE_RULES' => array(
        'user/verify'           => 'Passport/User/verify',
        'user/verifymobile'     => 'Passport/User/verifymobile',
        'user/register'         => 'Passport/User/doregister',
        'user/login'            => 'Passport/User/dologin',
        'user/setpassword'      => 'Passport/User/setPassword',
    ),
);