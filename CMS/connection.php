<?php 

// Database connection settings
$host = 'localhost';
$username = 'first_school';
$password = 'first_school';
$database = 'cpd_cms_db';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>