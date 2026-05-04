<?php
include 'connect.php';

if(isset($_POST['signIn'])){
   $email = $_POST['email'];
   $password = $_POST['password'];
   $password = md5($password);

   // Query to check if the user's credentials are correct
   $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
   $result = $conn->query($sql);

   if($result->num_rows > 0){
       session_start();
       $row = $result->fetch_assoc();

       // Store user email in session
       $_SESSION['email'] = $row['email'];

       // Check if the user is an admin or a regular user
       if($row['role'] == 'admin'){
           $_SESSION['userRole'] = 'admin';
           header("Location: ../admin.php"); // Redirect to admin dashboard
           exit();
       } else {
           $_SESSION['userRole'] = 'user';
           header("Location: ../index.php"); // Redirect regular user to home page
           exit();
       }
   } else {
       echo "Incorrect Email or Password.";
   }
}

// Registration process remains the same
if(isset($_POST['signUp'])){
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if($result->num_rows > 0){
        echo "Email Address Already Exists!";
    } else {
        // You can define the default role as 'user' here
        $insertQuery = "INSERT INTO users(firstName, lastName, email, password, role) 
                        VALUES ('$firstName', '$lastName', '$email', '$password', 'user')";
        if($conn->query($insertQuery) === TRUE){
            header("Location: index.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
