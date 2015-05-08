<?php

defined('SYSPATH') or die('No direct access allowed.');

require_once('application/SplClassLoader.php');

$loader = new SplClassLoader();

$loader->register();
