<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
    <!-- Store File -->
  <link rel="stylesheet" href="../packend/css/bootstrap.min.css">
 
  <!-- /Store File -->

  <!-- Project CSS -->
  <!-- My Coustom Shortcut -->
  <!-- <link rel="stylesheet" href="./packend/css/css_short_v1.css"> -->
  <!-- My /Coustom Shortcut -->
  <link rel="stylesheet" href="../packend/css/main.css">
  <!-- /Project CSS -->
</head>
<body>
    

<?php 
include_once 'db_setting.php';
session_start();

if($_SESSION['userphone'] && $_SESSION['useremail']){


$phone = $_SESSION['userphone'];
$email = $_SESSION['useremail'];


$sql2='SELECT * FROM `plan_form` WHERE `email`=? OR `phone`=?';
$stmt =mysqli_stmt_init($conn);


if(!mysqli_stmt_prepare($stmt, $sql2)){
    header("Location: ./edit-form.php?error=prepare");
    
}else{
    mysqli_stmt_bind_param($stmt, "ss", $email, $phone);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)):?>
       
       <div class="section-head  grad_1">
        <h4 class="text-center">JustInClicks.com --> <?php if($_SESSION['admin']){echo '<a href="../admin.php">Admin Pannel</a>';} ?></h4>
        
    </div>
    <section class="container n-100vh mt-5">
        <div class="row form-sec">
            <div class="offset-md-3 col-md-6 offset-sm-1 col-sm-10 col-xs-12">
                <?php if(isset($_GET['sub'])){
                    if($_GET['sub']=='err'){
                        echo "<h4 class='bg-red pl-2 pr-2 pb-2'> Somthing went wrong :(</h4>";
                    }
                } ?>
                <form action="update-main-from-check.php" method="POST">
                    <h4 class="text-center mb-4">Edit Form</h4>
                    <input type="hidden" name="userid" value="<?php echo $row['id']?>">
                    <div class="form-group n-rel">

                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $row['name']?>"  required>
                    </div>
                    <div class="form-group n-rel">

                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['email']?>" required>
                    </div>
                    <div class="form-group n-rel">

                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone No" value="<?php echo $row['phone']?>" required>
                    </div>
                    <div class="form-group n-rel">

                        <select name="plan" class="custom-select" id="plan" required>
                            <option selected><?php echo $row['plan'] ?></option>
                            <?php 
                            include_once './docend/db_setting.php';
                             $sql = 'SELECT `plan_name` FROM `plan`;';
                             $result = mysqli_query($conn, $sql);
                             if(mysqli_num_rows($result)>0){
                                while($row= mysqli_fetch_assoc($result)){
                                    echo '<option value="'.$row["plan_name"].'">'.$row["plan_name"].'</option>';
                                }
                            }
                            
                            
                            ?>
                            
                        </select>
                    </div>

                    <div class="form-group n-rel">
                        <button type="submit" class="form-control btn grad_1 color-light"
                            name="form-submit">SUBMIT</button>
                    </div>
                    <input type="hidden" name="elast">
                </form>
            </div>


        </div>

    </section>



        
        
        
        
<?php endwhile;
    }else{
        echo "NO record Found <br> <a href='../index.php'>Fill fresh form</a>";
        
    }
}

}
?>


<script src="../packend/js/jquery.js"></script>
  <script src="../packend/js/bootstrap.min.js"></script>
  

  <!-- couston js -->
  <script src="../packend/js/main.js"></script>
  <!-- /couston js -->
</body>
</html>