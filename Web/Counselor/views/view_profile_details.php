<?php
     include ("../utilities/Header.php");
     include ("../utilities/navibar.php");
     include ("../utilities/BaseJs.php");
     include ("../utilities/Tables.php");

    if (isset($_GET['getID'])) 
    {
        $stud_ID = $_GET['getID'];
    }
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
                            <a  href="view_profile.php">View Student Profiles</a>
                        </li>
                        <li>
                            <a class="current" href="view_profile_details.php?getID=<?php echo $stud_ID; ?>">View Profile Details</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--END BREADCRUMBS-->
            <!--START CUSTOM CONTENT-->
             <!--START TABLE-->
             <?php
                 $view_query = mysqli_query($connection,"SELECT * FROM `t_stud_profile` AS SP 
                                                                                INNER JOIN `t_stud_batch_rec` AS BATCH 
                                                                                INNER JOIN `r_courses` AS CORS 
                                                                                ON SP.stud_number = BATCH.batch_student
                                                                                and SP.stud_course = CORS.course_ID 
                                                                  WHERE SP.stud_ID = '$stud_ID' ");
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


                                            $name = $stud_fname.' '.$stud_lname;

                                        }
             ?>
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading" style="background-color:gray ;color: white">
                          View <?php echo $name."'s".' Information'?>
                        </header>
                        <br>
                       <div class="row">
                        <div class="col-md-12">
                            <!--collapse start-->
                            <div class="panel-group m-bot20" id="accordion">
                               <!--1. STUDENT'S PROFILE-->
                               <div class="panel">
                                   <div class="panel-heading" style="background-color: #9e9e9e">
                                       <h4 class="panel-title">
                                           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsezero">
                                               <i class="fa fa-chevron-circle-down"></i> Record Active Year Status
                                           </a>
                                       </h4>
                                   </div>
                                   <div id="collapsezero" class="panel-collapse collapse in">
                                       <div class="panel-body" style="background-color: #e0e0e0">
                                           <?php 
                                            include ("get_view_batch_activestat.php");
                                          ?>
                                       </div>
                                   </div>
                               </div>
                                <!--1. STUDENT'S PROFILE-->
                                <div class="panel">
                                    <div class="panel-heading" style="background-color: #ffcdd2">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                <i class="fa fa-chevron-circle-down"></i> 1. Student's Profile
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body" style="background-color: #ffebee">
                                            <?php 
                                             include ("get_view_studprofile_details.php");
                                           ?>
                                        </div>
                                    </div>
                                </div>
                                <!--2. PERSONAL INFORMATION-->
                                <div class="panel">
                                    <div class="panel-heading" style="background-color:#c5cae9 "> 
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                               <i class="fa fa-chevron-circle-down"></i> 2. Personal Information
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body" style="background-color: #e8eaf6 ">
                                            <?php 
                                             include ("get_view_personal_details.php");
                                           ?>
                                        </div>
                                    </div>
                                </div>
                                <!--3. HEALTH INFORMATION-->
                                <div class="panel">
                                    <div class="panel-heading" style="background-color: #c8e6c9">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                               <i class="fa fa-chevron-circle-down"></i> 3. Health Information
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body" style="background-color: #e8f5e9">
                                           <?php 
                                             include ("get_view_health_details.php");
                                           ?>
                                        </div>
                                    </div>
                                </div>
                                <!--4. FAMILY BACKGROUND-->
                                <div class="panel">
                                    <div class="panel-heading" style="background-color: #ffecb3">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsefour">
                                               <i class="fa fa-chevron-circle-down"></i>  4. Family Background Information
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapsefour" class="panel-collapse collapse">
                                        <div class="panel-body" style="background-color: #fff8e1">
                                           <?php 
                                             include ("get_view_family_background.php");
                                           ?>
                                        </div>
                                    </div>
                                </div>
                                <!--4. FAMILY BACKGROUND-->
                                <div class="panel">
                                    <div class="panel-heading"  style="background-color: #b2ebf2">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsefive">
                                               <i class="fa fa-chevron-circle-down"></i>  5. Educational Background Information
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapsefive" class="panel-collapse collapse">
                                        <div class="panel-body" style="background-color: #e0f7fa ">
                                          
                                             <div class="col-md-12">
                                                    <?php
                                                           $view_query = mysqli_query($connection,"SELECT * FROM  `t_stud_profile` AS SP 
                                                                                                   INNER JOIN `t_stud_education_rec` AS EDUC ON SP.stud_number = EDUC.educ_student WHERE SP.stud_ID = '$stud_ID'");
                                                       while($row = mysqli_fetch_assoc($view_query))
                                                       {
                                                           $natID = $row["educ_ID"];
                                                           $stud_no = $row["stud_number"];
                                                           $educ_nature_sch = $row["educ_nature_schooling"];
                                                           $educ_interrupt_reason = $row["educ_interrupt_reason"];
                                                           $educ_mod_date = $row["educ_mod_date"];
                                                    ?>
                                                    <form action="../functionalities/manage_education_record.php" method="POST">
                                                      <input type="hidden" name="educnat_ID" value="<?php echo $natID;?>">
                                                      <input type="hidden" name="stud_ID" value="<?php echo $stud_ID;?>">
                                                      <input type="hidden" name="stud_no" value="<?php echo $stud_no;?>">
                                                      <div class="col-md-4">
                                                          <label>Nature of Schooling:</label>
                                                          <select class="form-control" name="stud_educ_nature">
                                                              <option value="<?php echo $educ_nature_sch?>" selected><?php echo $educ_nature_sch?></option>
                                                              <option value="Continuous">Continuous</option>
                                                              <option value="Interrupted">Interrupted</option>
                                                          </select>
                                                      </div>
                                                      <div class="col-md-5">
                                                          <label>Reason of Interrupt: <small>(Only if the nature of schooling is interrupted.)</small></label>
                                                          <input class="form-control" placeholder="" name="stud_educ_interrupt" value="<?php echo $educ_interrupt_reason?>" required>
                                                      <?php } ?>
                                                      </div>
                                                      <div class="col-md-2">
                                                          <button type="submit" class="btn btn-warning" style="margin-top: 23px" name="edit_educnat_det">
                                                            <i class="fa fa-save"></i>
                                                            Save Modifications
                                                        </button>
                                                      </div>
                                                    </form>
                                                    <div id="SPACER" class="row" style="margin: 10px"></div>
                                                    <?php 
                                                          include ("get_view_educational_details.php");
                                                    ?>
                                          </div>

                                    </div>
                                </div>
                                <!-- END OF INFORMATION--->
                            </div>
                            <!--collapse end-->
                        </div>
                    </div>
                    </section>
                </div>
            </div>
            <!--END TABLE-->

            <!--END CUSTOM CONTENT-->
        </section>
    </section>
    <!--main content end-->
</section>
<!--END CONTAINER FROM HEADER-->


<!-- ON PAGE SCRIPT-->
 <script src="../../../resources-web/custom/advanced-form.js"></script>
 <script src="../../../resources-web/custom/jquery.multifield.min.js"></script> 
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