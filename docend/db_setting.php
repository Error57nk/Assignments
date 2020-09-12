<?php

$servername = "localhost";
$dBUsername = 'root';
$dbPassword ="root";
$dbName = "mail_save";

$conn = mysqli_connect($servername,$dBUsername,$dbPassword,$dbName);


if(!$conn){
  die("Connection failed: ".mysqli_connect_error());
  echo "Connected !! <br>";
}

