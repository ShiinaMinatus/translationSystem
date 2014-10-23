<?php


$route = array(

		'users/:id' =>  array('action'=>'user#info','method'=>'get'),

		'users/add' =>  array('action'=>'user#add','method'=>'get'),
		
		'users/:name/:aaa/:bbb' =>  array('action'=>'user#add','method'=>'get'),

		'users/name/aaa/bbb' =>  array('action'=>'user#add','method'=>'get')
);


$_ENV['route'] = $route;


?>