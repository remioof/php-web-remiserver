<?php

namespace site\Query;

use site\baseFunctions as funct;
use xPaw\SourceQuery\SourceQuery as SQuery;
use MCServerStatus\MCPing as MCPing;
//use MCServerStatus\MCQuery as MCQuery; //prone to not returning anything (idk)


require_once __DIR__ . '/SourceQuery/bootstrap.php';
require_once __DIR__ . '/minecraft-server-status-2.0/bootstrap.php';


class Query
{
  private $type;
  private $addr;
  private $port;
  private $timeout;

  //method? i dont know how to use constructor or even if i need one

  public function Begin( string $address, int $queryPort, string $type, int $timeout = 2 )
  {
    $this->type = $type;
    $this->addr = $address;
    $this->port = $queryPort;
    $this->timeout = $timeout;
    // return array (or object) should be [ [0] => error, [1] => info, [2] => players, [3] => ruleset, [4] => extra-data if any]
    switch ($this->type) 
    {
      case 'minecraft':
        return $this->MinecraftQuery( );
        break;
      
      default:
        return $this->SourceQuery( );
        break;
    }
  }

  //SourceQuery method
  private function SourceQuery( )
  {
    $Query = new SQuery();
    $error = "";
    try
    {
      $Query->Connect( $this->addr, $this->port, $this->timeout);
      
      $data_info = $Query->GetInfo();
      $data_players = $Query->GetPlayers();
      $data_rules = $Query->GetRules();
    }
    catch( Exception $e )
    {
      $error = $e->getMessage( );
      echo "asdawd";
      echo $error;
    }
    finally
    {
      $Query->Disconnect( );
    }
    return array($error, $data_info, $data_players, $data_rules, []);
  }

  //MinecraftQuery method
  private function MinecraftQuery( )
  {
    $error = ""; //illusion 100
    $Query = MCPing::check($this->addr, $this->port, $this->timeout, false);
    $data_motd = preg_replace( "/\r|\n/", "", $Query->getMotdToHtml() );
    $data_info = array(
      "HostName" => $data_motd,
      "Players" => $Query->players,
      "MaxPlayers" => $Query->max_players,
      "Version" => $Query->version,
    );
    $data_players = $Query->sample_player_list;
    return array($error, $data_info, $data_players, []);
  }

  
  private function foo( )
  {
    echo "remi remi remi u wa u wa uwaaaaaaaaaaaaaaaa";
    return $this->addr;
  }

  private function bar()
  {
    echo "classautismsdaoidnasndoawdnm";
    return $this->port;
  }

}

?>