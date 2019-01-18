<?php
    
    include('../../../db_con.php');


  //////// Archive Event Audience ///////
  if(isset($_POST['arch_eveaud']))
  {   
        
         $ID = $_POST['eveaud_ID'];

         $query = mysqli_query($connection,"UPDATE r_event_audience SET ev_aud_stat = 0 WHERE ev_aud_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully archived!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/eveaud.php';\",0);</script>";
  }


  //////// Archive Event Type ///////
  else if(isset($_POST['arch_evetype']))
  {   
        
         $ID = $_POST['evetype_ID'];

         $query = mysqli_query($connection,"UPDATE r_event_type SET ev_type_stat = 0 WHERE ev_type_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully archived!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/evetype.php';\",0);</script>";
  }

  //////// Archive Religion ///////
  else if(isset($_POST['arch_religion']))
  {   
        
         $ID = $_POST['religion_ID'];

         $query = mysqli_query($connection,"UPDATE r_religion SET rlg_stat = 0 WHERE rlg_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully archived!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/religion.php';\",0);</script>";
  }

  //////// Archive Church ///////
  else if(isset($_POST['arch_church']))
  {   
        
         $ID = $_POST['church_ID'];

         $query = mysqli_query($connection,"UPDATE t_church SET chr_stat = 0 WHERE chr_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully archived!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/church.php';\",0);</script>";
  }

  //////// Archive Region ///////
  else if(isset($_POST['arch_region']))
  {   
        
         $ID = $_POST['region_ID'];

         $query = mysqli_query($connection,"UPDATE r_region SET rgn_stat = 0 WHERE rgn_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully archived!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/region.php';\",0);</script>";
  }



 //////// ArchiveCity ///////
  else if(isset($_POST['arch_city']))
  {   
        
         $ID = $_POST['city_ID'];

         $query = mysqli_query($connection,"UPDATE r_city SET city_stat = 0 WHERE city_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully archived!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/city.php';\",0);</script>";
  }

  //////// Archive Region ///////
  else if(isset($_POST['arch_usr']))
  {   
        
         $ID = $_POST['usr_ID'];

         $query = mysqli_query($connection,"UPDATE r_user_role SET usr_stat = 0 WHERE usr_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully archived!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/userrole.php';\",0);</script>";
  }

 ////////  Organization Change Status ///////
 else if(isset($_POST['arch_grp']))
  {   
        
         $ID = $_POST['grpID'];
         $stat = $_POST['grpstat'];

         $query = mysqli_query($connection,"UPDATE t_group SET grp_stat = '$stat' WHERE grp_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully changed the status!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/Organization.php';\",0);</script>";
  }

   ////////  Account Change Status ///////
 else if(isset($_POST['arch_acc']))
  {   
        
         $ID = $_POST['accID'];
         $stat = $_POST['accstat'];

         $query = mysqli_query($connection,"UPDATE t_account SET acc_active_flag = '$stat' WHERE acc_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully changed the status!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/useracc.php';\",0);</script>";
  }

    ////////  Account Change Status ///////
 else if(isset($_POST['arch_grpld']))
  {   
        
         $ID = $_POST['grpldID'];
         $stat = $_POST['grpldstat'];

         $query = mysqli_query($connection,"UPDATE t_groupleader SET grpld_active_flag = '$stat' WHERE grpld_ID = '$ID'");

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully changed the status!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/orgleader.php';\",0);</script>";
  }
  
  
?>