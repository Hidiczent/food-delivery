<?php
    if($_POST){
      SESSION_START();
      require 'db.php';
      
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $pw = mysqli_real_escape_string($con,$_POST['password']);
          $sql = "SELECT * FROM user WHERE email='$email' AND password = '$pw'";
            // echo $sql;
            $rs = mysqli_query($con,$sql);
            $num = mysqli_num_rows($rs);
            // echo $num;
            if($num == 1){
               $row = mysqli_fetch_array($rs);
               $_SESSION["user_id"]=$row['user_id'];
               echo $_SESSION["user_id"];
               header("Location:index.php");
            }else{
              header("Location:login.php");
              
            }
    }
?>