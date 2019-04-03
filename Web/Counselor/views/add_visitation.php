<?php
     include ("../utilities/Header.php");
     include ("../utilities/navibar.php");
     include ("../utilities/BaseJs.php");
     include ("../utilities/Tables.php")
?>
    <!--main content start-->
    <section id="main-content">
       
        <section class="wrapper">
            <!--START BREADCRUMS-->
            <div class="row" style="margin-bottom: 15px">
                <div class="col-md-12" style="background-color: #6e6e6e">
                    <ul class="breadcrumbs-alt" style="margin-top: 8px">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a class="current" href="add_visitation.php">Add Visitation Log</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--END BREADCRUMBS-->
            <!--START CUSTOM CONTENT-->
            <!--START TABLE-->
            <div class="row" style="background-color: white">
                <div style="margin:10px">
                    <div class="col-md-5" style="background-color: #e6e6e6; border-radius: 25px">
                        <form method="POST">
                            <br>
                            <div class="col-md-12">
                                <label>Student Number</label>
                                <input name="vs_studno" type="text" class="form-control" placeholder="Enter Student Number" required />
                            </div>
                            <br>
                             <div class="row" style="padding: 10px"></div>
                            <div class="col-md-6">
                                <label>Appointment Type:</label>
                                <select name="vs_appoint" class="form-control" style="color: black;" required>
                                  <option value="" selected disabled></option>
                                  <?php  
                                      $sqlemp = "SELECT * FROM `r_appointment_type`";
                                      $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                        while($row = mysqli_fetch_assoc($results))
                                        {
                                          $app_ID = $row['app_ID'];
                                          $app_desc = $row['app_desc'];
                                  ?>
                                  <option value="<?php echo $app_ID ?>"><?php echo $app_desc; ?></option>
                                  <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Purpose of Visit:</label>
                                <select name="vs_purpose" class="form-control" style="color: black;" required>
                                  <option value="" selected disabled></option>
                                  <?php  
                                      $sqlemp = "SELECT * FROM `r_visit_type`";
                                      $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                        while($row = mysqli_fetch_assoc($results))
                                        {
                                          $vt_ID = $row['vt_ID'];
                                          $vt_desc = $row['vt_desc'];
                                  ?>
                                  <option value="<?php echo $vt_ID ?>"><?php echo $vt_desc; ?></option>
                                  <?php } ?>
                                </select>
                            </div>
                            <br>
                            <div class="row" style="padding: 10px"></div>
                            <div class="col-md-12">
                                <label>Other reason aside from the purpose:</label><br>
                                <small style="font-size: 12px">(You can specify, or site other details; You can leave it blank if none.)</small>
                                <input name="vs_other" type="text" class="form-control" placeholder="Other Details..." />
                            </div>
                            <br>
                            <div class="col-md-12" style="margin-bottom: 30px; margin-top: 10px; text-align: right">
                                <button name="visit" type="submit" class="btn btn-success btn-lg">
                                <i class="fa  fa-location-arrow"></i>
                                Submit Log</button>
                            </div>
                        </form>
                        <?php
                          
                          if(isset($_POST['visit']))
                          {
                            
                            $code_ret = mysqli_query($connection, "SELECT MAX(vs_ID) FROM t_stud_visitation");
                            $getrow = mysqli_fetch_array($code_ret);
                            $lastcode = $getrow[0];
                            $finalcode = $lastcode + 1;

                            $vs_code = 'VS-'.''.$finalcode;
                            $vs_studno = $_POST['vs_studno'];
                            $vs_appoint = $_POST['vs_appoint'];
                            $vs_purpose = $_POST['vs_purpose'];
                            $vs_other = $_POST['vs_other'];
                                              
                            date_default_timezone_set("Asia/Manila"); 
                            $timein = date('H:i:s');
                            $datein = date('Y-m-d');

                            $query = "SELECT * FROM t_stud_profile WHERE stud_number = '$vs_studno' ";
                            $result = mysqli_query($connection,$query) or die(mysqli_error());
                            if(mysqli_num_rows($result) > 0)
                            {  
                                while($row = mysqli_fetch_assoc($result))
                                {
                                  $stud_name = $row['stud_firstname'];
                                }

                               $ins_query = "INSERT INTO t_stud_visitation (vs_code, vs_stud_no, vs_app_type, vs_visit_type, 
                                                                         vs_visit_desc, vs_date_visit, vs_time_visit) 
                                          VALUES('$vs_code', '$vs_studno', '$vs_appoint', '$vs_purpose', '$vs_other', '$datein', '$timein')";
                               mysqli_query($connection,$ins_query); 

                               echo " <center>
                                         <label style='color:darkgreen; font-weight: 10px; font-size: 15px'>
                                           Thank you for visiting us, $stud_name.
                                         </label>
                                      </center>";

                            }
                            else if(mysqli_num_rows($result) == 0)
                            {
                                echo " <center>
                                         <label style='color:darkviolet; font-weight: 10px; font-size: 15px'>
                                           Student Number Doesn't Exist!.
                                         </label>
                                       </center>";
                            }
                                                
                          }
                        ?>
                    </div>

                    <!--SIDE TABLE FOR TODAY-->
                    <div class="col-md-7">
                        <section class="panel">
                            <header class="panel-heading" style="background-color:gray ;color: white">
                              Today's Visitation Logs
                            </header>
                            <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                                        <thead>
                                        <tr>
                                            <th style="display: none">Stud Visit ID</th>
                                            <th>Student Number</th>
                                            <th>Student Name</th>
                                            <th>Appointment Type</th>
                                            <th>Visit Type</th>
                                            <th>Time of Visit</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $datenow = date('Y-m-d');
                                            $view_query = mysqli_query($connection,"SELECT * FROM `t_stud_visitation` AS SV 
                                                                                    INNER JOIN `t_stud_profile` AS SP 
                                                                                    INNER JOIN `r_appointment_type` AS APP 
                                                                                    INNER JOIN `r_visit_type` AS VT
                                                                                    ON SV.vs_stud_no = SP.stud_number and
                                                                                       SV.vs_app_type = APP.app_ID and
                                                                                       SV.vs_visit_type = VT.vt_ID
                                                                                    WHERE SV.vs_date_visit = '$datenow'
                                                                                    ORDER BY SV.vs_code desc ");
                                            while($row = mysqli_fetch_assoc($view_query))
                                            {
                                                $ID = $row["vs_ID"];
                                                $vs_code = $row["vs_code"];
                                                $vs_stud_no = $row["vs_stud_no"];
                                                $stud_lname = $row["stud_lastname"];
                                                $stud_fname = $row["stud_firstname"];
                                                $app_desc = $row["app_desc"];
                                                $visit_desc = $row["vt_desc"];
                                                $vs_desc = $row["vs_visit_desc"];
                                                $vs_datein = $row["vs_date_visit"];
                                                $vs_timein = $row["vs_time_visit"];

                                                $name = $stud_fname.' '.$stud_lname;
                                                
                                                            
                                        ?>      
                                            <tr class="gradeX">
                                                <td style="display: none"><?php echo $ID; ?></td>
                                                <td width=""><?php echo $vs_stud_no; ?></td>
                                                <td width=""><?php echo $name; ?></td>
                                                <td width=""><?php echo $app_desc; ?></td>
                                                <td width=""><?php echo $visit_desc; ?></td>
                                                <td width=""><?php echo $vs_timein; ?></td>
                                                <td style='width:12%'>
                                                    <center>
                                                        <a data-toggle="modal" href="#view<?php echo $ID?>" class="btn btn-primary">
                                                                <i class="fa fa-eye" data-size="16" title="View Details"></i>
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
                <?php include("get_view_modal_visitation_details.php"); ?>
            </div>
            <!--END TABLE-->
            <!--END CUSTOM CONTENT-->
        </section>
    </section>
    <!--main content end-->
</section>
<!--END CONTAINER FROM HEADER-->