
<?php 
      $view_query = mysqli_query($connection,"SELECT * FROM `t_stud_profile` AS SP 
                                               INNER JOIN `t_stud_physical_rec` AS PHY 
                                                   ON SP.stud_number = PHY.phy_rec_student
                                              WHERE SP.stud_ID = '$stud_ID'");
            if(mysqli_num_rows($view_query) > 0)
            {
             echo'<div class="col-md-12" style="background-color: #616161; margin-bottom:10px; border: 2px solid #ffffff">
                    <div class="Panel" style="margin: 10px">
                      <label style="color: white; font-size: 15px">Action Available:</label>
                      <br>
                      <a data-toggle="modal" href="#add_phy_health_rec_only" class="btn btn-default" style="background-color: #43a047"><i class="fa fa-plus"></i> Add New Physical Consultation Record</a>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a data-toggle="modal" href="#add_psy_health_rec_only" class="btn btn-default" style="background-color: #33691e"><i class="fa fa-plus"></i> Add New Pyschological Consultation Record</a>
                    </div>
                  </div>';
            }
            else
            {
              echo'<div class="col-md-12" style="background-color: #616161; margin-bottom:10px; border: 2px solid #ffffff">
                    <div class="Panel" style="margin: 10px">
                      <label style="color: white; font-size: 15px">Action Available:</label>
                      <br>
                      <a data-toggle="modal" href="#add_health_rec" class="btn btn-success" name="add_per_rec"><i class="fa fa-plus"></i> Add New Record</a>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                  </div>';
            }
?>
<!--START TABLE-->
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading" style="background-color:#43a047;color: white">
                  Physical Health Record
            </header>
                <div class="panel-body">
                   <div class="adv-table">
                       <table  class="display table table-bordered table-striped">
                           <thead>
                           <tr>
                               <th style="display: none">Phys_ID</th>
                               <th>Vision</th>
                               <th>Hearing</th>
                               <th>Speech</th>
                               <th>General Assessment</th>
                               <th>Date Recorded</th>
                           </tr>
                           </thead>
                           <tbody>
                           <?php
                                $view_query = mysqli_query($connection,"SELECT * FROM `t_stud_profile` AS SP 
                                                                        INNER JOIN `t_stud_physical_rec` AS PHY 
                                                                             ON SP.stud_number = PHY.phy_rec_student
                                                                        WHERE SP.stud_ID = '$stud_ID' ");
                                while($row = mysqli_fetch_assoc($view_query))
                                {
                                    $ID = $row["phy_rec_ID"];
                                    $stud_no = $row["stud_number"];
                                    $phy_rec_vision = $row["phy_rec_vision"];
                                    $phy_rec_hearing = $row["phy_rec_hearing"];
                                    $phy_rec_speech = $row["phy_rec_speech"];
                                    $phy_rec_genhealth = $row["phy_rec_genhealth"];
                                    $phy_rec_add_date = $row["phy_rec_add_date"];
                            ?>      
                            <tr class="gradeX">
                                <td style="display: none"><?php echo $ID; ?></td>
                                <td width=""><?php echo $phy_rec_vision; ?></td>
                                <td width=""><?php echo $phy_rec_hearing; ?></td>
                                <td width=""><?php echo $phy_rec_speech; ?></td>
                                <td width=""><?php echo $phy_rec_genhealth; ?></td>
                                <td width=""><?php echo $phy_rec_add_date; ?></td>
                                
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
<br>
<!--START TABLE-->
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading" style="background-color:#33691e;color: white">
                  Pyschological Health Record
            </header>
                <div class="panel-body">
                   <div class="adv-table">
                       <table  class="display table table-bordered table-striped">
                           <thead>
                           <tr>
                               <th style="display: none">Pysch_ID</th>
                               <th>Last Date of Consultation</th>
                               <th>Reason for Consultation</th>
                               <th>Date Recorded</th>
                           </tr>
                           </thead>
                           <tbody>
                           <?php
                                $view_query1 = mysqli_query($connection,"SELECT * FROM `t_stud_profile` AS SP 
                                                                        INNER JOIN `t_stud_psych_rec` AS PSYCH 
                                                                             ON SP.stud_number = PSYCH.psych_student
                                                                        WHERE SP.stud_ID = '$stud_ID' ");
                                while($row = mysqli_fetch_assoc($view_query1))
                                {
                                    $ID = $row["psych_ID"];
                                    $stud_no = $row["stud_number"];
                                    $psych_last_consult = $row["psych_last_consult"];
                                    $psych_reason_consult = $row["psych_reason_consult"];
                                    $psych_add_date = $row["psych_add_date"];

                            ?>      
                            <tr class="gradeX">
                                <td style="display: none"><?php echo $ID; ?></td>
                                <td width=""><?php echo $psych_last_consult; ?></td>
                                <td width=""><?php echo $psych_reason_consult; ?></td>
                                <td width=""><?php echo $psych_add_date; ?></td>
                                
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
<BR>
<!--START TABLE-->
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading" style="background-color:#00695c;color: white">
                  Counseling Record
            </header>
                <div class="panel-body">
                   <div class="adv-table">
                          <label style="font-size: 18px; margin: 10px">Individual Counselings</label>
                          <table  class="display table table-bordered table-striped">
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

                                       $stud_lname = $row["stud_lastname"];
                                       $stud_fname = $row["stud_firstname"];
                                       $compname = $stud_fname.' '.$stud_lname;
                                       $stud_yrlvl = $row["stud_yearlevel"];
                                       $stud_section = $row["stud_section"];


                       
                               ?>      
                               <tr class="gradeX">
                                   <td style="display: none"><?php echo $ID; ?></td>
                                   <td width=""><?php echo $couns_code; ?></td>
                                   <td width=""><?php echo $CI_nature; ?></td>
                                   <td width=""><?php echo $CI_background; ?></td>
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

                       <br>
                       <div class="row" style="background-color: #00695c; padding:1px; "></div>
                       <br>

                          <label style="font-size: 18px; margin: 10px">Group Counsel Involvement</label>
                          <table  class="display table table-bordered table-striped">
                              <thead>
                              <tr>
                                  <th style="display: none">CG_ID</th>
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
                                                                           WHERE STUD.stud_ID = '$stud_ID'
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

<!--START MODAL-->
<?php include("get_view_modal_add_health_record.php");?>
<?php include("get_view_modal_individual_counsel.php");?>
<?php include("get_view_modal_group_counseling_students.php");?>
<!--END MODAL--> 

