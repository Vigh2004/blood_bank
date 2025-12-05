<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Need Blood</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <?php 
    $active = 'need';
    include('head.php'); 
  ?>

  <div id="page-container" class="d-flex flex-column min-vh-100">
    <div class="container my-5">
      <h1 class="text-center mb-4">Need Blood</h1>
      
      <form name="needblood" action="" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="bloodGroup">Blood Group<span class="text-danger">*</span></label>
            <select id="bloodGroup" name="blood" class="form-control" required>
              <option value="" selected disabled>Select</option>
              <?php
              include 'conn.php';
              // Fetch blood groups from the `blood` table
              $sql = "SELECT blood_id, blood_group FROM blood";
              $result = mysqli_query($conn, $sql);
              
              if ($result && mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      echo '<option value="' . htmlspecialchars($row['blood_id']) . '">' . htmlspecialchars($row['blood_group']) . '</option>';
                  }
              } else {
                  echo '<option value="" disabled>No blood groups available</option>';
              }
              ?>
            </select>
          </div>
          
          <div class="form-group col-md-6">
            <label for="reason">Reason for Need<span class="text-danger">*</span></label>
            <textarea id="reason" name="reason" class="form-control" rows="3" required></textarea>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="userName">Your Name<span class="text-danger">*</span></label>
            <input type="text" id="userName" name="user_name" class="form-control" required>
          </div>
          
          <div class="form-group col-md-6">
            <label for="userPhone">Your Phone Number<span class="text-danger">*</span></label>
            <input type="text" id="userPhone" name="user_phone" class="form-control" pattern="[0-9]{10}"required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="userEmail">Your Email (Optional)</label>
            <input type="email" id="userEmail" name="user_email" class="form-control">
          </div>
        </div>
        
        <button type="submit" name="submit_request" class="btn btn-primary">Submit Request</button>
      </form>

      <?php
      if (isset($_POST['submit_request'])) {
          include 'conn.php';

          // Sanitize user input
          $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
          $user_phone = mysqli_real_escape_string($conn, $_POST['user_phone']);
          $user_email = isset($_POST['user_email']) ? mysqli_real_escape_string($conn, $_POST['user_email']) : NULL;
          $blood_group = mysqli_real_escape_string($conn, $_POST['blood']);
          $reason = mysqli_real_escape_string($conn, $_POST['reason']);

          // Insert the request into the blood_requests table
          $sql = "INSERT INTO blood_requests (user_name, user_phone, user_email, blood_group, reason) 
                  VALUES (?, ?, ?, ?, ?)";
          
          $stmt = mysqli_prepare($conn, $sql);
          mysqli_stmt_bind_param($stmt, 'sssss', $user_name, $user_phone, $user_email, $blood_group, $reason);
          
          if (mysqli_stmt_execute($stmt)) {
              echo '<div class="alert alert-success mt-4 text-center">Your blood request has been submitted successfully!</div>';
          } else {
              echo '<div class="alert alert-danger mt-4 text-center">There was an error submitting your request. Please try again.</div>';
          }
          mysqli_stmt_close($stmt);
      }
      // Validate inputs
    if (empty($blood)) {
      $errors[] = "Please select a blood group.";
  }
  if (empty($reason)) {
      $errors[] = "Reason for need is required.";
  }
  if (empty($user_name)) {
      $errors[] = "Your name is required.";
  }
  if (empty($user_phone) || !preg_match("/^[0-9]{10}$/", $user_phone)) {
      $errors[] = "Please enter a valid 10-digit phone number.";
  }
  if (!empty($user_email) && !filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Please enter a valid email address.";
  }
      ?>

    </div>
    <?php include 'footer.php'; ?>
  </div>
</body>
</html>
