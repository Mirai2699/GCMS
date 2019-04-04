<?php
     include ("../utilities/Header.php");
     include ("../utilities/navibar.php");
     include ("../utilities/BaseJs.php");
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
                            <a class="current" href="select_add_profile.php">Select Mode of Record Entry</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--END BREADCRUMBS-->
            <!--START CUSTOM CONTENT-->
            <center>
                <section class="container" style="width: 100%; height: 100%; background-color: white">
                        <h1 style="font-family: calibri">Select Mode of Record Entry</h1>
                        <div class="row" style="padding: 1px; background-color: #6e6e6e; width: 80%"></div>

                            <div class="col-md-3" style="margin: 41px;">
                                <a href="add_studprofile_only.php" style="height: 200px" class="btn btn-danger btn-lg btn-block">
                                    <br>
                                    <i class="fa fa-plus-square" style="font-size:60px"></i>
                                    <h4 style="font-family: calibri">Add One Individual <br> Student Profile Record <br>Via Manual Input</h4>
                                </a>
                            </div>
                            <div class="col-md-3" style="margin: 41px;">
                                <a href="add_profile.php" style="height: 200px" class="btn btn-info btn-lg btn-block">
                                    <br>
                                    <i class="fa fa-check-square-o" style="font-size:60px"></i>
                                    <h4 style="font-family: calibri">Add One Individual <br> Complete Student Record <br>Via Manual Input</h4>
                                </a>
                            </div>
                            <div class="col-md-3" style="margin: 41px;">
                                <a href="#excelimport" data-toggle="modal" style="height: 200px" class="btn btn-success btn-lg btn-block">
                                    <br>
                                    <i class="fa fa-copy" style="font-size:60px"></i>
                                    <h4 style="font-family: calibri">Add Multiple<br> Student Records <br>Via Excel Import</h4>
                                </a>
                            </div>
                </section>
                <!--
                    **
                    ***
                    ****
                    Excel Import
                    ****
                    ***
                    **
                --> 
                <div aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="excelimport" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <center>
                                <div class="modal-header" style="background-color: #689f38">

                                    <h4 class="modal-title" style="font-size: 25px; color: white; ">
                                        <i class="fa fa-copy" style="font-size:35px"></i>&nbsp;&nbsp;Excel Import
                                    </h4>
                                </div>  
                                <div class="modal-body" style="height:140px;">
                                    <div class="col-md-12">
                                        <form method="post" action="..\functionalities\import_excel_1.php" enctype="multipart/form-data">
                                            <input type="file" name="excelfile" class="form-control">
                                            <br>
                                            <div class="col-md-12">
                                                <button class="btn btn-lg btn-success">
                                                    <i class="fa fa-upload" style="font-size:20px"></i>&nbsp;
                                                    Import
                                                </button>
                                                &nbsp;&nbsp;&nbsp;
                                                 <a data-dismiss="modal" class="btn btn-lg btn-danger">
                                                    <i class="fa fa-times" style="font-size:20px"></i>&nbsp;
                                                    Cancel
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <!--End Excel Import-->
            </center>
            <!--END CUSTOM CONTENT-->
        </section>
    </section>
    <!--main content end-->
</section>
<!--END CONTAINER FROM HEADER-->