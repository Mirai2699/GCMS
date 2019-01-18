 <?php

include("../../../db_con.php");

  if(isset($_POST['add_counsel_indiv']))
    {   
        
        $CI_vsID = $_POST['CI_visit_ID'];


        $view_query = "SELECT * FROM `t_stud_visitation` WHERE vs_ID = '$CI_vsID' ";
        $results = mysqli_query($connection, $view_query) or die("Bad Query: $sql");
            while($row = mysqli_fetch_assoc($results))
            {
              $vs_ID = $row['vs_ID'];
              $vs_code = $row['vs_code'];
              $vs_stud_no = $row['vs_stud_no'];
              $vs_app_type = $row['vs_app_type'];
              $vs_date_visit = $row['vs_date_visit'];
            } 


        $code_ret = mysqli_query($connection, "SELECT MAX(CI_ID) FROM t_counseling_individual");
        $getrow = mysqli_fetch_array($code_ret);
        $lastcode = $getrow[0];
        $finalcode = $lastcode + 1;

        $CI_code = 'IC-'.''.$finalcode;
        $CI_couns_type = $_POST['CI_couns_type'];
        $CI_nature = $_POST['CI_nature'];
        $CI_background = $_POST['CI_background'];
        $CI_goal = $_POST['CI_goal'];
        $CI_comment = $_POST['CI_comment'];
        $CI_recom = $_POST['CI_recom'];
        $CI_remark = $_POST['CI_remark'];

        $insert = "INSERT INTO t_counseling_individual (CI_code, 
                                                        CI_vs_ID,
                                                        CI_student_ref,
                                                        CI_couns_date,
                                                        CI_couns_type,
                                                        CI_appoint_type,
                                                        CI_nature_case,
                                                        CI_background,
                                                        CI_goals,
                                                        CI_comments,
                                                        CI_recommendation,
                                                        CI_remarks
                                                        )     
                                                VALUES ('$CI_code',
                                                        '$vs_ID',
                                                        '$vs_stud_no',
                                                        '$vs_date_visit',
                                                        '$CI_couns_type',
                                                        '$vs_app_type',
                                                        '$CI_nature',
                                                        '$CI_background',
                                                        '$CI_goal',
                                                        '$CI_comment',
                                                        '$CI_recom',
                                                        '$CI_remark'
                                                       )";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added an individual counsel record!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/individual_service.php';\",0);</script>";
    }

?>