<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Doctor</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body >
    <?php 
      include("connection.php");
      $sql="select * from speciality";
      $run=mysqli_query($conn,$sql);
    ?>
    <div class="bg-image">
    <form action="doctor_register.php" method="POST">
        <div class="wrapper">
        <div class="form-header">
            <h1>Register a Doctor</h1>
        </div>
        <div class="form-body">
            <div class="input-left">
                <input type="text" name="name" placeholder="Name">
                <input type="tel" name="primary_contact" placeholder="Primary contact no.">
                <input type="text" name="aadhar" placeholder="Aadhar card no.">
                <label for="">Visiting time from :</label>
                <input type="time" id="time" name="visit_time_from">
                <input type="text" name="username" placeholder="Username">
                <input type="text" id="address" name="address" placeholder="Address">
                <label>Status</label>
                <select name="status" id="status">
                    <option value="">Choose Status</option>
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                </select>
                <label for="join_date" id="margin">Joining date :</label>
                <input type="date" id="time" name="join_date">  
            </div>
            
            <div class="input-right">
                <input type="email" name="email" placeholder="Email">
                <input type="tel" name="sec_contact" placeholder="Secondary contact no.">
                <input type="text" name="pan" placeholder="Pan card no.">
                <label for="">Visiting time to :</label>
                <input type="time" id="time" name="visit_time_to">
                <input type="password" name="password" placeholder="Password">
                <input type="number" name="age" placeholder="Age">
                <label>Select speciality</label>
                <select name="speciality_id" id="speciality_id">
                    <option value="">Choose speciality</option>
                    <?php while($row=mysqli_fetch_array($run)){?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['title'];} ?></option>
                </select>
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
    $email=$_POST['email'];
    $primary_contact=$_POST['primary_contact'];
    $sec_contact=$_POST['sec_contact'];
    $address=$_POST['address'];
    $aadhar=$_POST['aadhar'];
    $pan=$_POST['pan'];
    $join_date=$_POST['join_date'];
    $speciality_id=$_POST['speciality_id'];
    $visit_time_from=$_POST['visit_time_from'];
    $visit_time_to=$_POST['visit_time_to'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $status=$_POST['status'];
    if($email=='')  
    {  
        echo"<script>alert('Please enter the email')</script>";  
        exit();  
    } 
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
    $sql="insert into `doctor`.`doctor` (`name`,`email`,`primary_contact`,`sec_contact`,`address`,`aadhar`,`pan`,
    `join_date`,`speciality_id`,`visit_time_from`,`visit_time_to`,`username`,`password`,`status`) values ('$name','$email','$primary_contact',
    '$sec_contact','$address','$aadhar','$pan','$join_date','$speciality_id','$visit_time_from','$visit_time_to','$username','$hash_password','$status')";
    $run=mysqli_query($conn,$sql);
    header("location:adminloggedin.php");
    $conn->close();

}


?>
