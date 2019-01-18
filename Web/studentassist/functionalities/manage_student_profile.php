<?php
    
    include('../../../db_con.php');
  

//Manual Input of Student Record
       $stud_ID = $_POST["stud_ID"];
       $stud_no = $_POST["stud_no"];
    //Step 2 (Personal Information) Variable Intialization

       $stud_lname = $_POST['stud_lname'];
       $stud_mname = $_POST['stud_mname'];
       $stud_fname = $_POST['stud_fname'];
       $stud_course = $_POST['stud_course'];
       $stud_yrlvl = $_POST['stud_yrlvl'];
       $stud_section = $_POST['stud_section'];

       $stud_gen = $_POST['stud_gen'];
      
       $stud_bday = $_POST['stud_bday'];
       $stud_bplace = $_POST['stud_bplace'];
       $stud_homeadd = $_POST['stud_homeadd'];
       $stud_provadd = $_POST['stud_provadd'];
       $stud_tele = $_POST['stud_tele'];
       $stud_contact = $_POST['stud_contact'];
       $stud_email = $_POST['stud_email'];
       $stud_acadstat = $_POST['stud_acadstat'];


          //Step 0 (Finalization) Variable Intialization


          //$stud_batch_year = $_POST["stud_batch_year"];
    

          //Step 2 (Personal Information) Query Preparation
          $query = mysqli_query($connection,"UPDATE t_stud_profile SET 

                                                stud_number = '$stud_no', 
                                                stud_lastname = '$stud_lname', 
                                                stud_middlename = '$stud_mname', 
                                                stud_firstname = '$stud_fname', 
                                                stud_course = '$stud_course', 
                                                stud_yearlevel = '$stud_yrlvl', 
                                                stud_section = '$stud_section', 
                                                stud_gender = '$stud_gen', 
                                                stud_birthdate = '$stud_bday', 
                                                stud_birthplace = '$stud_bplace', 
                                                stud_homeadd = '$stud_homeadd', 
                                                stud_provadd = '$stud_provadd', 
                                                stud_telephone_no = '$stud_tele', 
                                                stud_mobile_no = '$stud_contact', 
                                                stud_email = '$stud_email', 
                                                stud_status = '$stud_acadstat',
                                                stud_mod_date = CURRENT_TIMESTAMP  

                                            WHERE stud_ID = '$stud_ID' ");

      
    

    //Return to Landing Page

         echo "<script type=\"text/javascript\">".
                  "alert ('You have successfully updated the student's profile record!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/view_profile_details.php?getID=$stud_ID';\",0);</script>";
    
?>