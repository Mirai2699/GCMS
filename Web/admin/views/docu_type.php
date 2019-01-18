<?php
     include ("../utilities/Header.php");
     include ("../utilities/navibar.php");
     include ("../utilities/BaseJs.php");
     include ("../utilities/Tables.php");
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
                            <a class="current" href="docu_type.php">Setup Document Types</a>
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
                           Add a Document Type
                        </header>
                        <div class="panel-body">
                            <form role="form" action="../functionalities/insert_func.php" method="POST">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Document Type</label>
                                        <input type="text" class="form-control" style="color: black" name="docu_desc" placeholder="Enter Document Type" required>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                        <button type="submit" class="btn btn-info" name="add_docu" style="margin-top: 23px">
                                                <i class="fa fa-save"></i>
                                                Save
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
                           Manage Document Types
                        </header>
                        <div class="panel-body">
                            <div class="adv-table">
                                <table  class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                    <tr>
                                        <th style="display: none">Docu Type ID</th>
                                        <th>Documentation Type Description</th>
                                        <th>Date Last Modified</th>
                                        <th>Status</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT * FROM `r_document_type` where dt_active_flag = 'Active' ");
                                        while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $ID = $row["dt_ID"];
                                            $dt_desc = $row["dt_desc"];
                                            $dt_add_date = $row["dt_add_date"];
                                            $dt_mod_date = $row["dt_mod_date"];
                                            $dt_active_flag = $row["dt_active_flag"];
                                                        
                                    ?>      
                                        <tr class="gradeX">
                                            <td style="display: none"><?php echo $ID; ?></td>
                                            <td width=""><?php echo $dt_desc; ?></td>
                                            <td width=""><?php echo $dt_mod_date; ?></td>
                                            <td width=""><?php echo $dt_active_flag; ?></td>
                                            <td style='width:12%'>
                                                <center>
                                                    <a data-toggle="modal" href="#edit<?php echo $ID?>" class="btn btn-warning">
                                                            <i class="fa fa-edit" data-size="16" title="Modify Details"></i>
                                                    </a>   
                                                    <a data-toggle="modal" href="#delete<?php echo $ID?>" class="btn btn-danger">
                                                            <i class="fa fa-archive" data-size="16" title="Archive"></i>
                                                                                     
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
                $view_query = mysqli_query($connection,"SELECT * FROM `r_document_type` where dt_active_flag = 'Active' ");
                   while($row = mysqli_fetch_assoc($view_query))
                   {
                       $ID = $row["dt_ID"];
                       $dt_desc = $row["dt_desc"];
                       $dt_add_date = $row["dt_add_date"];
                       $dt_mod_date = $row["dt_mod_date"];
                       $dt_active_flag = $row["dt_active_flag"];
                                                        
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
                                <div class="modal-body" style="height:140px;">
                                   <form role="form" action="../functionalities/update_func.php" method="POST">
                                        <input type="hidden" name="docu_ID"  value="<?php echo $ID?>">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Document Type Description</label>
                                                    <input type="text" class="form-control" style="color: black" name="docu_desc" placeholder="Enter Document Type Description" required value="<?php echo $dt_desc?>">
                                                </div>
                                            </div>
                                        <div class="col-md-12" style="text-align: center">
                                                <button type="submit" class="btn btn-info" name="edit_docu" style="margin-top: 4px">
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
                                    <h5 class="modal-title" style="font-size: 25px; color: white; ">Are you sure you want to Archive this one?</h5>
                                </div>
                                <div class="modal-body" style="height:150px;">
                                    <p style="font-size: 16px">Archiving this record means you can no longer use this.<br> Are you sure you want to proceed?</p>
                                    <form action="../functionalities/archive_func.php" method="POST">
                                        <input type="hidden" name="docu_ID" value="<?php echo $ID?>" />
                                        <div class="col-md-12">
                                              <i class="livicon" data-name="trash" data-s="95" data-c="black" data-hc="gray"></i><br>
                                              <button type="submit" name="arch_docu" class="btn btn-success" style="font-size: 21px">
                                                <i class="fa fa-trash-o" data-s="25" data-c="white"></i>
                                                Yes
                                              </button>
                                              &nbsp;&nbsp;&nbsp;
                                              <a data-dismiss="modal" class="btn btn-danger" style="font-size: 21px">
                                                <i class="fa fa-close" data-s="14" data-c="white"></i>
                                                No
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