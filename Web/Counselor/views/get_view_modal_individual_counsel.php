<!--START MODAL-->
<?php
     $view_query = mysqli_query($connection,"SELECT * FROM `t_counseling_individual` 
                                             AS INDIV
                                             INNER JOIN `t_stud_visitation` AS VIS
                                             INNER JOIN `t_stud_profile` AS STUD
                                             INNER JOIN `r_appointment_type` AS APP
                                             INNER JOIN `r_counsel_type` as CT
                                                  ON INDIV.CI_vs_ID = VIS.vs_ID
                                                  and INDIV.CI_couns_type = CT.ct_ID
                                                  and INDIV.CI_student_ref = STUD.stud_number
                                                  and APP.app_ID = INDIV.CI_appoint_type
                                             WHERE STUD.stud_ID = '$stud_ID'
                                             ORDER BY INDIV.CI_ID DESC");
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
         $app_type = $row["app_desc"];

         $stud_lname = $row["stud_lastname"];
         $stud_fname = $row["stud_firstname"];
         $compname = $stud_fname.' '.$stud_lname;
         $stud_yrlvl = $row["stud_yearlevel"];
         $stud_section = $row["stud_section"];



 ?>    
<div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="view<?php echo $ID?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header" style="background-color: #00acc1">
                    <h5 class="modal-title" style="font-size: 25px; color: white; text-align: center ">View  Counseling Details
                        <i class="livicon" data-name="edit" data-s="35" data-c="white"></i></h5>
                </div>
                <div class="modal-body" style="height:550px;">
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
                                <label>Counsel Type:</label>
                                <input type="text" class="form-control" value="<?php echo $counsel_type; ?>" readonly>
                            </div>
                            <div class="col-md-6">
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



