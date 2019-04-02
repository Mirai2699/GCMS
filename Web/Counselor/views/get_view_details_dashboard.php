<?php
		
		$getstudent =  "SELECT DISTINCT stud_number FROM `t_stud_profile`";

		  if ($result=mysqli_query($connection,$getstudent))
		      {
		      // Return the number of rows in result set
		      $student_count=mysqli_num_rows($result);
		      //echo $total_count;
		      }
		  else 
		      $student_count = 0;
		  	  //echo $total_count;

		  $getindiv =  "SELECT DISTINCT CI_code FROM `t_counseling_individual`";

		  if ($result=mysqli_query($connection,$getindiv))
		      {
		      // Return the number of rows in result set
		      $indiv_count=mysqli_num_rows($result);
		      //echo $total_count;
		      }
		  else 
		      $indiv_count = 0;
		  	  //echo $total_count;


		  $getgroup =  "SELECT DISTINCT CG_code FROM `t_counseling_group`";

		  if ($result=mysqli_query($connection,$getgroup))
		      {
		      // Return the number of rows in result set
		      $group_count=mysqli_num_rows($result);
		      //echo $total_count;
		      }
		  else 
		      $group_count = 0;
		  	  //echo $total_count;


		  $getvisit =  "SELECT DISTINCT vs_code FROM `t_stud_visitation`";

		  if ($result=mysqli_query($connection,$getvisit))
		      {
		      // Return the number of rows in result set
		      $visit_count=mysqli_num_rows($result);
		      //echo $total_count;
		      }
		  else 
		      $visit_count = 0;
		  	  //echo $total_count;
?>