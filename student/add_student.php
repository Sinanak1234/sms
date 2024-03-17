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

    if(isset($_POST['add_student'])){
        $user_name=$_POST['name'];
        $user_gender=$_POST['gender'];
        $user_email=$_POST['email'];
        $user_phone=$_POST['phone'];
        $user_address=$_POST['address'];
        $user_department=$_POST['department'];
        $user_class=$_POST['class'];
        $user_adno=$_POST['ad_no'];

        $sql="INSERT INTO student(Full_name,Gender,Email,Phone_number,Address,Department,SemAndClass,Admission_no) VALUES ('$user_name','$user_gender','$user_email','$user_phone','$user_address','$user_department','$user_class','$user_adno')";
        
        $result=mysqli_query($data,$sql);

        if($result){
            echo " <script type='text/javascript'>
            
            alert('Data Upload Success');
            </script ";
        }
        else{
            echo "Upload Failed";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>

    <style type="text/css">
        label{
            display:inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg{
            background-color: skyblue;
            width: 400px;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .content{
            margin-right: 150px;
        }
    </style>

    <?php

    include '../admin/admin_css.php';

    ?>

</head>
<body>

    <?php

    include '../admin/admin_sidebar.php';

    ?>

    <div class="content">
        <center>
        <h1>Add Student</h1>

        <div class="div_deg">
            <form action="#" method="post">
                <div>
                    <label>Full Name</label>
                    <input type="text" name="name" required>
                </div>

                <div>
                    <label>Gender</label>
                    <input type="text" name="gender" required>
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>

                <div>
                    <label>Phone</label>
                    <input type="number" name="phone" required>
                </div>

                <div>
                    <label>Address</label>
                    <input type="text" name="address" required>
                </div>

                <div>
                    <label>Department</label>
                    <input type="text" name="department" required>
                </div>

                <div>
                    <label>Sem and class</label>
                    <input type="text" name="class" required>
                </div>

                <div>
                    <label>Admission no</label>
                    <input type="text" name="ad_no" required>
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="add_student" value="Add Student">
                </div>
        </div>
        </center>
    </div>
</body>
</html>