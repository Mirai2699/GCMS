<div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="add_personal_rec" class="modal fade">
     <div class="modal-dialog" style="width: 1000px">
         <div class="modal-content" >
             <div class="modal-header" style="background-color: #00acc1">
                 <h5 class="modal-title" style="font-size: 25px; color: white; text-align: center ">Setup Personal Infomation Details
                 <div class="panel" style="padding: 1px; margin-top: 1px; background-color: white"></div>
             </div>
             <div class="modal-body" style="height:690px;"> 
             <!--START FORM-->                              
                <form method="POST" action="../functionalities/manage_personal_record.php">
                  <input type="hidden" name="stud_ID" value="<?php echo $ID;?>">
                  <input type="hidden" name="stud_no" value="<?php echo $stud_no;?>">
                  <div class="col-md-12">
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
                         <div class="col-md-12" style="text-align:right; ">
                                 <div id="SPACER" class="row" style="margin: 10px"></div>
                                 <div class="row" style="background-color: #6e6e6e; padding: 1px"></div>
                                 <button class="btn btn-success" type="submit" name="add_per_rec" style="margin-top: 4px">
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
                  <!--END FORM-->  
                </form> 
             </div>
         </div>
    </div>
</div>