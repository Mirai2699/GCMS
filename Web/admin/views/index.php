<?php
     include ("../utilities/Header.php");
     include ("../utilities/navibar.php");
     include ("../utilities/BaseJs.php");
?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--Layer 1-->
            <div class="col-md-12" style="background-color: #80cbc4; margin-bottom: 10px">
                <label style="margin:5px; font-size: 15px; color: white">Accounts Management Overview</label>
                <div class="panel" style="padding: 1px; background-color: white"></div>
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon orange"><i class="fa fa-users"></i></span>
                            <div class="mini-stat-info">
                                <span>
                                <?php
                                    $sql="SELECT * FROM t_accounts";
                                    if ($result=mysqli_query($connection,$sql))
                                      {
                                      // Return the number of rows in result set
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                      }
                                ?>
                                </span>
                                Total Number of Registered Accounts
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon tar"><i class="fa fa-code-fork"></i></span>
                            <div class="mini-stat-info">
                                <span>
                                <?php
                                    $sql="SELECT * FROM r_user_role";
                                    if ($result=mysqli_query($connection,$sql))
                                      {
                                      // Return the number of rows in result set
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                      }
                                ?>
                                </span>
                                Total Number of User Types
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon pink"><i class="fa fa-key"></i></span>
                            <div class="mini-stat-info">
                                <span>
                                <?php
                                    $sql="SELECT * FROM t_accounts WHERE acc_active_flag = 'Active'";
                                    if ($result=mysqli_query($connection,$sql))
                                      {
                                      // Return the number of rows in result set
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                      }
                                ?>
                                </span>
                                Total Number of Active Accounts
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon green"><i class="fa fa-lock"></i></span>
                            <div class="mini-stat-info">
                                <span>
                                <?php
                                    $sql="SELECT * FROM t_accounts WHERE acc_active_flag = 'Diasbled'";
                                    if ($result=mysqli_query($connection,$sql))
                                      {
                                      // Return the number of rows in result set
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                      }
                                ?>
                                </span>
                                Total Number of Disabled Accounts
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <!--Layer 2-->
            <div class="col-md-12" style="background-color: #66bb6a ; margin-bottom: 10px">
                <label style="margin:5px; font-size: 15px; color: white">User Logs Count</label>
                <div class="panel" style="padding: 1px; background-color: white"></div>
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon orange"><i class="fa fa-list-alt"></i></span>
                            <div class="mini-stat-info">
                                <span>
                                <?php
                                    $sql="SELECT * FROM r_courses";
                                    if ($result=mysqli_query($connection,$sql))
                                      {
                                      // Return the number of rows in result set
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                      }
                                ?>
                                </span>
                                Total Number of Registered Courses
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon tar"><i class="fa fa-comments"></i></span>
                            <div class="mini-stat-info">
                                <span>
                                <?php
                                    $sql="SELECT * FROM r_counsel_type";
                                      {
                                      // Return the number of rows in result set
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                      }
                                ?>
                                </span>
                                Total Number of Counseling Types 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon pink"><i class="fa fa-sign-in"></i></span>
                            <div class="mini-stat-info">
                                <span>
                                <?php
                                    $sql="SELECT * FROM r_visit_type";
                                    if ($result=mysqli_query($connection,$sql))
                                      {
                                      // Return the number of rows in result set
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                      }
                                ?>
                                </span>
                               Total Number of Visitation Types
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon green"><i class="fa fa-folder-open"></i></span>
                            <div class="mini-stat-info">
                                <span>
                                <?php
                                    $sql="SELECT * FROM r_document_type";
                                    if ($result=mysqli_query($connection,$sql))
                                      {
                                      // Return the number of rows in result set
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                      }
                                ?>
                                </span>
                                Total Number of Document Types
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Layer 3-->
            <div class="col-md-12" style="background-color: gray; margin-bottom: 10px">
                <label style="margin:5px; font-size: 15px; color: white">User Logs Count</label>
                <div class="panel" style="padding: 1px; background-color: white"></div>
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon orange"><i class="fa fa-book"></i></span>
                            <div class="mini-stat-info">
                                <span>
                                <?php
                                    $sql="SELECT * FROM t_users_log WHERE log_usertype = 1";
                                    if ($result=mysqli_query($connection,$sql))
                                      {
                                      // Return the number of rows in result set
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                      }
                                ?>
                                </span>
                                Account Log-Ins for 
                                <br>Administrator
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon tar"><i class="fa fa-book"></i></span>
                            <div class="mini-stat-info">
                                <span>
                                <?php
                                    $sql="SELECT * FROM t_users_log WHERE log_usertype = 2";
                                    if ($result=mysqli_query($connection,$sql))
                                      {
                                      // Return the number of rows in result set
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                      }
                                ?>
                                </span>
                                Account Log-Ins for 
                                <br>Guidance Counselor
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon pink"><i class="fa fa-book"></i></span>
                            <div class="mini-stat-info">
                                <span>
                                <?php
                                    $sql="SELECT * FROM t_users_log WHERE log_usertype = 3";
                                    if ($result=mysqli_query($connection,$sql))
                                      {
                                      // Return the number of rows in result set
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                      }
                                ?>
                                </span>
                                Account Log-Ins for 
                                <br>Student Assistant
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon green"><i class="fa fa-book"></i></span>
                            <div class="mini-stat-info">
                                <span>
                                <?php
                                    $sql="SELECT * FROM t_users_log WHERE log_usertype = 4";
                                    if ($result=mysqli_query($connection,$sql))
                                      {
                                      // Return the number of rows in result set
                                      $rowcount=mysqli_num_rows($result);
                                      echo $rowcount;
                                      }
                                ?>
                                </span>
                                Account Log-Ins for 
                                <br>Super-User
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!--END OF DASHBOARD-->
            </div>
        </section>
    </section>
    <!--main content end-->
</section>
<!--END CONTAINER FROM HEADER-->