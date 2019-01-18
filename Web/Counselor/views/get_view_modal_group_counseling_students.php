
<!--START MODAL-->
<?php
     $view_query = mysqli_query($connection,"SELECT * FROM `t_counseling_group` AS GRP
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
         <div class="modal-content" >
             <div class="modal-header" style="background-color: #00acc1">
                 <h5 class="modal-title" style="font-size: 25px; color: white; text-align: center ">View  Counseling Details
                     <i class="livicon" data-name="edit" data-s="35" data-c="white"></i></h5>
             </div>
             <div class="modal-body" style="height:auto; ">                               
                <div class="col-sm-12">
                   <section class="panel">
                       <header class="panel-heading" style="background-color:#6e6e6e;color: white">
                             Students Involved
                       </header>
                           <div class="panel-body" style="background-color: #eeeeee">
                              <div class="adv-table" style="background-color: white">
                                  <table  class="display table table-bordered table-striped">
                                      <thead>
                                      <tr>
                                          <th style="display: none">CI_ID</th>
                                          <th style="text-align: center">Student Number</th>
                                          <th style="text-align: center">Name</th>
                                          <th style="text-align: center">C, Y & S</th>
                                          <th style="text-align: center">Appointment Type</th>
                                      </tr>
                                      </thead>
                                      <tbody>                                                              
                                      <?php
                                            $view_studs = mysqli_query($connection,"SELECT * FROM `t_counseling_group` AS GRP
                                                                                        INNER JOIN `t_counseling_group_stud_ref` AS CGSR
                                                                                        INNER JOIN `t_stud_profile` AS STUD
                                                                                        INNER JOIN `r_courses` AS CORS 
                                                                                        INNER JOIN `r_appointment_type` AS APP
                                                                                            ON GRP.CG_ID = CGSR.GSR_CG_ID
                                                                                            and CGSR.GSR_student_ref = STUD.stud_number
                                                                                            and STUD.stud_course = CORS.course_ID
                                                                                            and APP.app_ID = CGSR.GSR_appoint_type
                                                                                        WHERE GRP.CG_ID = '$ID'");
                                            while($row_stud = mysqli_fetch_assoc($view_studs))
                                            {
                                                $ID = $row_stud["CG_ID"];
                                                $couns_code = $row_stud["CG_code"];
                                                                    
                                                $course_code = $row_stud["course_code"];
                                                $app_type = $row_stud["app_desc"];

                                                $stud_number = $row_stud["stud_number"];
                                                $stud_lname = $row_stud["stud_lastname"];
                                                $stud_fname = $row_stud["stud_firstname"];
                                                $compname = $stud_fname.' '.$stud_lname;
                                                $stud_yrlvl = $row_stud["stud_yearlevel"];
                                                $stud_section = $row_stud["stud_section"];

                                                $cryrsc = $course_code.' '.$stud_yrlvl.'-'.$stud_section;

                                       ?>
                                        <tr class="gradeX">
                                            <td style="display: none"><?php echo $ID; ?></td>
                                            <td width=""><?php echo $stud_number; ?></td>
                                            <td width=""><?php echo $compname; ?></td>
                                            <td width=""><?php echo $cryrsc; ?></td>
                                            <td width=""><?php echo $app_type; ?></td>                   
                                        </tr>  
                                        <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </section>
                    </div>    
                        <div id="SPACER" class="row" style="margin: 10px"></div>                                          
                        <div class="col-md-4">
                            <label>Counseling Code:</label>
                            <input type="text" class="form-control" value="<?php echo $couns_code; ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label>Date of Counsel:</label>
                            <input class="form-control" value="<?php echo $newdate; ?>" readonly>
                        </div>
                         <div class="col-md-4">
                            <label>Counsel Type:</label>
                            <input type="text" class="form-control" value="<?php echo $counsel_type; ?>" readonly>
                        </div>
                        <div id="SPACER" class="row" style="margin: 10px"></div>
                        <div class="col-md-6">
                            <label>Nature of the Case:</label>
                            <input type="text" class="form-control" value="<?php echo $CG_nature; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label>Background the Case:</label>
                            <input type="text" class="form-control" value="<?php echo $CG_background; ?>" readonly>
                        </div>
                        <div id="SPACER" class="row" style="margin: 10px"></div>
                        <div class="col-md-12">
                            <label>Goals for Resolution:</label>
                            <input type="text" class="form-control" value="<?php echo $CG_goals; ?>" readonly>
                        </div>
                        <div id="SPACER" class="row" style="margin: 10px"></div>
                        <div class="col-md-12">
                            <label>Other Comments:</label>
                            <input type="text" class="form-control" value="<?php echo $CG_comments; ?>" readonly>
                        </div>
                        <div id="SPACER" class="row" style="margin: 10px"></div>
                        <div class="col-md-12">
                            <label>Recommendations:</label>
                            <input type="text" class="form-control" value="<?php echo $CG_recom; ?>" readonly>
                        </div>
                        <div id="SPACER" class="row" style="margin: 10px"></div>

                        <div class="col-md-12">
                            <label>Remarks:</label>
                            <input type="text" class="form-control" value="<?php echo $CG_remarks; ?>" readonly>
                        </div>
                        <div class="col-md-12" style="text-align:right; ">
                                <div id="SPACER" class="row" style="margin: 10px"></div>
                                <div class="row" style="background-color: #6e6e6e; padding: 1px"></div>
                                <button class="btn btn-danger" data-dismiss="modal" style="margin-top: 4px">
                                        <i class="fa fa-times"></i>
                                        Close
                                </button>
                        </div>
                        <div id="SPACER" class="row" style="margin: 1px"></div>
                    </div>
                </div>
            </div>
         </div>
        <!--END MODAL-->
        <?php } ?>                   