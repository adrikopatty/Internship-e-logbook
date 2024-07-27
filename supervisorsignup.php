

<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('includes/config.php');

if(isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $mobile = $_POST['mobileno'];
    $email = $_POST['emailid'];
    $inputinstitution = $_POST['inputinstitution'];
    $gender = $_POST['gender'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $ret = "SELECT institution_email FROM supervisor WHERE institution_email=:email";
    $query = $dbh->prepare($ret);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() == 0) {
        $sql = "INSERT INTO supervisor (name, institution_email,  Contact, institution_id,  Password, Gender) VALUES (:fullname, :email, :mobile, :inputinstitution, :password , :gender)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $query->bindParam(':inputinstitution', $inputinstitution, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':gender', $gender, PDO::PARAM_STR);

        $query->execute();
        $lastInsertId = $dbh->lastInsertId();

        if($lastInsertId) {
            $_SESSION['supervisor_id'] = $lastInsertId;
            echo "<script>alert('You have signed up successfully');</script>";
            echo "<script>window.location.href='supervisor/supervisor_dashboard.php';</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    } else {
        echo "<script>alert('Email already exists. Please try again');</script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tricia">
    <title>Supervisor </title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/brand/logo.svg" type="image/x-icon">
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="assets/floating-labels.css" rel="stylesheet">
    <link href="assets/dist/css/signin.css" rel="stylesheet">
</head>
<body>
    <form class="form-signin" method="POST">
        <div class="text-center mb-4">
            <img class="mb-4" src="assets/brand/logo.svg" alt="" width="40" height="40">
            <h1 class="h4 mb-3 font-weight-normal">Internship E-logbook</h1>
            <hr>
            <p>Supervisor Sign Up</p>
        </div>

        <div class="form-label-group">
            <label for="fullname">Name</label>
            <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Name" required="" autofocus="">
        </div>

        <div class="form-label-group">
            <label for="emailid">Email</label>
            <input type="email" id="emailid" name="emailid" class="form-control" placeholder="Email address" required="">
        </div>

        <div class="form-label-group">
            <label for="inputinstitution">Choose Institution</label>
            <select id="inputinstitution" name="inputinstitution" class="form-control" required>
                <?php
                    // Include database connection
                    include('includes/config.php');

                    // SQL query to fetch institution IDs
                    $sql = "SELECT institution_id FROM institution";
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Populate dropdown with fetched data
                    foreach ($results as $row) {
                        echo "<option value='" . htmlentities($row['institution_id']) . "'>" . htmlentities($row['institution_id']) . "</option>";
                    }
                ?>
            </select>
        </div>

        <div class="form-label-group">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" class="form-control" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="form-label-group">
            <label for="mobileno">Contact</label>
            <input type="text" id="mobileno" name="mobileno" class="form-control" placeholder="Contact" required="">
        </div>

        <div class="form-label-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign Up</button>
        <p class="mt-3 mb-3 text-muted">Already have an account?
            <a href="supervisor/login.php">Login</a>
        </p>
    </form>
</body>
</html>
