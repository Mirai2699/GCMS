<?php
    
    include('../../../db_con.php');
  

//Manual Input of Student Record


    //Step 1 (Student Profile) Variable Intialization

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

    //Step 3 (Health Information) Variable Intialization

       $stud_heal_vision = $_POST["stud_heal_vision"];
       $stud_heal_hearing = $_POST["stud_heal_hearing"];
       $stud_heal_speech = $_POST["stud_heal_speech"];
       $stud_heal_genass = $_POST["stud_heal_genass"];
       $stud_heal_datepsych = $_POST["stud_heal_datepsych"];
       $stud_heal_reaspsych = $_POST["stud_heal_reaspsych"];

    //Step 4 (Family Background) Variable Intialization

        $stud_fam_type = $_POST["stud_fam_type"];
        $stud_fam_lname = $_POST["stud_fam_lname"];
        $stud_fam_mname = $_POST["stud_fam_mname"];
        $stud_fam_fname = $_POST["stud_fam_fname"];
        $stud_fam_age = $_POST["stud_fam_age"];
        $stud_fam_stat = $_POST["stud_fam_stat"];
        $stud_fam_educattain = $_POST["stud_fam_educattain"];
        $stud_fam_occup = $_POST["stud_fam_occup"];
        $stud_fam_empname = $_POST["stud_fam_empname"];
        $stud_fam_empadd = $_POST["stud_fam_empadd"];

    //Step 5 (Educational Background) Variable Intialization

        $stud_educ_nature = $_POST["stud_educ_nature"];
        $stud_educ_interrupt = $_POST["stud_educ_interrupt"];

        $stud_educ_schname_primary = $_POST["stud_educ_schname_primary"];
        $stud_educ_schadd_primary = $_POST["stud_educ_schadd_primary"];
        $stud_educ_schtype_primary = $_POST["stud_educ_schtype_primary"];
        $stud_educ_yrgrad_primary = $_POST["stud_educ_yrgrad_primary"];

        $stud_educ_schname_second = $_POST["stud_educ_schname_second"];
        $stud_educ_schadd_second = $_POST["stud_educ_schadd_second"];
        $stud_educ_schtype_second = $_POST["stud_educ_schtype_second"];
        $stud_educ_yrgrad_second = $_POST["stud_educ_yrgrad_second"];

        $stud_educ_schname_tert = $_POST["stud_educ_schname_tert"];
        $stud_educ_schadd_tert = $_POST["stud_educ_schadd_tert"];
        $stud_educ_schtype_tert = $_POST["stud_educ_schtype_tert"];
        $stud_educ_yrgrad_tert = $_POST["stud_educ_yrgrad_tert"];



    //Step 6 (Finalization) Variable Intialization


        $stud_batch_year = $_POST["stud_batch_year"];
       

    //Step 1 (Student Profile) Query Preparation

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


                               

    //Step 3 (Health Information) Query Preparation


           $step3physical = "INSERT INTO t_stud_physical_rec  (phy_rec_student, 
                                                               phy_rec_vision,
                                                               phy_rec_hearing,
                                                               phy_rec_speech,
                                                               phy_rec_genhealth
                                                              )     
                                    VALUES ('$stud_no', 
                                            '$stud_heal_vision',
                                            '$stud_heal_hearing', 
                                            '$stud_heal_speech',
                                            '$stud_heal_genass'
                                           )";


           $step3psychological = "INSERT INTO t_stud_psych_rec(psych_student, 
                                                                psych_last_consult,
                                                                psych_reason_consult
                                                               )     
                                    VALUES ('$stud_no', 
                                            '$stud_heal_datepsych',
                                            '$stud_heal_reaspsych'
                                           )";

    //Step 4 (Family Background) Query Preparation

             $step4 = "INSERT INTO t_stud_family_bg_rec (famInf_student, 
                                                         famInf_type,
                                                         famInf_lastname,
                                                         famInf_middlename,
                                                         famInf_firstname,
                                                         famInf_age,
                                                         famInf_stat,
                                                         famInf_educ_attain,
                                                         famInf_occupation,
                                                         famInf_empl_name,
                                                         famInf_empl_address
                                                        )     
                                VALUES ('$stud_no', 
                                        '$stud_fam_type',
                                        '$stud_fam_lname',
                                        '$stud_fam_mname',
                                        '$stud_fam_fname',
                                        '$stud_fam_age',
                                        '$stud_fam_stat',
                                        '$stud_fam_educattain',
                                        '$stud_fam_occup',
                                        '$stud_fam_empname',
                                        '$stud_fam_empadd'
                                       )";

    //Step 5 (Education Background) Query Preparation

               $step5nature = "INSERT INTO t_stud_education_rec (educ_student, 
                                                                 educ_nature_schooling,
                                                                 educ_interrupt_reason
                                                                )     
                                      VALUES ('$stud_no',
                                              '$stud_educ_nature',
                                              '$stud_educ_interrupt'
                                              )";

               $step5primary = "INSERT INTO t_stud_educational_bg_details (educ_bg_student, 
                                                                           educ_bg_level,
                                                                           educ_bg_school_name,
                                                                           educ_bg_school_address,
                                                                           educ_bg_school_type,
                                                                           educ_bg_year_graduated
                                                                          )     
                                       VALUES ('$stud_no',
                                               'Primary',
                                               '$stud_educ_schname_primary',
                                               '$stud_educ_schadd_primary',
                                               '$stud_educ_schtype_primary',
                                               '$stud_educ_yrgrad_primary'
                                              )";

               $step5second = "INSERT INTO t_stud_educational_bg_details  (educ_bg_student, 
                                                                           educ_bg_level,
                                                                           educ_bg_school_name,
                                                                           educ_bg_school_address,
                                                                           educ_bg_school_type,
                                                                           educ_bg_year_graduated
                                                                          )     
                                      VALUES ('$stud_no',
                                               'Secondary',
                                               '$stud_educ_schname_second',
                                               '$stud_educ_schadd_second',
                                               '$stud_educ_schtype_second',
                                               '$stud_educ_yrgrad_second'
                                              )";

               $step5ptert = "INSERT INTO t_stud_educational_bg_details   (educ_bg_student, 
                                                                           educ_bg_level,
                                                                           educ_bg_school_name,
                                                                           educ_bg_school_address,
                                                                           educ_bg_school_type,
                                                                           educ_bg_year_graduated
                                                                          )     
                                       VALUES ('$stud_no',
                                               'Tertiary',
                                               '$stud_educ_schname_tert',
                                               '$stud_educ_schadd_tert',
                                               '$stud_educ_schtype_tert',
                                               '$stud_educ_yrgrad_tert'
                                              )";

    //Step 6 (Finalization) Query Preparation

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

    //Step 2 (Student Profile) Query Execution
              
        mysqli_query($connection,$step2);

    //Step 3 (Student Profile) Query Execution
              
        mysqli_query($connection,$step3physical);
        mysqli_query($connection,$step3psychological);

    //Step 4 (Student Profile) Query Execution
              
        mysqli_query($connection,$step4);

    //Step 5 (Student Profile) Query Execution
              
        mysqli_query($connection,$step5nature);
        mysqli_query($connection,$step5primary);
        mysqli_query($connection,$step5second);
        mysqli_query($connection,$step5ptert);

    //Step 6 (Student Profile) Query Execution
              
        mysqli_query($connection,$step6);




    //Return to Landing Page

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a student record!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/view_profile.php';\",0);</script>";
    
?>