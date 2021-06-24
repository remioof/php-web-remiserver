<?php

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
// error_reporting(0);

require_once('app/_config.php');
//require('app/modules/functions.php');

$content = "";
$page = "";

include('app/templates/default/head.php');
include('app/templates/default/navbar.php');
if(isset($_GET['p'])){
  $page = $_GET['p'];

  switch($page){
    case 'server':
      include('app/templates/page_serverprofile.html');
      break;

    case 'rules':
      include('app/templates/page_rules.html');
      break;

    case 'news':
      include('app/templates/page_news.html');
      break;

    default:
      include('app/templates/jumbotron.php');
      break;
    }
} else {
  include('app/templates/jumbotron.php');
}
include('app/templates/default/footer.php');
?>