<?php

include_once 'db_setting.php';

if(isset($_POST['form-submit'])){

  $bot = $_POST['elast'];
  
  if(!$bot){
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $plan = mysqli_real_escape_string($conn, trim($_POST['plan']));

    
   
    $sql = "INSERT INTO `plan_form`(`name`, `email`, `phone`, `plan`) VALUES(?, ?, ?, ?);";

    

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      echo "SQL error57nk <br>" . mysqli_error($conn);
    }else{
      mysqli_stmt_bind_param($stmt, "ssss",$name, $email, $phone, $plan);
      
      
      
      echo "<br>" . $name . "<br>" . $email . "<br>" . $phone . "<br>" . $plan . "<br>";
      if(!$stmt->execute()){ 
        // echo $stmt->error;
        header("Location: ../index.php?sub=err");
      }else{
        header("Location: ../index.php?sub=succ");
      }


    }
}
}
?>