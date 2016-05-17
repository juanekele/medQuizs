<?php


$address="127.0.0.1";
$port="22";
$msg="1234";

$action1=$_GET['action1'];
if(isset($_GET['action2']))
{
	$action2=$_GET['action2'];
}

$sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Cannot create a socket");

socket_connect($sock,$address,$port) or die("Could not connect to the socket");

$read=socket_read($sock,1024);

socket_write($sock,$msg."\n");

$read=socket_read($sock,1024);

socket_write($sock,$action1."\n");

if(isset($action2))
{
 	$read=socket_read($sock,1024);
	socket_write($sock,$action2."\n");
}

socket_close($sock);