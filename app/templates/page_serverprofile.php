<?php
$server_addr = "";
$server_port = "";
$server_title = "There's no server available";
$server_isOnline = 0;
$server_playerCount = 0;
$server_players = [];

if(isset($_GET['g'])){
  $g = $_GET['g'];
  if($serverli[$g]['gq_conf_address'] && $serverli[$g]['gq_conf_type']){
    $server_addr = $serverli[$g]['gq_conf_address'];
    $server_port = $serverli[$g]['gq_conf_port'];
    $server_type = $serverli[$g]['gq_conf_type'];
    $server_title = $serverli[$g]['title'];

    $gq->addServers([[''.$server_type.'',''.$server_addr.'', ''.$server_port.'']]);
    $gq->setFilter('normalise');

    $gqfetch = $gq->requestData();

    $server_isOnline = $gqfetch[0]['gq_online']; 
    $server_playerCount = $gqfetch[0]['num_players'];
    $server_players = $gqfetch[0]['players'];

    if($server_port){$server_port = ":".$server_port;}
    //print_r($gqfetch);
  }
}

?>
<div id="profile-server" class="container cont-m-top cont-m cont-w text-color-dk">
  <canvas width="48px" height="240px" style="background-color: grey"></canvas>
    
  <div class="cont-p cont-w-auto cont-m-l bg-white cont-fl-col">
    <h2><?php echo $server_title?></h2>
    <?php if($server_addr){echo "<h4><a class=\"nav-social cont-p\"  href=\"steam://connect/".$server_addr.$server_port."\">Connect to Server</a></h4>";}?>
  </div>
</div>

<div class="container cont-m cont-p cont-w bg-white text-color-dk">
  <table class="table">
    <thead><tr><th>player</th><th>been gaming for</th></tr></thead>
    <tbody>
      <?php 
      if($server_isOnline && $server_playerCount){
        foreach($server_players as $player){
          echo "<tr><td>".$player["name"]."</td><td>".formatTime($player["time"])." minutes</td></tr>";
        };
      } 
      else echo "<tr><td>no one's online player,</td><td>or in server is in levelchange state</td></tr>";
      ?>
    </tbody>
  </table>
</div>
