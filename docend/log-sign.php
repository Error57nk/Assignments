<?php
include_once 'db_setting.php';
session_start();


// LOG IN
if(isset($_POST['log-sub'])){
    $user = mysqli_real_escape_string($conn, trim($_POST['username']));
    $pass = mysqli_real_escape_string($conn, trim($_POST['pass']));


    if(empty($pass)|| empty($user)){
        header("Location: ../login.php?error=emptyfield");
        exit();
      }else{
          $sql="SELECT * FROM reg_user WHERE email=? OR phone=?;";
          $stmt =mysqli_stmt_init($conn);
      
          if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../login.php?error=sqlerror");
            exit();
          }else{
            mysqli_stmt_bind_param($stmt, "ss", $user, $user);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
      
              if($row = mysqli_fetch_assoc($result)){
              $psdCheck = password_verify($pass, $row['password']);
              
              if($psdCheck == false){
                header("Location: ../login.php?error=WrongPassword");
                exit();
              }else if($psdCheck == true){
                session_start();
                if($row['admin'] == 1){
                  $_SESSION["admin"]="newadmin";
                  $_SESSION["userphone"]=$row['phone'];
                  $_SESSION["useremail"]=$row["email"];
                }else{
                  $_SESSION["admin"]='NaN';
                  $_SESSION["userphone"]=$row['phone'];
                  $_SESSION["useremail"]=$row["email"];
                }
                  
                // echo $row['admin'];
      
                header("Location: ./edit-form.php?sucess=LoginSucess");
                exit();
              }else{
                header("Location: ../login.php?error=SomethingWentWrong");
                exit();
              }
              
            }
          }
        }



 


}

if(isset($_POST['reg-sub'])){
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $pass1 = mysqli_real_escape_string($conn, trim($_POST['pass1']));
    $pass2 = mysqli_real_escape_string($conn, trim($_POST['pass2']));

    if($pass1 == $pass2){
        $sql ="INSERT INTO reg_user(`name`, `email`, `phone`,`password`) VALUES(?,?,?,?)";

       $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../login.php?error=sqlerror");
          exit();
        }else{
            // hast pass
          $hashpass = password_hash($pass1, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "ssss", $name,$email,$phone,$hashpass);
          mysqli_stmt_execute($stmt);
          header("Location: ../index.php?signup=sucess");
          
        }
    }

}


?>