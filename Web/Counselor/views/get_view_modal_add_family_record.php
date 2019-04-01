<div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="add_family_rec" class="modal fade">
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
                       <table class="display table table-bordered table-striped">                                
                           <tr>
                               <td>                          
                                   <form action="../functionalities/manage_family_record.php" method="POST">
                                       <div class="form-content">
                                            <input type="hidden" name="stud_ID" value="<?php echo $stud_ID;?>">
                                            <input type="hidden" name="stud_no" value="<?php echo $stud_no;?>">
                                            <div class="row" style="margin: 4px">
                                               <div class="col-md-12">
                                                   <p>
                                                       <button type="button" id="btnAdd" class="btn btn-success">      
                                                       <i class="fa fa-plus"></i>
                                                       Add Member
                                                       </button>
                                                   </p>
                                               </div>
                                           </div>
                                           <div class="row group">
                                             <div class="col-md-12" style="margin-left: 10px">                                                        
                                                <div class="col-md-12">
                                                    <label>Family Member Type:</label>
                                                    <select class="form-control" name="stud_fam_type[]" style="width: 31%">
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
                                                    <input class="form-control" placeholder="" name="stud_fam_lname[]" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Middle Name:</label>
                                                    <input class="form-control" placeholder="" name="stud_fam_mname[]" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>First Name:</label>
                                                    <input class="form-control" placeholder="" name="stud_fam_fname[]" required>
                                                </div>
                                                 <div id="SPACER" class="row" style="margin: 10px"></div>
                                                 <div class="col-md-2">
                                                    <label>Age:</label>
                                                    <input type="number" class="form-control" placeholder="" name="stud_fam_age[]" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Status:</label>
                                                    <select class="form-control" name="stud_fam_stat[]">
                                                        <option value="" selected disabled>-- Select Status --</option>
                                                        <option value="Alive">Alive</option>
                                                        <option value="Deceased">Deceased</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Highest Educational Attainment:</label>
                                                     <select class="form-control" name="stud_fam_educattain[]">
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
                                                    <input class="form-control" placeholder="" name="stud_fam_occup[]" required>
                                                </div>
                                                <div id="SPACER" class="row" style="margin: 10px"></div>
                                                <div class="col-md-4">
                                                    <label>Employer's Name:</label>
                                                    <input class="form-control" placeholder="" name="stud_fam_empname[]" required>
                                                </div>
                                                <div class="col-md-8">
                                                    <label>Employer's Address:</label>
                                                    <input class="form-control" placeholder="" name="stud_fam_empadd[]" required>
                                                </div>
                                                <div class="col-md-1">
                                                   <div class="form-group">
                                                       <button type="button" class="btn btn-danger btnRemove" style="margin-top: 5px;"><i class="fa fa-times"></i></button>
                                                   </div>
                                               </div>
                                                 <div id="SPACER" class="row" style="margin: 10px"></div>
                                                <br>
                                                
                                              </div>
                                           </div>
                                       </div>
                                       <div class="col-md-12" style="margin-top: 20px; margin-right: 30px">
                                           <div class="panel" style="padding: 1px; background-color: #6e6e6e"></div>
                                           <div style="overflow:auto;">
                                             <div style="float:right;">
                                                <button class="btn btn-success" type="submit" name="add_fam_rec" style="margin-top: 4px">
                                                        <i class="fa fa-save"></i>
                                                        Save Record
                                                </button>
                                                &nbsp;&nbsp;&nbsp;
                                                 <button class="btn btn-danger" type="submit" data-dismiss="modal" style="margin-top: 4px">
                                                        <i class="fa fa-times"></i>
                                                        Cancel
                                                </button>
                                             </div>
                                           </div>
                                       </div>

                                   </form>  
                               </td> 
                           </tr>
                       </table>
                   </div>
                </div>
                <!--END-->
             </div>
         </div>
    </div>
</div>

