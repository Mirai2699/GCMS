<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>GCSMS | Login</title>
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
                <div class="news-image" style="background-image: url(resources-login/img/login-bg/login-bg-18.jpg)"></div>
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
                <div class="login-header" style="text-align: left">
                    <div class="brand">
                        <small>Polytechnic University of the Philippines<br> Quezon City Branch</small>
                        <b style="font-size: 26px">Guidance and <br/>Counseling Services</b><br/> Management System
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    <form name="loginform" id="loginform" method="POST" class="margin-bottom-0" action="logincode.php">
                        <div class="form-group m-b-15">
                            <input name="username" type="text" class="form-control form-control-lg" placeholder="Username" required />
                        </div>
                        <div class="form-group m-b-15">
                            <input name="password" type="password" class="form-control form-control-lg" placeholder="Password" required />
                        </div>
                       <!--  <div class="checkbox checkbox-css m-b-30">
                            <input type="checkbox" id="remember_me_checkbox" value="" />
                            <label for="remember_me_checkbox">
                                Remember Me
                            </label>
                        </div> -->
                         
                        <div class="login-buttons" style="margin-bottom: 30px">
                            <button name="login" type="submit" class="btn btn-success btn-block btn-lg">Log In</button>
                        </div>
                        <hr>
                        <label>To activate and use the visitation log page, click <a href="visitation_Log.php">here</a>.</label>
                        <br>
                        <hr>
                        <p class="text-center text-grey-darker">
                            &copy; SRG 7TH Generation All Right Reserved 2018
                        </p>
                    </form>
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
