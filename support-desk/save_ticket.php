<?php
ini_set('display_errors', 'On');
include('connect.php');

// Set the default timezone to your local timezone
date_default_timezone_set('Asia/Colombo'); // Replace 'Asia/Colombo' with your timezone if different
?>

<?php

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$hrisNo = $_POST['hrisNo'];
$userName = $_POST['userName'];
$category = $_POST['category'];
$title = $_POST['title'];
$priority = $_POST['priority'];
$description = $_POST['description'];
$date = date('Y-m-d');

// Generate ticket number as TKT + date and time (e.g., TKT20240829104330)
$ticket_number = 'TKT' . date('YmdHis');

$sql = "INSERT INTO FSF_TICKETING_USER (HRIS_NO, USERNAME, TICKET_NO, CATEGORY, TITLE, PRIORITY, DESCRIPTION, TICKET_STATUS, TICKET_CREATED, TICKET_CREATED_DATE) VALUES ('$hrisNo','$userName', '$ticket_number', '$category', '$title', '$priority', '$description', 'CREATED', 'YES', '$date')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>