<?php

require('db.php');

try
{
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        echo "Connected successfully<br>";
    }
}
catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// Get visitor's IP address
$visitor_ip = $_SERVER['REMOTE_ADDR'];

// Get current time
$current_time = date("Y-m-d H:i:s");

// Display message
echo "Hello World!<br>";
echo "Your IP address is: " . $visitor_ip . "<br>";
echo "Current time is: " . $current_time . "<br>";

$conn->close();
?>
