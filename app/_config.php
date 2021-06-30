<?php
//==============================//
//          ;w; configs         //
//==============================//

$site_name = "Remi's Server";
$site_url = "";
$site_description = "";
$site_keywords = "";

$site_copyright = "Remi's Server";

$enable_motd = false;


//vars
$extHref_discord = "https://discord.gg/B8phHEw";
$extHref_steamGroup = "https://steamcommunity.com/groups/REMSCS";
$serverli = json_decode(file_get_contents('app/servers.json'), true);

$rules = [
  "Be respectful",
  "Be rootin",
  "Be tootin",
  "and by god be shootin <br><br>      but most of all <br><br>",
  "<i>Be kind</i>",
];

$nav_href_icon = "public/img/icon.svg";
$nav_href_glyph = "public/img/glyph.svg";


$server_info_nametable = ['HostName','Map', 'Version', 'Players','MaxPlayers'];
//$server_players_nametable = ['Name','Frags', 'TimeF'];

$server_rules_nametable = [
  //sven
  "allow_spectators", 
  "gamebuild", 
  "gameversion", 
  "mp_consistency", 
  "sv_alltalk", 
  "sv_gravity", 
  "sv_password", 
  "sv_voiceenable", 
  "mp_nextmap_cycle", 
  "sv_stepsize",

  //l4d2
  "acs_version", 
  "defib_fix_version",
  "defib_fix_version",
  "director_afk_timeout",
  "director_auto_difficulty",
  "director_ci_multi",
  "director_si_hpmulti",
  "director_si_more",
  "director_si_more_delay",
  "director_tank_hpmulti",
  "l4d2_crawling",
  "l4d2_gnome_allow",
  "l4d2_gnome_heal",
  "l4d_anti_rush_allow",
  "l4d_extra_first_aid",
  "l4d_healing_allow",
  "l4d_stats_version",
  "metamod_version",
  "lockdown_system-l4d2_version",
  "mp_friendlyfire",
  "sm_superversus_version",
  "sourcemod_version",
  "survivor_afk_fix_ver",
];

?>

