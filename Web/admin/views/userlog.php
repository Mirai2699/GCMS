<?php
     include ("../utilities/Header.php");
     include ("../utilities/navibar.php");
     include ("../utilities/BaseJs.php");
     include ("../utilities/tables.php");
?>
    <!--main content start-->
    <section id="main-content">
       
        <section class="wrapper">
            <!--START BREADCRUMS-->
            <div class="row" style="margin-bottom: 15px">
                <div class="col-md-12" style="background-color: #6e6e6e">
                    <ul class="breadcrumbs-alt" style="margin-top: 8px">
                        <li>
                            <a href="index.php">Dashboard</a>
                        </li>
                        <li>
                            <a class="current" href="userslog.php">View All Users' System Logs</a>
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
                           Users' Logs
                        </header>
                        <div class="panel-body">
                            <div class="adv-table">
                                <table  class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                    <tr>
                                        <th>Log No.</th>
                                        <th>Account Username</th>
                                        <th>Account User Type</th>
                                        <th>Date of Access</th>
                                        <th>Time of Access</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT * FROM `t_users_log` AS LOG 
                                                                                INNER JOIN `t_accounts` AS ACC 
                                                                                INNER JOIN `r_user_role` AS USR 
                                                                                ON LOG.log_userID = ACC.acc_ID and
                                                                                LOG.log_usertype = USR.usr_ID ORDER BY LOG.Log_No DESC");
                                        while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $No = $row["log_No"];
                                            $username = $row["acc_username"];
                                            $userrole = $row["usr_desc"];
                                            $log_date = $row["log_datestamp"];
                                            $log_time = $row["log_timestamp"];
                                            
                                                        
                                    ?>      
                                        <tr class="gradeX">
                                            <td><?php echo $No; ?></td>
                                            <td width=""><?php echo $username ?></td>
                                            <td width=""><?php echo $userrole; ?></td>
                                            <td width=""><?php echo $log_date ?></td>
                                            <td width=""><?php echo $log_time ?></td>
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

            
            

            <!--END CUSTOM CONTENT-->
        </section>
    </section>
    <!--main content end-->
</section>
<!--END CONTAINER FROM HEADER-->


<!--START ON PAGE SCRIPT-->


        
<!--END OF ON PAGE SCRIPT-->
