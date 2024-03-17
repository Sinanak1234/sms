<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host="localhost";
$user="root";
$password="";
$db="sms";

$data=mysqli_connect($host, $user, $password, $db);

if($data==false){
    die("Connection error");
}

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name=$_POST['username'];
        $pass=$_POST['password'];

        $sql="select * from user where Username='".$name."' and Password='".$pass."' ";

        $result=mysqli_query($data,$sql);
        $row=mysqli_fetch_array($result);

        if($row["User_type"]=="admin"){
            $_SESSION['usertype']="admin";
            $_SESSION['username']=$name;
            header("location:../admin/adminhome.php");
        }
        
        else{
            
            $message= "username and password does not match";
            $_SESSION['loginMessage']=$message;
            header("location:login.php");
        }
    }




?>