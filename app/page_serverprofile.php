<?php
// Source_Query_by: xPaw; git: https://github.com/xPaw/PHP-Source-Query;
use xPaw\SourceQuery\SourceQuery;

define( 'SQ_TIMEOUT',     1 );
define( 'SQ_ENGINE',      SourceQuery::SOURCE );

$Query = new SourceQuery( );

$g = "";
$error = "";
$server_addr = "";
$server_port = "";
$server_title = "There's no server";
$server_status = "offline";
$server_info = [];
$server_players = [];
$server_rules = [];

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
      $server_rules = $Query->GetRules();
      
      // nametable refer to _config.php, to show all items within array, comment these out
      $server_info = tuncrateList($server_info, $server_info_nametable);
      $server_rules = tuncrateList($server_rules, $server_rules_nametable);
    }
    catch( Exception $e )
    {
      $error = $e->getMessage( );
      echo $error;
    }
    finally
    {
      $Query->Disconnect( );
    }
  }
}
?>
<div class="container cont-m-top cont-w cont-fl-col">
<?php if($server_title): //Server Title Jumbo?>
  <div class="container cont-m">
    <div class="cont-p cont-w-auto bg-cont-med-alpha <?php echo "bg-game-".$g;?> cont-fl-col">
      <h2><?php echo $server_title?></h2>
      <?php 
        if($server_addr)
        { 
          //if port value exist, to append into the href link add ":"
          if($server_port){$server_port = ":".$server_port;}
          //server status ifs (as in status whether its online or not) efficient grade school code right here 
          if(!empty($server_players)){$server_status = "online";}
          elseif($error){$server_status = "offline";}
          else{$server_status = "idle";}

          // todo: change this into <nav>, and add another element href to templates/page_commands.php, on which is triggered with jq-ajax (?). this segment shows maplist or playable chat-sound list snippet (if possible 11). might need help with database and stuff or use a cloud service to store the audio files. if not then might need ftp enabled from the server which might not be secure.
          echo "<h4 id=\"steam-connect\" ><a class=\"nav-social\" style=\"padding: .2rem .4rem .2rem .4rem\" href=\"steam://connect/".$server_addr.$server_port."\">Connect to The Server</a><span style=\"padding: .2rem .4rem .2rem .4rem; color: black\" class=\"".$server_status."\">&nbsp".$server_status."&nbsp</span></h4>";
        }
      ?>
    </div>
  </div>
<?php endif; ?>


<?php if($error): //Display if error?>
  <div class="container cont-m  text-color-lg cont-fl-col">  
    <h2>oops somethign goes worng ;w;</h2>
    <h4>pls reload the page, also sun voted no</h4>
    <p><?php echo htmlspecialchars($error -> _toString())?></p>
  </div>
<?php else: ?>

  <?php if(!empty($server_info)): //if no error: Server info?>
  <div class="container cont-m cont-p  cont-fl-col bg-cont-med-alpha ">
    <h3>Server Info</h3>
    <table id="table-server-info" class="table">      
      <tbody>
      <?php foreach($server_info as $infokey => $infoval):?>

        <tr><td style="width: 8em"><?php echo htmlspecialchars($infokey)?></td>
        <td><?php
            if(is_array($infoval)){echo "<pre>"; " : ".print_r($infoval); echo "</pre>";} 
            else {
              if($infoval === true){echo " : ".'true';}
              else if($infoval === false){echo " : ".'false';}
              else{echo " : ".htmlspecialchars($infoval);}}
              ?></td></tr>
      <?php endforeach; ?>

      </tbody>
    </table>
  </div>
  <?php endif; ?>


  <?php if(!empty($server_players)): //if no error: Server current players?>
    <?php 
    array_multisort_ascendByString($server_players, 'Frags');
    ?>
    <div class="container  cont-fl-auto">
      <div class="container cont-m cont-p cont-fl-col bg-cont-med-alpha " style="margin-bottom: auto;">
      <!-- <h3>Players</h3> -->
      <table id="table-server-players" class="table">
        <thead><tr><th>Player</th><th style="width: 4em">Frags</th><th style="width: 4em">Time</th></tr></thead>
        <tbody>
        <?php foreach($server_players as $player):?>
          <tr>
            <td><?php echo "&nbsp".htmlspecialchars( $player[ 'Name' ] ); ?></td>
            <td><?php echo $player[ 'Frags' ]; ?></td>
            <td><?php echo $player[ 'TimeF' ]; ?></td>
          </tr>
        <?php endforeach;?>
        </tbody>
      </table>
    </div>

    <?php if(!empty($server_rules)): //if no error and has player: Server rules/vars/configs?>
      <div class="container cont-m cont-p  cont-fl-col bg-cont-med-alpha">
        <h3>Server Variables</h3>
        <table id="table-server-rules" class="table">      
          <tbody>
          <?php foreach($server_rules as $infokey => $infoval):?>
            <tr><td style="width: 10em"><?php echo htmlspecialchars($infokey)?></td>
            <td><?php
                if(is_array($infoval)){echo "<pre>"; " : ".print_r($infoval); echo "</pre>";} 
                else {
                  if($infoval === true){echo " : ".'true';}
                  else if($infoval === false){echo " : ".'false';}
                  else{echo " : ".htmlspecialchars($infoval);}}
                  ?></td></tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
  <?php endif;?>
<?php endif; ?>
</div>