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
                            <a class="current" href="group_service.php">Group Guidance and Counseling Services</a>
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
                            <h3>Add Group Counsel Record</h3>
                            <div class="panel" style="padding: 1px; background-color: #6e6e6e"></div>
                            <div class="panel-body">
                               <div class="adv-table">
                                   <table class="display table table-bordered table-striped">                                
                                       <tr>
                                           <td>                          
                                               <form action="../functionalities/add_counsel_group.php" method="POST">
                                                   <div class="form-content">
                                                       <div class="col-md-12" style="margin-bottom: 20px">
                                                            <?php 
                                                                $code_ret = mysqli_query($connection, "SELECT MAX(CG_ID) FROM t_counseling_group");
                                                                $getrow = mysqli_fetch_array($code_ret);
                                                                $lastcode = $getrow[0];
                                                                $finalcode = $lastcode + 1;
                                                            ?>
                                                           <input type="hidden" name="counted_ID" value="<?php echo $finalcode; ?>">
                                                           <div id="SPACER" class="row" style="margin: 10px"></div>
                                                           <div class="col-md-4">
                                                               <label>Date of Counseling</label>
                                                               <input  type="date" class="form-control" name="CG_date"  required>
                                                           </div>
                                                           <div class="col-md-4">
                                                               <label>Counseling Type</label>
                                                               <select class="form-control" name="CG_couns_type" required>
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
                                                           <div class="col-md-4">
                                                               <label>Nature of the Case</label>
                                                               <input  type="text" class="form-control" name="CG_nature" required>
                                                           </div>
                                                           <div id="SPACER" class="row" style="margin: 10px"></div>
                                                           <div class="col-md-6">
                                                               <label>Background of the Case</label>
                                                               <input  type="text" class="form-control" name="CG_background" required>
                                                           </div>
                                                            <div class="col-md-6">
                                                               <label>Goals for Resolve</label>
                                                               <input type="text" class="form-control" name="CG_goal" required>
                                                           </div>
                                                           <div id="SPACER" class="row" style="margin: 10px"></div>
                                                           <div class="col-md-6">
                                                               <label>Comments</label>
                                                               <input  type="text" class="form-control" name="CG_comment" required>
                                                           </div>
                                                           <div class="col-md-6">
                                                               <label>Recommendation for the Case</label>
                                                               <input type="text" class="form-control" name="CG_recom" required>
                                                           </div>
                                                           <div id="SPACER" class="row" style="margin: 10px"></div>
                                                           <div class="col-md-6">
                                                               <label>Remarks</label><small> (Optional)</small>
                                                               <input  type="text" class="form-control" name="CG_remark">
                                                           </div>
                                                       </div>
                                                        <div class="row" style="margin: 4px">
                                                           <div class="col-md-12">
                                                               <p>
                                                                   <button type="button" id="btnAdd" class="btn btn-success">      
                                                                   <i class="fa fa-plus"></i>
                                                                   Add Students
                                                                   </button>
                                                               </p>
                                                           </div>
                                                       </div>
                                                       <div class="row group">
                                                         <div class="col-md-12" style="margin-left: 10px">                                                        
                                                            <div class="col-md-6">
                                                                <small> (Only those students that are logged-in today in the visitation log will be shown here.)</small>
                                                                <select id="myDropdown" class="form-control" name="CG_stud_no[]" style="width: 100%">
                                                                      <option value="" selected disabled>-- Select Students --</option>
                                                                       <?php  
                                                                           $datenow = date('Y-m-d');
                                                                           $sqlemp = "SELECT * FROM `t_stud_visitation` AS VIS
                                                                                            INNER JOIN `t_stud_profile` AS STUD
                                                                                            INNER JOIN `r_courses` AS CORS
                                                                                            ON VIS.vs_stud_no = STUD.stud_number
                                                                                            and CORS.course_ID = STUD.stud_course
                                                                                            WHERE vs_visit_type = 1 and vs_date_visit = '$datenow' ORDER BY vs_code DESC";
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
                                                                                 $stud_yrlvl = $row["stud_yearlevel"];
                                                                                 $stud_section = $row["stud_section"];
                                                                                 $course_code = $row["course_code"];
                                                                       ?>
                                                                       <option value="<?php echo $vs_stud_no ?>">
                                                                           <?php echo '&nbsp;'.$compname.', &nbsp;&nbsp;'.$course_code.' '.$stud_yrlvl.'-'.$stud_section; ?>
                                                                       </option>
                                                                       <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                               <label>Appointment Type</label>
                                                               <select name="CG_appoint[]" class="form-control" style="color: black;" required>
                                                                      <option value="" selected disabled></option>
                                                                      <?php  
                                                                          $sqlemp = "SELECT * FROM `r_appointment_type`";
                                                                          $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                            while($row = mysqli_fetch_assoc($results))
                                                                            {
                                                                              $app_ID = $row['app_ID'];
                                                                              $app_desc = $row['app_desc'];
                                                                      ?>
                                                                      <option value="<?php echo $app_ID ?>"><?php echo $app_desc; ?></option>
                                                                      <?php } ?>
                                                                 </select>
                                                           </div>
                                                            <br>
                                                            <div class="col-md-1">
                                                               <div class="form-group">
                                                                   <button type="button" class="btn btn-danger btnRemove" style="margin-top: 5px;"><i class="fa fa-times"></i></button>
                                                               </div>
                                                           </div>
                                                          </div>
                                                       </div>
                                                   </div>
                                                   <div class="col-md-12" style="margin-top: 20px; margin-right: 30px">
                                                       <div class="panel" style="padding: 1px; background-color: #6e6e6e"></div>
                                                       <div style="overflow:auto;">
                                                         <div style="float:right;">
                                                           <button type="submit" class="btn btn-primary">
                                                            <i class="fa fa-external-link"></i>&nbsp;Submit</button>
                                                         </div>
                                                       </div>
                                                   </div>

                                               </form>  
                                           </td> 
                                       </tr>
                                   </table>
                               </div>
                            </div>
                        </div>
                        <!--VIEWING-->
                        <div id="viewrecords" class="tab-pane active">
                        <div class="panel">
                            <div class="col-md-12">
                                <h3>View Group Counsel Records</h3>
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
                                                               <th>Counseling Code</th>
                                                               <th>Nature of the Case</th>
                                                               <th>Background of the Case</th>
                                                               <th>Date of Counsel</th>
                                                               <th>Counsel Type</th>
                                                               <th style="text-align: center">Action</th>
                                                           </tr>
                                                           </thead>
                                                           <tbody>
                                                           <?php
                                                                $view_query = mysqli_query($connection,"SELECT * FROM `t_counseling_group` 
                                                                                                        AS GRP
                                                                                                        INNER JOIN `t_counseling_group_stud_ref` AS CGSR
                                                                                                        INNER JOIN `t_stud_profile` AS STUD
                                                                                                        INNER JOIN `r_courses` AS CORS 
                                                                                                        INNER JOIN `r_appointment_type` AS APP
                                                                                                        INNER JOIN `r_counsel_type` as CT
                                                                                                             ON GRP.CG_ID = CGSR.GSR_CG_ID
                                                                                                             and CGSR.GSR_student_ref = STUD.stud_number
                                                                                                             and STUD.stud_course = CORS.course_ID
                                                                                                             and APP.app_ID = CGSR.GSR_appoint_type
                                                                                                             and CT.ct_ID = GRP.CG_couns_type 
                                                                                                        GROUP BY GRP.CG_ID  ORDER BY GRP.CG_ID DESC");
                                                                while($row = mysqli_fetch_assoc($view_query))
                                                                {
                                                                    $ID = $row["CG_ID"];
                                                                    $couns_code = $row["CG_code"];
                                                                    $date = new datetime($row["CG_couns_date"]);
                                                                    $newdate = $date->format('F d, Y');
                                                                    $CG_nature = $row["CG_nature_case"];
                                                                    $CG_background = $row["CG_background"];
                                                                    $CG_goals = $row["CG_goals"];
                                                                    $CG_comments = $row["CG_comments"];
                                                                    $CG_recom = $row["CG_recommendation"];
                                                                    $CG_remarks = $row["CG_remarks"];
                                                                    $CG_add_date = $row["CG_add_date"];

                                                                    $counsel_type = $row["ct_desc"];
                                                                    $course_code = $row["course_code"];

                                                                    $stud_lname = $row["stud_lastname"];
                                                                    $stud_fname = $row["stud_firstname"];
                                                                    $compname = $stud_fname.' '.$stud_lname;
                                                                    $stud_yrlvl = $row["stud_yearlevel"];
                                                                    $stud_section = $row["stud_section"];


                           
                                                            ?>      
                                                            <tr class="gradeX">
                                                                <td style="display: none"><?php echo $ID; ?></td>
                                                                <td width=""><?php echo $couns_code; ?></td>
                                                                <td width=""><?php echo $CG_nature; ?></td>
                                                                <td width=""><?php echo $CG_background; ?></td>
                                                                <td width=""><?php echo $newdate; ?></td>
                                                                <td width=""><?php echo $counsel_type; ?></td>
                                                                <td style='width:9%'>
                                                                    <center>
                                                                        <a data-toggle="modal" href="#view<?php echo $ID?>" class="btn btn-info">
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
                                <?php include ("get_view_modal_group_counseling_students.php"); ?>
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
 <script src="../../../resources-web/custom/advanced-form.js"></script>
 <script src="../../../resources-web/custom/jquery.multifield.min.js"></script> -->
 <script>

        $('.form-content').multifield({
            section: '.group',
            btnAdd:'#btnAdd',
            btnRemove:'.btnRemove',
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=place]').val($(this).val());            
            });
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=reqperson]').val($(this).val());            
            });
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=asttypesss]').val($(this).val());            
            });
        });

</script>