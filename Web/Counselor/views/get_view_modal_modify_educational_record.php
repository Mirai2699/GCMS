<?php
$view_query = mysqli_query($connection,"SELECT * FROM 
                                        `t_stud_profile` AS SP 
                                        INNER JOIN `t_stud_educational_bg_details` AS EDUCDET 
                                        ON SP.stud_number = EDUCDET.educ_bg_student
                                        WHERE SP.stud_ID = '$stud_ID'");
while($row = mysqli_fetch_assoc($view_query))
{
    $ID = $row["educ_bg_ID"];
    $stud_no = $row["stud_number"];
    $school_name = $row["educ_bg_school_name"];
    $school_add = $row["educ_bg_school_address"];
    $school_type = $row["educ_bg_school_type"];
    $school_level = $row["educ_bg_level"];
    $school_yeargrad = $row["educ_bg_year_graduated"];
    $mod_date = $row["educ_bg_mod_date"];
    $datemod = $row["stud_mod_date"];
 ?>      
<div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="view_profile_details<?php echo $ID?>" class="modal fade">
     <div class="modal-dialog" style="width: 1000px; ">
         <div class="modal-content" >
             <div class="modal-header" style="background-color: #00acc1">
                 <h5 class="modal-title" style="font-size: 25px; color: white; text-align: center ">View Education Background Details
                 <div class="panel" style="padding: 1px; margin-top: 1px; background-color: white"></div>
             </div>
             <div class="modal-body" style="height:auto;"> 
                <!-- START --> 
                <div class="panel-body">
                   <div class="adv-table">                  
                                   <form action="../functionalities/manage_education_record.php" method="POST">
                                       <div class="form-content">
                                            <input type="hidden" name="educ_ID" value="<?php echo $ID;?>">
                                            <input type="hidden" name="stud_ID" value="<?php echo $stud_ID;?>">
                                            <input type="hidden" name="stud_no" value="<?php echo $stud_no;?>">
                                           <div class="row group">
                                             <div class="col-md-12" style="margin-left: 10px">      
                                                <div id="SPACER" class="row" style="margin: 10px"></div>
                                                   <div class="panel" style="padding: 1px; background-color: navy; width: 98%"></div>
                                                   <label style="font-size: 18px; margin: 10px">Enter Schooling Details</label>
                                                   <br>
                                                   <div class="col-md-6">
                                                       <label>School Name:</label>
                                                       <input class="form-control" placeholder="" name="stud_educ_schname" value="<?php echo $school_name?>" required>
                                                   </div>
                                                    <div class="col-md-6">
                                                       <label>School Address:</label>
                                                       <input class="form-control" placeholder="" name="stud_educ_schadd" value="<?php echo $school_add?>" required>
                                                   </div>
                                                   <div id="SPACER" class="row" style="margin: 10px"></div>
                                                     <div class="col-md-4">
                                                        <label>Level of Education:</label>
                                                         <select class="form-control" name="stud_educ_level">
                                                            <option value="<?php echo $school_level?>" selected><?php echo $school_level?></option>
                                                            <option value="Primary">Primary</option>
                                                            <option value="Secondary">Secondary</option>
                                                            <option value="Tertiary">Tertiary</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <label>School Type:</label>
                                                        <select class="form-control" name="stud_educ_schtype">
                                                           <option value="<?php echo $school_type?>" selected><?php echo $school_type?></option>
                                                           <option value="Public">Public</option>
                                                           <option value="Private">Private</option>
                                                       </select>
                                                   </div>
                                                    <div class="col-md-4">
                                                       <label>Year Graduated:</label>
                                                       <input class="form-control" placeholder="" name="stud_educ_yrgrad" value="<?php echo $school_yeargrad?>" required>
                                                   </div>                                                  
                                             </div> 
                                           </div>
                                       </div>
                                        <div id="SPACER" class="row" style="margin: 10px"></div>
                                       <div class="col-sm-12">
                                          <section class="panel">
                                              <header class="panel-heading" style="background-color:#6e6e6e;color: white">
                                                    Honors / Awards Received
                                              </header>
                                                  <div class="panel-body" style="background-color: #eeeeee">
                                                     <div class="adv-table" style="background-color: white">
                                                         <table  class="display table table-bordered table-striped">
                                                             <thead>
                                                             <tr>
                                                                 <th style="display: none">CI_ID</th>
                                                                 <th style="text-align: center">Achievement Type</th>
                                                                 <th style="text-align: center">Description</th>
                                                             </tr>
                                                             </thead>
                                                             <tbody>                                                              
                                                             <?php

                                                                   $view_hon = mysqli_query($connection,"SELECT * FROM 
                                                                    `t_stud_honors_awards` AS HON
                                                                           INNER JOIN `t_stud_educational_bg_details` AS EDUC
                                                                               ON EDUC.educ_bg_ID = HON.hon_school
                                                                           WHERE HON.hon_school = '$ID'");                                         
                                                                   while($row_hon = mysqli_fetch_assoc($view_hon))
                                                                   {
                                                                       $hon_ID = $row_hon["hon_ID"];
                                                                       $hon_rectype = $row_hon["hon_received_type"];
                                                                       $hon_desc = $row_hon["hon_description"];


                                                              ?>
                                                               <tr class="gradeX">
                                                                   <td style="display: none"><?php echo $hon_ID; ?></td>
                                                                   <td width="30%"><?php echo $hon_rectype; ?></td>
                                                                   <td width="70%"><?php echo $hon_desc; ?></td>                  
                                                               </tr>  
                                                               <?php } ?>
                                                               </tbody>
                                                           </table>

                                                       </div>
                                                   </div>
                                               </section>
                                           </div>    
                                       <div class="col-md-12" style="margin-top: 20px; margin-right: 30px">
                                           <div class="panel" style="padding: 1px; background-color: #6e6e6e; margin-bottom: 10px"></div>
                                           <div style="overflow:auto;">
                                             <div style="float:right;">
                                               <button type="submit" class="btn btn-warning" name="edit_educ_rec">
                                                <i class="fa fa-save"></i>&nbsp;Save Modifications</button>
                                                &nbsp;&nbsp;&nbsp;
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                <i class="fa fa-times"></i>&nbsp;Close</button>
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
