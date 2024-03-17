<?php
session_start();
    if(!isset($_SESSION['username'])){
        header('location:../login/login.php');
    }
    
    elseif($_SESSION['usertype']=='student'){
        header('location:../login/login.php'); 
    }

    $host="localhost";
    $user="root";
    $password="";
    $db="sms";

    $data=mysqli_connect($host,$user,$password,$db);

    $id=$_GET['faculty_id'];

    $sql="SELECT * FROM faculty WHERE Id='$id'";

    $result=mysqli_query($data,$sql);

    $info=$result->fetch_assoc();

    if(isset($_POST['update_faculty'])){
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $department=$_POST['department'];
        $salary=$_POST['salary'];

        $query="UPDATE faculty SET Name='$name',Gender='$gender',Email='$email',Phone_number='$phone',Address='$address',Department='$department',Salary='$salary' WHERE Id=$id";

        $result2=mysqli_query($data,$query);

        if ($result2) {
            header("location:view_faculty.php");
        } else {
            echo "Error updating record: " . mysqli_error($data);
        }
        
        
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Update Page</title>
    <?php

    include '../admin/admin_css.php';

    ?>

    <style>
        label{
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .content{
            margin-right: 200px;
        }

        h1{
            margin-left: 20px;
        }

        .div_deg{
            background-color: skyblue;
            width: 400px;
            padding-top: 50px;
            padding-bottom: 50px;
        }
    </style>

</head>
<body>

    <?php

    include '../admin/admin_sidebar.php';

    ?>

    <div class="content">

    <center>
        <h1>Update Faculty</h1>

        <div class="div_deg">

            <form action="#" method="post">

            <div>
                    <label>Full Name</label>
                    <input type="text" name="name" value="<?php echo "{$info['Name']}"; ?>" required>
                </div>

                <div>
                    <label>Gender</label>
                    <input type="text" name="gender" value="<?php echo "{$info['Gender']}"; ?>" required>
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo "{$info['Email']}"; ?>" required>
                </div>

                <div>
                    <label>Phone</label>
                    <input type="number" name="phone" value="<?php echo "{$info['Phone_number']}"; ?>" required>
                </div>

                <div>
                    <label>Address</label>
                    <input type="text" name="address" value="<?php echo "{$info['Address']}"; ?>" required>
                </div>

                <div>
                    <label>Department</label>
                    <input type="text" name="department" value="<?php echo "{$info['Department']}"; ?>" required>
                </div>

                <div>
                    <label>Salary</label>
                    <input type="text" name="salary" value="<?php echo "{$info['Salary']}"; ?>" required>
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="update_faculty" value="Update Faculty">
                </div>
            </form>

            </center>

        </div>

    </div>
</body>
</html>