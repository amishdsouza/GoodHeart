<?php
// Database configuration
$dbHost     = "remotemysql.com";
$dbUsername = "Ma4SOUd77f";
$dbPassword = "zQr3rrgFgG";
$dbName     = "Ma4SOUd77f";
// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>