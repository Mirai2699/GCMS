<?php
    
    include('../../../db_con.php');
  

//Manual Input of Student Record


    //Step 2 (Student Profile) Variable Intialization

       //Override Student Number (For debugging purposes only)
       // $stud_no = '2015-00193-CM-0';
       $stud_no = $_POST['stud_no'];

       $stud_lname = $_POST['stud_lname'];
       $stud_mname = $_POST['stud_mname'];
       $stud_fname = $_POST['stud_fname'];
       $stud_course = $_POST['stud_course'];
       $stud_yrlvl = $_POST['stud_yrlvl'];
       $stud_section = $_POST['stud_section'];
       $stud_gender = $_POST['stud_gender'];
       $stud_bday = $_POST['stud_bday'];
       $stud_bplace = $_POST['stud_bplace'];
       $stud_homeadd = $_POST['stud_homeadd'];
       $stud_provadd = $_POST['stud_provadd'];
       $stud_tele = $_POST['stud_tele'];
       $stud_contact = $_POST['stud_contact'];
       $stud_email = $_POST['stud_email'];
       $stud_acadstat = $_POST['stud_acadstat'];



    //Step 0 (Finalization) Variable Intialization


        $stud_batch_year = $_POST["stud_batch_year"];
       

    //Step 2 (Student Profile) Query Preparation

        $step1 = "INSERT INTO t_stud_profile (stud_number, 
                                               stud_lastname,
                                               stud_middlename,
                                               stud_firstname,
                                               stud_course,
                                               stud_yearlevel,
                                               stud_section,
                                               stud_gender,
                                               stud_birthdate,
                                               stud_birthplace,
                                               stud_homeadd,
                                               stud_provadd,
                                               stud_telephone_no,
                                               stud_mobile_no,
                                               stud_email,
                                               stud_status
                                              )     
                          VALUES ('$stud_no', 
                                  '$stud_lname',
                                  '$stud_mname', 
                                  '$stud_fname',
                                  '$stud_course',
                                  '$stud_yrlvl',
                                  '$stud_section',
                                  '$stud_gender',
                                  '$stud_bday',
                                  '$stud_bplace',
                                  '$stud_homeadd',
                                  '$stud_provadd',
                                  '$stud_tele',
                                  '$stud_contact',
                                  '$stud_email',
                                  '$stud_acadstat'
                                 )";



    //Step 3 (Finalization) Query Preparation

                $step6 = "INSERT INTO t_stud_batch_rec (batch_student, 
                                                        batch_year,
                                                        batch_stud_stat
                                                        )     
                                 VALUES ('$stud_no',
                                         '$stud_batch_year',
                                         '$stud_acadstat'
                                       )";
       

    //Step 1 (Student Profile) Query Execution
              
        mysqli_query($connection,$step1);


    //Step 6 (Student Profile) Query Execution
              
        mysqli_query($connection,$step6);




    //Return to Landing Page

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a student profile record!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/view_profile.php';\",0);</script>";
    
?>