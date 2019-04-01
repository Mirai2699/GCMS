<?php
     include ("../utilities/Header.php");
     include ("../utilities/navibar.php");
     include ("../utilities/BaseJs.php");
     include ("../utilities/Tables.php");
?>
    <!--main content start-->
    <section id="main-content">
       
        <section class="wrapper">
            <!--START BREADCRUMS-->
            <div class="row" style="margin-bottom: 15px">
                <div class="col-md-12" style="background-color: #6e6e6e">
                    <ul class="breadcrumbs-alt" style="margin-top: 8px">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a class="current" href="view_profile.php">View Student Profiles</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--END BREADCRUMBS-->
            <!--START CUSTOM CONTENT-->
            <?php 
                $view_query = mysqli_query($connection,"SELECT * FROM `r_academic_year` 
                                                        WHERE acadyr_active_flag = 'Active'");
                while($row = mysqli_fetch_assoc($view_query))
                {
                    $acadyr_start_year = $row["acadyr_start_year"];
                    $acadyr_end_year = $row["acadyr_end_year"];

                    $batch_year = $acadyr_start_year.' - '.$acadyr_end_year;
                
                }
            ?>
            <!--tab nav start-->
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#inyear">Student Profiles For the Active Academic Year</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#outyear">Inactive Student Profiles</a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="inyear" class="tab-pane active">
                             <!--START TABLE-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <section class="panel">
                                        <header class="panel-heading" style="background-color:#2e7d32 ;color: white">
                                          View Student Profiles for Academic Year 
                                        </header>
                                        <div class="panel-body">
                                            <div class="adv-table">
                                                <table  class="display table table-bordered table-striped" id="dynamic-table">
                                                    <thead>
                                                    <tr>
                                                        <th style="display: none">Student_ID</th>
                                                        <th>Student Number</th>
                                                        <th>Student Name</th>
                                                        <th>Course</th>
                                                        <th>Batch</th>
                                                        <th>Academic Status</th>
                                                        <th>Date Last Modified</th>
                                                        <th style="text-align: center">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $view_query = mysqli_query($connection,"SELECT * FROM `t_stud_profile` AS SP 
                                                                                                INNER JOIN `t_stud_batch_rec` AS BATCH 
                                                                                                INNER JOIN `r_courses` AS CORS 
                                                                                                ON SP.stud_number = BATCH.batch_student
                                                                                                and SP.stud_course = CORS.course_ID 
                                                                                                WHERE BATCH.batch_year = '$batch_year'
                                                                                                ORDER BY SP.stud_lastname asc");
                                                        while($row = mysqli_fetch_assoc($view_query))
                                                        {
                                                            $ID = $row["stud_ID"];
                                                            $stud_no = $row["stud_number"];
                                                            $stud_lname = $row["stud_lastname"];
                                                            $stud_fname = $row["stud_firstname"];
                                                            $course_code = $row["course_code"];
                                                            $batch = $row["batch_year"];
                                                            $acad_stat = $row["stud_status"];
                                                            $datemod = $row["stud_mod_date"];


                                                            $name = $stud_lname.', '.$stud_fname;
                                                            
                                                                        
                                                    ?>      
                                                        <tr class="gradeX">
                                                            <td style="display: none"><?php echo $ID; ?></td>
                                                            <td width=""><?php echo $stud_no; ?></td>
                                                            <td width=""><?php echo $name; ?></td>
                                                            <td width=""><?php echo $course_code; ?></td>
                                                            <td width=""><?php echo $batch; ?></td>
                                                            <td width=""><?php echo $acad_stat; ?></td>
                                                            <td width=""><?php echo $datemod; ?></td>
                                                            <td style='width:12%'>
                                                                <center>
                                                                    <a href="view_profile_details.php?getID=<?php echo $ID; ?>" class="btn btn-success">
                                                                            <i class="fa fa-eye" data-size="16" title="View Details"></i>
                                                                            View Details
                                                                    </a>     
                                                                </center>
                                                            </td>
                                                        </tr>  
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <!--END TABLE-->
                        </div>
                        <div id="outyear" class="tab-pane">
                             <!--START TABLE-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <section class="panel">
                                        <header class="panel-heading" style="background-color:#6e6e6e;color: white">
                                          View Inactive Student Profiles 
                                        </header>
                                        <div class="panel-body">
                                            <div class="adv-table">
                                                <table  class="display table table-bordered table-striped" id="editable-sample">
                                                    <thead>
                                                    <tr>
                                                        <th style="display: none">Student_ID</th>
                                                        <th>Student Number</th>
                                                        <th>Student Name</th>
                                                        <th>Course</th>
                                                        <th>Batch</th>
                                                        <th>Academic Status</th>
                                                        <th>Date Last Modified</th>
                                                        <th style="text-align: center">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $view_query = mysqli_query($connection,"SELECT * FROM `t_stud_profile` AS SP 
                                                                                                INNER JOIN `t_stud_batch_rec` AS BATCH 
                                                                                                INNER JOIN `r_courses` AS CORS 
                                                                                                ON SP.stud_number = BATCH.batch_student
                                                                                                and SP.stud_course = CORS.course_ID 
                                                                                                WHERE BATCH.batch_year != '$batch_year'
                                                                                                ORDER BY SP.stud_lastname asc");
                                                        while($row = mysqli_fetch_assoc($view_query))
                                                        {
                                                            $ID = $row["stud_ID"];
                                                            $stud_no = $row["stud_number"];
                                                            $stud_lname = $row["stud_lastname"];
                                                            $stud_fname = $row["stud_firstname"];
                                                            $course_code = $row["course_code"];
                                                            $batch = $row["batch_year"];
                                                            $acad_stat = $row["stud_status"];
                                                            $datemod = $row["stud_mod_date"];


                                                            $name = $stud_lname.', '.$stud_fname;
                                                            
                                                                        
                                                    ?>      
                                                        <tr class="gradeX">
                                                            <td style="display: none"><?php echo $ID; ?></td>
                                                            <td width=""><?php echo $stud_no; ?></td>
                                                            <td width=""><?php echo $name; ?></td>
                                                            <td width=""><?php echo $course_code; ?></td>
                                                            <td width=""><?php echo $batch; ?></td>
                                                            <td width=""><?php echo $acad_stat; ?></td>
                                                            <td width=""><?php echo $datemod; ?></td>
                                                            <td style='width:12%'>
                                                                <center>
                                                                    <a href="view_profile_details.php?getID=<?php echo $ID; ?>" class="btn btn-success">
                                                                            <i class="fa fa-eye" data-size="16" title="View Details"></i>
                                                                            View Details
                                                                    </a>     
                                                                </center>
                                                            </td>
                                                        </tr>  
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <!--END TABLE-->
                        </div>
                    </div>
                </div>
            </section>
            <!--tab nav start-->
             

            <!--END CUSTOM CONTENT-->
        </section>
    </section>
    <!--main content end-->
</section>
<!--END CONTAINER FROM HEADER-->

<!--ON PAGE SCRIPT -->
<script src="../../../resources-web/js/table-editable.js"></script>
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>