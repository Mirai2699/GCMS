

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

<form role="form" action="../functionalities/change_student_batch.php" method="POST">
  <div class="col-md-12">
         <input type="hidden" name="stud_ID" value="<?php echo $ID;?>">
         <input type="hidden" name="stud_no" value="<?php echo $stud_no;?>">
         <div class="col-md-3">
            <label>This record is active for academic year:</label>
                   <?php  
                       $sqlemp = "SELECT * FROM `t_stud_batch_rec` where batch_student = '$stud_no' ";
                       $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                           while($row = mysqli_fetch_assoc($results))
                           {
                              $batch_ID = $row['batch_ID'];
                              $batch_year = $row['batch_year'];
                   ?>
               <input type="text" class="form-control" readonly value="<?php echo $batch_year ?>" />
                   <?php } ?>
          </div>
         <div class="col-md-3">
            <label>This record will be used for academic year:</label>
            <select class="form-control" name="stud_batch_year">
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
          </div>
          <div class="col-md-2">
              <div id="SPACER" class="row" style="margin-top: 23px"></div>
              <button type="submit" class="btn btn-success" name="update_stud_batch"><i class="fa fa-save"></i> Save Changes</button>
          </div>
  </div>
</form>
  <?php } ?>                                  