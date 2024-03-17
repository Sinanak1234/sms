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

    if(isset($_POST['add_faculty'])){
        $faculty_name=$_POST['name'];
        $faculty_gender=$_POST['gender'];
        $faculty_email=$_POST['email'];
        $faculty_phone=$_POST['phone'];
        $faculty_address=$_POST['address'];
        $faculty_department=$_POST['department'];
        $faculty_salary=$_POST['salary'];

        $sql="INSERT INTO faculty(Name,Gender,Email,Phone_number,Address,Department,Salary) VALUES ('$faculty_name','$faculty_gender','$faculty_email','$faculty_phone','$faculty_address','$faculty_department','$faculty_salary')";
        
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
    <title>Add Faculty</title>
    <?php

    include '../admin/admin_css.php';

    ?>

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
</head>
<body>

    <?php

    include '../admin/admin_sidebar.php';

    ?>

    <div class="content">
        <center>
            <h1>Add Faculty</h1>

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
                    <label>Salary</label>
                    <input type="text" name="salary" required>
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="add_faculty" value="Add Faculty">
                </div>
        </center>
    </div>
</body>
</html>