<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About Us</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Header
$active = 'about';
include('head.php');
?>

<div id="page-container" style="margin-top:50px; position: relative; min-height:84vh;">
  <div class="container">
    <div id="content-wrap" style="padding-bottom:50px;">

      <div class="row">
        <div class="col-lg-6">
          <h1 class="mt-4 mb-3">About Us</h1>

          <p>
          <?php
          include(__DIR__ . '/conn.php');

          // ✅ FINAL QUERY (MOST COMMON FIX)
          $sql = "SELECT * FROM pages WHERE page_type='aboutus'";
          $result = mysqli_query($conn, $sql);

          if (!$result) {
              die("Query Error: " . mysqli_error($conn));
          }

          if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo $row['page_data'];
              }
          } else {
              echo "No data found!";
          }
          ?>
          </p>

        </div>
      </div>

    </div>
  </div>
</div>

<?php include('footer.php'); ?>

</body>
</html>
