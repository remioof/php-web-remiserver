<?php
$title = "";
// Error reporting
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
error_reporting(0);

require_once('app/_config.php');
require('app/includes/bootstrap-main.php');

include('app/templates/head.php');
include('app/templates/navbar.php');
$p = "";

echo "<div class=\"cont-height-vh\">";
if(isset($_GET['p'])){
  $p = $_GET['p'];

  switch($p){
    case 'server':
      include('app/page_serverprofile.php');
      break;

    case 'rules':
      include('app/page_rules.php');
      break;

    case 'news':
      include('app/page_news.php');
      break;

    default:
      include('app/page_home.php');
      break;
    }
} else {
  include('app/page_home.php');
}
echo "</div>";
include('app/templates/footer.php');
?>