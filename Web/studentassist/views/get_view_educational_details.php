
<div class="col-md-12" style="background-color: #616161; margin-bottom:10px; border: 2px solid #ffffff">
  <div class="Panel" style="margin: 10px">
    <label style="color: white; font-size: 15px">Action Available:</label>
    <br>

    <?php 
          $view_query = mysqli_query($connection,"SELECT * FROM `t_stud_profile` AS SP 
                                                    INNER JOIN `t_stud_educational_bg_details` AS EDUCDET
                                                    ON SP.stud_number = EDUCDET.educ_bg_student
                                                  WHERE SP.stud_ID = '$stud_ID' ");
                if(mysqli_num_rows($view_query) > 0)
                {
                 echo'<a data-toggle="modal" href="#add_educ_rec_done" class="btn btn-success" name="add_educ_rec_done"><i class="fa fa-plus"></i> Add New Schooling Record</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a data-toggle="modal" href="#add_honors_rec" class="btn btn-success" name="add_honors_rec"><i class="fa fa-plus"></i> Add New Honors/Awards Record</a>';
                }
                else
                {
                  echo'<a data-toggle="modal" href="#add_educ_rec" class="btn btn-success" name="add_educ_rec"><i class="fa fa-plus"></i> Add New Schooling Record</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                }
    ?>  
    
  </div>
</div>
<!--START TABLE-->
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <section class="panel">
                                                                <header class="panel-heading" style="background-color:#d32f2f;color: white">
                                                                  Primary / Elementary Level
                                                                </header>
                                                                <div class="panel-body">
                                                                    <div class="adv-table">
                                                                        <table  class="display table table-bordered table-striped">
                                                                            <thead>
                                                                            <tr>
                                                                                <th style="display: none">School_ID</th>
                                                                                <th>School Name</th>
                                                                                <th>School Address</th>
                                                                                <th>School Type</th>
                                                                                <th>Year Graduated</th>
                                                                                <th style="text-align: center">Action</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php
                                                                                $view_query = mysqli_query($connection,"SELECT * FROM 
                                                                                                                        `t_stud_profile` AS SP 
                                                                                                                        INNER JOIN `t_stud_educational_bg_details` AS EDUCDET 
                                                                                                                        ON SP.stud_number = EDUCDET.educ_bg_student
                                                                                                                        WHERE SP.stud_ID = '$stud_ID' and EDUCDET.educ_bg_level = 'Primary'");
                                                                                while($row = mysqli_fetch_assoc($view_query))
                                                                                {
                                                                                    $ID = $row["educ_bg_ID"];
                                                                                    $stud_no = $row["stud_number"];
                                                                                    $school_name = $row["educ_bg_school_name"];
                                                                                    $school_add = $row["educ_bg_school_address"];
                                                                                    $school_type = $row["educ_bg_school_type"];
                                                                                    $school_yeargrad = $row["educ_bg_year_graduated"];
                                                                                    $mod_date = $row["educ_bg_mod_date"];
                                                                                    $datemod = $row["stud_mod_date"];
                                                                                    
                                                                                                
                                                                            ?>      
                                                                                <tr class="gradeX">
                                                                                    <td style="display: none"><?php echo $ID; ?></td>
                                                                                    <td width=""><?php echo $school_name; ?></td>
                                                                                    <td width=""><?php echo $school_add; ?></td>
                                                                                    <td width=""><?php echo $school_type; ?></td>
                                                                                    <td width=""><?php echo $school_yeargrad; ?></td>
                                                                                    <td style='width:12%'>
                                                                                        <center>
                                                                                            <a href="view_profile_details" class="btn btn-warning">
                                                                                                    <i class="fa fa-edit" data-size="16" title="Edit"></i>
                                                                                                    Edit
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

                                                    <br>
                                                     <!--START TABLE-->
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <section class="panel">
                                                                <header class="panel-heading" style="background-color:#0097a7 ;color: white">
                                                                  Secondary / High-School Level
                                                                </header>
                                                                <div class="panel-body">
                                                                    <div class="adv-table">
                                                                        <table  class="display table table-bordered table-striped">
                                                                            <thead>
                                                                            <tr>
                                                                                <th style="display: none">School_ID</th>
                                                                                <th>School Name</th>
                                                                                <th>School Address</th>
                                                                                <th>School Type</th>
                                                                                <th>Year Graduated</th>
                                                                                <th style="text-align: center">Action</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php
                                                                                $view_query = mysqli_query($connection,"SELECT * FROM 
                                                                                                                        `t_stud_profile` AS SP 
                                                                                                                        INNER JOIN `t_stud_educational_bg_details` AS EDUCDET 
                                                                                                                        ON SP.stud_number = EDUCDET.educ_bg_student
                                                                                                                        WHERE SP.stud_ID = '$stud_ID' and EDUCDET.educ_bg_level = 'Secondary'");
                                                                                while($row = mysqli_fetch_assoc($view_query))
                                                                                {
                                                                                    $ID = $row["educ_bg_ID"];
                                                                                    $stud_no = $row["stud_number"];
                                                                                    $school_name = $row["educ_bg_school_name"];
                                                                                    $school_add = $row["educ_bg_school_address"];
                                                                                    $school_type = $row["educ_bg_school_type"];
                                                                                    $school_yeargrad = $row["educ_bg_year_graduated"];
                                                                                    $mod_date = $row["educ_bg_mod_date"];
                                                                                    $datemod = $row["stud_mod_date"];
                                                                                    
                                                                                                
                                                                            ?>      
                                                                                <tr class="gradeX">
                                                                                    <td style="display: none"><?php echo $ID; ?></td>
                                                                                    <td width=""><?php echo $school_name; ?></td>
                                                                                    <td width=""><?php echo $school_add; ?></td>
                                                                                    <td width=""><?php echo $school_type; ?></td>
                                                                                    <td width=""><?php echo $school_yeargrad; ?></td>
                                                                                    <td style='width:12%'>
                                                                                        <center>
                                                                                            <a href="view_profile_details" class="btn btn-warning">
                                                                                                    <i class="fa fa-edit" data-size="16" title="Edit"></i>
                                                                                                    Edit
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
                                                    <br>
                                                     <!--START TABLE-->
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <section class="panel">
                                                                <header class="panel-heading" style="background-color:#388e3c ;color: white">
                                                                  Tertiary / College Level
                                                                </header>
                                                                <div class="panel-body">
                                                                    <div class="adv-table">
                                                                        <table  class="display table table-bordered table-striped">
                                                                            <thead>
                                                                            <tr>
                                                                                <th style="display: none">School_ID</th>
                                                                                <th>School Name</th>
                                                                                <th>School Address</th>
                                                                                <th>School Type</th>
                                                                                <th>Year Graduated</th>                                                                                <th style="text-align: center">Action</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php
                                                                                $view_query = mysqli_query($connection,"SELECT * FROM 
                                                                                                                        `t_stud_profile` AS SP 
                                                                                                                        INNER JOIN `t_stud_educational_bg_details` AS EDUCDET 
                                                                                                                        ON SP.stud_number = EDUCDET.educ_bg_student
                                                                                                                        WHERE SP.stud_ID = '$stud_ID' and EDUCDET.educ_bg_level = 'Tertiary'");
                                                                                while($row = mysqli_fetch_assoc($view_query))
                                                                                {
                                                                                    $ID = $row["educ_bg_ID"];
                                                                                    $stud_no = $row["stud_number"];
                                                                                    $school_name = $row["educ_bg_school_name"];
                                                                                    $school_add = $row["educ_bg_school_address"];
                                                                                    $school_type = $row["educ_bg_school_type"];
                                                                                    $school_yeargrad = $row["educ_bg_year_graduated"];
                                                                                    $mod_date = $row["educ_bg_mod_date"];
                                                                                    $datemod = $row["stud_mod_date"];
                                                                                    
                                                                                                
                                                                            ?>      
                                                                                <tr class="gradeX">
                                                                                    <td style="display: none"><?php echo $ID; ?></td>
                                                                                    <td width=""><?php echo $school_name; ?></td>
                                                                                    <td width=""><?php echo $school_add; ?></td>
                                                                                    <td width=""><?php echo $school_type; ?></td>
                                                                                    <td width=""><?php echo $school_yeargrad; ?></td>
                                                                                    <td style='width:12%'>
                                                                                        <center>
                                                                                            <a href="view_profile_details" class="btn btn-warning">
                                                                                                    <i class="fa fa-edit" data-size="16" title="Edit"></i>
                                                                                                    Edit
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

                                                    <!--START MODALS -->
                                                    <?php include("get_view_modal_add_education_record.php");?>
                                                    <?php include("get_view_modal_add_education_record_done.php");?>
                                                    <?php include("get_view_modal_add_awards_record.php");?>
                                                    <!--END MODALS --> 
