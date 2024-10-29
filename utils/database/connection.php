<?php

$host = "localhost";
$username = "root";
$password = "root";
$dbName = "pasar_kerja";

$conn = mysqli_connect($host, $username, $password, $dbName);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}