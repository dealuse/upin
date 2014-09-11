<?php

  // array of possible top-level domains
  $tlds = array("gmail.com","hotmail.com","yahoo.com","163.com");

  // string of possible characters
  $char = "0123456789abcdefghijklmnopqrstuvwxyz";

  // start output
  echo "<p>\n";

  // main loop - this gives 1000 addresses
  for ($j = 0; $j < 10000; $j++) {

    // choose random lengths for the username ($ulen) and the domain ($dlen)
    $ulen = mt_rand(5, 10);
    $dlen = mt_rand(7, 17);

    // reset the address
    $a = "";

    // get $ulen random entries from the list of possible characters
    // these make up the username (to the left of the @)
    for ($i = 1; $i <= $ulen; $i++) {
      $a .= substr($char, mt_rand(0, strlen($char)), 1);
    }

    // wouldn't work so well without this
    $a .= "@";

    // finally, pick a random top-level domain and stick it on the end
    $a .= $tlds[mt_rand(0, (sizeof($tlds)-1))];

$url = 'http://www.zhangoworld.com/index.php/newsletter/subscriber/new/' ; 
$fields = array( 
'email'=> $a, 
'city'=> 8 
); 
//url-ify the data for the POST 
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&' ; } 
rtrim($fields_string ,'&') ; 
//open connection 
$ch = curl_init() ; 
//set the url, number of POST vars, POST data 
curl_setopt($ch, CURLOPT_URL,$url) ; 
curl_setopt($ch, CURLOPT_POST,count($fields)) ; 
curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string) ; 
//execute post 
$result = curl_exec($ch) ; 
//close connection 
curl_close($ch) ; 

    // done - echo the address inside a link
    echo "<a href=\"mailto:". $a. "\">". $a. "</a><br>\n";

  } 

  // tidy up - finish the paragraph
  echo "</p>\n";


/*
$url = 'http://www.zhangoworld.com/index.php/newsletter/subscriber/new/' ; 
$fields = array( 
'email'=> $one, 
'city'=> 8 
); 
//url-ify the data for the POST 
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&' ; } 
rtrim($fields_string ,'&') ; 
//open connection 
$ch = curl_init() ; 
//set the url, number of POST vars, POST data 
curl_setopt($ch, CURLOPT_URL,$url) ; 
curl_setopt($ch, CURLOPT_POST,count($fields)) ; 
curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string) ; 
//execute post 
$result = curl_exec($ch) ; 
//close connection 
curl_close($ch) ; 