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
    <form action="patient_register.php" method="POST">
        <div class="wrapper">
        <div class="form-header">
            <h1>Register a Patient</h1>
        </div>
        <div class="form-body">
            <div class="input-left">
                <input type="text" name="name" placeholder="Name">
                <input type="tel" name="primary_contact" placeholder="Primary contact no.">
                <input type="text" name="aadhar" placeholder="Aadhar card no.">
                <input type="text" name="username" placeholder="Username">
                <label>Status</label>
                <select name="status" id="status">
                    //<option value="">Choose Status</option>
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                </select>
            </div>
            <div class="input-right">
                <input type="text" name="address" placeholder="Address">
                <input type="tel" name="sec_contact" placeholder="Secondary contact no.">
                <input type="text" name="pan" placeholder="Pan card no.">
                <input type="password" name="password" placeholder="Password">
            </div>
        </div>
        <div class="form-footer">
            <button class="btn-register">Register</button>
        </div>
        </div>
    </form>
    </div>
</body>
</html>

<?php 
$conn=mysqli_connect("localhost","root","");
if(isset($_POST['name'])){
    $name=$_POST['name'];
    $primary_contact=$_POST['primary_contact'];
    $sec_contact=$_POST['sec_contact'];
    $address=$_POST['address'];
    $aadhar=$_POST['aadhar'];
    $pan=$_POST['pan'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $status=$_POST['status'];
    if($username=='')  
    {  
        echo"<script>alert('Please enter the username')</script>";  
        exit();  
    }  
    if($password=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
        exit();  
    }
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $sql="insert into `doctor`.`patient` (`name`,`primary_contact`,`sec_contact`,`address`,`aadhar`,`pan`,
    `username`,`password`,`status`)
    values ('$name','$primary_contact','$sec_contact','$address','$aadhar','$pan','$username','$hash_password','$status')";
    $run=mysqli_query($conn,$sql);
    header("location:adminloggedin.php");
    $conn->close();

}


?>