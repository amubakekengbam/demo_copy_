<?php

// Program to display complete URL
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
	$link = "https";
else $link = "http";

// Here append the common URL
// characters.
$link .= "://";

// Append the host(domain name,
// ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];

// Append the requested resource
// location to the URL
$link .= $_SERVER['PHP_SELF'];

// Display the link
echo $link;
?>
