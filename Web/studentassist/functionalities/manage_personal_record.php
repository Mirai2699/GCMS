<?php
    
    include('../../../db_con.php');
  

//Manual Input of Student Record
       $stud_ID = $_POST["stud_ID"];
       $stud_no = $_POST["stud_no"];
    //Step 2 (Personal Information) Variable Intialization

       $stud_per_weight = $_POST["stud_per_weight"];
       $stud_per_height = $_POST["stud_per_height"];
       $stud_per_complex = $_POST["stud_per_complex"];
       $stud_per_religion = $_POST["stud_per_religion"];
       $stud_per_genave = $_POST["stud_per_genave"];
       $stud_per_civstat = $_POST["stud_per_civstat"];
       $stud_per_workstat = $_POST["stud_per_workstat"];
       $stud_per_emplname = $_POST["stud_per_emplname"];
       $stud_per_empladd = $_POST["stud_per_empladd"];
       $stud_per_conname = $_POST["stud_per_conname"];
       $stud_per_conadd = $_POST["stud_per_conadd"];
       $stud_per_connum = $_POST["stud_per_connum"];
       $stud_per_conrel = $_POST["stud_per_conrel"];
       $stud_per_maritalstat = $_POST["stud_per_maritalstat"];
       $stud_per_famchil = $_POST["stud_per_famchil"];
       $stud_per_nobro = $_POST["stud_per_nobro"];
       $stud_per_nosis = $_POST["stud_per_nosis"];
       $stud_per_noemp = $_POST["stud_per_noemp"];
       $stud_per_ordpos = $_POST["stud_per_ordpos"];
       $stud_per_schfinan = $_POST["stud_per_schfinan"];
       $stud_per_weekallow = $_POST["stud_per_weekallow"];
       $stud_per_partotalinc = $_POST["stud_per_partotalinc"];
       $stud_per_quiplace = $_POST["stud_per_quiplace"];
       $stud_per_roomshare = $_POST["stud_per_roomshare"];
       $stud_per_residence = $_POST["stud_per_residence"];

    

 if (isset($_POST['add_per_rec'])) 
    {
          //Step 2 (Personal Information) Query Preparation

           $step2 = "INSERT INTO t_stud_personal_rec(person_rec_student_no, 
                                                     person_rec_weight,
                                                     person_rec_height,
                                                     person_rec_complexion,
                                                     person_rec_religion,
                                                     person_rec_hs_genave,
                                                     person_rec_civil_stat,
                                                     person_rec_working_stat,
                                                     person_rec_empl_name,
                                                     person_rec_empl_address,
                                                     person_rec_emerg_contact_name,
                                                     person_rec_emerg_contact_address,
                                                     person_rec_emerg_contact_number,
                                                     person_rec_contact_relationship,
                                                     person_rec_parents_marital_stat,
                                                     person_rec_fam_chil_no,
                                                     person_rec_brother_no,
                                                     person_rec_sister_no,
                                                     person_rec_siblings_employed,
                                                     person_rec_ordinal_position,
                                                     person_rec_schooling_finance,
                                                     person_rec_weekly_allowance,
                                                     person_rec_parents_total_monthlyinc,
                                                     person_rec_quiet_place,
                                                     person_rec_room_share,
                                                     person_rec_residence
                                                    )     
                          VALUES ('$stud_no', 
                                  '$stud_per_weight',
                                  '$stud_per_height', 
                                  '$stud_per_complex',
                                  '$stud_per_religion',
                                  '$stud_per_genave',
                                  '$stud_per_civstat',
                                  '$stud_per_workstat',
                                  '$stud_per_emplname',
                                  '$stud_per_empladd',
                                  '$stud_per_conname',
                                  '$stud_per_conadd',
                                  '$stud_per_connum',
                                  '$stud_per_conrel',
                                  '$stud_per_maritalstat',
                                  '$stud_per_famchil',
                                  '$stud_per_nobro',
                                  '$stud_per_nosis',
                                  '$stud_per_noemp',
                                  '$stud_per_ordpos',
                                  '$stud_per_schfinan',
                                  '$stud_per_weekallow',
                                  '$stud_per_partotalinc',
                                  '$stud_per_quiplace',
                                  '$stud_per_roomshare',
                                  '$stud_per_residence'
                                 )";



        //Step 2 (Student Profile) Query Execution
              
        mysqli_query($connection,$step2);

         //Return to Landing Page

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a student's personal record!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/view_profile_details.php?getID=$stud_ID';\",0);</script>";
    }
    

    else if (isset($_POST['update_per_rec'])) 
    {
          //Step 2 (Personal Information) Query Preparation

           $query = mysqli_query($connection,"UPDATE t_stud_personal_rec SET 


                                                person_rec_weight = '$stud_per_weight',
                                                person_rec_height = '$stud_per_height', 
                                                person_rec_complexion = '$stud_per_complex',
                                                person_rec_religion = '$stud_per_religion',
                                                person_rec_hs_genave = '$stud_per_genave',
                                                person_rec_civil_stat = '$stud_per_civstat',
                                                person_rec_working_stat = '$stud_per_workstat',
                                                person_rec_empl_name = '$stud_per_emplname',
                                                person_rec_empl_address = '$stud_per_empladd',
                                                person_rec_emerg_contact_number = '$stud_per_conname',
                                                person_rec_emerg_contact_address = '$stud_per_conadd',
                                                person_rec_emerg_contact_number = '$stud_per_connum',
                                                person_rec_contact_relationship = '$stud_per_conrel',
                                                person_rec_parents_marital_stat = '$stud_per_maritalstat',
                                                person_rec_fam_chil_no = '$stud_per_famchil',
                                                person_rec_brother_no = '$stud_per_nobro',
                                                person_rec_sister_no = '$stud_per_nosis',
                                                person_rec_siblings_employed = '$stud_per_noemp',
                                                person_rec_ordinal_position = '$stud_per_ordpos',
                                                person_rec_schooling_finance = '$stud_per_schfinan',
                                                person_rec_weekly_allowance = '$stud_per_weekallow',
                                                person_rec_parents_total_monthlyinc = '$stud_per_partotalinc',
                                                person_rec_quiet_place = '$stud_per_quiplace',
                                                person_rec_room_share = '$stud_per_roomshare',
                                                person_rec_residence = '$stud_per_residence',
                                                person_rec_mod_date = CURRENT_TIMESTAMP  

                                            WHERE person_rec_student_no = '$stud_no' ");



    
         //Return to Landing Page

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the student's personal record!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/view_profile_details.php?getID=$stud_ID';\",0);</script>";
    }


   
    
?>