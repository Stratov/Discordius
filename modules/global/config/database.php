<?php
defined('SYSPATH') OR die('No direct access allowed.');
$config['default'] = array
(
	'benchmark'     => true,
	'persistent'    => false,
	'connection'    => array
	(
		'type'     => 'mysql',
		'user'     => 'root',
		'pass'     => '',
		'host'     => 'localhost',
		'port'     => 3306,
		'socket'   => false,
		'database' => 'flipidingue'
	),
	'character_set' => 'utf8',
	'table_prefix'  => '',
	'object'        => true,
	'cache'         => false,
	'escape'        => true
);
?>