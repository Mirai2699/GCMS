<?php 
  include ("db_con.php");
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>GCSMS | Visitation Log</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="resources-login/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <link href="resources-login/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="resources-login/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
    <link href="resources-login/plugins/animate/animate.min.css" rel="stylesheet" />
    <link href="resources-login/css/default/style.min.css" rel="stylesheet" />
    <link href="resources-login/css/default/style-responsive.min.css" rel="stylesheet" />
    <link href="resources-login/css/default/theme/default.css" rel="stylesheet" id="theme" />
    <link href="resources-web/images/gcsms/puplogo.png" rel="icon"/>
    <!-- ================== END BASE CSS STYLE ================== -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="resources-login/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <!-- end #page-loader -->
    
    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url(resources-login/img/login-bg/login-bg-21.jpg)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>PUPQC</b> Guidance and Counseling Services Management System</h4>
                    <p>
                        Pyschological needs and student records are now optimized by technology through GCSMS.
                    </p>
                </div>
            </div>

            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                
                  <div class="row" style="background-color: teal;">
                    <center>
                    <img src="resources-web/images/gcsms/gcsmslogo.png" style="width:50%; height: 90%; margin: 1%;" alt="">
                    </center>
                  </div>
                  <div class="col-md-12" style="text-align:center">
                      <div class="brand" style="margin-top: 4%">
                          <medium style="font-size: 20px">Guidance and Counseling Office</medium><br>
                          <b style="font-size: 26px">Visitation Log</b>
                      </div>
                  </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <br>
                <div class="col-md-12">
                    <form method="POST">
                        <div class="col-md-12">
                            <label>Student Number</label>
                            <input name="vs_studno" type="text" class="form-control" placeholder="Enter Your Student Number" required />
                        </div>
                        <br>
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
                        <br>
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
                        <div class="col-md-12">
                            <label>Other reason aside from the purpose:</label><br>
                            <small style="font-size: 12px">(You can specify, or site other details; You can leave it blank if none.)</small>
                            <input name="vs_other" type="text" class="form-control" placeholder="Other Details..." />
                        </div>
                        <br>
                        <div class="col" style="margin-bottom: 30px; text-align: center">
                            <button name="visit" type="submit" class="btn btn-success btn-lg">
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
                                       Your Student Number Doesn't Exist!.
                                     </label>
                                   </center>";
                        }
                                            
                      }
                    ?>
                    <div class="col-md-12">
                        <hr>
                        <label>Are you a registered user of the system? click <a href="Login.php">here</a>.</label>
                        <br>
                        <hr>
                        <p class="text-center text-grey-darker">
                            &copy; SRG 7TH Generation All Right Reserved 2019
                        </p>
                      </div>
                </div>

                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
        
      
    </div>
    <!-- end page container -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="resources-login/plugins/jquery/jquery-3.2.1.min.js"></script>
    <script src="resources-login/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="resources-login/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <!--[if lt IE 9]>
        <script src="../assets/crossbrowserjs/html5shiv.js"></script>
        <script src="../assets/crossbrowserjs/respond.min.js"></script>
        <script src="../assets/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <script src="resources-login/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="resources-login/plugins/js-cookie/js.cookie.js"></script>
    <script src="resources-login/js/theme/default.min.js"></script>
    <script src="resources-login/js/apps.min.js"></script>
    <!-- ================== END BASE JS ================== -->

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
</body>
</html>
