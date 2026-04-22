<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include(__DIR__ . '/conn.php');

$donor_name   = $_POST['fullname'] ?? '';
$donor_number = $_POST['mobileno'] ?? '';
$donor_mail   = $_POST['emailid'] ?? '';
$donor_age    = $_POST['age'] ?? '';
$donor_gender = $_POST['gender'] ?? '';
$donor_blood  = $_POST['blood'] ?? '';
$donor_address= $_POST['address'] ?? '';

$sql = "INSERT INTO donor_details 
(donor_name, donor_number, donor_mail, donor_age, donor_gender, donor_blood, donor_address)
VALUES 
('$donor_name', '$donor_number', '$donor_mail', '$donor_age', '$donor_gender', '$donor_blood', '$donor_address')";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

header("Location: home.php");
exit();
?>
