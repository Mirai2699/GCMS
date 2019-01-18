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
                            <a class="current" href="accounts.php">Accounts Management</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--END BREADCRUMBS-->
            
            <!--START CUSTOM CONTENT-->
            
            <!--START INSERT CONTENT-->
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading" style="background-color:#4db6ac;color: white">
                           Add an Account
                        </header>
                        <div class="panel-body">
                            <form role="form" action="../functionalities/insert_func.php" method="POST">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" style="color: black" name="acc_username" placeholder="Enter Username" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input id="acc_password" type="password" class="form-control" style="color: black" name="acc_password" placeholder="Enter Password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>User Role</label>
                                         <select name="acc_usr" class="form-control" style="color: black;">
                                            <option value="" selected disabled></option>
                                            <?php  
                                                $sqlemp = "SELECT * FROM `r_user_role`";
                                                $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                  while($row = mysqli_fetch_assoc($results))
                                                  {
                                                    $usr_ID = $row['usr_ID'];
                                                    $usr_desc = $row['usr_desc'];
                                            ?>
                                            <option value="<?php echo $usr_ID ?>"><?php echo $usr_desc; ?></option>
                                            <?php } ?>
                                         </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input id="acc_conpassword" type="password" class="form-control" style="color: black" name="acc_conpass" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Profile Picture <small><i>(Optional)</i></small></label>
                                        <input type="file" class="form-control" style="color: black" name="acc_profilepic" placeholder="Select Profile Picture (Optional)">
                                    </div>
                                </div>
                                <div class="col-md-4" style="text-align: right">
                                    <div class="checkbox">
                                        <div class="checkbox ">
                                            <input id="checked" type="checkbox" onclick="showAccPassword();"  style="background-color: maroon;margin-top: 23px"><label style="margin-top: 21px">Show Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2" style="text-align: right">
                                        <button type="submit" class="btn btn-info" name="add_account" style="margin-top: 23px">
                                                <i class="fa fa-save"></i>
                                                Save Account
                                        </button>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!--END INSERT CONTENT-->

            <!--START TABLE-->
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading" style="background-color:gray ;color: white">
                           Manage Accounts
                        </header>
                        <div class="panel-body">
                            <div class="adv-table">
                                <table  class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                    <tr>
                                        <th style="display: none">acadyear ID</th>
                                        <th>Account Username</th>
                                        <th>Account User Role</th>
                                        <th>Date Last Modified</th>
                                        <th>Status</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT * FROM `t_accounts` AS ACC INNER JOIN `r_user_role` AS USR ON                                    ACC.acc_user_role = USR.usr_ID");
                                        while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $ID = $row["acc_ID"];
                                            $acc_username = $row["acc_username"];
                                            $acc_password = $row["acc_password"];
                                            $acc_user_role = $row["acc_user_role"];
                                            $acc_role = $row["usr_desc"];
                                            $acc_picture = $row["acc_picture"];
                                            $acc_mod_date = $row["acc_mod_date"];
                                            $acc_active_flag = $row["acc_active_flag"];
                                                        
                                    ?>      
                                        <tr class="gradeX">
                                            <td style="display: none"><?php echo $ID; ?></td>
                                            <td width=""><?php echo $acc_username ?></td>
                                            <td width=""><?php echo $acc_role; ?></td>
                                             <td width=""><?php echo $acc_mod_date; ?></td>
                                            <td width=""><?php echo $acc_active_flag; ?></td>
                                            <td style='width:12%'>
                                                <center>
                                                    <a data-toggle="modal" href="#edit<?php echo $ID?>" class="btn btn-warning">
                                                            <i class="fa fa-edit" data-size="16" title="Modify Details"></i>
                                                    </a>   
                                                    <a data-toggle="modal" href="#delete<?php echo $ID?>" class="btn btn-danger">
                                                            <i class="fa fa-power-off" data-size="16" title="Toggle Status"></i>
                                                                                     
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

            <!--START MODALS-->
            <?php
                $view_query = mysqli_query($connection,"SELECT * FROM `t_accounts` AS ACC INNER JOIN `r_user_role` AS USR ON                                    ACC.acc_user_role = USR.usr_ID");
                while($row = mysqli_fetch_assoc($view_query))
                {
                    $ID = $row["acc_ID"];
                    $acc_username = $row["acc_username"];
                    $acc_password = $row["acc_password"];
                    $acc_user_role = $row["acc_user_role"];
                    $acc_role = $row["usr_desc"];
                    $acc_picture = $row["acc_picture"];
                    $acc_mod_date = $row["acc_mod_date"];
                    $acc_active_flag = $row["acc_active_flag"];
                                                        
            ?>      
                 <!--EDIT-->
                <div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?php echo $ID?>" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <center>
                                <div class="modal-header" style="background-color: goldenrod">
                                    <h5 class="modal-title" style="font-size: 25px; color: white; ">Modify Details 
                                        <i class="livicon" data-name="edit" data-s="35" data-c="white"></i></h5>
                                </div>
                                <div class="modal-body" style="height:280px;">
                                   <form role="form" action="../functionalities/update_func.php" method="POST">
                                        <input type="hidden" name="acc_ID"  value="<?php echo $ID?>">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Change Username</label>
                                                        <input type="text" class="form-control" style="color: black" name="acc_username" placeholder="Enter Username" value="<?php echo $acc_username ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Change Password</label>
                                                        <input id="acc_password" type="password" class="form-control" style="color: black" name="acc_password" placeholder="Enter Password" value="<?php echo $acc_password ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>User Role</label>
                                                         <select name="acc_usr" class="form-control" style="color: black;">
                                                            <option value="<?php echo $acc_user_role?>" selected disabled><?php echo $acc_role?></option>
                                                            <?php  
                                                                $sqlemp = "SELECT * FROM `r_user_role`";
                                                                $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                                  while($row = mysqli_fetch_assoc($results))
                                                                  {
                                                                    $usr_ID = $row['usr_ID'];
                                                                    $usr_desc = $row['usr_desc'];
                                                            ?>
                                                            <option value="<?php echo $usr_ID ?>"><?php echo $usr_desc; ?></option>
                                                            <?php } ?>
                                                         </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Confirm New Password</label>
                                                        <input id="acc_conpassword" type="password" class="form-control" style="color: black" name="acc_conpass" placeholder="Confirm Password" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Change Account Profile Picture <small><i>(Optional)</i></small></label>
                                                        <input type="file" class="form-control" style="color: black" name="acc_profilepic" placeholder="Select Profile Picture (Optional)">
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="text-align: center">
                                                    <button type="submit" class="btn btn-info" name="edit_account" style="margin-top: 4px">
                                                        <i class="fa fa-save"></i>
                                                        Save
                                                    </button>
                                                    <button class="btn btn-danger" data-dismiss="modal" style="margin-top: 4px">
                                                        <i class="fa fa-times"></i>
                                                        Cancel
                                                    </button>
                                                </div>
                                    </form>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <!--DELETE-->
                <div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="delete<?php echo $ID?>" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content" >
                            <center>
                                <div class="modal-header" style="background-color: maroon">
                                    <h5 class="modal-title" style="font-size: 25px; color: white; ">Are you sure you want to change its status?</h5>
                                </div>
                                <div class="modal-body" style="height:235px;">
                                    <p style="font-size: 15px">Changing the status of this account will affect its right of access.</p>
                                    <p style="font-size: 15px">Active status will allow the user of this account to use and access the system; while disabling it will not allow the user to use and access the system</p>
                                    <p style="font-size: 15px">Are you sure you want to proceed?</p>
                                    <form action="../functionalities/archive_func.php" method="POST">
                                        <input type="hidden" name="acc_ID" value="<?php echo $ID?>" />
                                        <div class="col-md-12">
                                               <select name="acc_status" class="form-control" style="color: black; width: 50%">
                                                   <option value="Active">Active</option>
                                                   <option value="Disabled">Disable</option>
                                               </select>
                                               <br>
                                              <button type="submit" name="arch_acc" class="btn btn-success" style="font-size: 18px">
                                                <i class="fa fa-check" data-s="14" data-c="white"></i>
                                                Confirm
                                              </button>
                                              &nbsp;&nbsp;&nbsp;
                                              <a data-dismiss="modal" class="btn btn-danger" style="font-size: 18px">
                                                <i class="fa fa-close" data-s="14" data-c="white"></i>
                                                Cancel
                                              </a>     
                                        </div>
                                    </form>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                 <?php } ?>
            <!--END MODALS--> 
            

            <!--END CUSTOM CONTENT-->
        </section>
    </section>
    <!--main content end-->
</section>
<!--END CONTAINER FROM HEADER-->


<!--START ON PAGE SCRIPT-->

    <!--Show Password-->
        <script type="text/javascript">
        function showAccPassword()
        {
          var pass = document.getElementById('acc_password');
          var confpass = document.getElementById('acc_conpassword');
          if(document.getElementById('checked').checked)
          {
            pass.setAttribute('type','text');
            confpass.setAttribute('type','text');
          }
          else
          {
            pass.setAttribute('type','password');
            confpass.setAttribute('type','password');
          }  
        }    
        </script>

    <!--Password Validation-->

        <script type="text/javascript">
            var password = document.getElementById("acc_password")
           ,confirmPassword = document.getElementById("acc_conpassword");

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
        
<!--END OF ON PAGE SCRIPT-->
