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

    $sql="SELECT * FROM faculty";

    $result=mysqli_query($data,$sql);
    

    if (isset($_GET['faculty_id'])) {
        $faculty_id=$_GET['faculty_id'];
    
        $sql="DELETE FROM faculty WHERE Id='$faculty_id' ";
    
        $result=mysqli_query($data,$sql);
    
        if($result){
            $_SESSION['message']='Delete Successful';
            header("location:view_faculty.php");
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Data</title>
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
        <h1>Faculty Data</h1>
        <center>
        <table border="1px">
            <tr>
                <th class="table_th">Full Name</th>
                <th class="table_th">Gender</th>
                <th class="table_th">Email</th>
                <th class="table_th">Phone</th>
                <th class="table_th">Address</th>
                <th class="table_th">Department</th>
                <th class="table_th">Salary</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>

            <?php

            while($info=$result->fetch_assoc()){
                 

            ?>

            <tr>
                <td class="table_td">
                    <?php echo "{$info['Name']}";  ?>
                </td>
                <td class="table_td">
                    <?php echo "{$info['Gender']}";  ?>
                </td>
                <td class="table_td">
                    <?php echo "{$info['Email']}";  ?>
                </td>
                <td class="table_td">
                    <?php echo "{$info['Phone_number']}";  ?>
                </td>
                <td class="table_td">
                    <?php echo "{$info['Address']}";  ?>
                </td>
                <td class="table_td">
                    <?php echo "{$info['Department']}";  ?>
                </td>
                <td class="table_td">
                    <?php echo "{$info['Salary']}";  ?>
                </td>
                <td class="table_td">
                    <?php echo "<a onClick=\" javascript:return confirm('Do you want to delete this');\" class='btn btn-danger' href='view_faculty.php?faculty_id={$info['Id']}'>Delete</a>";  ?>
                </td>
                <td class="table_td">
                    <?php echo "<a class='btn btn-primary' href='update_faculty.php?faculty_id={$info['Id']}'>Update</a> ";  ?>
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