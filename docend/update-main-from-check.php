<?php
session_start();
include_once 'db_setting.php';

if(isset($_POST['form-submit']) && $_SESSION['userphone'] != 'NaN' && $_SESSION['useremail'] != 'NaN' ){

  $bot = $_POST['elast'];
  
  if(!$bot){
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $plan = mysqli_real_escape_string($conn, trim($_POST['plan']));
    $userid = mysqli_real_escape_string($conn, trim($_POST['userid']));
    
    
   
    $sql = 'UPDATE `plan_form` SET `name`="' . $name.'",`email`="'.$email.'",`phone`="'.$phone.'",`plan`="'.$plan.'" WHERE id ='. $userid;

    

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
        $_SESSION['userphone'] = "NaN";
        $_SESSION['useremail'] = "NaN";  
        $_SESSION['admin'] = "NaN";  
        header("Location: ../index.php?sub=succUpdate");
      }


    }
}
}
?>