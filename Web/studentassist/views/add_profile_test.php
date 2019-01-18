<?php
      include ("../../../db_con.php");
     session_start();
        $type = $_SESSION['UserRole'];
        if(!isset($_SESSION['UserName']) && $type!="2"){
          header('Location: 404.html?err=1');
        }

     include ("../utilities/navibar.php");
?>  
    <!--CUSTOM CSS FOR THE PAGE-->
    <link href="../../../resources-web/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../resources-web/css/bootstrap-reset.css" rel="stylesheet">
    <link href="../../../resources-web/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="../../../resources-web/css/jquery.steps.css?1">

    <!-- Custom styles for this template -->
    <link href="../../../resources-web/css/style.css" rel="stylesheet">
    <link href="../../../resources-web/css/style-responsive.css" rel="stylesheet" />


<body>
  <section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
      <!--logo start-->
      <div class="brand">

          <a href="index.html" class="logo">
              <img src="../../../resources-web/images/gcsms/gcsmslogo.png" style="width:80%" alt="">
          </a>
          <div class="sidebar-toggle-box">
              <div class="fa fa-bars"></div>
          </div>
      </div>
      <!--logo end-->

      <div class="top-nav clearfix">
          <!--search & user info start-->
          <ul class="nav pull-right top-menu">
              
              <!-- user login dropdown start-->
              <li class="dropdown" >
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="background-color:#00bfa5;">
                       <?php  
                          include('../../../db_con.php');

                          $sql = "SELECT * FROM t_accounts WHERE acc_username = '".$_SESSION['Logged_In']."'";
                          $result = mysqli_query($connection, $sql);

                          while ($row = mysqli_fetch_array($result)) 
                          {
                          $pic = $row['acc_picture'];

                            if($pic != NULL)
                            {
                               echo '<img src="../../../resources-web/profilepics/'.$pic.'"  alt="">';
                            }
                            else if ($pic == NULL)
                                echo '<img src="../../../resources-web/profilepics/default.png"  alt="">';
                          }
                        ?> 
                      <span class="username"><?php $name = $_SESSION['Logged_In']; echo $name?></span>
                      <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu extended logout">
                      <li><a data-toggle="modal" href="#Change"><i class="fa fa-cog"></i>Change Password</a></li>
                      <li><a data-toggle="modal" href="#logout"><i class="fa fa-key"></i> Log Out</a></li>
                  </ul>
              </li>
              <!-- user login dropdown end -->
          </ul>
          <!--search & user info end-->
      </div>


        <!--LOGOUT-->
        <div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="logout" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <center>
                        <div class="modal-header" style="background-color: maroon">
                            <h4 class="modal-title" style="font-size: 25px; color: white; ">Are You Sure You Want to Logout?</h4>
                        </div>  
                        <div class="modal-body" style="height:90px;">
                            <div class="col-md-12">
                                  <a href="../../../logout.php" class="btn btn-success" style="font-size: 25px">
                                    <i class="fa fa-sign-out"  data-s="25"></i>
                                    Yes
                                  </a>
                                  &nbsp;&nbsp;&nbsp;
                                  <a data-dismiss="modal" class="btn btn-danger" style="font-size: 25px">
                                    <i class="fa fa-times" data-s="25"></i>
                                    No
                                  </a>     
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
        <!--CHANGE PASSWORD-->
        <div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Change" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content" >
                    <div class="modal-header">
                        <h4 class="modal-title" style="font-size: 25px"><i  class="fa fa-key"></i>   Change Password</h4>
                    </div>
                    <div class="modal-body" style="height:350px;">
                        <form role="form" method="POST" action="../functionalities/Pass_func.php">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <?php  
                                     include('../../../db_con.php');

                                      $sql = "SELECT * FROM t_accounts  WHERE acc_username = '".$_SESSION['Logged_In']."'";
                                      $result = mysqli_query($connection, $sql);
                                      while ($row = mysqli_fetch_array($result)) 
                                       { 
                                         $uid = $row['acc_ID'];
                                         $uuser = $row['acc_username'];
                                         $upass = $row['acc_password'];
                                                                        
                                    ?>

                                    <div class="col-md-12">
                                        <input style="color: black;" type="text" name="ID" class="hidden" required="" maxlength="25" value="<?php echo $uid; ?>" />
                                        <div class="col-md-12">
                                           <div class="form-group">
                                                <label style="font-size: 15px">Current Password:</label>
                                                <input style="color: black;" id="oldpassword" type="password" name="OldPass" class="form-control input-frield" required="" value="<?php echo $upass; ?>"disabled/>
                                            </div>
                                        </div>
                                    <?php
                                         }
                                    ?> 
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="font-size: 15px">New Password:</label>
                                            <input style="color: black;" id="password" type="password" name="Pass" class="form-control input-frield" required="" data-toggle="password" maxlength="50" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="font-size: 15px">Confirm Password:</label> 
                                            <input style="color: black;" id="confirmPassword" type="password" name="ConPass" class="form-control" required="" maxlength="50" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="square-red single-row">
                                            <div class="checkbox ">
                                                <input id="check" type="checkbox" onclick="showPass();"  style="background-color: maroon">
                                                <label style="font-size: 15px">Show Password</label> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div style="padding: 1px; margin-bottom: 10px; background-color: gray;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" name="Save"">
                                           <i  class="fa fa-check"></i>   Save
                                        </button>&nbsp&nbsp&nbsp
                                        <button data-dismiss="modal" class="btn btn-default" style="background-color: maroon; color: white" name="cancel" ><i  class="fa fa-times"></i>  Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                 </div>
            </div>


    </header>
    <!--main content start-->
    <section id="main-content" >
       
        <section class="wrapper" style="background-color: white">
            <!--START BREADCRUMS-->
            <div class="row" style="margin-bottom: 15px">
                <div class="col-md-12" style="background-color: #6e6e6e">
                    <ul class="breadcrumbs-alt" style="margin-top: 8px">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a class="current" href="add_profile.php">Add Student Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--END BREADCRUMBS-->
            <!--START CUSTOM CONTENT-->
             <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Basic Wizard
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">

                        <div id="wizard">
                            <h2>First Step</h2>

                            <section>
                                <form class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Full Name</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="Full Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Email Address</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">User Name</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" placeholder="Username">
                                            </div>
                                        </div>
                                    </form>
                            </section>

                            <h2>Second Step</h2>
                            <section>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Phone</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Mobile</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Mobile">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Address</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" cols="60" rows="5"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </section>

                            <h2>Third Step</h2>
                            <section>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Bill Name 1</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Bill Name 2</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Mobile">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Status</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" cols="60" rows="5"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </section>

                            <h2>Final Step</h2>
                            <section>
                                <p>Congratulations This is the Final Step</p>
                            </section>
                        </div>
                    </div>
                </section>
                <section class="panel">
                    <header class="panel-heading">
                        Vertical Wizard
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div id="wizard-vertical">
                            <h2>First Step</h2>
                            <section>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut nulla nunc. Maecenas arcu sem, hendrerit a tempor quis,
                                    sagittis accumsan tellus. In hac habitasse platea dictumst. Donec a semper dui. Nunc eget quam libero. Nam at felis metus.
                                    Nam tellus dolor, tristique ac tempus nec, iaculis quis nisi.</p>
                            </section>

                            <h2>Second Step</h2>
                            <section>
                                <p>Donec mi sapien, hendrerit nec egestas a, rutrum vitae dolor. Nullam venenatis diam ac ligula elementum pellentesque.
                                    In lobortis sollicitudin felis non eleifend. Morbi tristique tellus est, sed tempor elit. Morbi varius, nulla quis condimentum
                                    dictum, nisi elit condimentum magna, nec venenatis urna quam in nisi. Integer hendrerit sapien a diam adipiscing consectetur.
                                    In euismod augue ullamcorper leo dignissim quis elementum arcu porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Vestibulum leo velit, blandit ac tempor nec, ultrices id diam. Donec metus lacus, rhoncus sagittis iaculis nec, malesuada a diam.
                                    Donec non pulvinar urna. Aliquam id velit lacus.</p>
                            </section>

                            <h2>Third Step</h2>
                            <section>
                                <p>Morbi ornare tellus at elit ultrices id dignissim lorem elementum. Sed eget nisl at justo condimentum dapibus. Fusce eros justo,
                                    pellentesque non euismod ac, rutrum sed quam. Ut non mi tortor. Vestibulum eleifend varius ullamcorper. Aliquam erat volutpat.
                                    Donec diam massa, porta vel dictum sit amet, iaculis ac massa. Sed elementum dui commodo lectus sollicitudin in auctor mauris
                                    venenatis.</p>
                            </section>

                            <h2>Forth Step</h2>
                            <section>
                                <p>Quisque at sem turpis, id sagittis diam. Suspendisse malesuada eros posuere mauris vehicula vulputate. Aliquam sed sem tortor.
                                    Quisque sed felis ut mauris feugiat iaculis nec ac lectus. Sed consequat vestibulum purus, imperdiet varius est pellentesque vitae.
                                    Suspendisse consequat cursus eros, vitae tempus enim euismod non. Nullam ut commodo tortor.</p>
                            </section>
                        </div>
                    </div>
                </section>
            </div>
        </div>
            <!--END CUSTOM CONTENT-->
        </section>
    </section>
    <!--main content end-->
</section>
<!--END CONTAINER FROM HEADER-->

<!-- CUSTOM RESOURCES-->
<script src="../../../resources-web/js/jquery.js"></script>
<script src="../../../resources-web/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="../../../resources-web/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../../../resources-web/js/jquery.scrollTo.min.js"></script>>
<script src="../../../resources-web/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="../../../resources-web/js/jquery.nicescroll.js"></script>

<script src="../../../resources-web/js/jquery-steps/jquery.steps.js"></script>
<!--Easy Pie Chart-->
<script src="../../../resources-web/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="../../../resources-web/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="../../../resources-web/js/flot-chart/jquery.flot.js"></script>
<script src="../../../resources-web/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="../../../resources-web/js/flot-chart/jquery.flot.resize.js"></script>
<script src="../../../resources-web/js/flot-chart/jquery.flot.pie.resize.js"></script>


<!--common script init for all pages-->
<script src="../../../resources-web/js/scripts.js"></script>

<script>
    $(function ()
    {
        $("#wizard").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft"
        });

        $("#wizard-vertical").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            stepsOrientation: "vertical"
        });
    });


</script>