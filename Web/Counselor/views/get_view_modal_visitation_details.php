<!--START MODAL-->
<?php

    $view_query = mysqli_query($connection,"SELECT * FROM `t_stud_visitation` AS SV 
                                        INNER JOIN `t_stud_profile` AS SP 
                                        INNER JOIN `r_courses` AS CORS
                                        INNER JOIN `r_appointment_type` AS APP 
                                        INNER JOIN `r_visit_type` AS VT
                                        ON SV.vs_stud_no = SP.stud_number and
                                           SV.vs_app_type = APP.app_ID and
                                           SV.vs_visit_type = VT.vt_ID and
                                           SP.stud_course = CORS.course_ID
                                        ORDER BY SV.vs_code desc");
    while($row = mysqli_fetch_assoc($view_query))
    {
        $ID = $row["vs_ID"];
        $vs_code = $row["vs_code"];
        $vs_stud_no = $row["vs_stud_no"];
        $stud_lname = $row["stud_lastname"];
        $stud_fname = $row["stud_firstname"];
        $app_desc = $row["app_desc"];
        $visit_desc = $row["vt_desc"];
        $vs_desc = $row["vs_visit_desc"];
        $vs_datein = new datetime($row["vs_date_visit"]);
        $vs_timein = new datetime($row["vs_time_visit"]);

        $newdate = $vs_datein->format('F d, Y');
        $newtime = $vs_timein->format('h:i a');

        $course_code = $row["course_code"];
        $stud_yrlvl = $row["stud_yearlevel"];
        $stud_section = $row["stud_section"];

        $cryrsc = $course_code.' '.$stud_yrlvl.'-'.$stud_section;

        $name = $stud_fname.' '.$stud_lname;
 ?>
<div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="view<?php echo $ID?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header" style="background-color: #00acc1">
                <h5 class="modal-title" style="font-size: 25px; color: white; text-align: center ">View Visitation Details
                    <i class="livicon" data-name="edit" data-s="35" data-c="white"></i></h5>
            </div>
            <div class="modal-body" style="height:auto; ">
                <div class="col-md-6">
                    <label>Visitation Code:</label>
                    <input type="text" class="form-control" value="<?php echo $vs_code; ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label>Student Number:</label>
                    <input type="text" class="form-control" value="<?php echo $vs_stud_no; ?>" readonly>
                </div>
                <div id="SPACER" class="row" style="margin: 10px"></div>
                <div class="col-md-6">
                    <label>Student Name:</label>
                    <input type="text" class="form-control" value="<?php echo $name; ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label>Course, Year and Section:</label>
                    <input type="text" class="form-control" value="<?php echo $cryrsc; ?>" readonly>
                </div>
                <div id="SPACER" class="row" style="margin: 10px"></div>
                 <div class="col-md-6">
                    <label>Appointment Type:</label>
                    <input type="text" class="form-control" value="<?php echo $app_desc; ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label>Purpose of Visit:</label>
                    <input type="text" class="form-control" value="<?php echo $visit_desc; ?>" readonly>
                </div>
                <div id="SPACER" class="row" style="margin: 10px"></div>
                 <div class="col-md-12">
                    <label>Visit Description:</label>
                    <input type="text" class="form-control" value="<?php echo $vs_desc; ?>" readonly>
                </div>
                <div id="SPACER" class="row" style="margin: 10px"></div>
                <div class="col-md-6">
                    <label>Date In:</label>
                    <input type="text" class="form-control" value="<?php echo $newdate; ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label>Time In:</label>
                    <input type="text" class="form-control" value="<?php echo $newtime; ?>" readonly>
                </div>
                <div id="SPACER" class="row" style="margin: 10px"></div>
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