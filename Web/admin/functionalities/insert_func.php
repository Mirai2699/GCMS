<?php
    
    include('../../../db_con.php');
  

//USER MANAGEMENT CONFIGURATION


    ////////  Adding User Role ///////
   if(isset($_POST['add_account']))
    {   
        
        $acc_username = $_POST['acc_username'];
        $acc_password = $_POST['acc_password'];
        $acc_usr = $_POST['acc_usr'];
        $acc_profilepic = $_POST['acc_profilepic'];

        $insert = "INSERT INTO t_accounts (acc_username, acc_password, acc_user_role, acc_picture)     
                   VALUES ('$acc_username', '$acc_password', '$acc_usr', '$acc_profilepic')";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added an account');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/accounts.php';\",0);</script>";
    }

    ////////  Adding User Role ///////
   else if(isset($_POST['add_usr']))
    {   
        
        $userrole = $_POST['usr_desc'];

        $insert = "INSERT INTO r_user_role (usr_desc)     
                   VALUES ('$userrole')";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a user role!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/userrole.php';\",0);</script>";
    }
     ////////  Adding Course ///////
   else if(isset($_POST['add_course']))
    {   
        
        $course_code = $_POST['course_code'];
        $course_name = $_POST['course_name'];

        $insert = "INSERT INTO r_courses (course_code, course_name)     
                   VALUES ('$course_code','$course_name')";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a course!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/courses.php';\",0);</script>";
    }

     ////////  Adding Counsel Type ///////
   else if(isset($_POST['add_counseltype']))
    {   
        
        $ct_desc = $_POST['counsel_desc'];

        $insert = "INSERT INTO r_counsel_type (ct_desc)     
                   VALUES ('$ct_desc')";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a counsel type!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/counsel_type.php';\",0);</script>";
    }

    ////////  Adding Visitation Type ///////
   else if(isset($_POST['add_visitation']))
    {   
        
        $vt_desc = $_POST['visit_desc'];

        $insert = "INSERT INTO r_visit_type (vt_desc)     
                   VALUES ('$vt_desc')";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a visitation type!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/visit_type.php';\",0);</script>";
    }

     ////////  Adding Document Type ///////
   else if(isset($_POST['add_docu']))
    {   
        
        $dt_desc = $_POST['docu_desc'];

        $insert = "INSERT INTO r_document_type (dt_desc)     
                   VALUES ('$dt_desc')";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a document type!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/docu_type.php';\",0);</script>";
    }

    ////////  Adding Semester ///////
   else if(isset($_POST['add_sem']))
    {   
        
        $sem_desc = $_POST['sem_desc'];

        $insert = "INSERT INTO r_semester (sem_desc)     
                   VALUES ('$sem_desc')";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a semester!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/semester.php';\",0);</script>";
    }


     ////////  Adding Academic Year ///////
   else if(isset($_POST['add_acadyr']))
    {   
        
        $acadyr_start = $_POST['acadyr_start'];
        $acadyr_end = $_POST['acadyr_end'];

        $insert = "INSERT INTO r_academic_year (acadyr_start_year,acadyr_end_year)     
                   VALUES ('$acadyr_start','$acadyr_end')";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added an academic year!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/acadyear.php';\",0);</script>";
    }

?>


