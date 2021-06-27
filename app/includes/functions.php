<?php

  function formatTime($time){
    return number_format(($time/60), 2, '.', '');
  }

  function tuncrateList(array $source, $table=['']){
    $temp = $source;
    foreach($source as $key => $val){
      if(!in_array($key, $table)){
        unset($temp[$key]);
      }
    }
    return $temp;
  }
// uwu
?>