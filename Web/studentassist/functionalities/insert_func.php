<?php
    
    include('../../../db_con.php');
  

//USER MANAGEMENT CONFIGURATION


    ////////  Adding User Role ///////
   if(isset($_POST['adduserrole']))
    {   
        
        $userrole = $_POST['usrole'];

        $insert = "INSERT INTO r_user_role (usr_desc, usr_timestamp)     
                   VALUES ('$userrole', CURRENT_TIMESTAMP)";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a user role!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/userrole.php';\",0);</script>";
    }


     ////////  Adding Account ///////
   else if(isset($_POST['addacc']))
    {   
        $acc_username = $_POST['acc_username'];
        $acc_password = $_POST['acc_pass'];
        $acc_grpldr = $_POST['acc_grpldr'];
        $acc_picture = $_POST['acc_pic'];

         $sqlemp= "SELECT * FROM `t_groupleader` WHERE grpld_ID = '$acc_grpldr'  ";
         $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
             while($row = mysqli_fetch_assoc($results))
             {
               $grpldID = $row['grpld_ID'];
               $grpldlast = $row['grpld_last_Name'];
               $grpldfirst = $row['grpld_first_Name'];
               $grpldemail = $row['grpld_email'];
               $wname = $grpldfirst.' '.$grpldlast;
             }
          

        
        $insert = "INSERT INTO t_account (acc_username, acc_password, acc_user_role, acc_email, acc_picture, acc_active_flag)     
                 VALUES ('$acc_username', '$acc_password', 2, '$grpldemail', '$acc_picture', 1)";

        mysqli_query($connection,$insert);
      

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added an account!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/useracc.php';\",0);</script>";
    }



    ////////  Adding Organization ///////
   else if(isset($_POST['addorg']))
    {   
        $g_ID = $_POST['gID'];
        $g_name = $_POST['gname'];
        $g_desc = $_POST['gdesc'];
        $g_ldr = $_POST['gleader'];
        $g_rgn = $_POST['gregion'];
        $g_cty = $_POST['gcity'];
        $g_rlg = $_POST['grlg'];
        $g_affchr = $_POST['gaffchurch'];


        $insert = "INSERT INTO t_group (grp_name, grp_desc, grp_leader, grp_religion, grp_region, grp_city, grp_church_affil, grp_timestamp)     
                   VALUES ('$g_name', '$g_desc', '$g_ldr', '$g_rlg', '$g_rgn', '$g_cty', '$g_affchr', CURRENT_TIMESTAMP)";
        mysqli_query($connection,$insert);
        // $update = "UPDATE t_groupleader SET grpld_group = '$g_ID' WHERE grpld_ID = '$g_ldr'";
        $query2 = mysqli_query($connection,"UPDATE t_groupleader SET grpld_group = '$g_ID' WHERE grpld_ID = '$g_ldr'"); 
       

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a group!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/Organization.php';\",0);</script>";
    }


    ////////  Adding Org Leader ///////
   else if(isset($_POST['addorgldr']))
    {   
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


        $insert = "INSERT INTO t_groupleader (grpld_last_name, grpld_first_name, grpld_middle_name, grpld_gender, grpld_Birthdate,              grpld_religion, grpld_region, grpld_city, grpld_contact, grpld_email, grpld_active_flag) 

                   VALUES ('$gl_lname', '$gl_fname', '$gl_mname', '$gl_gender', '$gl_bday', '$gl_rlg', '$gl_rgn', '$gl_city', '$gl_contact', 
                           '$gl_email', 1)";

              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a group leader!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/orgleader.php';\",0);</script>";
    }

//DEMOGRAPHIC CONFIGURATION

    ////////  Adding Region ///////
    else if(isset($_POST['addregion']))
    {   
        
        $region = $_POST['region'];

        $insert = "INSERT INTO r_region (rgn_name, rgn_timestamp)     
                   VALUES ('$region', CURRENT_TIMESTAMP)";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a region!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/region.php';\",0);</script>";
    }



    ////////  Adding City ///////
    else if(isset($_POST['addcity']))
    {   
        
        $city = $_POST['city'];

        $insert = "INSERT INTO r_city (city_name, city_timestamp)     
                   VALUES ('$city', CURRENT_TIMESTAMP)";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a city!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/city.php';\",0);</script>";
    }

//YAVATAN CONFIGURATION

    ////////  Adding Religion ///////
    else if(isset($_POST['addreligion']))
    {   
        
        $religion = $_POST['religion'];

        $insert = "INSERT INTO r_religion (rlg_name, rlg_timestamp)     
                   VALUES ('$religion', CURRENT_TIMESTAMP)";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a religion!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/religion.php';\",0);</script>";
    }


    ////////  Adding Church ///////
    else if(isset($_POST['addchurch']))
    {   
        $ch_name = $_POST['chr_name'];
        $ch_con = $_POST['chr_contact'];
        $ch_rlg = $_POST['chr_rlg'];
        $ch_rgn = $_POST['chr_region'];
        $ch_cty = $_POST['chr_city'];

        $insert = "INSERT INTO t_church (chr_name, chr_contact, chr_religion, chr_region, chr_city, chr_timestamp)     
                   VALUES ('$ch_name', '$ch_con', '$ch_rlg', '$ch_rgn', '$ch_cty', CURRENT_TIMESTAMP)";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a church!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/church.php';\",0);</script>";
    }
    
    ////////  Adding Event Type ///////
    else if(isset($_POST['addevetype']))
    {   
        
        $eventype = $_POST['evetype'];

        $insert = "INSERT INTO r_event_type (ev_type_name, ev_type_timestamp)     
                   VALUES ('$eventype', CURRENT_TIMESTAMP)";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added an event type!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/evetype.php';\",0);</script>";
    }

    ////////  Adding Event Audience Basis ///////
    else if(isset($_POST['addeveaud']))
    {   
        
        $eveaud = $_POST['eveaud'];

        $insert = "INSERT INTO r_event_audience (ev_aud_desc, ev_aud_timestamp)     
                   VALUES ('$eveaud', CURRENT_TIMESTAMP)";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added an event audience basis!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/eveaud.php';\",0);</script>";
    }


?>


