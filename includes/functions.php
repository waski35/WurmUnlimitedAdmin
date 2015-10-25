<?php

// Check if logged in
if (!function_exists("isLoggedin"))
{
  function isLoggedin()
  {
  	if(isset($_SESSION['userData']))
    {
  		return true;
    }
  	else
    {
  		return false;
    }

  }

}


if (!function_exists("Guid"))
{
  function Guid()
  {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
      // 32 bits for "time_low"
      mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

      // 16 bits for "time_mid"
      mt_rand( 0, 0xffff ),

      // 16 bits for "time_hi_and_version",
      // four most significant bits holds version number 4
      mt_rand( 0, 0x0fff ) | 0x4000,

      // 16 bits, 8 bits for "clk_seq_hi_res",
      // 8 bits for "clk_seq_low",
      // two most significant bits holds zero and one for variant DCE1.1
      mt_rand( 0, 0x3fff ) | 0x8000,

      // 48 bits for "node"
      mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );

  }

}

if (!function_exists("time_elapsed_string"))
{
  function time_elapsed_string($datetime, $full = false)
  {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
    );
    foreach ($string as $k => &$v)
    {
      if ($diff->$k)
      {
        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      }
      else
      {
        unset($string[$k]);
      }

    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';

  }

}

if (!function_exists("return_bytes"))
{
  function return_bytes($val)
  {
    $val = trim($val);
    $last = strtolower($val[strlen($val)-1]);
    switch($last)
    {
      // The 'G' modifier is available since PHP 5.1.0
      case 'g':
        $val *= 1024;
      case 'm':
        $val *= 1024;
      case 'k':
        $val *= 1024;
    }

    return $val;
  }

}

?>