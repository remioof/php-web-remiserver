<?php
// Source_Query_by: xPaw; git: https://github.com/xPaw/PHP-Source-Query;
use xPaw\SourceQuery\SourceQuery;

define( 'SQ_TIMEOUT',     1 );
define( 'SQ_ENGINE',      SourceQuery::SOURCE );

$Query = new SourceQuery( );

$error = "";
$server_addr = "";
$server_port = "";
$server_title = "There's no server";
$server_info = [];
$server_players = [];

$server_info_nametable = ['HostName','Map', 'Version', 'Players','MaxPlayers'];
//$server_players_nametable = ['Name','Frags', 'TimeF'];

if(isset($_GET['g'])){
  $g = $_GET['g'];
  // get url param, if not set further request is skipped
  if($serverli[$g]['gq_conf_address']){
    
    $server_addr = $serverli[$g]['gq_conf_address'];
    $server_port = $serverli[$g]['gq_conf_port'];
    $server_title = $serverli[$g]['title'];
    try
    {
      $Query->Connect( ''.$server_addr.'', $server_port, SQ_TIMEOUT, SQ_ENGINE );
      
      $server_info = $Query->GetInfo();
      $server_players = $Query->GetPlayers();
      
      $server_info = tuncrateList($server_info, $server_info_nametable);
    }
    catch( Exception $e )
    {
      $error = $e->getMessage( );
      // echo $error;
    }
    finally
    {
      $Query->Disconnect( );
    }
  }
}
?>

<?php if($server_title):?>
  <div class="container cont-m-top cont-m cont-w ">
    <?php 
      if(!empty($server_info) && $server_info["Players"] !== 0){echo "<canvas width=\"24px\" height=\"auto\" style=\"background-color: green\"></canvas>";}
      elseif(!empty($server_info)){echo "<canvas width=\"24px\" height=\"auto\" style=\"background-color: #ebe356\"></canvas>";}
      else {echo "<canvas width=\"24px\" height=\"auto\" style=\"background-color: red\"></canvas>";} // might need to find a better way to do this
      ?>
    <div class="cont-p cont-w-auto bg-cont-med-alpha cont-fl-col">
      <h2><?php echo $server_title?></h2>
      <?php if($server_port){$server_port = ":".$server_port;}?>
      <?php if($server_addr){echo "<h4 id=\"steam-connect\"><a class=\"nav-social cont-p\"  href=\"steam://connect/".$server_addr.$server_port."\">Connect to The Server</a></h4>";}?>
    </div>
  </div>
<?php endif; ?>


<?php if($error):?>
  <div class="container cont-m-top cont-m cont-w text-color-lg cont-fl-col">  
    <h2>oops somethign goes worng ;w;</h2>
    <h4>pls reload the page, also sun voted no</h4>
    <p><?php echo htmlspecialchars($error -> _toString())?></p>
  </div>
<?php else: ?>

  <?php if(!empty($server_info)):?>
  <div class="container cont-m cont-p cont-w cont-fl-col bg-cont-med-alpha ">
    <h3>Server Info</h3>
    <table id="table-server-info" class="table">      
      <tbody>
      <?php foreach($server_info as $infokey => $infoval):?>

        <tr><td style="width: 8em"><?php echo htmlspecialchars($infokey)?></td>
        <td><?php
            if(is_array($infoval)){echo "<pre>"; ": ".print_r($infoval); echo "</pre>";} 
            else {
              if($infoval === true){echo ": ".'true';}
              else if($infoval === false){echo ": ".'false';}
              else{echo ": ".htmlspecialchars($infoval);}}
              ?></td></tr>
      <?php endforeach; ?>

      </tbody>
    </table>
  </div>
  <?php endif; ?>


  <?php if(!empty($server_players)):?>
  <div class="container cont-m cont-p cont-w bg-cont-med-alpha ">
    <table id="table-server-players" class="table">
      <thead><tr><th>Player</th><th style="width: 8em">Frags</th><th style="width: 8em">been gaming for</th></tr></thead>
      <tbody>
      <?php foreach($server_players as $player):?>

        <tr>
          <td><?php echo htmlspecialchars( $player[ 'Name' ] ); ?></td>
          <td><?php echo $player[ 'Frags' ]; ?></td>
          <td><?php echo $player[ 'TimeF' ]; ?></td>
        </tr>
      
      <?php endforeach;?>
      </tbody>
    </table>
  </div>
  <?php endif;?>

<?php endif; ?>
