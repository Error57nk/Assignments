<?php
session_start();
if( $_SESSION['admin'] != 'NaN' && $_SESSION['admin'] == 'newadmin'){

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./packend/css/bootstrap.min.css">


    <link rel="stylesheet" href="./packend/css/main.css">


</head>

<body>
    <div class="section-head  grad_1">
        <h4 class="text-center"><span>Admin Pannel -></span> <span class="color-white"><a href="./docend/action.php?logout">(logout)</a> 
            </span>
        </h4>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-primary">
                <div class="mt-3">
                    <button class="ad-nav" onclick="show(plan_box)">Plan</button>
                    <button class="ad-nav" onclick="show(other_box)">Plan other</button>

                </div>
            </div>
            <div class="col-md-10">
                <div id="plan_box" class="nvh-100">
                    <?php 
                    include_once "docend/db_setting.php";
                    $sql = 'SELECT * FROM plan;';
                    $result = $conn->query($sql);
                    $total_plan = mysqli_num_rows($result);
                    echo '<h2>Plan Section :('. $total_plan.')</h2>';
                    echo '<table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Plan Name</th>
                                <th scope="col">Plan info</th>
                                <th scope="col">Plan Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead><tbody>';                 
                    while($row = $result->fetch_assoc()) :  ?>



                    <form action="docend/action.php" id="form<?php echo $row['id'] ?>" method="POST">
                        <?php $rec_id = $row['id'] ?>
                        <input type="hidden" name="plan_id" value="<?= $rec_id ?>">

                        <tr>
                            <th scope="row"><?php echo $row['id'] ?></th>
                            <td><input type="text" value="<?php echo $row['plan_name'] ?>" name="plan_name"></td>
                            <td><input type="text" value="<?php echo $row['plan_info'] ?>" name="plan_info"></td>
                            <td><input type="text" value="<?php echo $row['plan_price'] ?>" name="plan_price"></td>
                            <td>
                                <button type="submit" name="update_plan" class="adm-btn bg-green">Update</button>
                                <a href="docend/action.php?delete_plan=1&plan_id=<?= $rec_id ?>"
                                    class="adm-btn bg-red">Delete</a>
                            </td>
                        </tr>
                    </form>


                    <?php endwhile ?>

                    <form action="docend/action.php" method="POST">

                        <th scope="row">Add:</th>
                        <td><input type="text" name="plan_name" placeholder="Plan Name" required></td>
                        <td><input type="text" name="plan_info" placeholder="Plan Info" required></td>
                        <td><input type="text" name="plan_price" placeholder="Plan Price" required></td>
                        <td><input type="submit" value="Add" class="adm-btn bg-green" style="width: 100%;"
                                name="add_new_plan"></td>
                    </form>
                    </tbody>
                    </table>
                </div>





                <div id="other_box" class="nvh-100">
                    <h2>Other Box</h2>
                </div>

            </div>
        </div>







        <script src="./packend/js/jquery.js"></script>
        <script src="./packend/js/bootstrap.min.js"></script>


        <!-- couston js -->
        <script src="./packend/js/main.js"></script>
        <!-- /couston js -->
        <script>
            var plan_box = document.getElementById("plan_box");
            var other_box = document.getElementById("other_box");

            $(document).ready(function () {
                plan_box.style.display = "block";
                other_box.style.display = "none";
            })

            function show(item) {
                plan_box.style.display = "none";
                other_box.style.display = "none";

                item.style.display = "block"
            }




        </script>



</body>

</html>

        <?php } else{
            header("Location: ./login.php");
        }?>
        
