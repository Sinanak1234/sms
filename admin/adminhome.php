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

    $sql="SELECT * FROM user";

    $result=mysqli_query($data,$sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <?php

    include 'admin_css.php';

    ?>

<style>

        .content{
            margin-right: 200px;
        }

        h1{
            margin-left: 0px;
        }

        .div_deg{
            background-color: skyblue;
            width: 1000px;
            padding-top: 50px;
            padding-bottom: 50px;
            padding-left: 50px;
        }
        
        .fields p{
            display:inline-block;
            padding-bottom: 20px;
            padding-top: 20px;
        }

        .main{
            font-size: 18px;

        }

        .value{
            color: white;
            padding-left: 30px;
            font-size: 20px;
            font-family: 'Times New Roman', Times, serif;
        }

        
        .styled-box {
            width: 400px;
            height: 40px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 20px;
        }
    </style>

</head>
<body>

    <?php

    include 'admin_sidebar.php';

    ?>

    <div class="content">
        <h1>Admin Profile</h1>
        <br>
        <br>
        <?php
        while($info=$result->fetch_assoc()){

        ?>

        <div class="div_deg">
           <article class="fields">
                <p class="main"><b>Full Name:</b></p>
                <p class="value"><?php echo strtoupper("{$info['Full_name']}"); ?> </p>
           </article>
           <article class="fields">
                <p class="main"><b>Email:</b></p>
                <p class="value"><?php echo "{$info['Email']}"; ?> </p>
           </article>
           <article class="fields">
                <p class="main"><b>Phone Number:</b></p>
                <p class="value"><?php echo "{$info['Phone_number']}"; ?> </p>
           </article>
           <article class="fields">
                <p class="main"><b>Address:</b></p>
                <p class="value"><?php echo "{$info['Address']}"; ?> </p>
           </article>
        </div>

        <?php 
        }
        ?>

        <?php

        while($info=$result->fetch_assoc()){
                 

        ?>

        <div>
        <?php 

            echo "{$info['Full_name']}";
            echo "{$info['Email']}";
            echo "{$info['Phone_number']}";
            echo "{$info['Address']}";
            echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['Id']}'>Update</a> ";  
            
            ?>

            <?php

            }

            ?>
        </div>

    </div>
</body>
</html>