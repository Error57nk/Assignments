<?php
include_once "db_setting.php";
session_start();
if(isset($_POST['update_plan'])){
    $plan_name = mysqli_real_escape_string($conn, trim($_POST['plan_name']));
    $plan_info = mysqli_real_escape_string($conn, trim($_POST['plan_info']));
    $plan_price = mysqli_real_escape_string($conn, trim($_POST['plan_price']));
    $plan_id = mysqli_real_escape_string($conn, trim($_POST['plan_id']));

    if($plan_name == '' || $plan_info =='' || $plan_price == '' || $plan_id == ''){
        header("Location: ../admin.php?form=invalid");

    }else{
        
        $sql = 'UPDATE `plan` SET `plan_name`="'. $plan_name .'",`plan_info`="'. $plan_info .'",`plan_price`="'. $plan_price .'" WHERE id ='. $plan_id;
        
        if (!mysqli_query($conn, $sql)) {
            // echo $plan_id . $plan_name .$plan_info. $plan_price;
            header("Location: ../admin.php?form=updateError");
        } else {
            header("Location: ../admin.php?form=updateSucess");
    
          }

    }

}

// DELETE

if (isset($_GET['delete_plan'])){
    $plan_id_del = mysqli_real_escape_string($conn, trim($_GET['plan_id']));

    $sql ='DELETE FROM `plan` WHERE id ='.$plan_id_del;
    if (!mysqli_query($conn, $sql)) {
        // echo $plan_id . $plan_name .$plan_info. $plan_price;
        header("Location: ../admin.php?form=DeleteError");
    } else {
        header("Location: ../admin.php?form=DeleteSucess");

      }
}

if(isset($_POST['add_new_plan'])){
    $plan_name = mysqli_real_escape_string($conn, trim($_POST['plan_name']));
    $plan_info = mysqli_real_escape_string($conn, trim($_POST['plan_info']));
    $plan_price = mysqli_real_escape_string($conn, trim($_POST['plan_price']));
    

    if($plan_name == '' || $plan_info =='' || $plan_price == '' ){
        header("Location: ../admin.php?form=FieldInvalid");

    }else{
        
        $sql =  'INSERT INTO `plan`(`plan_name`, `plan_info`, `plan_price`) VALUES ("'. $plan_name .'","'. $plan_info .'","'. $plan_price .'");';

        // echo $sql;
        
        if (!mysqli_query($conn, $sql)) {
            // echo $plan_id . $plan_name .$plan_info. $plan_price;
            header("Location: ../admin.php?form=AddError");
        } else {
            header("Location: ../admin.php?form=AddSucess");
    
          }

    }
}


if(isset($_GET['logout'])){
    $_SESSION['userphone'] = "NaN";
    $_SESSION['useremail'] = "NaN";  
    $_SESSION['admin'] = "NaN"; 
    session_destroy(); 
    header("Location: ../index.php?logout=Sucess");
}

?>