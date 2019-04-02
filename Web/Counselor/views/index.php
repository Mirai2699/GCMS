<?php
     include ("../utilities/Header.php");
     include ("../utilities/navibar.php");
     include ("../utilities/BaseJs.php");
?>
   
    <script src="../../../resources-web/custom/highcharts/highcharts.js"></script>
    <script src="../../../resources-web/custom/highcharts/modules/data.js"></script>
    <script src="../../../resources-web/custom/highcharts/modules/exporting.js"></script>
    <script src="../../../resources-web/custom/highcharts/modules/drilldown.js"></script>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--mini statistics start-->
            <?php include("get_view_details_dashboard.php");?>
            <div class="row">
                <div class="col-md-3">
                    <a href="view_profile.php">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon orange"><i class="fa fa-users"></i></span>
                            <div class="mini-stat-info">
                                <span><?php echo $student_count; ?></span>
                               Total Count of Student Records 
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="individual_service.php">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon tar"><i class="fa fa-user"></i></span>
                            <div class="mini-stat-info">
                                <span><?php echo $indiv_count; ?></span>
                                Total Count of Individual Services
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="group_service.php">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon pink"><i class="fa fa-users"></i></span>
                            <div class="mini-stat-info">
                                <span><?php echo $group_count; ?></span>
                                Total Count of Group Services
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="view_visitation.php">
                        <div class="mini-stat clearfix">
                            <span class="mini-stat-icon green"><i class="fa fa-book"></i></span>
                            <div class="mini-stat-info">
                                <span><?php echo $visit_count; ?></span>
                                Total Count of Visitation Logs
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!--mini statistics end-->

            <!--CHART FOR NUMBER OF STUDENTS PER COURSES-->
            <div class="col-md-6">
                <div id="gender" class="flotChart"></div>
                <script type="text/javascript">
                        Highcharts.chart('gender', {
                        chart: {
                        type: 'pie'
                        },
                        title: {
                            text: 'Total Population of Students By Gender as of <?php echo date('Y');?>'

                        },
                        xAxis: {
                            type: 'category',
                            title: {
                                text: null
                            },
                            min: 0,
                            scrollbar: {
                                enabled: true
                            },
                            tickLength: 0
                        },
                        yAxis: {
                            title: {
                                text: null
                            }
                        },
                        legend: {
                            enabled: true
                        },
                        plotOptions: {
                            series: {
                                borderWidth: 0,
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.y:.0f}'
                                }
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>Total of {point.y:.0f}</b><br/>'
                        },

                        series: [
                            {
                                name: "Gender",
                                colorByPoint: true,
                                data: [
                                    <?php
                                       $view_query = mysqli_query($connection,"SELECT DISTINCT stud_gender  FROM `t_stud_profile`");
                                           while($row = mysqli_fetch_assoc($view_query))
                                               {   
                                                   $gender = $row["stud_gender"];
                                                   //echo $display;
                                                    //$InvQty = $row["Quantity"];
                                    ?> 
                                    {
                                        name: '<?php echo $gender ?>',
                                        y: <?php
                                                        $view_query1 = mysqli_query($connection,"SELECT DISTINCT stud_number FROM `t_stud_profile` WHERE stud_gender = '$gender' ");

                                                        $total_count = mysqli_num_rows($view_query1);
                                                        echo $total_count;
                                           ?>,
                                       
                                    },
                                    <?php
                                    }
                                    ?>
                                ]
                            }
                        ]
                });

                </script>
            <!--CHART FOR NUMBER OF STUDENTS PER COURSES-->
        </section>
    </section>
    <!--main content end-->
</section>
<!--END CONTAINER FROM HEADER-->