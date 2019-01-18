<?php

include("../../../db_con.php");


if(isset($_POST["ac_update_stud_batch"]))
{   
            $year = $_POST['stud_batch_year'];
            $box = $_POST['checkstat'];
            while (list($key,$val) = @each($box))
            {
                mysqli_query($connection, "UPDATE t_stud_batch_rec SET batch_year = '$year' where batch_ID = '$val';");
            }


            echo "<script type=\"text/javascript\">".
                     "alert
                     ('You have successfully changed the active batch year!');".
                    "</script>";
            echo "<script>setTimeout(\"location.href = '../views/view_profile.php';\",0);</script>";
}
else if(isset($_POST["inac_update_stud_batch"]))
{   
            $year = $_POST['stud_batch_year'];
            $box = $_POST['inac_checkstat'];
            while (list($key,$val) = @each($box))
            {
                mysqli_query($connection, "UPDATE t_stud_batch_rec SET batch_year = '$year' where batch_ID = '$val';");
            }


            echo "<script type=\"text/javascript\">".
                     "alert
                     ('You have successfully changed the active batch year!');".
                    "</script>";
            echo "<script>setTimeout(\"location.href = '../views/view_profile.php';\",0);</script>";
}
?>