

<div class="col-md-12" style="background-color: #616161; margin-bottom:10px; border: 2px solid #ffffff">
  <div class="Panel" style="margin: 10px">
    <label style="color: white; font-size: 15px">Action Available:</label>
    <br>
    <a data-toggle="modal" href="#add_family_rec" class="btn btn-success" name="add_per_rec"><i class="fa fa-plus"></i> Add New Record</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>
</div>

<!--START TABLE-->
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading" style="background-color:goldenrod;color: white">
                  Family Members Individual Information
            </header>
                <div class="panel-body">
                   <div class="adv-table">
                       <table  class="display table table-bordered table-striped">
                           <thead>
                           <tr>
                               <th style="display: none">School_ID</th>
                               <th>Member Type</th>
                               <th>Name</th>
                               <th>Age</th>
                               <th>Status</th>
                               <th>Educational Attainment</th>
                               <th>Occupation</th>
                               <th style="text-align: center">Action</th>
                           </tr>
                           </thead>
                           <tbody>
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
                            <tr class="gradeX">
                                <td style="display: none"><?php echo $ID; ?></td>
                                <td width=""><?php echo $famInf_type; ?></td>
                                <td width=""><?php echo $compname; ?></td>
                                <td width=""><?php echo $famInf_age; ?></td>
                                <td width=""><?php echo $famInf_stat; ?></td>
                                <td width=""><?php echo $famInf_educ_attain; ?></td>
                                <td width=""><?php echo $famInf_occupation; ?></td>
                                <td style='width:12%'>
                                    <center>
                                        <a data-toggle="modal" href="#edit_profile_details<?php echo $ID?>" class="btn btn-warning">
                                                <i class="fa fa-edit" data-size="16" title="Edit"></i>
                                                Edit
                                        </a>     
                                    </center>
                                </td>
                            </tr>  
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<!--END TABLE-->

<!--START MODAL-->
<?php include("get_view_modal_add_family_record.php");?>
<?php include("get_view_modal_modify_family_background.php");?>
<!--END MODAL--> 
