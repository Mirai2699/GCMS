

<?php 
        $view_query = mysqli_query($connection,"SELECT * FROM `t_stud_profile` AS SP 
                                                    INNER JOIN `r_courses` AS CORS 
                                                    ON SP.stud_course = CORS.course_ID 
                                                WHERE SP.stud_ID = '$stud_ID' ");

        while($row = mysqli_fetch_assoc($view_query))
        {
            $ID = $row["stud_ID"];
            $stud_no = $row["stud_number"];
            $stud_lastname = $row["stud_lastname"];
            $stud_middlename = $row["stud_middlename"];
            $stud_firstname = $row["stud_firstname"];
            $stud_course = $row["stud_course"];
            $stud_yearlevel = $row["stud_yearlevel"];
            $stud_section = $row["stud_section"];
            $stud_gender = $row["stud_gender"];
            $stud_birthdate = $row["stud_birthdate"];
            $stud_birthplace = $row["stud_birthplace"];
            $stud_homeadd = $row["stud_homeadd"];
            $stud_provadd = $row["stud_provadd"];
            $stud_telephone_no = $row["stud_telephone_no"];
            $stud_mobile_no = $row["stud_mobile_no"];
            $stud_email = $row["stud_email"];
            $stud_status = $row["stud_status"];
            $course_ID = $row["course_ID"];
            $course_name = $row["course_name"];

?>

<form role="form" action="../functionalities/manage_student_profile.php" method="POST">

   
  <div class="col-md-12" style="color: #6e6e6e ">
         <div class="col-md-12" style="background-color: #616161; margin-bottom:10px; border: 2px solid #ffffff">
            <div class="Panel" style="margin: 10px">
              <label style="color: white; font-size: 15px">Action Available:</label>
              <br>
              <button type="submit" class="btn btn-warning" name="update_stud_profile"><i class="fa fa-save"></i> Save Modifications</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </div>
        <input type="hidden" name="stud_ID" value="<?php echo $ID;?>">
        <div class="col-md-12">
            <label>Student Number:</label>
            <input maxlenght="15" class="form-control"  style="width: 50%" name="stud_no" value="<?php echo $stud_no?>">
        </div>
         <div id="SPACER" class="row" style="margin: 10px"></div>
         <div class="col-md-4">
           <label>Last Name</label>
           <input class="form-control" name="stud_lname"  value="<?php echo $stud_lastname?>">
         </div>
         <div class="col-md-4">
           <label>Middle Name <small>(Optional)</small></label>
           <input class="form-control" name="stud_mname" value="<?php echo $stud_middlename?>">
         </div>
         <div class="col-md-4">
           <label>First Name</label>
           <input class="form-control" name="stud_fname"  value="<?php echo $stud_firstname?>">
         </div>
         <div id="SPACER" class="row" style="margin: 10px"></div>
         <div class="col-md-4">
           <label>Course</label>
           <select class="form-control" name="stud_course" >
              <option value="<?php echo $course_ID?>" selected><?php echo $course_name?> -- Selected</option>
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
           <input class="form-control" type="number"  min="1" max="12" name="stud_yrlvl" value="<?php echo $stud_yearlevel?>">
         </div>
         <div class="col-md-4">
           <label>Section</label>
           <input class="form-control" type="number"  min="1" max="5" name="stud_section" value="<?php echo $stud_section?>">
         </div>
         <div id="SPACER" class="row" style="margin: 10px"></div>
         <div class="col-md-4">
           <label>Gender</label>
           <select class="form-control" name="stud_gen">
              <option value="<?php echo $stud_gender?>" selected><?php echo $stud_gender?> -- Selected</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
           </select>
         </div>
         <div class="col-md-4">
           <label>Birthdate</label>
           <input class="form-control" type="date"  name="stud_bday"  value="<?php echo $stud_birthdate?>">
         </div>
         <div class="col-md-4">
           <label>Birthplace</label>
           <input class="form-control"  name="stud_bplace" value="<?php echo $stud_birthplace?>">
         </div>
         <div id="SPACER" class="row" style="margin: 10px"></div>
         <div class="col-md-6">
           <label>Home Address</label>
           <input class="form-control" name="stud_homeadd" value="<?php echo $stud_homeadd?>">
         </div>
         <div class="col-md-6">
           <label>Provincial Address</label>
           <input class="form-control"  name="stud_provadd" value="<?php echo $stud_provadd?>">
         </div>
         <div id="SPACER" class="row" style="margin: 10px"></div>
         <div class="col-md-3">
           <label>Telephone No. <small>(Optional)</small></label>
           <input class="form-control" name="stud_tele" value="<?php echo $stud_telephone_no?>">
         </div>
         <div class="col-md-3">
           <label>Contact No.</label>
           <input class="form-control"   name="stud_contact" value="<?php echo $stud_mobile_no?>">
         </div>
         <div class="col-md-3">
           <label>Email Address</label>
           <input class="form-control"  name="stud_email" value="<?php echo $stud_email?>">
         </div>
         <div class="col-md-3">
           <label>Academic Status</label>
           <select class="form-control" name="stud_acadstat" required>
              <option value="<?php echo $stud_status?>" selected><?php echo $stud_status?> -- Selected</option>
              <option value="Regular">Regular</option>
              <option value="Irregular">Irregular</option>
              <option value="Transferee">Transferee</option>
              <option value="Suspended">Suspended</option>
              <option value="Dismissed">Dismissed</option>
              <option value="Expelled">Expelled</option>
           </select>
        </div>
  </div>
</form>
  <?php } ?>                                  