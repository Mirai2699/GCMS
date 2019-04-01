<?php 
     include ("../../../db_con.php");
     session_start();
        $type = $_SESSION['UserRole'];
        if(!isset($_SESSION['UserName']) && $type!="1"){
          header('Location: 404.html?err=1');
        }
   
?> 
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>GCMS</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="../../../resources-web/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../resources-web/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="../../../resources-web/css/bootstrap-reset.css" rel="stylesheet">
    <link href="../../../resources-web/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../../resources-web/js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="../../../resources-web/css/clndr.css" rel="stylesheet">
    <!--clock css-->
    <link href="../../../resources-web/js/css3clock/css/style.css" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="../../../resources-web/js/morris-chart/morris.css">
    <!-- Custom styles for this template -->
    <link href="../../../resources-web/css/style.css" rel="stylesheet">
    <link href="../../../resources-web/css/style-responsive.css" rel="stylesheet"/>
    <link href="../../../resources-web/images/gcsms/puplogo.png" rel="icon"/>
</head>

<!--header start-->
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


      <!--  notification end 
      <div class="nav notify-row" id="top_menu">
          <ul class="nav top-menu">
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                      <i class="fa fa-tasks"></i>
                      <span class="badge bg-success">8</span>
                  </a>
                  <ul class="dropdown-menu extended tasks-bar">
                      <li>
                          <p class="">You have 8 pending tasks</p>
                      </li>
                      <li>
                          <a href="#">
                              <div class="task-info clearfix">
                                  <div class="desc pull-left">
                                      <h5>Target Sell</h5>
                                      <p>25% , Deadline  12 June’13</p>
                                  </div>
                                          <span class="notification-pie-chart pull-right" data-percent="45">
                                  <span class="percent"></span>
                                  </span>
                              </div>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <div class="task-info clearfix">
                                  <div class="desc pull-left">
                                      <h5>Product Delivery</h5>
                                      <p>45% , Deadline  12 June’13</p>
                                  </div>
                                          <span class="notification-pie-chart pull-right" data-percent="78">
                                  <span class="percent"></span>
                                  </span>
                              </div>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <div class="task-info clearfix">
                                  <div class="desc pull-left">
                                      <h5>Payment collection</h5>
                                      <p>87% , Deadline  12 June’13</p>
                                  </div>
                                          <span class="notification-pie-chart pull-right" data-percent="60">
                                  <span class="percent"></span>
                                  </span>
                              </div>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <div class="task-info clearfix">
                                  <div class="desc pull-left">
                                      <h5>Target Sell</h5>
                                      <p>33% , Deadline  12 June’13</p>
                                  </div>
                                          <span class="notification-pie-chart pull-right" data-percent="90">
                                  <span class="percent"></span>
                                  </span>
                              </div>
                          </a>
                      </li>

                      <li class="external">
                          <a href="#">See All Tasks</a>
                      </li>
                  </ul>
              </li>
              <li id="header_inbox_bar" class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-important">4</span>
                  </a>
                  <ul class="dropdown-menu extended inbox">
                      <li>
                          <p class="red">You have 4 Mails</p>
                      </li>
                      <li>
                          <a href="#">
                              <span class="photo"><img alt="avatar" src="images/avatar-mini.jpg"></span>
                                      <span class="subject">
                                      <span class="from">Jonathan Smith</span>
                                      <span class="time">Just now</span>
                                      </span>
                                      <span class="message">
                                          Hello, this is an example msg.
                                      </span>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <span class="photo"><img alt="avatar" src="images/avatar-mini-2.jpg"></span>
                                      <span class="subject">
                                      <span class="from">Jane Doe</span>
                                      <span class="time">2 min ago</span>
                                      </span>
                                      <span class="message">
                                          Nice admin template
                                      </span>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <span class="photo"><img alt="avatar" src="images/avatar-mini-3.jpg"></span>
                                      <span class="subject">
                                      <span class="from">Tasi sam</span>
                                      <span class="time">2 days ago</span>
                                      </span>
                                      <span class="message">
                                          This is an example msg.
                                      </span>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <span class="photo"><img alt="avatar" src="images/avatar-mini.jpg"></span>
                                      <span class="subject">
                                      <span class="from">Mr. Perfect</span>
                                      <span class="time">2 hour ago</span>
                                      </span>
                                      <span class="message">
                                          Hi there, its a test
                                      </span>
                          </a>
                      </li>
                      <li>
                          <a href="#">See all messages</a>
                      </li>
                  </ul>
              </li>
              <li id="header_notification_bar" class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                      <i class="fa fa-bell-o"></i>
                      <span class="badge bg-warning">3</span>
                  </a>
                  <ul class="dropdown-menu extended notification">
                      <li>
                          <p>Notifications</p>
                      </li>
                      <li>
                          <div class="alert alert-info clearfix">
                              <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                              <div class="noti-info">
                                  <a href="#"> Server #1 overloaded.</a>
                              </div>
                          </div>
                      </li>
                      <li>
                          <div class="alert alert-danger clearfix">
                              <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                              <div class="noti-info">
                                  <a href="#"> Server #2 overloaded.</a>
                              </div>
                          </div>
                      </li>
                      <li>
                          <div class="alert alert-success clearfix">
                              <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                              <div class="noti-info">
                                  <a href="#"> Server #3 overloaded.</a>
                              </div>
                          </div>
                      </li>

                  </ul>
              </li>
          </ul>
      </div>
      <!--  notification end -->

      <div class="top-nav clearfix">
          <!--search & user info start-->
          <ul class="nav pull-right top-menu">
              
              <!-- user login dropdown start-->
              <li class="dropdown" >
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="background-color:#4db6ac;">
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
        <!--Show Password-->
    <script type="text/javascript">
    function showPass()
    {
      var pass = document.getElementById('password');
      var oldpass = document.getElementById('oldpassword');
      var confpass = document.getElementById('confirmPassword');
      if(document.getElementById('check').checked)
      {
        pass.setAttribute('type','text');
        oldpass.setAttribute('type','text');
        confpass.setAttribute('type','text');
      }
      else
      {
        pass.setAttribute('type','password');
        oldpass.setAttribute('type','password');
        confpass.setAttribute('type','password');
      }  
    }    
    </script>
    <!--Password Validation-->
    <script type="text/javascript">
        var password = document.getElementById("password")
       ,confirmPassword = document.getElementById("confirmPassword");

        function validatePassword()
        {
          if(password.value != confirmPassword.value) 
          {
            confirmPassword.setCustomValidity("Passwords Don't Match");
            $('#myform').on('submit', function(ev) 
            {
                $('#myModal').modal('show');
            });

          } else 
          {
            confirmPassword.setCustomValidity(''); 
          }
        }

        password.onchange = validatePassword;
        confirmPassword.onkeyup = validatePassword;
    </script>