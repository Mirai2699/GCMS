<?php
    
    include('../../../db_con.php');
  

//USER MANAGEMENT CONFIGURATION



     ////////  Editing Event Audience Type ///////
   if(isset($_POST['editeveaud']))
    {   
        
         $ID = $_POST['eveaud_ID'];
         $name = $_POST['eveaud_name'];

         $query = mysqli_query($connection,"UPDATE r_event_audience SET ev_aud_desc = '$name' WHERE ev_aud_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the description!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/eveaud.php';\",0);</script>";
    }

      ////////  Editing Event Type ///////
   else if(isset($_POST['editevetype']))
    {   
        
         $ID = $_POST['evetype_ID'];
         $name = $_POST['evetype_name'];

         $query = mysqli_query($connection,"UPDATE r_event_type SET ev_type_name = '$name' WHERE ev_type_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the description!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/evetype.php';\",0);</script>";
    }

    ////////  Editing Religion ///////
   else if(isset($_POST['editreligion']))
    {   
        
         $ID = $_POST['religion_ID'];
         $name = $_POST['religion_name'];

         $query = mysqli_query($connection,"UPDATE r_religion SET rlg_name = '$name' WHERE rlg_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the description!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/religion.php';\",0);</script>";
    }


    ////////  Editing Religion ///////
   else if(isset($_POST['editchurch']))
    {   
        
         $ID = $_POST['chr_ID'];
         $name = $_POST['chr_name'];
         $contact = $_POST['chr_contact'];
         $region = $_POST['chr_region'];
         $city = $_POST['chr_city'];
         $religion = $_POST['chr_religion'];

         $query = mysqli_query($connection,"UPDATE t_church SET 
                                         
                                           chr_name = '$name', 
                                           chr_contact = '$contact', 
                                           chr_region = '$region', 
                                           chr_city = '$city', 
                                           chr_religion = '$religion' WHERE chr_ID = '$ID' ");


         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the details!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/church.php';\",0);</script>";
    }


     ////////  Editing Religion ///////
   else if(isset($_POST['editregion']))
    {   
        
         $ID = $_POST['region_ID'];
         $name = $_POST['region_name'];

         $query = mysqli_query($connection,"UPDATE r_region SET rgn_name = '$name' WHERE rgn_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the description!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/region.php';\",0);</script>";
    }


      ////////  Editing City ///////
   else if(isset($_POST['editcity']))
    {   
        
         $ID = $_POST['city_ID'];
         $name = $_POST['city_name'];

         $query = mysqli_query($connection,"UPDATE r_city SET city_name = '$name' WHERE city_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the description!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/city.php';\",0);</script>";
    }

    ////////  Editing Userrole ///////
   else if(isset($_POST['editusr']))
    {   
        
         $ID = $_POST['usr_ID'];
         $name = $_POST['usr_name'];

         $query = mysqli_query($connection,"UPDATE r_user_role SET usr_desc = '$name' WHERE usr_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the description!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/userrole.php';\",0);</script>";
    }

     ////////  Editing Group Details ///////
   else if(isset($_POST['editgrp']))
    {   
        
         $g_ID = $_POST['gID'];
         $g_name = $_POST['gname'];
         $g_desc = $_POST['gdesc'];
         $g_ldr = $_POST['gleader'];
         $g_reg = $_POST['gregion'];
         $g_cty = $_POST['gcity'];
         $g_rlg = $_POST['grlg'];
         $g_chr = $_POST['gaffchurch'];

         $query = mysqli_query($connection,"UPDATE t_group SET 
         									grp_name = '$g_name', 
         									grp_desc = '$g_desc', 
         									grp_leader = '$g_ldr', 
         									grp_region = '$g_reg', 
         									grp_city = '$g_cty', 
         									grp_religion = '$g_rlg', 
         									grp_church_affil = '$g_chr' 

         									WHERE grp_ID = '$g_ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the details!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/Organization.php';\",0);</script>";
    }

     else if(isset($_POST['editacc']))
    {   
        
         $acc_ID = $_POST['acc_ID'];
         $acc_name = $_POST['acc_username'];
         $acc_pic = $_POST['acc_pic'];
         $acc_pass = $_POST['acc_pass'];
         $acc_grpldr = $_POST['acc_grpldr'];
         $acc_grp = $_POST['acc_grp'];

         $query = mysqli_query($connection,"UPDATE t_account SET 
                          acc_username = '$acc_name', 
                          acc_picture = '$acc_pic', 
                          acc_password = '$acc_pass', 
                          acc_grpldID = '$acc_grpldr', 
                          acc_group = '$acc_grp'

                          WHERE acc_ID = '$acc_ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the details!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/useracc.php';\",0);</script>";
    }

     else if(isset($_POST['editgrpld']))
    {   
        
        $gl_ID = $_POST['gl_ID'];

        $gl_lname = $_POST['gl_lname'];
        $gl_mname = $_POST['gl_mname'];
        $gl_fname = $_POST['gl_fname'];
        $gl_gender = $_POST['gl_gender'];
        $gl_bday = $_POST['gl_bday'];
        $gl_rlg = $_POST['gl_rlg'];
        $gl_rgn = $_POST['gl_rgn'];
        $gl_city = $_POST['gl_city'];
        $gl_contact = $_POST['gl_contact'];
        $gl_email = $_POST['gl_email'];

         $query = mysqli_query($connection,"UPDATE t_groupleader SET 

                          grpld_last_Name = '$gl_lname', 
                          grpld_first_Name = '$gl_fname', 
                          grpld_middle_Name = '$gl_mname', 
                          grpld_gender = '$gl_gender', 
                          grpld_Birthdate = '$gl_bday',
                          grpld_religion = '$gl_rlg', 
                          grpld_region = '$gl_rgn', 
                          grpld_city = '$gl_city', 
                          grpld_contact = '$gl_contact', 
                          grpld_email = '$gl_email'
                          
                          WHERE grpld_ID = '$gl_ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully updated the details!');".
                 "</script>";

         echo "<script>setTimeout(\"location.href = '../views/orgleader.php';\",0);</script>";
    }


?>