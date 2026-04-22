<?php
$conn = mysqli_connect("localhost", "root", "", "blood_donation");
// Update database credentials before running

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
