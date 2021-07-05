<?php
// Source_Query_by: xPaw; git: https://github.com/xPaw/PHP-Source-Query;
// I cant wrap my head in OOP, here lies my fap (Functional Programming) twchnique 
use site\baseFunctions as funct;

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
    $server_query = $serverli[$g]['gq_conf_sourceQuery'];
    $server_title = $serverli[$g]['title'];
    try
    {
      $Query->Connect( ''.$server_addr.'', $server_query, SQ_TIMEOUT, SQ_ENGINE );
      
      $server_info = $Query->GetInfo();
      $server_players = $Query->GetPlayers();
      $server_rules = $Query->GetRules();
      
      // nametable refer to _config.php, to show all items within array, comment these out
      $server_info = funct\tuncrateList($server_info, $server_info_nametable);
      $server_rules = funct\tuncrateList($server_rules, $server_rules_nametable);
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



<div class="container cont-m-top cont-w cont-fl-col">
<div class="container cont-fl-row">
  <h4><a class="nav-social border-nav unhide" style="padding: .2rem .4rem .2rem .4rem" title="To Server List" href="/servers.php">&lt;&lt;&lt;</a></h4>
</div>
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

          echo "<h4 id=\"steam-connect\" ><a class=\"nav-social border-nav\" style=\"padding: .2rem .4rem .2rem .4rem\" href=\"steam://connect/".$server_addr.$server_port."\">Connect to The Server</a><span style=\"margin-left:.8rem ;padding: .2rem .4rem .2rem .4rem; color: black\" class=\"".$server_status."\">&nbsp".$server_status."&nbsp</span><a class=\"nav-social border-nav\" style=\"padding: .2rem\" href=\"\" title=\"Refresh\" onclick=\"location.reload()\">&#128472;</a></h4>";
        }
      ?>
    </div>
  </div>
<?php endif; ?>


<?php if($error): //Display if error?>
  <div class="container cont-m  text-color-lg cont-fl-col">  
    <h2>oops somethign goes worng ;w;</h2>
    <h4>pls reload the page, also sun voted no</h4>
    <p><?php echo htmlspecialchars($error)?></p>
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
    funct\array_multisort_ascendByString($server_players, 'Frags');
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
            <td class="time"><?php echo $player[ 'Time' ]; ?></td>
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

    <script defer><?php ob_start();?>
      timeEl = Array.from(document.getElementsByClassName('time'));
      temp = []; //recursion with memo
      timeEl.forEach(el => {temp.push(parseInt(el.innerHTML))});
      function iter() {
        timeEl.forEach((el, n) => {
          temp[n]++;
          let hour = Math.floor(temp[n]/3600);
          let minute = Math.floor(temp[n]/60);
          let sec = temp[n]%60;
          el.innerHTML = (hour ? hour + ":" : "") + minute.toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}) + ":" + sec.toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
        });
        setTimeout(iter, 1000)
      }
      iter();
      
      <?php 
        $javascript = ob_get_clean();
        echo funct\minify_js($javascript);
      ?></script>