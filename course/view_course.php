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

    $sql="SELECT * FROM course";

    $result=mysqli_query($data,$sql);
    

    if (isset($_GET['course_id'])) {
        $course_id=$_GET['course_id'];
    
        $sql="DELETE FROM course WHERE Id='$course_id' ";
    
        $result=mysqli_query($data,$sql);
    
        if($result){
            $_SESSION['message']='Delete Successful';
            header("location:view_course.php");
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Data</title>
    <?php

    include '../admin/admin_css.php';

    ?>

    <style>

    .table_th{
            padding: 20px;
        font-size: 15px;
    }

    .table_td{
        padding: 20px;
        background-color: skyblue;
    
    }

    table{
        margin-right: 30px;
    }
    </style>

</head>
<body>

    <?php

    include '../admin/admin_sidebar.php';

    ?>

    <div class="content">
        <h1>Course Data</h1>
        <center>
        <table border="1px">
            <tr>
                <th class="table_th">Course Name</th>
                <th class="table_th">Course Code</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>

            <?php

            while($info=$result->fetch_assoc()){
                 

            ?>

            <tr>
                <td class="table_td">
                    <?php echo "{$info['Course_name']}";  ?>
                </td>
                <td class="table_td">
                    <?php echo "{$info['Course_code']}";  ?>
                </td>
                <td class="table_td">
                    <?php echo "<a onClick=\" javascript:return confirm('Do you want to delete this');\" class='btn btn-danger' href='view_course.php?course_id={$info['Id']}'>Delete</a>";  ?>
                </td>
                <td class="table_td">
                    <?php echo "<a class='btn btn-primary' href='update_course.php?course_id={$info['Id']}'>Update</a> ";  ?>
                </td>
            </tr>

            <?php

            }

            ?>
        </table>
        </center>
    </div>
</body>
</html>