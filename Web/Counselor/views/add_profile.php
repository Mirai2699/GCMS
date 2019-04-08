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
                <form id="regForm" action="../functionalities/add_student_record.php" method="POST">
                     <!-- Circles which indicates the steps of the form: -->
                    <div class="row" style="margin-bottom: 15px">
                        <div class="col-md-12">
                            <ul class="breadcrumbs-alt" style="margin-top: 1px">
                                <li>
                                    <a class="step">1. Student Profile</a>
                                </li>
                                <li>
                                    <a class="step">2. Personal Information</a>
                                </li>
                                <li>
                                    <a class="step">3. Health Information</a>
                                </li>
                                <li>
                                    <a class="step">4. Family Background</a>
                                </li>
                                <li>
                                    <a class="step">5. Educational Background</a>
                                </li>
                                <li>
                                    <a class="step">6. Finalization</a>
                                </li>
                            </ul>
                        </div>
                    </div> 
                    <!-- Step 1: Student Profile -->
                    
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

                    <!-- Step 2: Personal Information -->
                    <div class="tab">
                        <div class="col-md-12">
                              <div class="panel" style="padding: 1px; background-color: #6e6e6e"></div>
                              <h2>2. Setup Personal Information</h2>
                              <div class="panel" style="padding: 1px; margin-top: 20px; background-color: #6e6e6e"></div>
                              <div class="col-md-3">
                                  <label>Weight:</label>
                                  <input class="form-control" placeholder="" name="stud_per_weight" required>
                              </div>
                               <div class="col-md-3">
                                  <label>Height:</label>
                                  <input class="form-control" placeholder="" name="stud_per_height" required>
                              </div>
                               <div class="col-md-3">
                                  <label>Complexion:</label>
                                  <select name="stud_per_complex" class="form-control">
                                      <option value="" selected disabled>-- Select Skin Complexion --</option>
                                      <option value="Light">Light</option>
                                      <option value="Meduim-Light">Meduim-Light</option>
                                      <option value="Meduim (Balanced)">Meduim (Balanced)</option>
                                      <option value="Meduim-Dark">Meduim-Dark</option>
                                      <option value="Dark">Dark</option>
                                  </select>
                              </div>
                               <div class="col-md-3">
                                  <label>Religion:</label>
                                  <select name="stud_per_religion" class="form-control">
                                      <option value="" selected disabled>-- Select Religion --</option>
                                      <option value="Roman Catholic">Roman Catholic</option>
                                      <option value="Born-Again Christian">Born-Again Christian</option>
                                      <option value="Iglesia Ni Cristo">Iglesia Ni Cristo</option>
                                      <option value="Islam">Islam</option>
                                      <option value="Seventh-Day Adventist">Seventh-Day Adventist</option>
                                      <option value="Jehovah's Witness">Jehovah's Witness</option>
                                  </select>
                              </div>
                              <div id="SPACER" class="row" style="margin: 10px"></div>
                              <div class="col-md-4">
                                  <label>High-School General Average:</label>
                                  <input type="number" class="form-control" max="100" step="0.01" name="stud_per_genave" required>
                              </div>
                               <div class="col-md-4">
                                  <label>Civil Status:</label>
                                  <select name="stud_per_civstat" class="form-control">
                                      <option value="" selected disabled>-- Select Civil Status --</option>
                                      <option value="Single">Single</option>
                                      <option value="Married">Married</option>
                                  </select>
                              </div>
                               <div class="col-md-2">
                                   <label>Working Student?</label>
                                   <div class="radio">
                                    <label class="radiobox-inline">
                                        <input type="radio" name="stud_per_workstat" value="Yes">
                                        Yes
                                    </label>
                                   </div>
                                   <div class="radio">
                                    <label class="radiobox-inline">
                                        <input type="radio" name="stud_per_workstat" value="No">
                                        No
                                    </label>
                                   </div>
                               </div>
                             <div class="col-md-12" style="background-color: #eeeeee">
                                 <label style="margin-top: 5px">Answer the following if the student is working:<small>(Optional)</small></label>
                                 <br>
                                 <div class="col-md-5" style="margin: 10px">
                                      <label>Employer's Name:</label>
                                      <input class="form-control" placeholder="" name="stud_per_emplname">
                                  </div>
                                   <div class="col-md-5" style="margin: 10px">
                                      <label>Employer's Address:</label>
                                      <input class="form-control" placeholder="" name="stud_per_empladd">
                                  </div>
                             </div>
                             <div id="SPACER" class="row" style="margin: 10px"></div>
                             <div class="col-md-3">
                                  <label>Emergency Contact Person's Name:</label>
                                  <input class="form-control" placeholder="" name="stud_per_conname" required>
                              </div>
                               <div class="col-md-3">
                                  <label>Emergency Contact Person's Address:</label>
                                  <input class="form-control" placeholder="" name="stud_per_conadd" required>
                              </div>
                               <div class="col-md-3">
                                  <label>Emergency Contact Person's Number:</label>
                                  <input class="form-control" placeholder="" name="stud_per_connum" required>
                              </div>
                               <div class="col-md-3">
                                  <label>Emergency Contact's Relationship:</label>
                                  <input class="form-control" placeholder="" name="stud_per_conrel" required>
                              </div>
                              <div id="SPACER" class="row" style="margin: 10px"></div>
                              <div class="col-md-2">
                                  <label>Parent's Marital Status:</label>
                                  <select name="stud_per_maritalstat" class="form-control">
                                      <option value="" selected disabled>-- Select Marital Status --</option>
                                      <option value="Married">Married</option>
                                      <option value="Divorced">Divorced</option>
                                      <option value="Annulled">Annulled</option>
                                      <option value="Widowed">Widowed</option>
                                  </select>
                              </div>
                               <div class="col-md-2">
                                  <label>Number of Family's Children:</label>
                                  <input type="number" class="form-control"  name="stud_per_famchil" required>
                              </div>
                               <div class="col-md-2">
                                  <label>Number of Brothers:</label>
                                  <input type="number" style="margin-top: 18px" class="form-control" name="stud_per_nobro" required>
                              </div>
                               <div class="col-md-2">
                                  <label>Number of Sisters:</label>
                                  <input type="number" style="margin-top: 18px" class="form-control" name="stud_per_nosis" required>
                              </div>
                              <div class="col-md-2">
                                  <label>Siblings Employed:</label>
                                  <input type="number" style="margin-top: 18px" class="form-control" name="stud_per_noemp" required>
                              </div>
                               <div class="col-md-2">
                                  <label>Student's Ordinal Position:</label>
                                  <input type="number" class="form-control" placeholder="" name="stud_per_ordpos" required>
                              </div>
                              <div id="SPACER" class="row" style="margin: 10px"></div>
                               <div class="col-md-3">
                                  <label>Schooling Financer:</label>
                                  <input class="form-control" placeholder="" name="stud_per_schfinan" required>
                              </div>
                               <div class="col-md-2">
                                  <label>Weekly Allowance:</label>
                                  <input class="form-control" placeholder="" name="stud_per_weekallow" required>
                              </div>
                               <div class="col-md-3">
                                  <label>Parent's Total Income:</label>
                                  <input  class="form-control" placeholder="" name="stud_per_partotalinc" required>
                              </div>
                               <div class="col-md-4">
                                  <label>Residence:</label>
                                  <select name="stud_per_residence" class="form-control">
                                      <option value="" selected disabled>-- Select Residence --</option>
                                      <option value="House of Parent">Parent's House</option>
                                      <option value="Other Family Members House">Other amily Member's House</option>
                                      <option value="Apartment">Apartment</option>
                                      <option value="Condominium">Condominium</option>
                                  </select>
                              </div>
                              <div id="SPACER" class="row" style="margin: 10px"></div>
                               
                              <div class="col-md-3">
                                   <label>Preffered a Quiet Place?</label>
                                   <div class="radio">
                                    <label class="radiobox-inline">
                                        <input type="radio" name="stud_per_quiplace" value="Yes">
                                        Yes
                                    </label>
                                   </div>
                                   <div class="radio">
                                    <label class="radiobox-inline">
                                        <input type="radio" name="stud_per_quiplace" value="No">
                                        No
                                    </label>
                                   </div>
                               </div>
                              <div class="col-md-3">
                                   <label>Preffered Room Sharing?</label>
                                   <div class="radio">
                                    <label class="radiobox-inline">
                                        <input type="radio" name="stud_per_roomshare" value="Yes" >
                                        Yes
                                    </label>
                                   </div>
                                   <div class="radio">
                                    <label class="radiobox-inline">
                                        <input type="radio" name="stud_per_roomshare" value="No" >
                                        No
                                    </label>
                                   </div>
                               </div>
                        </div>
                    </div>
                    <!-- Step 3: Health Information -->
                    <div class="tab">
                        <div class="col-md-12">
                              <div class="panel" style="padding: 1px; background-color: #6e6e6e"></div>
                              <h2>3. Setup Health Information</h2>
                              <div class="panel" style="padding: 1px; margin-top: 20px; background-color: #6e6e6e"></div>

                              <label style="font-size: 20px">Physical Health</label>
                              <br>
                              <br>
                              <div class="col-md-2">
                                  <label>Vision:</label>
                                  <input class="form-control" placeholder="" name="stud_heal_vision" required>
                              </div>
                              <div class="col-md-2">
                                  <label>Hearing:</label>
                                  <input class="form-control" placeholder="" name="stud_heal_hearing" required>
                              </div>
                              <div class="col-md-2">
                                  <label>Speech:</label>
                                  <input class="form-control" placeholder="" name="stud_heal_speech" required>
                              </div>
                              <div class="col-md-6">
                                  <label>General Health Assessment: <small>(Remarks)</small></label>
                                  <input class="form-control" placeholder="" name="stud_heal_genass" required>
                              </div>
                              <div id="SPACER" class="row" style="margin: 10px"></div>
                              <label style="font-size: 20px">Pyschological Health</label>
                              <br>
                              <br>
                              <div class="col-md-3">
                                  <label>Last date of consultation:</label>
                                  <input type="date" class="form-control" placeholder="" name="stud_heal_datepsych" required>
                              </div>
                              <div class="col-md-9">
                                  <label>Reason from last consultation:</label>
                                  <input class="form-control" placeholder="" name="stud_heal_reaspsych" required>
                              </div>
                               <div id="SPACER" class="row" style="margin: 10px"></div>
                        </div>
                    </div>
                    <!-- Step 4: Family Background-->
                    <div class="tab">
                        <div class="col-md-12">
                              <div class="panel" style="padding: 1px; background-color: #6e6e6e"></div>
                              <h2>4. Setup Family Background Information<br><small>&nbsp;One member for a moment; Can add more or edit later.</small></h2>
                              <div class="panel" style="padding: 1px; margin-top: 20px; background-color: #6e6e6e"></div>


                              <div class="col-md-12">
                                  <label>Family Member Type:</label>
                                  <select class="form-control" name="stud_fam_type" style="width: 31%">
                                      <option value="" selected disabled>-- Select Member Type --</option>
                                      <option value="Father">Father</option>
                                      <option value="Mother">Mother</option>
                                      <option value="Brother">Brother</option>
                                      <option value="Sister">Sister</option>
                                      <option value="Aunt">Aunt</option>
                                      <option value="Uncle">Uncle</option>
                                      <option value="GrandFather">GrandFather</option>
                                      <option value="GrandMother">GrandMother</option>
                                      <option value="Guardian">Guardian</option>
                                  </select>
                              </div>
                              <div id="SPACER" class="row" style="margin: 10px"></div>
                              <div class="col-md-4">
                                  <label>Last Name:</label>
                                  <input class="form-control" placeholder="" name="stud_fam_lname" required>
                              </div>
                              <div class="col-md-4">
                                  <label>Middle Name:</label>
                                  <input class="form-control" placeholder="" name="stud_fam_mname" required>
                              </div>
                              <div class="col-md-4">
                                  <label>First Name:</label>
                                  <input class="form-control" placeholder="" name="stud_fam_fname" required>
                              </div>
                               <div id="SPACER" class="row" style="margin: 10px"></div>
                               <div class="col-md-2">
                                  <label>Age:</label>
                                  <input type="number" class="form-control" placeholder="" name="stud_fam_age" required>
                              </div>
                              <div class="col-md-3">
                                  <label>Status:</label>
                                  <select class="form-control" name="stud_fam_stat">
                                      <option value="" selected disabled>-- Select Status --</option>
                                      <option value="Alive">Alive</option>
                                      <option value="Deceased">Deceased</option>
                                  </select>
                              </div>
                              <div class="col-md-4">
                                  <label>Highest Educational Attainment:</label>
                                   <select class="form-control" name="stud_fam_educattain">
                                      <option value="" selected disabled>-- Select Educational Attainment --</option>
                                      <option value="None">None</option>
                                      <option value="Elementary">Elementary</option>
                                      <option value="Highschool">Highschool</option>
                                      <option value="College Undergraduate Degree">College Undergraduate Degree</option>
                                      <option value="College Graduate Degree">College Graduate Degree</option>
                                  </select>
                              </div>
                               <div class="col-md-3">
                                  <label>Occupation:</label>
                                  <input class="form-control" placeholder="" name="stud_fam_occup" required>
                              </div>
                              <div id="SPACER" class="row" style="margin: 10px"></div>
                              <div class="col-md-4">
                                  <label>Employer's Name:</label>
                                  <input class="form-control" placeholder="" name="stud_fam_empname" required>
                              </div>
                              <div class="col-md-8">
                                  <label>Employer's Address:</label>
                                  <input class="form-control" placeholder="" name="stud_fam_empadd" required>
                              </div>
                               <div id="SPACER" class="row" style="margin: 10px"></div>
                        </div>
                    </div>
                    <!-- Step 5: Educational Background-->
                    <div class="tab">
                        <div class="col-md-12">
                              <div class="panel" style="padding: 1px; background-color: #6e6e6e"></div>
                              <h2>5. Setup Education Background Information <br><small>Give at least 3 schools you've attended to in each level. (Can add more or edit later)</small></h2>
                              <div class="panel" style="padding: 1px; margin-top: 20px; background-color: #6e6e6e"></div>

                              <div class="col-md-4">
                                  <label>Nature of Schooling:</label>
                                  <select class="form-control" name="stud_educ_nature">
                                      <option value="">-- Select Nature --</option>
                                      <option value="Continuous">Continuous</option>
                                      <option value="Interrupted">Interrupted</option>
                                  </select>
                              </div>
                              <div class="col-md-8">
                                  <label>Reason of Interrupt: <small>(Only if the nature of schooling is interrupted.)</small></label>
                                  <input class="form-control" placeholder="" name="stud_educ_interrupt" required>
                              </div>
                              <div id="SPACER" class="row" style="margin: 10px"></div>
                              <div class="col-md-12" style="background-color: #c8e6c9; margin-bottom: 10px">
                                  <label style="font-size: 18px; margin: 10px">For Primary / Elementary Level</label>
                                  <br>
                                  <div class="col-md-6">
                                      <label>School Name:</label>
                                      <input class="form-control" placeholder="" name="stud_educ_schname_primary" required>
                                  </div>
                                   <div class="col-md-6">
                                      <label>School Address:</label>
                                      <input class="form-control" placeholder="" name="stud_educ_schadd_primary" required>
                                  </div>
                                  <div id="SPACER" class="row" style="margin: 10px"></div>
                                   <div class="col-md-6">
                                      <label>School Type:</label>
                                       <select class="form-control" name="stud_educ_schtype_primary">
                                          <option value="">-- Select School Type --</option>
                                          <option value="Public">Public</option>
                                          <option value="Private">Private</option>
                                      </select>
                                  </div>
                                   <div class="col-md-6">
                                      <label>Year Graduated:</label>
                                      <input class="form-control" placeholder="" name="stud_educ_yrgrad_primary" required>
                                  </div>
                                  <div id="SPACER" class="row" style="margin: 10px"></div>
                              </div>
                              <br>
                              <div class="col-md-12" style="background-color: #e3f2fd; margin-bottom: 10px">
                                  <label style="font-size: 18px; margin: 10px">For Secondary / High-School Level</label>
                                  <br>
                                  <div class="col-md-6">
                                      <label>School Name:</label>
                                      <input class="form-control" placeholder="" name="stud_educ_schname_second" required>
                                  </div>
                                   <div class="col-md-6">
                                      <label>School Address:</label>
                                      <input class="form-control" placeholder="" name="stud_educ_schadd_second" required>
                                  </div>
                                  <div id="SPACER" class="row" style="margin: 10px"></div>
                                   <div class="col-md-6">
                                      <label>School Type:</label>
                                      <select class="form-control" name="stud_educ_schtype_second">
                                          <option value="">-- Select School Type --</option>
                                          <option value="Public">Public</option>
                                          <option value="Private">Private</option>
                                      </select>
                                  </div>
                                   <div class="col-md-6">
                                      <label>Year Graduated:</label>
                                      <input class="form-control" placeholder="" name="stud_educ_yrgrad_second" required>
                                  </div>
                                  <div id="SPACER" class="row" style="margin: 10px"></div>
                              </div>
                              <br>
                              <div class="col-md-12" style="background-color: #ffcdd2; margin-bottom: 10px">
                                  <label style="font-size: 18px; margin: 10px">For Tertiary / College Level</label>
                                  <br>
                                  <div class="col-md-6">
                                      <label>School Name:</label>
                                      <input class="form-control" placeholder="" name="stud_educ_schname_tert" required>
                                  </div>
                                   <div class="col-md-6">
                                      <label>School Address:</label>
                                      <input class="form-control" placeholder="" name="stud_educ_schadd_tert" required>
                                  </div>
                                  <div id="SPACER" class="row" style="margin: 10px"></div>
                                   <div class="col-md-6">
                                      <label>School Type:</label>
                                     <select class="form-control" name="stud_educ_schtype_tert">
                                          <option value="">-- Select School Type --</option>
                                          <option value="Public">Public</option>
                                          <option value="Private">Private</option>
                                      </select>
                                  </div>
                                   <div class="col-md-6">
                                      <label>Honors/Awards Received:</label>
                                      <input type="text" class="form-control"  name="stud_educ_awards">
                                  </div>
                                  <div id="SPACER" class="row" style="margin: 10px"></div>
                              </div>
                        </div>
                    </div>
                    <!-- Step 6: Finalization-->
                     <div class="tab">
                        <div class="col-md-12">
                            <div class="panel" style="padding: 1px; background-color: #6e6e6e"></div>
                            <h2>6. Finalization of Entries</h2>
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
                            <br>
                            <p style="text-align: center; font-size: 18px; color: black">By clicking the submission button, it means that you agree to the terms, conditions and provisionaries of the <br>National Privacy Commission in regards to the compliance to the Data Privacy Act of 2012,<br> in terms of collecting personal and senstitive information.
                            </p>
                            <br>
                            <p style="text-align: center; font-size: 18px; color: black; font-weight: bold">
                                For more details, click the button below <i class="fa fa-arrow-down"></i>
                                <br><br>
                                <a class="btn btn-info" href="#view_npc" data-toggle="modal" style="background-color: #00264d">
                                    <i class="fa fa-external-link"></i>&nbsp;
                                    View DPA Statement in Data Collection
                                </a>
                            </p>
                            <?php include("get_view_privacy_statement.php");?>
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
