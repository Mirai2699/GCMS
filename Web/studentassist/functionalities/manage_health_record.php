<?php


    include('../../../db_con.php');
  

//Manual Input of Student Record
       $stud_ID = $_POST["stud_ID"];
       $stud_no = $_POST["stud_no"];		
	  
	 //Step 3 (Health Information) Query Preparation

	  if(isset($_POST['add_health_rec']))
      {     
      	$stud_heal_vision = $_POST["stud_heal_vision"];
      	$stud_heal_hearing = $_POST["stud_heal_hearing"];
      	$stud_heal_speech = $_POST["stud_heal_speech"];
      	$stud_heal_genass = $_POST["stud_heal_genass"];
      	$stud_heal_datepsych = $_POST["stud_heal_datepsych"];
      	$stud_heal_reaspsych = $_POST["stud_heal_reaspsych"];


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

	 //Step 3 (Student Profile) Query Execution
	           
	     mysqli_query($connection,$step3physical);
	     mysqli_query($connection,$step3psychological);

	 //Return to Landing Page

	          echo "<script type=\"text/javascript\">".
	                   "alert
	                   ('You have successfully added a health record!');".
	                  "</script>";
	          echo "<script>setTimeout(\"location.href = '../views/view_profile_details.php?getID=$stud_ID';\",0);</script>";

	  } 


	  else if(isset($_POST['add_psy_health_only']))
      {   
      	
	       $stud_heal_datepsych = $_POST["stud_heal_datepsych"];
	       $stud_heal_reaspsych = $_POST["stud_heal_reaspsych"];

	        $step3psychological = "INSERT INTO t_stud_psych_rec(psych_student, 
	                                                             psych_last_consult,
	                                                             psych_reason_consult
	                                                            )     
	                                 VALUES ('$stud_no', 
	                                         '$stud_heal_datepsych',
	                                         '$stud_heal_reaspsych'
	                                        )";

	 //Step 3 (Student Profile) Query Execution
	           
	     mysqli_query($connection,$step3psychological);

	 //Return to Landing Page

	          echo "<script type=\"text/javascript\">".
	                   "alert
	                   ('You have successfully added a psychological health consultation record!');".
	                  "</script>";
	          echo "<script>setTimeout(\"location.href = '../views/view_profile_details.php?getID=$stud_ID';\",0);</script>";

	  }

	  else if(isset($_POST['add_phy_health_only']))
      {   
	       
      		$stud_heal_vision = $_POST["stud_heal_vision"];
      		$stud_heal_hearing = $_POST["stud_heal_hearing"];
      		$stud_heal_speech = $_POST["stud_heal_speech"];
      		$stud_heal_genass = $_POST["stud_heal_genass"];

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



	 //Step 3 (Student Profile) Query Execution
	           
	     mysqli_query($connection,$step3physical);


	 //Return to Landing Page

	           echo "<script type=\"text/javascript\">".
	                   "alert
	                   ('You have successfully added a physical health consultation record!');".
	                  "</script>";
	          echo "<script>setTimeout(\"location.href = '../views/view_profile_details.php?getID=$stud_ID';\",0);</script>";

	  }
?>