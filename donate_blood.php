<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Donate Blood Form">
  <meta name="author" content="Blood Donation System">
  <title>Donate Blood</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .form-group label {
      font-weight: bold;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .alert {
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <?php
  $active = 'donate';
  include('head.php');
  ?>

  <div class="container mt-5">
    <h1 class="text-center mb-4">Donate Blood</h1>

    <?php
    // Display success or error message
    if (isset($_GET['status'])) {
      if ($_GET['status'] == 'success') {
        echo '<div class="alert alert-success text-center">Your blood donation details have been successfully submitted!</div>';
      } elseif ($_GET['status'] == 'error') {
        echo '<div class="alert alert-danger text-center">There was an error submitting your details. Please try again.</div>';
      }
    }
    ?>

    <form name="donor" action="savedata.php" method="post" id="donorForm">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="fullname">Full Name<span class="text-danger">*</span></label>
          <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter your full name" required>
        </div>
        <div class="form-group col-md-6">
          <label for="mobileno">Mobile Number<span class="text-danger">*</span></label>
          <input type="text" name="mobileno" class="form-control" id="mobileno" placeholder="Enter your mobile number" pattern="[0-9]{10}" title="Enter a valid 10-digit number" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="emailid">Email ID</label>
          <input type="email" name="emailid" class="form-control" id="emailid" placeholder="Enter your email">
        </div>
        <div class="form-group col-md-3">
          <label for="age">Age<span class="text-danger">*</span></label>
          <input type="number" name="age" class="form-control" id="age" placeholder="Enter your age" min="18" max="60" required>
        </div>
        <div class="form-group col-md-3">
          <label for="gender">Gender<span class="text-danger">*</span></label>
          <select name="gender" class="form-control" id="gender" required>
            <option value="" selected disabled>Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="blood">Blood Group<span class="text-danger">*</span></label>
          <select name="blood" class="form-control" id="blood" required>
            <option value="" selected disabled>Select</option>
            <?php
            include 'conn.php';
            $sql = "SELECT * FROM blood";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value="' . htmlspecialchars($row['blood_id']) . '">' . htmlspecialchars($row['blood_group']) . '</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="address">Address<span class="text-danger">*</span></label>
          <textarea name="address" class="form-control" id="address" rows="3" placeholder="Enter your address" required></textarea>
        </div>
      </div>

      <div class="form-row">
        <div class="col text-center">
          <button type="submit" name="submit" class="btn btn-primary btn-lg" id="submitButton">Submit</button>
        </div>
      </div>
    </form>
  </div>

  <?php include('footer.php'); ?>

  <!-- JS for Form Validation -->
  <script>
    // Form validation script
    $(document).ready(function() {
      $('#donorForm').on('submit', function(e) {
        const mobilePattern = /^[0-9]{10}$/;
        const mobile = $('#mobileno').val();

        if (!mobilePattern.test(mobile)) {
          alert('Please enter a valid 10-digit mobile number.');
          e.preventDefault();
        }
      });
    });
  </script>
</body>

</html>
