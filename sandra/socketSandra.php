<?php

  $address="127.0.0.1";
  $port="22";
  $msg="1234";

  $sock=socket_create(AF_INET,SOCK_STREAM,0) or die("Cannot create a socket");
  socket_connect($sock,$address,$port) or die("Could not connect to the socket");
  $read=socket_read($sock,1024);
  socket_write($sock,$msg."\n");
  $read=socket_read($sock,1024);
  socket_write($sock,$_GET['action']."\n");
  if($_GET['action']=="1")
  {
  	$read=socket_read($sock,1024);
 	 socket_write($sock,$_GET['id']."\n");

  }

  socket_close($sock);