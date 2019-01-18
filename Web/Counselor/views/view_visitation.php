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
                            <a class="current" href="view_visitation.php">Visitation Logs</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--END BREADCRUMBS-->
            <!--START CUSTOM CONTENT-->
            <!--START TABLE-->
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading" style="background-color:gray ;color: white">
                          View Visitation Logs
                        </header>
                        <div class="panel-body">
                            <div class="adv-table">
                                <table  class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                    <tr>
                                        <th style="display: none">Stud Visit ID</th>
                                        <th>Visit Code</th>
                                        <th>Student Number</th>
                                        <th>Student Name</th>
                                        <th>Appointment Type</th>
                                        <th>Visit Type</th>
                                        <th>Date Visited</th>
                                        <th>Time of Visit</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT * FROM `t_stud_visitation` AS SV 
                                                                                INNER JOIN `t_stud_profile` AS SP 
                                                                                INNER JOIN `r_appointment_type` AS APP 
                                                                                INNER JOIN `r_visit_type` AS VT
                                                                                ON SV.vs_stud_no = SP.stud_number and
                                                                                   SV.vs_app_type = APP.app_ID and
                                                                                   SV.vs_visit_type = VT.vt_ID
                                                                                ORDER BY SV.vs_code desc");
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
                                            <td width=""><?php echo $vs_code; ?></td>
                                            <td width=""><?php echo $vs_stud_no; ?></td>
                                            <td width=""><?php echo $name; ?></td>
                                            <td width=""><?php echo $app_desc; ?></td>
                                            <td width=""><?php echo $visit_desc; ?></td>
                                            <td width=""><?php echo $vs_datein; ?></td>
                                            <td width=""><?php echo $vs_timein; ?></td>
                                            <td style='width:12%'>
                                                <center>
                                                    <a data-toggle="modal" href="#view<?php echo $ID?>" class="btn btn-success">
                                                            <i class="fa fa-eye" data-size="16" title="View Details"></i>
                                                            View Details
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
            <?php include("get_view_modal_visitation_details.php"); ?>
            <!--END CUSTOM CONTENT-->
        </section>
    </section>
    <!--main content end-->
</section>
<!--END CONTAINER FROM HEADER-->