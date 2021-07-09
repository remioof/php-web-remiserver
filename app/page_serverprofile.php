<?php
// Source_Query_by: xPaw; git: https://github.com/xPaw/PHP-Source-Query;
use site\baseFunctions as funct;
use site\query\Query as Queres😳;

$Query = new Queres😳;



$g = "";
$error = "";
$server_conf = [];
$server_addr = "";
$server_port = "";
$server_title = "There's no server";
$server_status = "offline";
$server_info = [];
$server_players = [];
$server_rules = [];

if(isset($_GET['g'])){
  $g = $_GET['g'];
  // get url param, if not then yeet
  if($serverli[$g]){
    $server_title = $serverli[$g]['title'];
    $server_conf = $serverli[$g]["gq_config"];

    $server_addr = $server_conf['addr'];
    $server_port = $server_conf['port'];
    $server_query = $server_conf['portQuery'];
    $server_type = $server_conf['queryMethod'];

    
    $fetch = $Query->begin($server_addr, $server_query, $server_type);
    // print_r($fetch);
    $error = $fetch[0];
    echo $error;
    $server_info = funct\tuncrateList($fetch[1], $server_info_nametable);
    $server_rules = funct\tuncrateList($fetch[3], $server_rules_nametable);
    $server_players = $fetch[2];
  }
}
?>



<div class="container cont-m-top cont-w cont-fl-col">
  <div class="container cont-fl-row unhide">
    <h4><a class="nav-social border-nav" style="padding: .2rem .4rem .2rem .4rem" title="To Server List" href="/servers.php">&lt;&lt;&lt;</a></h4>
  </div>
<?php if($server_title): //Server Title Jumbo?>
  <div class="container cont-m">
    <div class="cont-p cont-w-auto bg-cont-med-alpha <?php echo "bg-game-".$g;?> cont-fl-col">
      <h2 class="text-border-shadow"><?php echo $server_title?></h2>
      <?php 
        if($server_addr)
        { 
          //if port value exist, to append into the href link add ":"
          if($server_port){$server_port = ":".$server_port;}
          //server status ifs (as in status whether its online or not) efficient grade school code right here 
          if(!empty($server_players)){$server_status = "online";}
          elseif($error){$server_status = "offline";}
          else{$server_status = "idle";}

        }
      ?>
      <nav style = "justify-content: flex-start;">
        <li class="container cont-fl-row" style="margin-left:0;">
          <?php if($server_type === 1 || $server_type === "steam"):?>
            <a id="connect-server" title="" class="cont-m-rem nav-social nav-link border-nav font-override" href="<?php echo "steam://connect/".$server_addr.$server_port ?>">Connect to The Server
              <span style="font-size:8pt"><p><?php echo "steam://connect/".$server_addr.$server_port ?></p></span>
            </a>
            <button id="copyToClipboard" copytarget="<?php echo $server_addr.$server_port ?>" title="Copy To Clipboard: <?php echo $server_addr.$server_port ?>" class="border-nav cont-p-rem cont-m-rem" style="width:22pt; height:auto;" onclick="copyToClipboard(this)">
              <svg class="svg-fill svg-nav" style="width:16pt; height:16pt;"><use xlink:href="public/img/glyph.svg#icn-clip"></use></svg>
            </button>
            <?php endif?>
          <?php if(!$server_type || $server_type === 0 || $server_type !== "steam"):?>
            <h4 class="cont-m-rem bg-h-dark font-override text-border-shadow box-border-shadow"><?php echo $server_addr.$server_port ?></h4>
            <button id="copyToClipboard" copytarget="<?php echo $server_addr.$server_port ?>" title="Copy To Clipboard: <?php echo $server_addr.$server_port ?>" class="border-nav cont-p-rem cont-m-rem" style="width:22pt; height:auto;" onclick="copyToClipboard(this)">
              <svg class="svg-fill svg-nav" style="width:16pt; height:16pt;"><use xlink:href="public/img/glyph.svg#icn-clip"></use></svg>
            </button>


          <?php endif?>
        </li>
        <li class="container cont-fl-row">
          <h4 class="font-override cont-m-rem text-border-shadow box-border-shadow <?php echo $server_status?>" style="padding-inline: 1em"><?php echo $server_status?></h4>
          <a style="font-size:16pt" class="cont-m-rem cont-p-rem nav-social nav-link border-nav" href="" onclick="location.reload()">
            <svg class="svg-fill svg-nav rotate"><use xlink:href="public/img/glyph.svg#icn-reload"></use></svg>
            <span>Refresh Page</span>
          </a>
        </li>
        <li>

        </li>
      </nav>
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
              else{echo " : ".$infoval;}}
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
      <div class="container cont-m cont-p cont-m-left-auto cont-fl-col bg-cont-med-alpha">
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

      if(/Android|webOS|iPhone|iPad|Mac|Macintosh|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        document.getElementById('connect-server').style.display = "none";
      }

      Number.prototype.twoDigit = function() {return this>9 ? this.toString() : "0" + this.toString() };
      const timeEl = Array.from(document.getElementsByClassName('time'));
      var temp = timeEl.map(a => a.innerHTML);
      

      function iter() {
        timeEl.forEach((el, n) => {
          temp[n]++;
          if (temp[n] > (86400 - 1)){temp[n] = 0}
          let hour = Math.floor(temp[n]/3600);
          let minute = (Math.floor(temp[n]/60)%60);
          let sec = temp[n]%60;
          el.innerHTML = (hour ? hour + ":" : "") + (minute).twoDigit() + ":" + sec.twoDigit();
        });
        setTimeout(iter, 1000)
      }
      
      iter();
      
      <?php 
        $javascript = ob_get_clean();
        echo funct\minify_js($javascript);
      ?></script>