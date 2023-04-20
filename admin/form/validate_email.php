<?php

$email=  $_POST['email'];
if(filter_ var($email, FILTER_VALIDATE_EMAIL)=== false)
{
 exit("invalid format");
}

$api_key= "YOUR_UNIQUE_API_KEY";
$ch= curl_int();




curl_setopt_array($ch,[
    CURLOPT_URL => "htt"
])