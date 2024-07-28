<?php
session_start();
error_reporting(0);
include('../includes/config.php');

?>
<!doctype html>
<html lang="en">
    <head>
        <title>Internship e-logbook admin dashboard</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
         <!---Favicons-->
    <link rel="shortcut icon" href="Internship-e-logbook-forms/assets/brand/logo.svg" type="image/x-icon">
        <!-- Bootstrap CSS v5.2.1 -->
       
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../assets/dist/css/style_dashboard.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body class="body">
        <header>
            <!-- place navbar here -->
            <nav class="navbar navbar-dark bg-dark fixed-top">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">Internship e-logbook</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                      <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Internship e-logbook</h5>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <!-- profile -->
                    <div class="w3-container w3-row">
                        <div class="w3-col s4">
                          <img src="../images/avatar2.png" class="w3-circle w3-margin-right" style="width:56px" height="56px">
                        </div>
                        <div class="w3-col s8 w3-bar">
                          <span>Welcome, <strong>Ismail</strong></span><br>
                          <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
                          <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
                          <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
                        </div>
                      </div>
                      <hr>
                    <div class="offcanvas-body">
                      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="./admin_dashboard"><i style="font-size:24px" class="fa">&#xf015;</i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#"><i style="font-size:24px" class="fa">&#xf06a;</i> About</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i style="font-size:24px" class="fa">&#xf0c0;</i> Students
                          </a>
                          <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#"><i style="font-size:24px" class="fa">&#xf234;</i> Add Student</a></li>
                            <li><a class="dropdown-item" href="#"><i style="font-size:24px" class="fa">&#xf06e;</i> View student Activities</a></li>
                            <li><a class="dropdown-item" href="#"><i style="font-size:24px" class="fa">&#xf2c2;</i> View student info</a></li>
                          </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i style="font-size:24px" class="fa">&#xf08b;</i> Logout</a>
                          </li>
                      </ul>
                      <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                      </form>
                    </div>
                  </div>
                </div>
              </nav>
              
        </header>
        <main>
        
                <!-- Header -->
  <header class="w3-container." style="padding-top:22px; color:white;">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
        <a href="activities.html" class="Dash_buttons"><div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-reorder" style="font-size:48px;color:rgb(255, 255, 255)"></i></div>
        <div class="w3-right">
          <h3>  <?php
            $sql = "SELECT activity_id FROM activity";
            $query = $dbh->prepare($sql);
            if ($query->execute()) {
                $bg = $query->rowCount();
                echo $bg;
            } else {
                echo "Error: " . $query->errorInfo()[2];
            }
            ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Activities</h4>
      </div></a>
    </div>
     <div class="w3-quarter">
        <a href="#" class="Dash_buttons"><div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-male" style="font-size:48px;color:rgb(255, 255, 255)"></i></i></div>
        <div class="w3-right">
          <h3><?php
            $sql = "SELECT supervisor_id FROM supervisor";
            $query = $dbh->prepare($sql);
            if ($query->execute()) {
                $bg = $query->rowCount();
                echo $bg;
            } else {
                echo "Error: " . $query->errorInfo()[2];
            }
            ?>
          </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Supervisors</h4>
      </div></a>
    </div>
    <div class="w3-quarter">
        <a href="#" class="Dash_buttons"><div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-mortar-board" style="font-size:48px;color:rgb(255, 255, 255)"></i></div>
        <div class="w3-right">
          <h3>
            <?php
            $sql = "SELECT institution_id FROM institution";
            $query = $dbh->prepare($sql);
            if ($query->execute()) {
                $bg = $query->rowCount();
                echo $bg;
            } else {
                echo "Error: " . $query->errorInfo()[2];
            }
            ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Institutions</h4>
      </div></a>
    </div>
    <div class="w3-quarter">
        <a href="#" class="Dash_buttons"><div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php
            $sql = "SELECT student_id FROM student";
            $query = $dbh->prepare($sql);
            if ($query->execute()) {
                $bg = $query->rowCount();
                echo $bg;
            } else {
                echo "Error: " . $query->errorInfo()[2];
            }
            ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Students</h4>
      </div></a>
    </div>
  </div>
 

<!-- calender -->
<div class="test-body">
  <div class="contianer" style="display: flex;flex-direction: row;">
    <div class="calendar">
      <div class="calendar-header">
        <span class="month-picker" id="month-picker"> May </span>
        <div class="year-picker" id="year-picker">
          <span class="year-change" id="pre-year">
            <pre><</pre>
          </span>
          <span id="year">2020 </span>
          <span class="year-change" id="next-year">
            <pre>></pre>
          </span>
        </div>
      </div>
  
      <div class="calendar-body">
        <div class="calendar-week-days">
          <div>Sun</div>
          <div>Mon</div>
          <div>Tue</div>
          <div>Wed</div>
          <div>Thu</div>
          <div>Fri</div>
          <div>Sat</div>
        </div>
        <div class="calendar-days">
        </div>
      </div>
      <div class="calendar-footer">
      </div>
      <div class="activities"></div>
      <div class="date-time-formate">
        <div class="day-text-formate">TODAY</div>
        <div class="date-time-value">
          <div class="time-formate">01:41:20</div>
          <div class="date-formate">03 - march - 2022</div>
        </div>
      </div>
      <div class="month-list"></div>
    </div>
   
  </div>

  <!-- Contact Section -->
<div class="contact">
  <div class="w3-padding-32 w3-content w3-text-white" id="contact" style="margin-bottom:64px; margin: 20px;">
    <h2>Contact Us</h2>
    
  
    <div class="w3-section">
      <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> Uganda, Mbarara</p>
      <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Phone: +256 740 112 642</p>
      <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Email: athmanismail4@gmail.com</p>
    </div>
  </div>
  </div>
</div>

</div>


        </main>
        <!-- Footer -->
  <footer class="w3-container w3-padding-36 w3-light-grey w3-center w3-opacity w3-xlarge" style="margin:-24px">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Powered by <a href="https://www.must.ac.ug/" target="_blank" class="w3-hover-text-green">Mbarara University</a></p>
  <!-- End footer -->
  </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="../assets/dist/js/index.js"></script>
    </body>
</html>
