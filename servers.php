<?php
$title = "Servers";
// Error reporting
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
error_reporting(0);

require_once('app/_config.php');
require('app/includes/bootstrap-main.php');

$serverli = json_decode(file_get_contents('app/servers.json'), true);

// html render begin here
use site\baseFunctions as funct;

include('app/templates/head.php');
include('app/templates/navbar.php');
include('app/templates/modal.html');

echo "<div class=\"cont-height-vh\">";
?>

<?php if(isset($_GET['g'])){include('app/page_serverprofile.php');}?>
<?php if(!isset($_GET['g'])):?>
  <div id="navbar-servers" class="cont-m-top cont-w">
  <?php foreach($serverli as $serverkey => $serverval): ?>
    <div class="container cont-p cont-m cont-w-auto bg-cont-med-alpha border-nav gone nav-link <?php echo "bg-game-".$serverkey;?>" onclick="location.href='?g=<?php echo $serverkey?>'">
      <svg class="svg-fill svg-nav svg-border-shadow"><use xlink:href="<?php echo "public/img/icon.svg#".$serverval["meta"]['svgTag'];?>"></use></svg>
      <h2 class="text-border-shadow" style="margin:auto;"><?php echo $serverval['title']?></h2>
    </div>
  <?php endforeach; ?>
  </div>
<?php endif;?>
<?php
echo "</div>";
include('app/templates/footer.php');
?>