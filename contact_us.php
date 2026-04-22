<?php 
$active ='contact';
include 'head.php'; 
?>

<?php
include 'conn.php';

if(isset($_POST["send"])){

  $name    = $_POST['fullname'] ?? '';
  $number  = $_POST['contactno'] ?? '';
  $email   = $_POST['email'] ?? '';
  $message = $_POST['message'] ?? '';

  if(empty($name) || empty($number) || empty($email) || empty($message)){
    echo "<script>alert('Please fill all fields');</script>";
  } else {

    $sql = "INSERT INTO contact_query 
    (query_name, query_mail, query_number, query_message) 
    VALUES ('$name','$email','$number','$message')";

    $result = mysqli_query($conn,$sql);

    if($result){
      echo "<script>alert('Message sent successfully!');</script>";
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }
}
?>

<div id="page-container" style="margin-top:50px; min-height:84vh;">
<div class="container">
<div id="content-wrap" style="padding-bottom:50px;">

<h1 class="mt-4 mb-3">Contact Us</h1>

<div class="row">

<!-- LEFT: FORM -->
<div class="col-lg-8 mb-4">
<h3>Send us a Message</h3>

<form method="post">

<div class="form-group">
<label>Full Name:</label>
<input type="text" class="form-control" name="fullname" required>
</div>

<div class="form-group">
<label>Phone Number:</label>
<input type="text" class="form-control" name="contactno" pattern="[0-9]{10}" required>
</div>

<div class="form-group">
<label>Email Address:</label>
<input type="email" class="form-control" name="email" required>
</div>

<div class="form-group">
<label>Message:</label>
<textarea class="form-control" name="message" rows="5" required></textarea>
</div>

<button type="submit" name="send" class="btn btn-primary">Send</button>

</form>
</div>

<!-- RIGHT: CONTACT DETAILS -->
<div class="col-lg-4 mb-4">
<h2>Contact Details</h2>

<?php
$sql= "SELECT * FROM contact_info";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
  while($row = mysqli_fetch_assoc($result)) {
?>

<p><strong>Address:</strong> <?php echo $row['contact_address']; ?></p>
<p><strong>Phone:</strong> <?php echo $row['contact_phone']; ?></p>
<p><strong>Email:</strong> <?php echo $row['contact_mail']; ?></p>

<?php 
  }
}
?>

</div>

</div>
</div>
</div>

<?php include 'footer.php'; ?>

