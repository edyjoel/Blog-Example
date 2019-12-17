<?php
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'blog';

$db = mysqli_connect($server, $user, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

if (!isset($_SESSION)) {
  session_start();
}