<?php
    
    include('../../../db_con.php');




   //////// Archive user role///////

 if(isset($_POST['arch_acc']))
  {   
        
         $ID = $_POST['acc_ID'];
         $stat = $_POST['acc_status'];

         $query = mysqli_query($connection,"UPDATE t_accounts SET acc_active_flag = '$stat' WHERE acc_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully changed the status!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/accounts.php';\",0);</script>";
  }


   //////// Archive user role///////

 else if(isset($_POST['arch_usr']))
  {   
        
         $ID = $_POST['usr_ID'];

         $query = mysqli_query($connection,"UPDATE r_user_role SET usr_active_flag = 'Archived' WHERE usr_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully archived!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/userrole.php';\",0);</script>";
  }

  //////// Archive course ///////
  else if(isset($_POST['arch_course']))
  {   
        
         $ID = $_POST['course_ID'];

         $query = mysqli_query($connection,"UPDATE r_courses SET course_active_flag = 'Archived' WHERE course_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully archived!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/courses.php';\",0);</script>";
  }

  //////// Archive Couseling Type ///////
  else if(isset($_POST['arch_counsel']))
  {   
        
         $ID = $_POST['counsel_ID'];

         $query = mysqli_query($connection,"UPDATE r_counsel_type SET ct_active_flag = 'Archived' WHERE ct_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully archived!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/counsel_type.php';\",0);</script>";
  }

  //////// Archive Visitation Type ///////

  else if(isset($_POST['arch_visit']))
  {   
        
         $ID = $_POST['visit_ID'];

         $query = mysqli_query($connection,"UPDATE r_visit_type SET vt_active_flag = 'Archived' WHERE vt_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully archived!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/visit_type.php';\",0);</script>";
  }

  //////// Archive Document Type ///////

  else if(isset($_POST['arch_docu']))
  {   
        
         $ID = $_POST['docu_ID'];

         $query = mysqli_query($connection,"UPDATE r_document_type SET dt_active_flag = 'Archived' WHERE dt_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully archived!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/docu_type.php';\",0);</script>";
  }

  //////// Archive semester ///////

  else if(isset($_POST['arch_sem']))
  {   
        
         $ID = $_POST['sem_ID'];

         $query = mysqli_query($connection,"UPDATE r_semester SET sem_active_flag = 'Archived' WHERE sem_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully archived!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/semester.php';\",0);</script>";
  }

  //////// Archive academic year///////

  else if(isset($_POST['arch_acadyr']))
  {   
        
         $ID = $_POST['acadyr_ID'];

         $query = mysqli_query($connection,"UPDATE r_academic_year SET acadyr_active_flag = 'Archived' WHERE acadyr_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully archived!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/acadyear.php';\",0);</script>";
  }
  
  
?>