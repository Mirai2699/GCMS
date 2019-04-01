<?php
	
	 if(isset($_POST['add_fam_rec']))
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



	 	$stmt = $dbh->prepare("INSERT INTO t_stud_family_bg_rec(famInf_type, famInf_lastname, famInf_middlename, famInf_firstname, famInf_age, famInf_stat, famInf_educ_attain, famInf_occupation, famInf_empl_name, famInf_empl_address, famInf_student) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	 	
	 	$stmt->bindParam(1, $stud_fam_type);
	 	$stmt->bindParam(2, $stud_fam_lname);
	 	$stmt->bindParam(3, $stud_fam_mname);
	 	$stmt->bindParam(4, $stud_fam_fname);
	 	$stmt->bindParam(5, $stud_fam_age);
	 	$stmt->bindParam(6, $stud_fam_stat);
	 	$stmt->bindParam(7, $stud_fam_educattain);
	 	$stmt->bindParam(8, $stud_fam_occup);
	 	$stmt->bindParam(9, $stud_fam_empname);
	 	$stmt->bindParam(10, $stud_fam_empadd);
	 	$stmt->bindParam(11, $stud_fam_stud_ref);

	 	

	 	$arr = $_POST; 

	 	for($i = 0; $i <= count($arr['stud_fam_type'])-1;$i++)
	 	{
	 	    $stud_fam_type = $arr['stud_fam_type'][$i];
	 	    $stud_fam_lname = $arr['stud_fam_lname'][$i];
	 	    $stud_fam_mname = $arr['stud_fam_mname'][$i];
	 	    $stud_fam_fname = $arr['stud_fam_fname'][$i];
	 	    $stud_fam_age = $arr['stud_fam_age'][$i];
	 	    $stud_fam_stat = $arr['stud_fam_stat'][$i];
	 	    $stud_fam_educattain = $arr['stud_fam_educattain'][$i];
	 	    $stud_fam_occup = $arr['stud_fam_occup'][$i];
	 	    $stud_fam_empname = $arr['stud_fam_empname'][$i];
	 	    $stud_fam_empadd = $arr['stud_fam_empadd'][$i];
	 	    $stud_fam_stud_ref = $arr['stud_no'];
	 	    $stmt->execute();

	 	   
	 	}


	 		 $stud_ID = $_POST["stud_ID"];
	 	     echo "<script type=\"text/javascript\">".
	 	              "alert
	 	              ('You have successfully added a student's family record!');".
	 	             "</script>";
	 	     echo "<script>setTimeout(\"location.href = '../views/view_profile_details.php?getID=$stud_ID';\",0);</script>";

	 }

		 else if (isset($_POST['edit_fam_rec'])) 
		 {      

		 	include ("../../../db_con.php");

		 		$stud_fam_type = $_POST['stud_fam_type'];
		 		$stud_fam_lname = $_POST['stud_fam_lname'];
		 		$stud_fam_mname = $_POST['stud_fam_mname'];
		 		$stud_fam_fname = $_POST['stud_fam_fname'];
		 		$stud_fam_age = $_POST['stud_fam_age'];
		 		$stud_fam_stat = $_POST['stud_fam_stat'];
		 		$stud_fam_educattain = $_POST['stud_fam_educattain'];
		 		$stud_fam_occup = $_POST['stud_fam_occup'];
		 		$stud_fam_empname = $_POST['stud_fam_empname'];
		 		$stud_fam_empadd = $_POST['stud_fam_empadd'];
		 		$stud_fam_stud_ref = $_POST['stud_no'];
		 		$stud_fam_ID = $_POST['famInf_ID'];
		 		$stud_ID = $_POST['stud_ID'];

		 		      $query = mysqli_query($connection,"UPDATE t_stud_family_bg_rec SET 

		 		                                            famInf_type = '$stud_fam_type', 
		 		                                            famInf_lastname = '$stud_fam_lname', 
		 		                                            famInf_middlename = '$stud_fam_mname', 
		 		                                            famInf_firstname = '$stud_fam_fname', 
		 		                                            famInf_age = '$stud_fam_age', 
		 		                                            famInf_stat = '$stud_fam_stat', 
		 		                                            famInf_educ_attain = '$stud_fam_educattain', 
		 		                                            famInf_occupation = '$stud_fam_occup', 
		 		                                            famInf_empl_name = '$stud_fam_empname', 
		 		                                            famInf_empl_address = '$stud_fam_empadd', 
		 		                                            famInf_mod_date = CURRENT_TIMESTAMP  

		 		                                        WHERE famInf_ID = '$stud_fam_ID' ");

		 		  
		 		

		 		//Return to Landing Page

		 		     echo "<script type=\"text/javascript\">".
		 		              "alert ('You have successfully updated the student's family background record!');".
		 		             "</script>";
		 		     echo "<script>setTimeout(\"location.href = '../views/view_profile_details.php?getID=$stud_ID';\",0);</script>";
		 }
?>