<?php
     include ("../utilities/Header.php");
     include ("../utilities/navibar.php");
     include ("../utilities/BaseJs.php");
     include ("../utilities/Tables.php")
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
                            <a class="current" href="individual_service.php">Individual Guidance and Counseling Services</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--END BREADCRUMBS-->
            <!--START CUSTOM CONTENT-->

            <!--START TAB-->
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#viewrecords">View Records</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#addrecord">Add Record</a>
                        </li>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                        <!--ADDING-->
                        <div id="addrecord" class="tab-pane">
                            <form action="../functionalities/add_counsel_indiv.php" method="POST">
                                <div class="panel">
                                    <div class="col-md-12">
                                        <h3>Add Individual Counsel Record</h3>
                                        <div class="panel" style="padding: 1px; background-color: #6e6e6e"></div>
                                        <div class="col-md-6">
                                            <label>Visitation Code</label>
                                            <select id="myDropdown" class="form-control" name="CI_visit_ID" style="width: 100%">
                                                  <option value="" selected disabled>-- Select Code --</option>
                                                   <?php  
                                                       $datenow = date('Y-m-d');
                                                       $sqlemp = "SELECT * FROM `t_stud_visitation` AS VIS
                                                                        INNER JOIN `t_stud_profile` AS STUD
                                                                        ON VIS.vs_stud_no = STUD.stud_number
                                                                        WHERE vs_visit_type = 1 and vs_date_visit = '$datenow'
                                                                        ORDER BY vs_code DESC";
                                                       $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                           while($row = mysqli_fetch_assoc($results))
                                                           {
                                                             $vs_ID = $row['vs_ID'];
                                                             $vs_code = $row['vs_code'];
                                                             $vs_stud_no = $row['vs_stud_no'];
                                                             $vs_app_type = $row['vs_app_type'];

                                                             $date = new datetime($row["vs_date_visit"]);
                                                             $newdate = $date->format('F d, Y');
                                                             
                                                             $stud_lname = $row["stud_lastname"];
                                                             $stud_fname = $row["stud_firstname"];
                                                             $compname = $stud_fname.' '.$stud_lname;
                                                   ?>
                                                   <option value="<?php echo $vs_ID ?>">
                                                       <?php echo '[ '.$vs_code.' ]   &nbsp;&nbsp;&nbsp;&nbsp;('.$compname.', Visited on '.$newdate.')'; ?>
                                                   </option>
                                                   <?php } ?>
                                            </select>
                                        </div>
                                        
                                        <div id="SPACER" class="row" style="margin: 10px"></div>
                                        <div class="col-md-6">
                                            <label>Counseling Type</label>
                                            <select class="form-control" name="CI_couns_type" required>
                                               <option value="" selected disabled>-- Select Type --</option>
                                                   <?php  
                                                       $sqlemp = "SELECT * FROM `r_counsel_type` ";
                                                       $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                           while($row = mysqli_fetch_assoc($results))
                                                           {
                                                           $ct_ID = $row['ct_ID'];
                                                           $ct_desc = $row['ct_desc'];
                                                   ?>
                                                   <option value="<?php echo $ct_ID ?>">
                                                       <?php echo $ct_desc; ?>
                                                   </option>
                                               <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nature of the Case</label>
                                            <input  type="text" class="form-control" name="CI_nature" required>
                                        </div>
                                        <div id="SPACER" class="row" style="margin: 10px"></div>
                                        <div class="col-md-6">
                                            <label>Background of the Case</label>
                                            <input  type="text" class="form-control" name="CI_background" required>
                                        </div>
                                         <div class="col-md-6">
                                            <label>Goals for Resolve</label>
                                            <input type="text" class="form-control" name="CI_goal" required>
                                        </div>
                                        <div id="SPACER" class="row" style="margin: 10px"></div>
                                        <div class="col-md-6">
                                            <label>Comments</label>
                                            <input  type="text" class="form-control" name="CI_comment" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Recommendation for the Case</label>
                                            <input type="text" class="form-control" name="CI_recom" required>
                                        </div>
                                        <div id="SPACER" class="row" style="margin: 10px"></div>
                                        <div class="col-md-6">
                                            <label>Remarks</label><small> (Optional)</small>
                                            <input  type="text" class="form-control" name="CI_remark">
                                        </div>
                                        <!--BUTTONS-->
                                        <div class="col-md-12" style="margin-top: 20px; margin-right: 30px">
                                            <div class="panel" style="padding: 1px; background-color: #6e6e6e"></div>
                                            <div style="overflow:auto;">
                                              <div style="float:right;">
                                                <button type="submit" class="btn btn-primary" name="add_counsel_indiv">Submit</button>
                                              </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                            
                        </div>
                        <!--VIEWING-->
                        <div id="viewrecords" class="tab-pane active">
                        <div class="panel">
                            <div class="col-md-12">
                                <h3>View Individual Counsel Records</h3>
                                <div class="panel" style="padding: 1px; background-color: #6e6e6e"></div>
                                <!--START TABLE-->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <section class="panel">
                                            <header class="panel-heading" style="background-color:#6e6e6e;color: white">
                                                  Counseling Records
                                            </header>
                                                <div class="panel-body">
                                                   <div class="adv-table">
                                                       <table  class="display table table-bordered table-striped" id="dynamic-table">
                                                           <thead>
                                                           <tr>
                                                               <th style="display: none">CI_ID</th>
                                                               <th>Visitation Code</th>
                                                               <th>Counseling Code</th>
                                                               <th>Student Name</th>
                                                               <th>Course, Yr & Sec</th>
                                                               <th>Date of Counsel</th>
                                                               <th>Counsel Type</th>
                                                               <th style="text-align: center">Action</th>
                                                           </tr>
                                                           </thead>
                                                           <tbody>
                                                           <?php
                                                                $view_query = mysqli_query($connection,"SELECT * FROM `t_counseling_individual` 
                                                                                                        AS INDIV
                                                                                                        INNER JOIN `t_stud_visitation` AS VIS
                                                                                                        INNER JOIN `t_stud_profile` AS STUD
                                                                                                        INNER JOIN `r_courses` AS CORS 
                                                                                                        INNER JOIN `r_appointment_type` AS APP
                                                                                                        INNER JOIN `r_counsel_type` as CT
                                                                                                             ON INDIV.CI_vs_ID = VIS.vs_ID
                                                                                                             and INDIV.CI_student_ref = STUD.stud_number
                                                                                                             and STUD.stud_course = CORS.course_ID
                                                                                                             and APP.app_ID = INDIV.CI_appoint_type
                                                                                                             and CT.ct_ID = INDIV.CI_couns_type 
                                                                                                        ORDER BY INDIV.CI_couns_date DESC");
                                                                while($row = mysqli_fetch_assoc($view_query))
                                                                {
                                                                    $ID = $row["CI_ID"];
                                                                    $stud_no = $row["CI_student_ref"];
                                                                    $couns_code = $row["CI_code"];
                                                                    $date = new datetime($row["CI_couns_date"]);
                                                                    $newdate = $date->format('F d, Y');
                                                                    $CI_nature = $row["CI_nature_case"];
                                                                    $CI_background = $row["CI_background"];
                                                                    $CI_goals = $row["CI_goals"];
                                                                    $CI_comments = $row["CI_comments"];
                                                                    $CI_recom = $row["CI_recommendation"];
                                                                    $CI_remarks = $row["CI_remarks"];
                                                                    $CI_add_date = $row["CI_add_date"];

                                                                    $counsel_type = $row["ct_desc"];
                                                                    $vs_code = $row["vs_code"];
                                                                    $course_code = $row["course_code"];

                                                                    $stud_lname = $row["stud_lastname"];
                                                                    $stud_fname = $row["stud_firstname"];
                                                                    $compname = $stud_fname.' '.$stud_lname;
                                                                    $stud_yrlvl = $row["stud_yearlevel"];
                                                                    $stud_section = $row["stud_section"];


                           
                                                            ?>      
                                                            <tr class="gradeX">
                                                                <td style="display: none"><?php echo $ID; ?></td>
                                                                <td width=""><?php echo $vs_code; ?></td>
                                                                <td width=""><?php echo $couns_code; ?></td>
                                                                <td width=""><?php echo $compname; ?></td>
                                                                <td width=""><?php echo $course_code.' '.$stud_yrlvl.'-'.$stud_section; ?></td>
                                                                <td width=""><?php echo $newdate; ?></td>
                                                                <td width=""><?php echo $counsel_type; ?></td>
                                                                <td style='width:9%'>
                                                                    <center>
                                                                        <a data-toggle="modal" href="#view<?php echo $ID?>" class="btn btn-info">
                                                                                <i class="fa fa-eye" data-size="16" title="View Details"></i>
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

                                <!--START MODAL-->
                                <?php
                                     $view_query = mysqli_query($connection,"SELECT * FROM `t_counseling_individual` 
                                                                             AS INDIV
                                                                             INNER JOIN `t_stud_visitation` AS VIS
                                                                             INNER JOIN `t_stud_profile` AS STUD
                                                                             INNER JOIN `r_courses` AS CORS 
                                                                             INNER JOIN `r_appointment_type` AS APP
                                                                             INNER JOIN `r_counsel_type` as CT
                                                                                  ON INDIV.CI_vs_ID = VIS.vs_ID
                                                                                  and INDIV.CI_student_ref = STUD.stud_number
                                                                                  and STUD.stud_course = CORS.course_ID
                                                                                  and APP.app_ID = INDIV.CI_appoint_type
                                                                                  and CT.ct_ID = INDIV.CI_couns_type ");
                                     while($row = mysqli_fetch_assoc($view_query))
                                     {
                                         $ID = $row["CI_ID"];
                                         $stud_no = $row["CI_student_ref"];
                                         $couns_code = $row["CI_code"];
                                         $date = new datetime($row["CI_couns_date"]);
                                         $newdate = $date->format('F d, Y');
                                         $CI_nature = $row["CI_nature_case"];
                                         $CI_background = $row["CI_background"];
                                         $CI_goals = $row["CI_goals"];
                                         $CI_comments = $row["CI_comments"];
                                         $CI_recom = $row["CI_recommendation"];
                                         $CI_remarks = $row["CI_remarks"];
                                         $CI_add_date = $row["CI_add_date"];

                                         $counsel_type = $row["ct_desc"];
                                         $vs_code = $row["vs_code"];
                                         $course_code = $row["course_code"];
                                         $app_type = $row["app_desc"];

                                         $stud_lname = $row["stud_lastname"];
                                         $stud_fname = $row["stud_firstname"];
                                         $compname = $stud_fname.' '.$stud_lname;
                                         $stud_yrlvl = $row["stud_yearlevel"];
                                         $stud_section = $row["stud_section"];

                                         $cryrsc = $course_code.' '.$stud_yrlvl.'-'.$stud_section;


                                
                                 ?>
                                <div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="view<?php echo $ID?>" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                                <div class="modal-header" style="background-color: #00acc1">
                                                    <h5 class="modal-title" style="font-size: 25px; color: white; text-align: center ">View  Counseling Details
                                                        <i class="livicon" data-name="edit" data-s="35" data-c="white"></i></h5>
                                                </div>
                                                <div class="modal-body" style="height:630px;">
                                                        <div class="col-md-12">
                                                            <div class="col-md-4">
                                                                <label>Visitation Code</label>
                                                                <input type="text" class="form-control" value="<?php echo $vs_code; ?>" readonly>
                                                            </div>
                                                             <div class="col-md-4">
                                                                <label>Counseling Code:</label>
                                                                <input type="text" class="form-control" value="<?php echo $couns_code; ?>" readonly>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Date of Counsel:</label>
                                                                <input class="form-control" value="<?php echo $newdate; ?>" readonly>
                                                            </div>
                                                            <div id="SPACER" class="row" style="margin: 10px"></div>
                                                            <div class="col-md-6">
                                                                <label>Student Number</label>
                                                                <input type="text" class="form-control" value="<?php echo $stud_no; ?>" readonly>
                                                            </div>
                                                             <div class="col-md-6">
                                                                <label>Name of the Student:</label>
                                                                <input type="text" class="form-control" value="<?php echo $compname; ?>" readonly>
                                                            </div>
                                                            <div id="SPACER" class="row" style="margin: 10px"></div>
                                                            <div class="col-md-4">
                                                                <label>Course, Year & Section:</label>
                                                                <input type="text" class="form-control" value="<?php echo $cryrsc; ?>" readonly>
                                                            </div>
                                                             <div class="col-md-4">
                                                                <label>Counsel Type:</label>
                                                                <input type="text" class="form-control" value="<?php echo $counsel_type; ?>" readonly>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Appointment Type:</label>
                                                                <input type="text" class="form-control" value="<?php echo $app_type; ?>" readonly>
                                                            </div>
                                                            <div id="SPACER" class="row" style="margin: 10px"></div>
                                                            <div class="col-md-6">
                                                                <label>Nature of the Case:</label>
                                                                <input type="text" class="form-control" value="<?php echo $CI_nature; ?>" readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Background the Case:</label>
                                                                <input type="text" class="form-control" value="<?php echo $CI_background; ?>" readonly>
                                                            </div>
                                                            <div id="SPACER" class="row" style="margin: 10px"></div>
                                                            <div class="col-md-12">
                                                                <label>Goals for Resolution:</label>
                                                                <input type="text" class="form-control" value="<?php echo $CI_goals; ?>" readonly>
                                                            </div>
                                                            <div id="SPACER" class="row" style="margin: 10px"></div>
                                                            <div class="col-md-12">
                                                                <label>Other Comments:</label>
                                                                <input type="text" class="form-control" value="<?php echo $CI_comments; ?>" readonly>
                                                            </div>
                                                            <div id="SPACER" class="row" style="margin: 10px"></div>
                                                            <div class="col-md-12">
                                                                <label>Recommendations:</label>
                                                                <input type="text" class="form-control" value="<?php echo $CI_recom; ?>" readonly>
                                                            </div>
                                                            <div id="SPACER" class="row" style="margin: 10px"></div>
                                                            <div class="col-md-12">
                                                                <label>Remarks:</label>
                                                                <input type="text" class="form-control" value="<?php echo $CI_remarks; ?>" readonly>
                                                            </div>
                                                            <div id="SPACER" class="row" style="margin: 10px"></div>
                                                        </div>
                                                    <div class="col-md-12" style="text-align:right">
                                                            <div id="SPACER" class="row" style="margin: 10px"></div>
                                                            <div class="row" style="background-color: #6e6e6e; padding: 1px"></div>
                                                            <button class="btn btn-danger" data-dismiss="modal" style="margin-top: 4px">
                                                                    <i class="fa fa-times"></i>
                                                                    Close
                                                            </button>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!--END MODAL-->
                                <?php } ?>
                                
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END TAB-->

            <!--END CUSTOM CONTENT-->
        </section>
    </section>
    <!--main content end-->
</section>
<!--END CONTAINER FROM HEADER-->
<script type="text/javascript">
    $("#myDropdown").change(function () {
    var selectedValue = $(this).val();
    $("#txtBox").val($(this).find("option:selected").attr("value"))
});
</script>