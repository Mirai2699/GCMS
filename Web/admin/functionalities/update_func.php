<?php
    
    include('../../../db_con.php');
  

//GCSMS CONFIGURATION

    
    ////////  Editing User Role ///////
   if(isset($_POST['edit_usr']))
    {   
        
         $ID = $_POST['usr_ID'];
         $desc = $_POST['usr_desc'];

         $query = mysqli_query($connection,"UPDATE r_user_role SET usr_desc = '$desc',
                                                                 usr_mod_date = CURRENT_TIMESTAMP
                                            WHERE usr_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the details!');". 
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/userrole.php';\",0);</script>";
    }

    ////////  Editing User Role ///////
   else if(isset($_POST['edit_account']))
    {   
        
         $ID = $_POST['acc_ID'];
         $acc_username = $_POST['acc_username'];
         $acc_password = $_POST['acc_password'];
         $acc_usr = $_POST['acc_usr'];
         $acc_profilepic = $_POST['acc_profilepic'];

         $query = mysqli_query($connection,"UPDATE t_accounts SET acc_username = '$acc_username',
                                                                  acc_password = '$acc_password',
                                                                  acc_user_role = '$acc_usr',
                                                                  acc_picture = '$acc_profilepic',
                                                                  acc_mod_date = CURRENT_TIMESTAMP
                                            WHERE acc_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the details!');". 
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/accounts.php';\",0);</script>";
    }

     ////////  Editing Course ///////
   else if(isset($_POST['edit_course']))
    {   
        
         $ID = $_POST['course_ID'];
         $code = $_POST['course_code'];
         $name = $_POST['course_name'];

         $query = mysqli_query($connection,"UPDATE r_courses SET course_code = '$code', 
                                                                 course_name = '$name',
                                                                 course_mod_date = CURRENT_TIMESTAMP
                                            WHERE course_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the details!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/courses.php';\",0);</script>";
    }

      ////////  Editing Counseling Type ///////
   else if(isset($_POST['edit_counsel']))
    {   
        
         $ID = $_POST['counsel_ID'];
         $ctdesc = $_POST['counsel_desc'];

         $query = mysqli_query($connection,"UPDATE r_counsel_type SET ct_desc = '$ctdesc', 
                                                                 ct_mod_date = CURRENT_TIMESTAMP
                                            WHERE ct_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the details!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/counsel_type.php';\",0);</script>";
    }

     ////////  Editing Visitation Type ///////
   else if(isset($_POST['edit_visit']))
    {   
        
         $ID = $_POST['visit_ID'];
         $vtdesc = $_POST['visit_desc'];

         $query = mysqli_query($connection,"UPDATE r_visit_type SET vt_desc = '$vtdesc', 
                                                                 vt_mod_date = CURRENT_TIMESTAMP
                                            WHERE vt_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the details!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/visit_type.php';\",0);</script>";
    }

     ////////  Editing Document Type ///////
   else if(isset($_POST['edit_docu']))
    {   
        
         $ID = $_POST['docu_ID'];
         $dtdesc = $_POST['docu_desc'];

         $query = mysqli_query($connection,"UPDATE r_document_type SET dt_desc = '$dtdesc', 
                                                                 dt_mod_date = CURRENT_TIMESTAMP
                                            WHERE dt_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the details!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/docu_type.php';\",0);</script>";
    }

    ////////  Editing semester ///////
   else if(isset($_POST['edit_sem']))
    {   
        
         $ID = $_POST['sem_ID'];
         $semdesc = $_POST['sem_desc'];

         $query = mysqli_query($connection,"UPDATE r_semester SET sem_desc = '$semdesc', 
                                                                 sem_mod_date = CURRENT_TIMESTAMP
                                            WHERE sem_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the details!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/semester.php';\",0);</script>";
    }

     ////////  Editing Academic Year ///////
   else if(isset($_POST['edit_acadyr']))
    {   
        
         $ID = $_POST['acadyr_ID'];
         $acadyrstart = $_POST['acadyr_start'];
         $acadyrend = $_POST['acadyr_end'];

         $query = mysqli_query($connection,"UPDATE r_academic_year SET acadyr_start_year = '$acadyrstart', 
                                                                  acadyr_end_year = '$acadyrend', 
                                                                  acadyr_mod_date = CURRENT_TIMESTAMP
                                            WHERE acadyr_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the details!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/acadyear.php';\",0);</script>";
    }





?>