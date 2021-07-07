<?php
$title = "Servers";
// Error reporting
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
error_reporting(0);

require_once('app/_config.php');
require('app/includes/bootstrap-main.php');

$serverli = json_decode(file_get_contents('app/servers.json'), true);

// queres
use xPaw\SourceQuery\SourceQuery;
use xPaw\MinecraftQuery;
use xPaw\MinecraftQueryException;

define( 'SQ_TIMEOUT',     2 );
define( 'SQ_ENGINE',      SourceQuery::SOURCE );

$Query = new SourceQuery( );
$MineQuery = new MinecraftQuery( );

// html render begin here
use site\baseFunctions as funct;
use MatthiasMullie\Minify;
$cssPath = 'public/css';
$cssmin = new Minify\CSS($cssPath . '/layout.css');
$cssmin->add($cssPath . '/style.css');
$cssmin->add($cssPath . '/banner.css');
$cssmin->minify($cssPath . '/style-min.css');

include('app/templates/head.php');
include('app/templates/navbar.php');
echo "<div class=\"cont-height-vh\">";
?>

<?php if(isset($_GET['g'])){include('app/page_serverprofile.php');}?>
<?php if(!isset($_GET['g'])):?>
  <div id="navbar-servers" class="cont-m-top cont-w">
  <?php foreach($serverli as $serverkey => $serverval): ?>
    <div class="container cont-p cont-m cont-w-auto bg-cont-med-alpha border-nav gone nav-link <?php echo "bg-game-".$serverkey;?>" onclick="location.href='?g=<?php echo $serverkey?>'">
      <svg class="svg-fill svg-nav "><use xlink:href="<?php echo "public/img/icon.svg#".$serverval["meta"]['svgTag'];?>"></use></svg>
      <h2 style="margin:auto;"><?php echo $serverval['title']?></h2>
    </div>
  <?php endforeach; ?>
  </div>
<?php endif;?>
<?php
echo "</div>";
include('app/templates/footer.php');
?>