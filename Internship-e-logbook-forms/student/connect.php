<?php 
    $name = $_POST['name'];
    $student_email = $_POST['student_email'];
    //$institution_id = $_POST['institution_id'];
    $Gender = $_POST['Gender'];
    $Contact = $_POST['Contact'];
    $Student_level = $_POST['Student_level'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    //database connection
    $conn = new mysqli('localhost', 'root', '', 'internship');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);

    }else{
        $stmt = $conn->prepare("insert into test(name, student_email,  Gender, Contact, Student_level, password, confirm_password ) 
            values(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisisss", $name, $student_email, $Gender, $Contact, $Student_level, $password, $confirm_password);
        $stmt->execute();
        echo "Registration Successfull";
        $stmt->close();
        $conn->close();
    }
    
?>