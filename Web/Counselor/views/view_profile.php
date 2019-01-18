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

            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#active">Active Student Records Academic Year</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#inactive">Inactive Student Records</a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                        <!--START TAB-->
                        <div id="active" class="tab-pane active">
                            <!--START TABLE FOR ACTIVE-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <section class="panel">
                                        <?php 
                                            $sqlemp = "SELECT * FROM `r_academic_year` where acadyr_active_flag = 'Active'";
                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                while($row = mysqli_fetch_assoc($results))
                                                {
                                                    $ac_acadyr_ID = $row['acadyr_ID'];
                                                    $ac_startyr = $row['acadyr_start_year'];
                                                    $ac_endyr = $row['acadyr_end_year'];
                                                    $active_acadyear = $ac_startyr.' - '.$ac_endyr;
                                                }
                                        ?>
                                        <header class="panel-heading" style="background-color: #006600;color: white">
                                          View Student Profiles for the active academic year <?php echo $active_acadyear; ?>
                                        </header>
                                        <div class="panel-body">
                                            <div class="adv-table">
                                                    <form role="form" action="../functionalities/multiple_change_student_batch.php" method="POST">
                                                    <div class="col-md-12">
                                                           <div class="col-md-4">
                                                              <label>The selected records will be active and used for academic year:</label>
                                                              <select class="form-control" name="stud_batch_year">
                                                                 <option value="" selected disabled>-- Select Academic Year --</option>
                                                                     <?php  
                                                                         $sqlemp = "SELECT * FROM `r_academic_year`";
                                                                         $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                             while($row = mysqli_fetch_assoc($results))
                                                                             {
                                                                             $acadyr_ID = $row['acadyr_ID'];
                                                                             $startyr = $row['acadyr_start_year'];
                                                                             $endyr = $row['acadyr_end_year'];
                                                                             $acadyear = $startyr.' - '.$endyr;
                                                                     ?>
                                                                 <option value="<?php echo $acadyear ?>"><?php echo $acadyear; ?></option>
                                                                     <?php } ?>
                                                              </select>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div id="SPACER" class="row" style="margin-top: 23px"></div>
                                                                <button type="submit" class="btn btn-success" name="ac_update_stud_batch"><i class="fa fa-save"></i> Save Changes</button>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div id="SPACER" class="row" style="margin-top: 15px"></div>
                                                                <div class="row" style="padding: 1px; background-color: #666666"></div>
                                                            </div>
                                                    </div>
                                                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                                                        <thead>
                                                            <script language="JavaScript">
                                                                function selectAll(source) {
                                                                    checkboxes = document.getElementsByName('checkstat[]');
                                                                    for(var i in checkboxes)
                                                                        checkboxes[i].checked = source.checked;
                                                                }
                                                            </script>
                                                        <tr>
                                                            <th style="display: none">Student_ID</th>
                                                            <th style="text-align: center"><input type="checkbox" id="selectall" onClick="selectAll(this)" /><br> Toggle All</th>
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
                                                                                                    WHERE BATCH.batch_year = '$active_acadyear'
                                                                                                    ORDER BY SP.stud_lastname asc");
                                                            while($row = mysqli_fetch_assoc($view_query))
                                                            {
                                                                $ID = $row["stud_ID"];
                                                                $stud_no = $row["stud_number"];
                                                                $stud_lname = $row["stud_lastname"];
                                                                $stud_fname = $row["stud_firstname"];
                                                                $course_code = $row["course_code"];
                                                                $batch_ID = $row["batch_ID"];
                                                                $batch = $row["batch_year"];
                                                                $acad_stat = $row["stud_status"];
                                                                $datemod = $row["stud_mod_date"];


                                                                $name = $stud_lname.', '.$stud_fname;
                                                                
                                                                            
                                                        ?>      
                                                            <tr class="gradeX">
                                                                <td style="display: none"><?php echo $ID; ?></td>
                                                                <td style="text-align: center">
                                                                    <div class="square-green single-row" >
                                                                        <div class="checkbox">
                                                                            <input id="select-all" type="checkbox"  name="checkstat[]" value="<?php echo $batch_ID; ?>">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td width=""><?php echo $stud_no; ?></td>
                                                                <td width=""><?php echo $name; ?></td>
                                                                <td width=""><?php echo $course_code; ?></td>
                                                                <td width=""><?php echo $batch; ?></td>
                                                                <td width=""><?php echo $acad_stat; ?></td>
                                                                <td width=""><?php echo $datemod; ?></td>
                                                                <td style='width:12%'>
                                                                    <center>
                                                                        <a href="view_profile_details.php?getID=<?php echo $ID; ?>" class="btn btn-info">
                                                                                <i class="fa fa-eye" data-size="16" title="View Details"></i>
                                                                                View Details
                                                                        </a>     
                                                                    </center>
                                                                </td>
                                                            </tr>  
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <!--END TABLE-->
                        </div>
                        <!--END TAB FOR ACTIVE-->

                        <!--START TAB FOR INACTIVE RECORDS-->
                        <div id="inactive" class="tab-pane">
                            <!--START TABLE-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <section class="panel">
                                        <?php 
                                            $sqlemp = "SELECT * FROM `r_academic_year` where acadyr_active_flag = 'Active'";
                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                while($row = mysqli_fetch_assoc($results))
                                                {
                                                    $ac_acadyr_ID = $row['acadyr_ID'];
                                                    $ac_startyr = $row['acadyr_start_year'];
                                                    $ac_endyr = $row['acadyr_end_year'];
                                                    $active_acadyear = $ac_startyr.' - '.$ac_endyr;
                                                }
                                        ?>
                                        <header class="panel-heading" style="background-color:#6e6e6e;color: white">
                                          View Inactive Student Profiles 
                                        </header>
                                        <div class="panel-body">
                                            <div class="adv-table">
                                                    <form role="form" action="../functionalities/multiple_change_student_batch.php" method="POST">
                                                    <div class="col-md-12">
                                                           <div class="col-md-4">
                                                              <label>The selected records will be active and used for academic year:</label>
                                                              <select class="form-control" name="stud_batch_year">
                                                                 <option value="" selected disabled>-- Select Academic Year --</option>
                                                                     <?php  
                                                                         $sqlemp = "SELECT * FROM `r_academic_year`";
                                                                         $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                             while($row = mysqli_fetch_assoc($results))
                                                                             {
                                                                             $acadyr_ID = $row['acadyr_ID'];
                                                                             $startyr = $row['acadyr_start_year'];
                                                                             $endyr = $row['acadyr_end_year'];
                                                                             $acadyear = $startyr.' - '.$endyr;
                                                                     ?>
                                                                 <option value="<?php echo $acadyear ?>"><?php echo $acadyear; ?></option>
                                                                     <?php } ?>
                                                              </select>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div id="SPACER" class="row" style="margin-top: 23px"></div>
                                                                <button type="submit" class="btn btn-success" name="inac_update_stud_batch"><i class="fa fa-save"></i> Save Changes</button>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div id="SPACER" class="row" style="margin-top: 15px"></div>
                                                                <div class="row" style="padding: 1px; background-color: #666666"></div>
                                                            </div>
                                                    </div>
                                                    <table  class="display table table-bordered table-striped" id="editable-sample">
                                                        <script language="JavaScript">
                                                            function selectAllinactive(source) {
                                                                checkboxes = document.getElementsByName('inac_checkstat[]');
                                                                for(var i in checkboxes)
                                                                    checkboxes[i].checked = source.checked;
                                                            }
                                                        </script>
                                                        <thead>
                                                        <tr>
                                                            <th style="display: none">Student_ID</th>
                                                             <th style="text-align: center"><input type="checkbox" id="selectall" onClick="selectAllinactive(this)" /><br> Toggle All</th>
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
                                                                                                    WHERE BATCH.batch_year != '$active_acadyear'
                                                                                                    ORDER BY SP.stud_lastname asc");
                                                            while($row = mysqli_fetch_assoc($view_query))
                                                            {
                                                                $ID = $row["stud_ID"];
                                                                $stud_no = $row["stud_number"];
                                                                $stud_lname = $row["stud_lastname"];
                                                                $stud_fname = $row["stud_firstname"];
                                                                $course_code = $row["course_code"];
                                                                $batch_ID = $row["batch_ID"];
                                                                $batch = $row["batch_year"];
                                                                $acad_stat = $row["stud_status"];
                                                                $datemod = $row["stud_mod_date"];


                                                                $name = $stud_lname.', '.$stud_fname;
                                                                
                                                                            
                                                        ?>      
                                                            <tr class="gradeX">
                                                                <td style="display: none"><?php echo $ID; ?></td>
                                                                <td style="text-align: center">
                                                                    <div class="square-green single-row" >
                                                                        <div class="checkbox">
                                                                            <input type="checkbox" id="checkstat" name="inac_checkstat[]" value="<?php echo $batch_ID; ?>">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td width=""><?php echo $stud_no; ?></td>
                                                                <td width=""><?php echo $name; ?></td>
                                                                <td width=""><?php echo $course_code; ?></td>
                                                                <td width=""><?php echo $batch; ?></td>
                                                                <td width=""><?php echo $acad_stat; ?></td>
                                                                <td width=""><?php echo $datemod; ?></td>
                                                                <td style='width:12%'>
                                                                    <center>
                                                                        <a href="view_profile_details.php?getID=<?php echo $ID; ?>" class="btn btn-info">
                                                                                <i class="fa fa-eye" data-size="16" title="View Details"></i>
                                                                                View Details
                                                                        </a>     
                                                                    </center>
                                                                </td>
                                                            </tr>  
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <!--END TABLE-->
                        </div>
                        <!--END TAB FOR INACTIVE RECORDS-->
                    </div>
                </div>
            </section>

            

            <!--END CUSTOM CONTENT-->
        </section>
    </section>
    <!--main content end-->
</section>
<!--END CONTAINER FROM HEADER-->


<!--ON PAGE RESOURCES-->

<!--script for this page only-->
<script src="../../../resources-web/js/table-editable.js"></script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>
