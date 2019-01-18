<div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="add_educ_rec_done" class="modal fade">
     <div class="modal-dialog" style="width: 1000px; ">
         <div class="modal-content" >
             <div class="modal-header" style="background-color: #00acc1">
                 <h5 class="modal-title" style="font-size: 25px; color: white; text-align: center ">Setup Education and Schooling Details
                 <div class="panel" style="padding: 1px; margin-top: 1px; background-color: white"></div>
             </div>
             <div class="modal-body" style="height:auto;"> 
                <!-- START --> 
                <div class="panel-body">
                   <div class="adv-table">
                       <table class="display table table-bordered table-striped">                                
                           <tr>
                               <td>                          
                                   <form action="../functionalities/manage_education_record.php" method="POST">
                                       <div class="form-content">
                                            <input type="hidden" name="stud_ID" value="<?php echo $ID;?>">
                                            <input type="hidden" name="stud_no" value="<?php echo $stud_no;?>">
                                            <div class="row" style="margin: 4px">
                                               <div class="col-md-12" style="margin-top: 20px">
                                                       <button type="button" id="btnAdd" class="btn btn-success">      
                                                       <i class="fa fa-plus"></i>
                                                       Add Schooling Details                                                         
                                                       </button>
                                               </div>
                                           </div>
                                           <div class="row group">
                                               <div class="col-md-12" style="margin-left: 10px">        
                                                   <div id="SPACER" class="row" style="margin: 10px"></div>
                                                   <div class="panel" style="padding: 1px; background-color: navy; width: 98%"></div>
                                                   <label style="font-size: 18px; margin: 10px">Enter Schooling Details</label>
                                                   <br>
                                                   <div class="col-md-6">
                                                       <label>School Name:</label>
                                                       <input class="form-control" placeholder="" name="stud_educ_schname[]" required>
                                                   </div>
                                                    <div class="col-md-6">
                                                       <label>School Address:</label>
                                                       <input class="form-control" placeholder="" name="stud_educ_schadd[]" required>
                                                   </div>
                                                   <div id="SPACER" class="row" style="margin: 10px"></div>
                                                     <div class="col-md-4">
                                                        <label>Level of Education:</label>
                                                         <select class="form-control" name="stud_educ_level[]">
                                                            <option value="">-- Select Level --</option>
                                                            <option value="Primary">Primary</option>
                                                            <option value="Secondary">Secondary</option>
                                                            <option value="Tertiary">Tertiary</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <label>School Type:</label>
                                                        <select class="form-control" name="stud_educ_schtype[]">
                                                           <option value="">-- Select School Type --</option>
                                                           <option value="Public">Public</option>
                                                           <option value="Private">Private</option>
                                                       </select>
                                                   </div>
                                                    <div class="col-md-4">
                                                       <label>Year Graduated:</label>
                                                       <input class="form-control" placeholder="" name="stud_educ_yrgrad[]" required>
                                                   </div>
                                                   <div id="SPACER" class="row" style="margin: 10px"></div>     
                                                  <!--   <div class="col-md-11">
                                                       <label>Honors/Awards Received:</label>
                                                       <input type="text" class="form-control" placeholder="Put 'N/A' if None or Put ';' if many." name="stud_educ_awards[]">
                                                    </div> -->
                                                    <div class="col-md-1">
                                                       <div class="form-group">
                                                           <button type="button" class="btn btn-danger btnRemove" style="margin-top: 23px;"><i class="fa fa-times"></i></button>
                                                       </div>
                                                   </div>                                 
                                               </div>
                                            </div>
                                       </div>
                                       <div class="col-md-12" style="margin-top: 20px; margin-right: 30px">
                                           <div class="panel" style="padding: 1px; background-color: #6e6e6e"></div>
                                           <div style="overflow:auto;">
                                             <div style="float:right;">
                                               <button type="submit" class="btn btn-primary" name="add_educ_rec_done" style="margin:5px">
                                                <i class="fa fa-external-link"></i>&nbsp;Submit</button>
                                                <button class="btn btn-danger" data-dismiss="modal" style="margin:5px">
                                                <i class="fa fa-times"></i>&nbsp;Cancel</button>
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

 <script src="../../../resources-web/custom/advanced-form.js"></script>
 <script src="../../../resources-web/custom/jquery.multifield.min.js"></script> 
 <script>

        $('.form-content').multifield({
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

</script>