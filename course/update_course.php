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

    $id=$_GET['course_id'];

    $sql="SELECT * FROM course WHERE Id='$id'";

    $result=mysqli_query($data,$sql);

    $info=$result->fetch_assoc();

    if(isset($_POST['update_course'])){
        $course_name=$_POST['name'];
        $course_code=$_POST['code'];

        $query="UPDATE course SET Course_name='$course_name', Course_code='$course_code' WHERE Id=$id";

        $result2=mysqli_query($data,$query);

        if ($result2) {
            header("location:view_course.php");
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
    <title>Course Update Page</title>
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
        <h1>Update Course</h1>

        <div class="div_deg">

            <form action="#" method="post">

                <div>
                    <label>Course Name</label>
                    <input type="text" name="name" value="<?php echo "{$info['Course_name']}"; ?>" required>
                </div>

                <div>
                    <label>Course Code</label>
                    <input type="text" name="code" value="<?php echo "{$info['Course_code']}"; ?>" required>
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="update_course" value="Update Course">
                </div>
            </form>

            </center>

        </div>

    </div>
</body>
</html>