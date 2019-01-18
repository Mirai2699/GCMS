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

	 else if (isset($_POST['edit_'])) 
	 {

	 
	 }
?>