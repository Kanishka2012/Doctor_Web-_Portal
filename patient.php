<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-image-patient">
   <div>
      <div class="header">
         <h1>Alotted patients are</h1>
      </div>
    <div class="parent">
   <div class="wrapper-patient">
    <?php 
       include("connection.php");
       session_start();
       $id=$_SESSION['id'];  
       $sql="select * from allot where doctor_id ='$id'";
       $run=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_array($run)){
    ?>
    <div class="box-patient">
      <div class="line">
         <!-- <h5>Name</h5> -->
         <?php 
            $id_p=$row['patient_id'];
            $sql_p="select * from patient where id='$id_p'";
            $run_p=mysqli_query($conn,$sql_p);
            while($row_p=mysqli_fetch_array($run_p)){
         ?>
         <h2><?php echo $row_p['name']; } ?></h2>
    </div>
   <div class="line">
       <h5>Disease</h5>
       <span><?php echo $row['disease_name'] ;?></span>
   </div>
   <div class="line">
    <h5>Appointment Date & time</h5>
    <span><?php echo $row['appoint_datetime'] ;?></span>
   </div>
    <?php 
       $status=$row['status'];
       if($status===0) $status_name="Pending";
       elseif($status==1) $status_name="Treatment Completed";
       else if($status==2) $status_name="Processing";
       else  $status_name="Hold";
    ?>
   <div class="line">
     <h5>Status</h5>
    <span><?php echo $status_name;?></span>
   </div>
   </div>
<?php } ?>
</div>
</div>
</div>
</body>
</html>