<?php
     include ("../utilities/Header.php");
     include ("../utilities/navibar.php");
     include ("../utilities/BaseJs.php");
?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--mini statistics start-->
            <div class="row">

                <!--1ST LEVEL-->
                <div class="col-md-6">
                    <div class="mini-stat clearfix" style="background-color:#404040; color: white">
                        <span class="mini-stat-icon pink"><i class="fa fa-calendar"></i></span>
                        <div class="mini-stat-info">
                            <span>
                            <?php
                                $sqlemp = "SELECT * FROM `r_academic_year` where acadyr_active_flag = 'Active'";
                                $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                    while($row = mysqli_fetch_assoc($results))
                                    {
                                        $ac_acadyr_ID = $row['acadyr_ID'];
                                        $ac_startyr = $row['acadyr_start_year'];
                                        $ac_endyr = $row['acadyr_end_year'];
                                        $active_acadyear = $ac_startyr.' - '.$ac_endyr;

                                        echo $active_acadyear;
                                    }
                            ?>
                            </span>
                            Active Academic year
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mini-stat clearfix" style="background-color:#404040; color: white">
                        <span class="mini-stat-icon pink"><i class="fa fa-clipboard"></i></span>
                        <div class="mini-stat-info">
                            <span>
                            <?php
                                $view_query = mysqli_query($connection,"SELECT * FROM `r_semester` where sem_active_flag = 'Active' ");
                                while($row = mysqli_fetch_assoc($view_query))
                                {
                                    $ID = $row["sem_ID"];
                                    $sem_desc = $row["sem_desc"];

                                    echo $sem_desc;
                                }
                            ?>
                            </span>
                            Active Semester
                        </div>
                    </div>
                </div>
                <!--1ST LEVEL-->


                <!--2ND LEVEL-->
                <div class="col-md-4">
                    <div class="mini-stat clearfix" style="background-color:#e6e6e6; color: #333333">
                        <span class="mini-stat-icon green"><i class="fa fa-check-square-o"></i></span>
                        <div class="mini-stat-info">
                            <span>
                           <?php
                               $sql="SELECT * FROM `t_stud_profile` AS SP  INNER JOIN `t_stud_batch_rec` AS BATCH 
                                                                     ON SP.stud_number = BATCH.batch_student
                                                                     WHERE BATCH.batch_year = '$active_acadyear' ";
                               if ($result=mysqli_query($connection,$sql))
                                 {
                                 // Return the number of rows in result set
                                 $rowcount=mysqli_num_rows($result);
                                 echo $rowcount;
                                 }
                           ?>
                           </span>
                           Total Number of Students with <br>Active Records for this Academic Year
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mini-stat clearfix" style="background-color:#e6e6e6; color: #333333">
                        <span class="mini-stat-icon orange"><i class="fa fa-minus-square"></i></span>
                        <div class="mini-stat-info">
                           <span>
                           <?php
                                $sql="SELECT * FROM `t_stud_profile` AS SP  INNER JOIN `t_stud_batch_rec` AS BATCH 
                                                                     ON SP.stud_number = BATCH.batch_student
                                                                     WHERE BATCH.batch_year != '$active_acadyear' ";
                               if ($result=mysqli_query($connection,$sql))
                                 {
                                 // Return the number of rows in result set
                                 $rowcount=mysqli_num_rows($result);
                                 echo $rowcount;
                                 }
                           ?>
                           </span>
                           Total Number of Students <br>with Inactive Records
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mini-stat clearfix" style="background-color:#e6e6e6; color: #333333">
                        <span class="mini-stat-icon tar"><i class="fa fa-sign-in"></i></span>
                        <div class="mini-stat-info">
                           <span>
                           <?php
                               $sql="SELECT * FROM `t_stud_visitation`";
                               if ($result=mysqli_query($connection,$sql))
                                 {
                                 // Return the number of rows in result set
                                 $rowcount=mysqli_num_rows($result);
                                 echo $rowcount;
                                 }
                           ?>
                           </span>
                           Total Number of Visitation Records<br>in the Guidance Office
                        </div>
                    </div>
                </div>
                <!--2ND LEVEL-->


                <!--3RD LEVEL-->
                <div class="col-md-4">
                    <div class="mini-stat clearfix" style="background-color:#e6e6e6; color: #333333">
                        <span class="mini-stat-icon green"><i class="fa fa-user"></i></span>
                        <div class="mini-stat-info">
                            <span>
                           <?php
                               $sql="SELECT * FROM `t_counseling_individual` ";
                               if ($result=mysqli_query($connection,$sql))
                                 {
                                 // Return the number of rows in result set
                                 $rowcount=mysqli_num_rows($result);
                                 echo $rowcount;
                                 }
                           ?>
                           </span>
                           Total Number of<br> Individual Counseling
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mini-stat clearfix" style="background-color:#e6e6e6; color: #333333">
                        <span class="mini-stat-icon orange"><i class="fa fa-users"></i></span>
                        <div class="mini-stat-info">
                            <span>
                           <?php
                               $sql="SELECT * FROM `t_counseling_group` ";
                               if ($result=mysqli_query($connection,$sql))
                                 {
                                 // Return the number of rows in result set
                                 $rowcount=mysqli_num_rows($result);
                                 echo $rowcount;
                                 }
                           ?>
                           </span>
                           Total Number of <br> Group Counseling
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mini-stat clearfix" style="background-color:#e6e6e6; color: #333333">
                        <span class="mini-stat-icon tar"><i class="fa fa-upload"></i></span>
                        <div class="mini-stat-info">
                            <span>
                           <?php
                               $sql="SELECT * FROM `t_files_upload`";
                               if ($result=mysqli_query($connection,$sql))
                                 {
                                 // Return the number of rows in result set
                                 $rowcount=mysqli_num_rows($result);
                                 echo $rowcount;
                                 }
                           ?>
                           </span>
                           Total Number of<br> Uploaded Documents
                        </div>
                    </div>
                </div>
                <!--3RD LEVEL-->



                



            </div>
            <!--mini statistics end-->
        </section>
    </section>
    <!--main content end-->
</section>
<!--END CONTAINER FROM HEADER-->