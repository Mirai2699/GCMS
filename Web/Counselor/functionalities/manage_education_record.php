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
	}

	//Return to Landing Page

	     echo "<script type=\"text/javascript\">".
	              "alert
	              ('You have successfully added an student's education record!');".
	             "</script>";
	     echo "<script>setTimeout(\"location.href = '../views/view_profile.php';\",0);</script>";

	
?>
	