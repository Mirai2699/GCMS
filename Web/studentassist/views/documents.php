<?php
     include ("../utilities/Header.php");
     include ("../utilities/navibar.php");
     include ("../utilities/BaseJs.php");
     include ("../utilities/Tables.php");

     $username = $_SESSION['Logged_In'];
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
                            <a class="current" href="documents.php">Files and Documents</a>
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
                           Upload a File
                        </header>
                        <div class="panel-body">
                            <form role="form" action="../functionalities/docu_manage.php" method="POST">

                                <input type="hidden" name="file_uploadby" value="<?php echo $username?>">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Choose File</label>
                                        <input type="file" class="form-control" style="color: black" name="file_path"  required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>File Name</label>
                                        <input type="text" class="form-control" style="color: black" name="file_name" placeholder="Enter File Name" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Document Type</label>
                                        <select name="file_doc_type" class="form-control" style="color: black;">
                                            <option value="" selected disabled></option>
                                            <?php  
                                                $sqlemp = "SELECT * FROM `r_document_type`";
                                                $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                                                  while($row = mysqli_fetch_assoc($results))
                                                  {
                                                    $dt_ID = $row['dt_ID'];
                                                    $dt_desc = $row['dt_desc'];
                                            ?>
                                            <option value="<?php echo $dt_ID ?>"><?php echo $dt_desc; ?></option>
                                            <?php } ?>
                                         </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Disclosure Type</label>
                                        <select name="file_dis_type" class="form-control" style="color: black;" readonly>
                                            <option value="Printable" selected>Printable</option>
                                           <!--  <option value=""></option>
                                            <option value="Confidential">Confidential</option> -->
                                         </select>
                                    </div>
                                </div>
                                <div class="col-md-12" style="text-align: right">
                                        <button type="submit" class="btn btn-success" name="upload_file" style="margin-top: 1px">
                                                <i class="fa fa-upload"></i>
                                                Upload
                                        </button>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!--END INSERT CONTENT-->

            <!--START TABLE 1-->
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading" style="background-color:gray ;color: white">
                           Printables and For Public Release Files and Documents
                        </header>
                        <div class="panel-body">
                            <div class="adv-table">
                                <table  class="display table table-bordered table-striped" id="dynamic-table">
                                    <thead>
                                    <tr>
                                        <th style="display: none">File ID</th>
                                        <th>File Name</th>
                                        <th>Uploaded By</th>
                                        <th>Document Type</th>
                                        <th>Upload timestamp</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT * FROM `t_files_upload` AS FILE
                                                                                    INNER JOIN `r_document_type` AS DOC
                                                                                    ON FILE.file_docu_type = DOC.dt_ID    
                                                                                where file_rel_type = 'Printable' ");
                                        while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $ID = $row["file_ID"];
                                            $file_name = $row["file_name"];
                                            $file_uploadby = $row["file_uploadby"];
                                            $file_docu_type = $row["file_docu_type"];
                                            $file_document = $row["dt_desc"];
                                            $file_rel_type = $row["file_rel_type"];
                                            $file_filepath = $row["file_filepath"];
                                            $file_add_date = $row["file_add_date"];
                                            $dt_active_flag = $row["file_active_flag"];
                                                        
                                    ?>      
                                        <tr class="gradeX">
                                            <td style="display: none"><?php echo $ID; ?></td>
                                            <td width=""><?php echo $file_name; ?></td>
                                            <td width=""><?php echo $file_uploadby; ?></td>
                                            <td width=""><?php echo $file_document; ?></td>
                                            <td width=""><?php echo $file_add_date; ?></td>
                                            <td style='width:12%'>
                                                <center>
                                                    <a data-toggle="modal" href="#edit<?php echo $ID?>" class="btn btn-danger">
                                                            <i class="fa fa-download" data-size="16" title="Download"></i>
                                                            Download
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
            <!--END TABLE 1-->

            <!--START TABLE 2 --
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading" style="background-color:gray ;color: white">
                            Confidential and For Private-Use Only Files and Documents
                        </header>
                        <div class="panel-body">
                            <div class="adv-table">
                                 <table  class="display table table-bordered table-striped" id="editable-sample">
                                    <thead>
                                    <tr>
                                        <th style="display: none">File ID</th>
                                        <th>File Name</th>
                                        <th>Uploaded By</th>
                                        <th>Document Type</th>
                                        <th>Upload timestamp</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $view_query = mysqli_query($connection,"SELECT * FROM `t_files_upload` AS FILE
                                                                                    INNER JOIN `r_document_type` AS DOC
                                                                                    ON FILE.file_docu_type = DOC.dt_ID    
                                                                                where file_rel_type = 'Confidential' ");
                                        while($row = mysqli_fetch_assoc($view_query))
                                        {
                                            $ID = $row["file_ID"];
                                            $file_name = $row["file_name"];
                                            $file_uploadby = $row["file_uploadby"];
                                            $file_docu_type = $row["file_docu_type"];
                                            $file_document = $row["dt_desc"];
                                            $file_rel_type = $row["file_rel_type"];
                                            $file_filepath = $row["file_filepath"];
                                            $file_add_date = $row["file_add_date"];
                                            $dt_active_flag = $row["file_active_flag"];
                                                        
                                    ?>      
                                        <tr class="gradeX">
                                            <td style="display: none"><?php echo $ID; ?></td>
                                            <td width=""><?php echo $file_name; ?></td>
                                            <td width=""><?php echo $file_uploadby; ?></td>
                                            <td width=""><?php echo $file_document; ?></td>
                                            <td width=""><?php echo $file_add_date; ?></td>
                                            <td style='width:12%'>
                                                <center>
                                                    <a data-toggle="modal" href="#edit<?php echo $ID?>" class="btn btn-danger">
                                                            <i class="fa fa-download" data-size="16" title="Download"></i>
                                                            Download
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
            <!--END TABLE 2 -->
            

            <!--END CUSTOM CONTENT-->
        </section>
    </section>
    <!--main content end-->
</section>
<!--END CONTAINER FROM HEADER-->

<!--ON PAGE SCRIPT -->
<script src="../../../resources-web/js/table-editable.js"></script>
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>