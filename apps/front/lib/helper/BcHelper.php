<?php

// return with no change if string is shorter than $limit
function myTruncate($s, $l, $e = '...')
{   
  $i = 0;
  $tags = array();
  
  if($mbstring = extension_loaded('mbstring'))
  {
    mb_internal_encoding('UTF-8');
    $strlen = 'mb_strlen';
    $substr = 'mb_substr';
  }
  else
  {
    $strlen = 'strlen';
    $substr = 'substr';
  }
  
  preg_match_all('/<[^>]+>([^<]*)/', $s, $m, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
  foreach($m as $o){
    if($o[0][1] - $i >= $l)
    break;
    $t = $substr(strtok($o[0][0], " \t\n\r\0\x0B>"), 1);
    if($t[0] != '/')
    $tags[] = $t;
    elseif(end($tags) == $substr($t, 1))
    array_pop($tags);
    $i += $o[1][1] - $o[0][1];
  }
  
  return $substr($s, 0, $l = min($strlen($s),  $l + $i)) . (count($tags = array_reverse($tags)) ? '</' . implode('></', $tags) . '>' : '') . ($strlen($s) > $l ? $e : '');
}