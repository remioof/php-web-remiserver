<?php
// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
// error_reporting(0);

// todo: create markup template with classes

// $content = file_get_contents('mockup.html');

$content = "";

require_once('app/_config.php');
include('app/modules/functions.php');
include('app/templates/layouts/default.tpl');
?>