<?php
    include('../../../db_con.php');

      $No = $_POST['ID'];
      $pass = $_POST['Pass'];
      $conpass = $_POST['ConPass'];
      
      if($pass == $conpass)
      { 
        $query = mysqli_query($connection,"UPDATE t_accounts SET acc_password = '$pass' WHERE acc_ID = '$No'");
                                                                                 
        echo "<script type=\"text/javascript\">".
               "alert
               ('YOUR PASSWORD HAS BEEN CHANGED!');".
             "</script>";
        echo "<script>setTimeout(\"location.href = '../views/index.php';\",0);</script>";
      }
      else if($pass != $conpass)
      {
        echo "<label style='color:red ; margin-left: 5%; font-weight: 10px; font-size: 15px'>Password Do Not Match!</label>";
      }
?>


