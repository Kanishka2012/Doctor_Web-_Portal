<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="bg-image">
    <div class="loginBox">
    <form action="admin_login.php" method="POST" class="form">
        <h1 >Admin Login</h1>
        <input type="text" name="username" class="btnInput" placeholder="Username">
        <input type="password" name="password" class="btnInput" placeholder="Password">
        <button class="btnLogin" name="login">Login</button>
    </form>
    </div>
    </div>
</body>
</html>

<?php 
include("connection.php");
session_start();
if(isset($_SESSION['admin'])){
    header('location:adminloggedin.php');
    exit();
}
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $check_admin="select * from admin where username = '$username'";
    $run=mysqli_query($conn,$check_admin);
    if(mysqli_num_rows($run)){
        while($row=mysqli_fetch_array($run)){
            $hash=$row['password'];
            $status=$row['status'];
        }
        if($status === 0){
            echo "<script> alert('Doctor is inactive')</script>";
            exit();
        }
        if(!password_verify($password,$hash)){
            echo "<script> alert('Invalid password')</script>";
            exit();
        }
        $_SESSION['admin']=1;
        header("location:adminloggedin.php");
    }
    else{
        echo "<script> alert(Invalid username or password)</script>";
    }
}
?>