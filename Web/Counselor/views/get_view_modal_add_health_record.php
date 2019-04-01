<div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="add_health_rec" class="modal fade">
     <div class="modal-dialog" style="width: 1000px">
         <div class="modal-content" >
             <div class="modal-header" style="background-color: #00acc1">
                 <h5 class="modal-title" style="font-size: 25px; color: white; text-align: center ">Setup Health Information Details
                 <div class="panel" style="padding: 1px; margin-top: 1px; background-color: white"></div>
             </div>
             <div class="modal-body" style="height:315px;"> 
             <!--START FORM-->                              
                <form method="POST" action="../functionalities/manage_health_record.php">
                  <input type="hidden" name="stud_ID" value="<?php echo $stud_ID;?>">
                  <input type="hidden" name="stud_no" value="<?php echo $stud_no;?>">
                  <div class="col-md-12">
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
                        <div class="col-md-12" style="text-align:right; ">
                                <div id="SPACER" class="row" style="margin: 10px"></div>
                                <div class="row" style="background-color: #6e6e6e; padding: 1px"></div>
                                <button class="btn btn-success" type="submit" name="add_health_rec" style="margin-top: 4px">
                                        <i class="fa fa-save"></i>
                                        Save Record
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                 <button class="btn btn-danger" type="submit" data-dismiss="modal" style="margin-top: 4px">
                                        <i class="fa fa-times"></i>
                                        Cancel
                                </button>
                        </div>
                         <div id="SPACER" class="row" style="margin: 10px"></div>
                  </div>
                  <!--END FORM-->  
                </form> 
             </div>
         </div>
    </div>
</div>

<!-- Physical Health Record Only-->
<div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="add_psy_health_rec_only" class="modal fade">
     <div class="modal-dialog" style="width: 1000px">
         <div class="modal-content" >
             <div class="modal-header" style="background-color: #00acc1">
                 <h5 class="modal-title" style="font-size: 25px; color: white; text-align: center ">Setup Health Information Details
                 <div class="panel" style="padding: 1px; margin-top: 1px; background-color: white"></div>
             </div>
             <div class="modal-body" style="height:200px;"> 
             <!--START FORM-->                              
                <form method="POST" action="../functionalities/manage_health_record.php">
                  <input type="hidden" name="stud_ID" value="<?php echo $stud_ID;?>">
                  <input type="hidden" name="stud_no" value="<?php echo $stud_no;?>">
                  <div class="col-md-12">
                        <label style="font-size: 20px">Add Psychological Health Consultation Record</label>
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
                        <div class="col-md-12" style="text-align:right; ">
                                <div id="SPACER" class="row" style="margin: 10px"></div>
                                <div class="row" style="background-color: #6e6e6e; padding: 1px"></div>
                                <button class="btn btn-success" type="submit" name="add_psy_health_only" style="margin-top: 4px">
                                        <i class="fa fa-save"></i>
                                        Save Record
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                 <button class="btn btn-danger" type="submit" data-dismiss="modal" style="margin-top: 4px">
                                        <i class="fa fa-times"></i>
                                        Cancel
                                </button>
                        </div>
                         <div id="SPACER" class="row" style="margin: 10px"></div>
                  </div>
                  <!--END FORM-->  
                </form> 
             </div>
         </div>
    </div>
</div>

<!-- Physical Health Record Only-->
<div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="add_phy_health_rec_only" class="modal fade">
     <div class="modal-dialog" style="width: 1000px">
         <div class="modal-content" >
             <div class="modal-header" style="background-color: #00acc1">
                 <h5 class="modal-title" style="font-size: 25px; color: white; text-align: center ">Setup Health Information Details
                 <div class="panel" style="padding: 1px; margin-top: 1px; background-color: white"></div>
             </div>
             <div class="modal-body" style="height:200px;"> 
             <!--START FORM-->                              
                <form method="POST" action="../functionalities/manage_health_record.php">
                  <input type="hidden" name="stud_ID" value="<?php echo $stud_ID;?>">
                  <input type="hidden" name="stud_no" value="<?php echo $stud_no;?>">
                  <div class="col-md-12">
                        <label style="font-size: 20px">Add Physical Health Consultation Record</label>
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
                        <div class="col-md-12" style="text-align:right; ">
                                <div id="SPACER" class="row" style="margin: 10px"></div>
                                <div class="row" style="background-color: #6e6e6e; padding: 1px"></div>
                                <button class="btn btn-success" type="submit" name="add_phy_health_only" style="margin-top: 4px">
                                        <i class="fa fa-save"></i>
                                        Save Record
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                 <button class="btn btn-danger" type="submit" data-dismiss="modal" style="margin-top: 4px">
                                        <i class="fa fa-times"></i>
                                        Cancel
                                </button>
                        </div>
                         <div id="SPACER" class="row" style="margin: 10px"></div>
                  </div>
                  <!--END FORM-->  
                </form> 
             </div>
         </div>
    </div>
</div>