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

    if(isset($_POST['add_course'])){
        $course_name=$_POST['course'];
        $course_code=$_POST['code'];

        $sql="INSERT INTO course(Course_name,Course_code) VALUES ('$course_name','$course_code')";
        
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
    <title>Add Course</title>

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
        <h1>Add Course</h1>

        <div class="div_deg">
            <form action="#" method="post">
                <div>
                    <label>Course Name</label>
                    <input type="text" name="course" required>
                </div>

                <div>
                    <label>Course Code</label>
                    <input type="text" name="code" required>
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="add_course" value="Add Course">
                </div>
        </div>
        </center>
    </div>
</body>
</html>