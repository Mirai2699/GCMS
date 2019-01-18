<?php

        include ("../../../db_con.php");
  				

        $code_ret = mysqli_query($connection, "SELECT MAX(CG_ID) FROM t_counseling_group");
        $getrow = mysqli_fetch_array($code_ret);
        $lastcode = $getrow[0];
        $finalcode = $lastcode + 1;

        $CG_code = 'GC-'.''.$finalcode;
        $CG_date = $_POST['CG_date'];
        $CG_couns_type = $_POST['CG_couns_type'];
        $CG_nature = $_POST['CG_nature'];
        $CG_background = $_POST['CG_background'];
        $CG_goal = $_POST['CG_goal'];
        $CG_comment = $_POST['CG_comment'];
        $CG_recom = $_POST['CG_recom'];
        $CG_remark = $_POST['CG_remark'];

        $insert = "INSERT INTO t_counseling_group(CG_code, 
                                                        CG_couns_date,
                                                        CG_couns_type,
                                                        CG_nature_case,
                                                        CG_background,
                                                        CG_goals,
                                                        CG_comments,
                                                        CG_recommendation,
                                                        CG_remarks
                                                        )     
                                                VALUES ('$CG_code',
                                                        '$CG_date',
                                                        '$CG_couns_type',
                                                        '$CG_nature',
                                                        '$CG_background',
                                                        '$CG_goal',
                                                        '$CG_comment',
                                                        '$CG_recom',
                                                        '$CG_remark'
                                                       )";
              
        mysqli_query($connection,$insert);

?>


<?php  

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



    $stmt = $dbh->prepare("INSERT INTO t_counseling_group_stud_ref(GSR_student_ref, GSR_appoint_type, GSR_CG_ID ) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $CG_stud_no);
    $stmt->bindParam(2, $CG_cgappoint);
    $stmt->bindParam(3, $CG_cgID);


    $arr = $_POST; 
    for($i = 0; $i <= count($arr['CG_stud_no'])-1;$i++)
    {
        $CG_stud_no = $arr['CG_stud_no'][$i];
        $CG_cgappoint = $arr['CG_appoint'][$i]; 
        $CG_cgID = $arr['counted_ID']; 
        $stmt->execute();

    }

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully added a group counsel record!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/group_service.php';\",0);</script>";

?>