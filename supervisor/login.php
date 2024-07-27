<?php 
session_start();
error_reporting(E_ALL); // Report all errors
ini_set('display_errors', 1); // Display errors

include('../includes/config.php');

if(isset($_POST['submit'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Fetch student data from database
    $sql = "SELECT * FROM supervisor WHERE institution_email=:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() > 0) {
        $hashedPassword = $results[0]->Password;
        if(password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $results[0]->user_id;
            //  echo "<script>alert('Login successful');</script>";
            echo "<script>window.location.href='supervisor_dashboard.html';</script>";
        } else {
            echo "<script>alert('Invalid email or pass');</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password');</script>";
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
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../assets/dist/css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
<form method="POST" class="form-signin" action="">
        <div class="text-center mb-4">
            <img class="mb-4" src="../assets/brand/logo.svg" alt="" width="40" height="40">
            <h1 class="h4 mb-3 font-weight-normal">Internship E-logbook</h1>
            <hr>
            <p> login</p>
        </div>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
        <a href="" >Forgot password?</a>
        <p class="mt-3 mb-3 text-muted">No account? <a href="signup.php">Create Account</a></p>
    </form>
</body>
</html>
