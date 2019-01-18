<?php
     include ("../utilities/Header.php");
     include ("../utilities/navibar.php");
     include ("../utilities/BaseJs.php");
     include ("../utilities/icheck-res.php");
?>  
    <!--CUSTOM CSS FOR THE PAGE-->
     <link href="../../../resources-web/custom/form-wizard.css" rel="stylesheet" />
    <!--main content start-->
    <section id="main-content" >
       
        <section class="wrapper" style="background-color: white">
            <!--START BREADCRUMS-->
            <div class="row" style="margin-bottom: 15px">
                <div class="col-md-12" style="background-color: #6e6e6e">
                    <ul class="breadcrumbs-alt" style="margin-top: 8px">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a  href="select_add_profile.php">Select Mode of Record Entry</a>
                        </li>
                        <li>
                            <a class="current" href="add_profile.php">Add Student Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--END BREADCRUMBS-->
            <!--START CUSTOM CONTENT-->
                <form id="regForm" action="../functionalities/add_student_profile_only.php" method="POST">
                     <!-- Circles which indicates the steps of the form: -->
                    <div class="row" style="margin-bottom: 15px">
                        <div class="col-md-12">
                            <ul class="breadcrumbs-alt" style="margin-top: 1px">
                                <li>
                                    <a class="step">1. Notice before entry</a>
                                </li>
                                <li>
                                    <a class="step">2. Setup Sudent Profile</a>
                                </li>
                                <li>
                                    <a class="step">3. Confirmation</a>
                                </li>
                            </ul>
                        </div>
                    </div> 

                    <!-- Step 1: Notice -->
                     <div class="tab">
                        <div class="col-md-12">
                            <div class="panel" style="padding: 1px; background-color: #6e6e6e"></div>
                            <h2>This mode of record entry will not be considered as complete...</h2>
                            <div class="panel" style="padding: 1px; margin-top: 20px; background-color: #6e6e6e"></div>
                            <div class="col-md-12" style="margin-bottom: 30px">
                                <center>
                                
                                </center>
                            </div>
                            <br>
                            <p style="text-align: left; font-size: 18px"><b>1.</b> This mode of entry will not be considered as a complete student record.
                            </p>
                            <p style="text-align: left; font-size: 18px"><b>2.</b> After finishing this entry, the follow-up details and other information must be provided, after the manual accumulation of the student's personal, health,<br>&nbsp;&nbsp;&nbsp;&nbsp;family background, and educational background information details.
                            </p>
                            <p style="text-align: left; font-size: 18px"><b>3.</b> Adding more details and the modification to the student record can be accessed through the view proflies tab in the navigation bar.
                            </p>
                        </div>
                    </div>
                    <!-- Step 2: Student Profile -->
                    
                    <div class="tab">
                        <div class="col-md-12" style="color: #6e6e6e ">
                              <div class="panel" style="padding: 1px; background-color: #6e6e6e"></div>
                              <h2>1. Setup Student Profile</h2>
                              <div class="panel" style="padding: 1px; margin-top: 20px; background-color: #6e6e6e"></div>
                              <div class="col-md-12">
                                  <label>Student Number:</label>
                                  <input maxlenght="15" class="form-control" placeholder="XXXX-XXXXX-XX-X" style="width: 50%" name="stud_no" required>
                              </div>
                               <div id="SPACER" class="row" style="margin: 10px"></div>
                               <div class="col-md-4">
                                 <label>Last Name</label>
                                 <input class="form-control" placeholder="Last name..." name="stud_lname" required>
                               </div>
                               <div class="col-md-4">
                                 <label>Middle Name <small>(Optional)</small></label>
                                 <input class="form-control" placeholder="middle name..." name="stud_mname">
                               </div>
                               <div class="col-md-4">
                                 <label>First Name</label>
                                 <input class="form-control" placeholder="first name..." name="stud_fname" required>
                               </div>
                               <div id="SPACER" class="row" style="margin: 10px"></div>
                               <div class="col-md-4">
                                 <label>Course</label>
                                 <select class="form-control" name="stud_course" >
                                    <option value="" selected disabled>-- Select Course --</option>
                                        <?php  
                                            $sqlemp = "SELECT * FROM `r_courses`";
                                            $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                while($row = mysqli_fetch_assoc($results))
                                                {
                                                $course_ID = $row['course_ID'];
                                                $course_name = $row['course_name'];
                                        ?>
                                    <option value="<?php echo $course_ID ?>"><?php echo $course_name; ?></option>
                                        <?php } ?>
                                 </select>
                               </div>
                               <div class="col-md-4">
                                 <label>Year Level</label>
                                 <input class="form-control" type="number"  min="1" max="12" placeholder="Select Year Level"  name="stud_yrlvl" required>
                               </div>
                               <div class="col-md-4">
                                 <label>Section</label>
                                 <input class="form-control" type="number"  min="1" max="5" placeholder="Select Section Number"  name="stud_section" required>
                               </div>
                               <div id="SPACER" class="row" style="margin: 10px"></div>
                               <div class="col-md-4">
                                 <label>Gender</label>
                                 <select class="form-control" name="stud_gender">
                                    <option value="" selected disabled>-- Select Gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                 </select>
                               </div>
                               <div class="col-md-4">
                                 <label>Birthdate</label>
                                 <input class="form-control" type="date"  name="stud_bday" required>
                               </div>
                               <div class="col-md-4">
                                 <label>Birthplace</label>
                                 <input class="form-control" placeholder="Birthplace..." name="stud_bplace">
                               </div>
                               <div id="SPACER" class="row" style="margin: 10px"></div>
                               <div class="col-md-6">
                                 <label>Home Address</label>
                                 <input class="form-control" placeholder="Home address..." name="stud_homeadd" required>
                               </div>
                               <div class="col-md-6">
                                 <label>Provincial Address</label>
                                 <input class="form-control" placeholder="Provincial address..." name="stud_provadd">
                               </div>
                               <div id="SPACER" class="row" style="margin: 10px"></div>
                               <div class="col-md-3">
                                 <label>Telephone No. <small>(Optional)</small></label>
                                 <input class="form-control" placeholder="Telephone no..."  name="stud_tele">
                               </div>
                               <div class="col-md-3">
                                 <label>Contact No.</label>
                                 <input class="form-control" placeholder="Contact no..."  name="stud_contact">
                               </div>
                               <div class="col-md-3">
                                 <label>Email Address</label>
                                 <input class="form-control" placeholder="email address..."  name="stud_email">
                               </div>
                               <div class="col-md-3">
                                 <label>Academic Status</label>
                                 <select class="form-control" name="stud_acadstat" required>
                                    <option value="" selected disabled>-- Select Status --</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Irregular">Irregular</option>
                                    <option value="Transferee">Transferee</option>
                                    <option value="Suspended">Suspended</option>
                                    <option value="Dismissed">Dismissed</option>
                                    <option value="Expelled">Expelled</option>
                                 </select>
                              </div>
                        </div>
                    </div>

                   
                    <!-- Step 3: COnfirmation -->
                     <div class="tab">
                        <div class="col-md-12">
                            <div class="panel" style="padding: 1px; background-color: #6e6e6e"></div>
                            <h2>3. Confirmation of Entries</h2>
                            <div class="panel" style="padding: 1px; margin-top: 20px; background-color: #6e6e6e"></div>
                            <div class="col-md-12" style="margin-bottom: 30px">
                                <center>
                                <label>This record is for academic year:</label>
                                 <select class="form-control" name="stud_batch_year" style="width: 30%">
                                    <option value="" selected disabled>-- Academic Year --</option>
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
                                </center>
                            </div>
                            <br>
                            <p style="text-align: center; font-size: 18px">Before proceeding to the submission of this student's record, <br>
                               please review back the details of your form entries.
                            </p>
                        </div>
                    </div>
                    <!--BUTTONS-->
                    <div class="col-md-12" style="margin-top: 20px; margin-right: 30px">
                        <div class="panel" style="padding: 1px; background-color: #6e6e6e"></div>
                        <div style="overflow:auto;">
                          <div style="float:right;">
                            <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>
                          </div>
                        </div>
                    </div>
                </form>
            <!--END CUSTOM CONTENT-->
        </section>
    </section>
    <!--main content end-->
</section>
<!--END CONTAINER FROM HEADER-->

<!-- CUSTOM RESOURCES-->


 <script src="../../../resources-web/custom/form-wizard.js"></script>
    <script src="../../../resources-web/custom/js/advanced-form.js"></script>
    <script src="../../../resources-web/custom/js/jquery.multifield.min.js"></script> -->
    <script>

        $('.form-contents').multifield({
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
         $(function(){
            $('table1').dataTable();           
            $('table2').dataTable();           
        });

    
    </script>
