<?php
     $view_query = mysqli_query($connection,"SELECT * FROM `t_stud_profile` AS SP 
                                            INNER JOIN `t_stud_family_bg_rec` AS FAM 
                                                  ON SP.stud_number = FAM.famInf_student
                                             WHERE SP.stud_ID = '$stud_ID' ");
     while($row = mysqli_fetch_assoc($view_query))
     {
         $ID = $row["famInf_ID"];
         $stud_ID = $row["stud_ID"];
         $stud_no = $row["stud_number"];
         $famInf_type = $row["famInf_type"];
         $famInf_lastname = $row["famInf_lastname"];
         $famInf_middlename = $row["famInf_middlename"];
         $famInf_firstname = $row["famInf_firstname"];
         $famInf_age = $row["famInf_age"];
         $famInf_stat = $row["famInf_stat"];
         $famInf_educ_attain = $row["famInf_educ_attain"];
         $famInf_occupation = $row["famInf_occupation"];
         $famInf_educ_empl_name = $row["famInf_empl_name"];
         $famInf_educ_empl_address = $row["famInf_empl_address"];
         $famInf_mod_date = $row["famInf_mod_date"];

         $compname = $famInf_firstname.' '.$famInf_lastname;
 ?>      
<div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit_profile_details<?php echo $ID?>" class="modal fade">
     <div class="modal-dialog" style="width: 1000px; ">
         <div class="modal-content" >
             <div class="modal-header" style="background-color: #00acc1">
                 <h5 class="modal-title" style="font-size: 25px; color: white; text-align: center ">Setup Family Background Information Details
                 <div class="panel" style="padding: 1px; margin-top: 1px; background-color: white"></div>
             </div>
             <div class="modal-body" style="height:auto;"> 
                <!-- START --> 
                <div class="panel-body">
                   <div class="adv-table">                  
                                   <form action="../functionalities/manage_family_record.php" method="POST">
                                       <div class="form-content">
                                            <input type="hidden" name="famInf_ID" value="<?php echo $ID;?>">
                                            <input type="hidden" name="stud_ID" value="<?php echo $stud_ID;?>">
                                            <input type="hidden" name="stud_no" value="<?php echo $stud_no;?>">
                                           <div class="row group">
                                             <div class="col-md-12" style="margin-left: 10px">                                                        
                                                <div class="col-md-12">
                                                    <label>Family Member Type:</label>
                                                    <select class="form-control" name="stud_fam_type" style="width: 31%">
                                                        <option value="<?php echo $famInf_type;?>" selected><?php echo $famInf_type;?> -- Selected</option>
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
                                                    <input class="form-control" placeholder="" name="stud_fam_lname" value="<?php echo $famInf_lastname;?>" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Middle Name:</label>
                                                    <input class="form-control" placeholder="" name="stud_fam_mname" value="<?php echo $famInf_middlename;?>" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>First Name:</label>
                                                    <input class="form-control" placeholder="" name="stud_fam_fname" value="<?php echo $famInf_firstname;?>" required>
                                                </div>
                                                 <div id="SPACER" class="row" style="margin: 10px"></div>
                                                 <div class="col-md-2">
                                                    <label>Age:</label>
                                                    <input type="number" class="form-control" placeholder="" name="stud_fam_age" value="<?php echo $famInf_age;?>" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Status:</label>
                                                    <select class="form-control" name="stud_fam_stat">
                                                        <option value="<?php echo $famInf_stat;?>" selected><?php echo $famInf_stat;?> -- Selected</option>
                                                        <option value="Alive">Alive</option>
                                                        <option value="Deceased">Deceased</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Highest Educational Attainment:</label>
                                                     <select class="form-control" name="stud_fam_educattain">
                                                        <option value="<?php echo $famInf_educ_attain;?>" selected><?php echo $famInf_educ_attain;?> -- Selected</option>
                                                        <option value="None">None</option>
                                                        <option value="Elementary">Elementary</option>
                                                        <option value="Highschool">Highschool</option>
                                                        <option value="College Undergraduate Degree">College Undergraduate Degree</option>
                                                        <option value="College Graduate Degree">College Graduate Degree</option>
                                                    </select>
                                                </div>
                                                 <div class="col-md-3">
                                                    <label>Occupation:</label>
                                                    <input class="form-control" placeholder="" name="stud_fam_occup" value="<?php echo $famInf_occupation;?>" required>
                                                </div>
                                                <div id="SPACER" class="row" style="margin: 10px"></div>
                                                <div class="col-md-4">
                                                    <label>Employer's Name:</label>
                                                    <input class="form-control" placeholder="" name="stud_fam_empname" value="<?php echo $famInf_educ_empl_name;?>" required>
                                                </div>
                                                <div class="col-md-8">
                                                    <label>Employer's Address:</label>
                                                    <input class="form-control" placeholder="" name="stud_fam_empadd" value="<?php echo $famInf_educ_empl_address;?>" required>
                                                </div>
                                                <br>
                                                <div class="col-md-1">
                                                   <div class="form-group">
                                                       <button type="button" class="btn btn-danger btnRemove" style="margin-top: 5px;"><i class="fa fa-times"></i></button>
                                                   </div>
                                               </div>
                                              </div>
                                           </div>
                                       </div>
                                       <div class="col-md-12" style="margin-top: 20px; margin-right: 30px">
                                           <div class="panel" style="padding: 1px; background-color: #6e6e6e; margin-bottom: 10px"></div>
                                           <div style="overflow:auto;">
                                             <div style="float:right;">
                                               <button type="submit" class="btn btn-primary" name="edit_fam_rec">
                                                <i class="fa fa-external-link"></i>&nbsp;Submit</button>
                                                &nbsp;&nbsp;&nbsp;
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                <i class="fa fa-times"></i>&nbsp;Cancel</button>
                                             </div>
                                           </div>
                                       </div>

                                   </form>  
                               
                   </div>
                </div>
                <!--END-->
             </div>
         </div>
    </div>
</div>
<?php } ?>
