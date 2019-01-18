
<?php 
      $view_query = mysqli_query($connection,"SELECT * FROM `t_stud_profile` AS SP 
                                                INNER JOIN `t_stud_personal_rec` AS PER 
                                                ON SP.stud_number = PER.person_rec_student_no
                                              WHERE SP.stud_ID = '$stud_ID' ");
            if(mysqli_num_rows($view_query) > 0)
            {
             echo'';
            }
            else
            {
              echo'<div class="col-md-12" style="background-color: #616161; margin-bottom:10px; border: 2px solid #ffffff">
                    <div class="Panel" style="margin: 10px">
                      <label style="color: white; font-size: 15px">Action Available:</label>
                      <br>
                      <a data-toggle="modal" href="#add_personal_rec" class="btn btn-success" name="add_per_rec"><i class="fa fa-plus"></i> Add New Record</a>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                  </div>';
            }
?>
<?php 
        $view_query = mysqli_query($connection,"SELECT * FROM `t_stud_profile` AS SP 
                                                  INNER JOIN `t_stud_personal_rec` AS PER 
                                                  ON SP.stud_number = PER.person_rec_student_no
                                                WHERE SP.stud_ID = '$stud_ID' ");

        while($row = mysqli_fetch_assoc($view_query))
        {
            $ID = $row["stud_ID"];
            $stud_no = $row["stud_number"];
            $person_rec_weight = $row["person_rec_weight"];
            $person_rec_height = $row["person_rec_height"];
            $person_rec_complexion = $row["person_rec_complexion"];
            $person_rec_religion = $row["person_rec_religion"];
            $person_rec_hs_genave = $row["person_rec_hs_genave"];
            $person_rec_civil_stat = $row["person_rec_civil_stat"];
            $person_rec_working_stat = $row["person_rec_working_stat"];
            $person_rec_empl_name = $row["person_rec_empl_name"];
            $person_rec_empl_address = $row["person_rec_empl_address"];
            $person_rec_emerg_contact_name = $row["person_rec_emerg_contact_name"];
            $person_rec_emerg_contact_address = $row["person_rec_emerg_contact_address"];
            $person_rec_emerg_contact_number = $row["person_rec_emerg_contact_number"];
            $person_rec_contact_relationship = $row["person_rec_contact_relationship"];
            $person_rec_parents_marital_stat = $row["person_rec_parents_marital_stat"];
            $person_rec_fam_chil_no = $row["person_rec_fam_chil_no"];
            $person_rec_brother_no = $row["person_rec_brother_no"];
            $person_rec_sister_no = $row["person_rec_sister_no"];
            $person_rec_siblings_employed = $row["person_rec_siblings_employed"];
            $person_rec_ordinal_position = $row["person_rec_ordinal_position"];
            $person_rec_schooling_finance = $row["person_rec_schooling_finance"];
            $person_rec_weekly_allowance = $row["person_rec_weekly_allowance"];
            $person_rec_parents_total_monthlyinc = $row["person_rec_parents_total_monthlyinc"];
            $person_rec_quiet_place = $row["person_rec_quiet_place"];
            $person_rec_room_share = $row["person_rec_room_share"];
            $person_rec_residence = $row["person_rec_residence"];
            $person_rec_mod_date = $row["person_rec_mod_date"];

?>
 
<form method="POST" action="../functionalities/manage_personal_record.php">


  <input type="hidden" name="stud_ID" value="<?php echo $ID;?>">
  <input type="hidden" name="stud_no" value="<?php echo $stud_no;?>">

  <div class="col-md-12" id="fetch_results">
      <div class="col-md-12" style="background-color: #616161; margin-bottom:10px; border: 2px solid #ffffff">
        <div class="Panel" style="margin: 10px">
          <label style="color: white; font-size: 15px">Action Available:</label>
          <br>
          <button type="submit" class="btn btn-warning" name="update_per_rec"><i class="fa fa-save"></i> Save Modifications</button>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
      </div>
      <div class="col-md-3">
          <label>Weight:</label>
          <input class="form-control" placeholder="" name="stud_per_weight" value="<?php echo $person_rec_weight?>">
       </div>
       <div class="col-md-3">
          <label>Height:</label>
          <input class="form-control" placeholder="" name="stud_per_height" value="<?php echo $person_rec_height?>">
       </div>
       <div class="col-md-3">
          <label>Complexion:</label>
          <select name="stud_per_complex" class="form-control">
              <option value="<?php echo $person_rec_complexion?>"><?php echo $person_rec_complexion?></option>
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
              <option value="<?php echo $person_rec_religion?>" selected><?php echo $person_rec_religion?></option>
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
            <input type="number" class="form-control" max="100" step="0.01" name="stud_per_genave" value="<?php echo $person_rec_hs_genave?>">
        </div>
        <div class="col-md-4">
            <label>Civil Status:</label>
            <select name="stud_per_civstat" class="form-control">
                <option value="<?php echo $person_rec_civil_stat ?>" selected><?php echo $person_rec_civil_stat ?></option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
            </select>
        </div>
        <div class="col-md-2">
            <label>Working Student?:</label>
            <select name="stud_per_workstat" class="form-control">
                <option value="<?php echo $person_rec_working_stat ?>" selected><?php echo $person_rec_working_stat ?> -- Selected</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div id="SPACER" class="row" style="margin: 10px"></div>
        <div class="col-md-12" style="background-color: #eeefff; border: 1px solid">
            <label style="margin-top: 5px">Employer's Information:<small>(Optional)</small></label>
            <br>
            <div class="col-md-5" style="margin: 10px">
                <label>Employer's Name:</label>
                <input class="form-control" placeholder="" name="stud_per_emplname" value="<?php echo $person_rec_empl_name?>">
            </div>
            <div class="col-md-5" style="margin: 10px">
                <label>Employer's Address:</label>
                <input class="form-control" placeholder="" name="stud_per_empladd" value="<?php echo $person_rec_empl_address?>">
            </div>
        </div>
        <div id="SPACER" class="row" style="margin: 10px"></div>
        <div class="col-md-3">
            <label>Emergency Contact Person's Name:</label>
            <input class="form-control" placeholder="" name="stud_per_conname" value="<?php echo $person_rec_emerg_contact_name?>">
        </div>
        <div class="col-md-3">
            <label>Emergency Contact Person's Address:</label>
            <input class="form-control" placeholder="" name="stud_per_conadd" value="<?php echo $person_rec_emerg_contact_address?>">
        </div>
        <div class="col-md-3">
            <label>Emergency Contact Person's Number:</label>
            <input class="form-control" placeholder="" name="stud_per_connum" value="<?php echo $person_rec_emerg_contact_number?>">
        </div>
        <div class="col-md-3">
            <label>Emergency Contact's Relationship:</label>
            <input class="form-control" placeholder="" name="stud_per_conrel" value="<?php echo $person_rec_contact_relationship?>">
        </div>
        <div id="SPACER" class="row" style="margin: 10px"></div>
        <div class="col-md-2">
            <label>Parent's Marital Status:</label>
            <select name="stud_per_maritalstat" class="form-control">
                <option value="<?php echo $person_rec_parents_marital_stat?>" selected><?php echo $person_rec_parents_marital_stat?></option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Annulled">Annulled</option>
                <option value="Widowed">Widowed</option>
            </select>
        </div>                                            
               <div class="col-md-2">
                  <label>Number of Family's Children:</label>
                  <input type="number" class="form-control"  name="stud_per_famchil" value="<?php echo $person_rec_fam_chil_no?>">
              </div>
               <div class="col-md-2">
                  <label>Number of Brothers:</label>
                  <input type="number" style="margin-top: 18px" class="form-control" name="stud_per_nobro" value="<?php echo $person_rec_brother_no?>">
              </div>
               <div class="col-md-2">
                  <label>Number of Sisters:</label>
                  <input type="number" style="margin-top: 18px" class="form-control" name="stud_per_nosis" value="<?php echo $person_rec_sister_no?>">
              </div>
              <div class="col-md-2">
                  <label>Siblings Employed:</label>
                  <input type="number" style="margin-top: 18px" class="form-control" name="stud_per_noemp" value="<?php echo $person_rec_siblings_employed?>">
              </div>
               <div class="col-md-2">
                  <label>Student's Ordinal Position:</label>
                  <input type="number" class="form-control" placeholder="" name="stud_per_ordpos" value="<?php echo $person_rec_ordinal_position?>">
              </div>
              <div id="SPACER" class="row" style="margin: 10px"></div>
               <div class="col-md-3">
                  <label>Schooling Financer:</label>
                  <input class="form-control" placeholder="" name="stud_per_schfinan" value="<?php echo $person_rec_schooling_finance?>">
              </div>
               <div class="col-md-2">
                  <label>Weekly Allowance:</label>
                  <input class="form-control" placeholder="" name="stud_per_weekallow" value="<?php echo $person_rec_weekly_allowance?>">
              </div>
               <div class="col-md-3">
                  <label>Parent's Total Income:</label>
                  <input  class="form-control" placeholder="" name="stud_per_partotalinc" value="<?php echo $person_rec_parents_marital_stat?>">
              </div>
               <div class="col-md-4">
                  <label>Residence:</label>
                  <select name="stud_per_residence" class="form-control">
                      <option value="<?php echo $person_rec_residence?>" selected><?php echo $person_rec_residence?></option>
                      <option value="House of Parent">Parent's House</option>
                      <option value="Other Family Members House">Other amily Member's House</option>
                      <option value="Apartment">Apartment</option>
                      <option value="Condominium">Condominium</option>
                  </select>
              </div>
              <div id="SPACER" class="row" style="margin: 10px"></div>
               
              <div class="col-md-2">
                   <label>Preffered a Quiet Place?</label>
                   <select name="stud_per_quiplace" class="form-control">
                      <option value="<?php echo $person_rec_quiet_place ?>" selected><?php echo $person_rec_quiet_place ?> -- Selected</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                  </select>
               </div>

              <div class="col-md-2">
                   <label>Preffered a shared room?</label>
                   <select name="stud_per_roomshare" class="form-control">
                      <option value="<?php echo $person_rec_room_share ?>" selected><?php echo $person_rec_room_share ?> -- Selected</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                  </select>
               </div>
        </div>    
</form>    
<?php } ?>      



<!--START MODAL-->
<?php include("get_view_modal_add_personal_record.php");?>
<!--END MODAL--> 
