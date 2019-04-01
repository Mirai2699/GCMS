<?php
	if(isset($_POST['add_educ_rec']))
    {  
		include ("../../../db_con.php");

		$stud_no = $_POST["stud_no"];
		$stud_nature = $_POST["stud_educ_nature"];
		$stud_interrupt = $_POST["stud_educ_interrupt"];

		$step5nature = "INSERT INTO t_stud_education_rec (educ_student, 
		                                                  educ_nature_schooling,
		                                                  educ_interrupt_reason
		                                                 )     
		                       VALUES ('$stud_no',
		                               '$stud_nature',
		                               '$stud_interrupt'
		                               )";


		 mysqli_query($connection,$step5nature);

	}
	
?>
<?php
	
	if(isset($_POST['add_educ_rec']))
    {  

	 	$user = 'root';
	 	$pass = '';
	 	$dbnm = 'gcms_v2';

	 	try 
	 	{
	 	    $dbh = new PDO('mysql:host=localhost;dbname='.$dbnm, $user, $pass);
	 	} 
	 	catch (PDOException $e) 
	 	{
	 	    print "Error!: " . $e->getMessage() . "<br/>";
	 	    die();
	 	}



	 	$stmt = $dbh->prepare("INSERT INTO t_stud_educational_bg_details (
		 	                                                              educ_bg_school_name,
		 	                                                              educ_bg_school_address,
		 	                                                              educ_bg_level,	
		 	                                                              educ_bg_school_type,
		 	                                                              educ_bg_year_graduated,
		 	                                                              educ_bg_student
		 	                                                             )     
		 	                                                             VALUES (?, ?, ?, ?, ?, ?)");

	
	 	$stmt->bindParam(1, $stud_educ_schname);
	 	$stmt->bindParam(2, $stud_educ_schadd);
	 	$stmt->bindParam(3, $stud_educ_level);
	 	$stmt->bindParam(4, $stud_educ_schtype);
	 	$stmt->bindParam(5, $stud_educ_schyrgrad);
	 	$stmt->bindParam(6, $stud_educ_stud_ref);

	 	

	 	$arr = $_POST; 

	 	for($i = 0; $i <= count($arr['stud_educ_schname'])-1;$i++)
	 	{
	 	    $stud_educ_schname = $arr['stud_educ_schname'][$i];
	 	    $stud_educ_schadd = $arr['stud_educ_schadd'][$i];
	 	    $stud_educ_level = $arr['stud_educ_level'][$i];
	 	    $stud_educ_schtype = $arr['stud_educ_schtype'][$i];
	 	    $stud_educ_schyrgrad = $arr['stud_educ_yrgrad'][$i];
	 	    $stud_educ_stud_ref = $arr['stud_no'];
	 	    $stmt->execute();

	 	   
	 	}

	 	//Return to Landing Page
	 	$stud_ID = $_POST['stud_ID'];
	     echo "<script type=\"text/javascript\">".
	              "alert
	              ('You have successfully added an student's education record!');".
	             "</script>";
	     echo "<script>setTimeout(\"location.href = '../views/view_profile_details.php?getID=$stud_ID';\",0);</script>";
	}

	else if(isset($_POST['add_educ_rec_done']))
    {  

	 	$user = 'root';
	 	$pass = '';
	 	$dbnm = 'gcms_v2';

	 	try 
	 	{
	 	    $dbh = new PDO('mysql:host=localhost;dbname='.$dbnm, $user, $pass);
	 	} 
	 	catch (PDOException $e) 
	 	{
	 	    print "Error!: " . $e->getMessage() . "<br/>";
	 	    die();
	 	}



	 	$stmt = $dbh->prepare("INSERT INTO t_stud_educational_bg_details (
		 	                                                              educ_bg_school_name,
		 	                                                              educ_bg_school_address,
		 	                                                              educ_bg_level,	
		 	                                                              educ_bg_school_type,
		 	                                                              educ_bg_year_graduated,
		 	                                                              educ_bg_student
		 	                                                             )     
		 	                                                             VALUES (?, ?, ?, ?, ?, ?)");

	
	 	$stmt->bindParam(1, $stud_educ_schname);
	 	$stmt->bindParam(2, $stud_educ_schadd);
	 	$stmt->bindParam(3, $stud_educ_level);
	 	$stmt->bindParam(4, $stud_educ_schtype);
	 	$stmt->bindParam(5, $stud_educ_schyrgrad);
	 	$stmt->bindParam(6, $stud_educ_stud_ref);

	 	

	 	$arr = $_POST; 

	 	for($i = 0; $i <= count($arr['stud_educ_schname'])-1;$i++)
	 	{
	 	    $stud_educ_schname = $arr['stud_educ_schname'][$i];
	 	    $stud_educ_schadd = $arr['stud_educ_schadd'][$i];
	 	    $stud_educ_level = $arr['stud_educ_level'][$i];
	 	    $stud_educ_schtype = $arr['stud_educ_schtype'][$i];
	 	    $stud_educ_schyrgrad = $arr['stud_educ_yrgrad'][$i];
	 	    $stud_educ_stud_ref = $arr['stud_no'];
	 	    $stmt->execute();

	 	   
	 	}


	 	//Return to Landing Page
	 	$stud_ID = $_POST['stud_ID'];
	     echo "<script type=\"text/javascript\">".
	              "alert
	              ('You have successfully added an student's education record!');".
	             "</script>";
	     echo "<script>setTimeout(\"location.href = '../views/view_profile_details.php?getID=$stud_ID';\",0);</script>";
	}

	else if(isset($_POST['add_hon_rec']))
    {  

	 	$user = 'root';
	 	$pass = '';
	 	$dbnm = 'gcms_v2';

	 	try 
	 	{
	 	    $dbh = new PDO('mysql:host=localhost;dbname='.$dbnm, $user, $pass);
	 	} 
	 	catch (PDOException $e) 
	 	{
	 	    print "Error!: " . $e->getMessage() . "<br/>";
	 	    die();
	 	}



	 	$stmt = $dbh->prepare("INSERT INTO t_stud_honors_awards (
		 	                                                      hon_school,
		 	                                                      hon_received_type,
		 	                                                      hon_description,	
		 	                                                      hon_student
		 	                                                     )     
		 	                                                     VALUES (?, ?, ?, ?)");

	
	 	$stmt->bindParam(1, $stud_hon_schname);
	 	$stmt->bindParam(2, $stud_hon_rectype);
	 	$stmt->bindParam(3, $stud_hon_desc);
	 	$stmt->bindParam(4, $stud_hon_stud_ref);

	 	

	 	$arr = $_POST; 

	 	for($i = 0; $i <= count($arr['stud_hon_schname'])-1;$i++)
	 	{
	 	    $stud_hon_schname = $arr['stud_hon_schname'][$i];
	 	    $stud_hon_rectype = $arr['stud_hon_rectype'][$i];
	 	    $stud_hon_desc = $arr['stud_hon_desc'][$i];
	 	    $stud_hon_stud_ref = $arr['stud_no'];
	 	    $stmt->execute();

	 	   
	 	}

	 	//Return to Landing Page
	 	 $stud_ID = $_POST['stud_ID'];
	     echo "<script type=\"text/javascript\">".
	              "alert
	              ('You have successfully added an student's awards record!');".
	             "</script>";
	     echo "<script>setTimeout(\"location.href = '../views/view_profile_details.php?getID=$stud_ID';\",0);</script>";
	}


	else if(isset($_POST['edit_educ_rec']))
    {  

	 	include ("../../../db_con.php");

		 		$stud_educ_schname = $_POST["stud_educ_schname"];
		 		$stud_educ_schadd = $_POST["stud_educ_schadd"];
		 		$stud_educ_level = $_POST["stud_educ_level"];
		 		$stud_educ_schtype = $_POST["stud_educ_schtype"];
		 		$stud_educ_yrgrad = $_POST["stud_educ_yrgrad"];

		 		$educ_ID = $_POST["educ_ID"];
		 		$stud_fam_stud_ref = $_POST['stud_no'];
		 		$stud_ID = $_POST['stud_ID'];

		 		      $query = mysqli_query($connection,"UPDATE t_stud_educational_bg_details SET 

		 		                                            educ_bg_school_name = '$stud_educ_schname', 
		 		                                            educ_bg_school_address = '$stud_educ_schadd', 
		 		                                            educ_bg_level = '$stud_educ_level', 
		 		                                            educ_bg_school_type = '$stud_educ_schtype', 
		 		                                            educ_bg_year_graduated = '$stud_educ_yrgrad', 
		 		                                            educ_bg_mod_date = CURRENT_TIMESTAMP  

		 		                                        WHERE educ_bg_ID = '$educ_ID' ");

		 		  
		 		

		 		//Return to Landing Page

		 		     echo "<script type=\"text/javascript\">".
		 		              "alert ('You have successfully updated the student's educational background record!');".
		 		             "</script>";
		 		     echo "<script>setTimeout(\"location.href = '../views/view_profile_details.php?getID=$stud_ID';\",0);</script>";
	}



	else if(isset($_POST['edit_educnat_det']))
    {  

	 	include ("../../../db_con.php");

		 		$stud_educ_nature = $_POST["stud_educ_nature"];
		 		$stud_educ_interrupt = $_POST["stud_educ_interrupt"];

		 		$educnat_ID = $_POST["educnat_ID"];
		 		$stud_fam_stud_ref = $_POST['stud_no'];
		 		$stud_ID = $_POST['stud_ID'];

		 		      $query = mysqli_query($connection,"UPDATE t_stud_education_rec SET 

		 		                                            educ_nature_schooling = '$stud_educ_nature', 
		 		                                            educ_interrupt_reason = '$stud_educ_interrupt', 
		 		                                            educ_mod_date = CURRENT_TIMESTAMP  

		 		                                        WHERE educ_ID = '$educnat_ID' ");

		 		  
		 		

		 		//Return to Landing Page

		 		     echo "<script type=\"text/javascript\">".
		 		              "alert ('You have successfully updated the student's educational record!');".
		 		             "</script>";
		 		     echo "<script>setTimeout(\"location.href = '../views/view_profile_details.php?getID=$stud_ID';\",0);</script>";
	}

	

	
?>
	