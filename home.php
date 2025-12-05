<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
 /* Styles for the cards */
.special-cards .custom-card {
    border: 2px solid #17a2b8; /* Info color */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    overflow: hidden; /* Prevent overflow of the card itself */
    height: 250px; /* Fixed height */
    display: flex; /* Enable flexbox for header and body */
    flex-direction: column; /* Stack header and body vertically */
    background-color: #fff; /* Ensure cards have a visible background */
}

.special-cards .custom-header {
    background-color: #17a2b8; /* Info color */
    color: #fff; /* Text color */
    font-size: 1.2rem; /* Header font size */
    text-align: center; /* Center align header text */
    padding: 10px; /* Compact padding */
    flex-shrink: 0; /* Prevent header from resizing */
}

.special-cards .custom-body {
    padding: 10px; /* Compact padding for content */
    font-size: 0.9rem; /* Content font size */
    color: #333; /* Text color for better readability */
    line-height: 1.4; /* Line height for readability */
    background-color: #f9f9f9; /* Light background for contrast */
    border-top: 1px solid #e0e0e0; /* Separator for content area */
    overflow-y: auto; /* Enable scrolling when content overflows */
    flex-grow: 1; /* Allow the content area to grow and take up remaining space */
    max-height: calc(100% - 50px); /* Adjust height dynamically */
}

/* Scrollbar styling */
.special-cards .custom-body::-webkit-scrollbar {
    width: 10px; /* Scrollbar width */
}

.special-cards .custom-body::-webkit-scrollbar-thumb {
    background: #aaa; /* Scrollbar thumb color */
    border-radius: 4px; /* Rounded corners */
}

.special-cards .custom-body::-webkit-scrollbar-thumb:hover {
    background: #888; /* Darker on hover */
}

.special-cards .custom-body::-webkit-scrollbar-track {
    background: #f1f1f1; /* Track background */
}

</style>
</head>

<body>
<div class="header">
<?php
$active="home";
include('head.php'); ?>

</div>
<?php include'ticker.php'; ?>

  <div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;   ">
    <div class="container">
    <div id="content-wrap"style="padding-bottom:75px;">
  <div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="image\_107317099_blooddonor976.jpg" alt="image\_107317099_blooddonor976.jpg" width="100%" height="500">
      </div>
      <div class="carousel-item">
        <img src="image\Blood-facts_10-illustration-graphics__canteen.png" alt="image\Blood-facts_10-illustration-graphics__canteen.png" width="100%" height="500">
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
<br>
        <h1 style="text-align:center;font-size:45px;">Welcome to BloodBank & Donor Management System</h1>
<br>
<div class="special-cards row">
    <!-- Card 1 -->
    <div class="col-lg-4 mb-4">
        <div class="custom-card">
            <h4 class="custom-header">The Need for Blood</h4>
            <div class="custom-body">
                <?php
                    include 'conn.php';
                    $sql = "select * from pages where page_type='needforblood'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo $row['page_data'];
                        }
                    }
                ?>
            
        </div>
    </div>
    </div>
     <!-- Card 1 -->
     <div class="col-lg-4 mb-4">
        <div class="custom-card">
            <h4 class="custom-header">Blood Tips</h4>
            <div class="custom-body">
                <?php
                    include 'conn.php';
                    $sql = "select * from pages where page_type='bloodtips'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo $row['page_data'];
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="custom-card">
            <h4 class="custom-header">Who you could Help</h4>
            <div class="custom-body">
                <?php
                    include 'conn.php';
                    $sql = "select * from pages where page_type='whoyouhelp'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo $row['page_data'];
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>


        <h2>Blood Donor Names</h2>

        <div class="row">
          <?php
            include 'conn.php';
            $sql= "select * from donor_details join blood where donor_details.donor_blood=blood.blood_id order by rand() limit 6";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0)
            {
            while($row = mysqli_fetch_assoc($result)) {
           ?>
            <div class="col-lg-4 col-sm-6 portfolio-item" ><br>
            <div class="card" style="width:300px">
                <img class="card-img-top" src="image\blood_drop_logo.jpg" alt="Card image" style="width:100%;height:300px">
                <div class="card-body">
                  <h3 class="card-title"><?php echo $row['donor_name']; ?></h3>
                  <p class="card-text">
                    <b>Blood Group : </b> <b><?php echo $row['blood_group']; ?></b><br>
                    <b>Mobile No. : </b> <?php echo $row['donor_number']; ?><br>
                    <b>Gender : </b><?php echo $row['donor_gender']; ?><br>
                    <b>Age : </b> <?php echo $row['donor_age']; ?><br>
                    <b>Address : </b> <?php echo $row['donor_address']; ?><br>
                  </p>

                </div>
              </div>
        </div>
      <?php }} ?>
</div>
<br>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-6">
                <h2>BLOOD GROUPS</h2>
                <p>
                  <?php
                    include 'conn.php';
                    $sql=$sql= "select * from pages where page_type='bloodgroups'";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0)   {
                        while($row = mysqli_fetch_assoc($result)) {
                          echo $row['page_data'];
                        }
                      }

                   ?></p>

            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="image\blood_donationcover.jpeg" alt="" >
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
            <h4>UNIVERSAL DONORS AND RECIPIENTS</h4>
            <p>
              <?php
                include 'conn.php';
                $sql=$sql= "select * from pages where page_type='universal'";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0)   {
                    while($row = mysqli_fetch_assoc($result)) {
                      echo $row['page_data'];
                    }
                  }

               ?></p>
              </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-secondary btn-block" href="donate_blood.php" style="align:center; background-color:#7FB3D5;color:#273746 ">Become a Donor </a>
            </div>
        </div>

    </div>
  </div>
  <?php include('footer.php');?>
</div>

</body>

</html>
