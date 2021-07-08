<?php

namespace MCServerStatus\Responses;

abstract class MCBaseResponse {
	
	/** @var bool $online */
	public $online = false;
	
	/** @var string $error */
	public $error = null;
	
	/** @var string $hostname */
	public $hostname = null;
	
	/** @var string $address */
	public $address = null;
	
	/** @var int $port */
	public $port = null;
	
	/** @var string $version */
	public $version = null;
	
	/** @var int $players */
	public $players = null;
	
	/** @var int $max_players */
	public $max_players = null;
	
	/** @var string $motd */
	public $motd = null;
	
	/**
	 * Remove the format codes from motd
	 * @param $motd
	 * @return mixed
	 */
	public function getMotdToText() {
		$chars = ['§0', '§1', '§2', '§3', '§4', '§5', '§6', '§7', '§8', '§9', '§a', '§b', '§c', '§d', '§e', '§f', '§k', '§l', '§m', '§n', '§o', '§r'];
		$output = str_replace($chars, '', $this->motd);
		$output = str_replace('\n', '<br>', $output);
		return $output;
	}
	
	/**
	 * Convert the motd to html
	 * @param $motd
	 * @return string
	 */
	public function getMotdToHtml() {
		preg_match_all("/[^§&]*[^§&]|[§&][0-9a-z][^§&]*/", $this->motd, $brokenupstrings);
		$returnstring = "";
		foreach($brokenupstrings as $results) {
			$ending = '';
			foreach($results as $individual) {
				$code = preg_split("/[&§][0-9a-z]/", $individual);
				preg_match("/[&§][0-9a-z]/", $individual, $prefix);
				if(isset($prefix[0])) {
					$actualcode = substr($prefix[0], 1);
          // the authors probably forgot to fix this, so i hotfix this motd to html parser for now
          // $returnstring should be inbetween the <tags></tags>, not in the begining.
					switch($actualcode) {
						case "1":
							$returnstring = '<span style="color:#0000aa">' . $returnstring;
							$ending = $ending . "</span>";
							break;
						case "2":
							$returnstring = '<span style="color:#00aa00">' . $returnstring;
							$ending = $ending . "</span>";
							break;
						case "3":
							$returnstring = '<span style="color:#00aaaa">' . $returnstring;
							$ending = $ending . "</span>";
							break;
						case "4":
							$returnstring = '<span style="color:#aa0000">' . $returnstring;
							$ending = $ending . "</span>";
							break;
						case "5":
							$returnstring = '<span style="color:#aa00aa">' . $returnstring;
							$ending = $ending . "</span>";
							break;
						case "6":
							$returnstring = '<span style="color:#ffaa00">' . $returnstring;
							$ending = $ending . "</span>";
							break;
						case "7":
							$returnstring = '<span style="color:#aaaaaa">' . $returnstring;
							$ending = $ending . "</span>";
							break;
						case "8":
							$returnstring = '<span style="color:#555555">' . $returnstring;
							$ending = $ending . "</span>";
							break;
						case "9":
							$returnstring = '<span style="color:#5555ff">' . $returnstring;
							$ending = $ending . "</span>";
							break;
						case "a":
							$returnstring = '<span style="color:#55ff55">' . $returnstring;
							$ending = $ending . "</span>";
							break;
						case "b":
							$returnstring = '<span style="color:#55ffff">' . $returnstring;
							$ending = $ending . "</span>";
							break;
						case "c":
							$returnstring = '<span style="color:#ff5555">' . $returnstring;
							$ending = $ending . "</span>";
							break;
						case "d":
							$returnstring = '<span style="color:#ff55ff">' . $returnstring;
							$ending = $ending . "</span>";
							break;
						case "e":
							$returnstring = '<span style="color:rgb(221, 195, 0)">' . $returnstring;
							$ending = $ending . "</span>";
							break;
						case "f":
							$returnstring = '<span style="color:#ffffff">' . $returnstring;
							$ending = $ending . "</span>";
							break;
						case "l":
							if(strlen($individual) > 2) {
								$returnstring = '<span style="font-weight:bold;">' . $returnstring;
								$ending = "</span>" . $ending;
								break;
							}
						case "m":
							if(strlen($individual) > 2) {
								$returnstring = '<del>' . $returnstring;
								$ending = "</del>" . $ending;
								break;
							}
						case "n":
							if(strlen($individual) > 2) {
								$returnstring = '<span style="text-decoration: underline;">' . $returnstring;
								$ending = "</span>" . $ending;
								break;
							}
						case "o":
							if(strlen($individual) > 2) {
								$returnstring = '<i>' . $returnstring;
								$ending = "</i>" . $ending;
								break;
							}
						case "r":
							$returnstring = $returnstring . $ending;
							$ending = '';
							break;
					}
					if(isset($code[1])) {
						$returnstring = $returnstring . $code[1];
						if(isset($ending) && strlen($individual) > 2) {
							$returnstring = $returnstring . $ending;
							$ending = '';
						}
					}
				}
				else {
					$returnstring = $returnstring . $individual;
				}
			}
		}
		return $returnstring;
	}
	
	/**
	 * Returns all class properties as an array.
	 * @return array
	 */
	public function toArray() {
		return get_object_vars($this);
	}
}