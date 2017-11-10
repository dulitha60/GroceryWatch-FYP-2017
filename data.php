<?php
   header("Content-Type: application/json");

   $mysqli = new mysqli('192.168.64.2','root','rootroot','Test');

   $query = sprintf("SELECT vegeid,weight FROM vegetables");

   $result = $mysqli->query($query);

   $data = array();
   foreach ($result as $row) {
   		$data[] = $row;
   	# code...
   }

   

   $result->close();

   $mysqli->close();

   print json_encode($data);