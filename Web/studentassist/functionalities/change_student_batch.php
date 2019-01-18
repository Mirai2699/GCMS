<?php
    
    include('../../../db_con.php');
  

//Manual Input of Student Record
          $stud_ID = $_POST["stud_ID"];
          $stud_no = $_POST["stud_no"];

          $stud_batch_year = $_POST["stud_batch_year"];
    

          //Step 2 (Personal Information) Query Preparation
          $query = mysqli_query($connection,"UPDATE t_stud_batch_rec SET 

                                                batch_year = '$stud_batch_year' 

                                            WHERE batch_student = '$stud_no' ");

      
    

    //Return to Landing Page

         echo "<script type=\"text/javascript\">".
                  "alert ('You have successfully updated the active batch year!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/view_profile_details.php?getID=$stud_ID';\",0);</script>";
    
?>