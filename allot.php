<?php
    include("connection.php");
    if(isset($_POST['allot'])){
       $doctor_id=$_POST['doctor'];
       $patient_id=$_POST['patient'];
       $disease_name=$_POST['disease'];
       $appoint_datetime=$_POST['appoint_datetime'];
       $status=$_POST['status'];
       $check_patient="select * from allot where patient_id='$patient_id'";
       $run=mysqli_query($conn,$check_patient);
       if(mysqli_num_rows($run)>0){
          $update="update allot  set 
          `doctor_id`=$doctor_id,`patient_id`='$patient_id',`disease_name`='$disease_name',
          `appoint_datetime`='$appoint_datetime',`status`='$status' where patient_id='$patient_id'";
          mysqli_query($conn,$update);
       }
       else{
        $insert="insert into allot (doctor_id,patient_id,disease_name,appoint_datetime,status) values
        ('$doctor_id','$patient_id','$disease_name','$appoint_datetime','$status')";
        mysqli_query($conn,$insert);
       }
        echo "<script>alert('Successfully alloted patient to doctor')</script>";
        header("location:adminloggedin.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Allot</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php 
include("connection.php");
$sql_p="select * from patient";
$run_p=mysqli_query($conn,$sql_p);
$sql_d="select * from doctor";
$run_d=mysqli_query($conn,$sql_d);
$sql_sp="select * from speciality";
$run_sp=mysqli_query($conn,$sql_sp);
?>
    <div class="bg-image">
        <form action="allot.php" method="POST">
            <div class="wrapper">
                <div class="form-header">
                    <h1>Allot Patient to Doctor</h1>
                </div>
                <div class="form-body">
                    <div class="input-left">
                        <label for="">Select Doctor</label>
                        <select name="doctor" id="doctor">
                        <option value="">Choose the Doctor</option>
                        <?php  while($row_d = mysqli_fetch_array($run_d)){?>
                        <option value="<?php echo $row_d['id'];?>"><?php echo $row_d['name'] ; }?></option>
                        </select> 

                        <label id="margin" for="">Enter appointment's datetime</label>
                        <input type="datetime-local" id="time" name="appoint_datetime">

                        <label for="">Select Disease</label>
                        <select name="disease" id="disease">
                            <option value="">Choose the disease</option>
                            <?php  while($row_sp = mysqli_fetch_array($run_sp)){?>
                            <option value="<?php echo $row_sp['title'];?>"><?php echo $row_sp['title'] ; }?></option>
                        </select>

                    </div>
                    <div class="input-right">
                        <label for="">Select Patient</label>
                        <select name="patient" id="patient">
                            <option value="">Choose the Patient</option>
                            <?php  while($row_p = mysqli_fetch_array($run_p)){?>
                            <option value="<?php echo $row_p['id'];?>"><?php echo $row_p['name'] ; }?></option>
                        </select>
                        <label id="margin">Enter patient's status</label>
                        <select name="status" id="status">
                            <option value="0">Pending</option>
                            <option value="1">Treatment Completed</option>
                            <option value="2">Processing</option>
                            <option value="3">Hold</option>
                        </select>
                    </div>
                </div>
                <div class="form-footer">
                    <button name="allot" class="btn-register" >Allot</button>
                </div>
            </div>
            
            
        </form>
        </div>

</body>
</html>

