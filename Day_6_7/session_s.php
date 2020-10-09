<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select fname,lname from student where email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session1 = $row['fname'];
   $login_session2 = $row['lname'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>