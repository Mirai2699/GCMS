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
    <section id="main-content" style="background-color:#295656">
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

            <?php  
                $sqlemp = "SELECT * FROM `r_academic_year` WHERE acadyr_active_flag = 'Active'";
                $results = mysqli_query($connection, $sqlemp) or die("Bad Query: $sql");
                    while($row = mysqli_fetch_assoc($results))
                    {
                        $acadyr_ID = $row['acadyr_ID'];
                        $startyr = $row['acadyr_start_year'];
                        $endyr = $row['acadyr_end_year'];
                        $acadyear = $startyr.' - '.$endyr;
                    }
            ?>
            <div class="row">
                <!--CHART FOR NUMBER OF STUDENTS PER COURSES-->
                <div class="col-md-12" style="margin-bottom: 10px;">
                    <div id="course" class="flotChart"></div>
                        <script type="text/javascript">
                                    Highcharts.chart('course', {
                                    chart: {
                                    type: 'column'
                                    },
                                    title: {
                                        text: 'Total Population of Students By Course as per Academic Year <?php echo $acadyear;?>'

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
                                        enabled: false
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
                                            name: "Course",
                                            colorByPoint: true,
                                            data: [
                                                <?php
                                                   $view_query = mysqli_query($connection,"SELECT * FROM `r_courses`");
                                                       while($row = mysqli_fetch_assoc($view_query))
                                                           {   
                                                               $courseID = $row["course_ID"];
                                                               $code = $row["course_code"];
                                                               $name = $row["course_name"];
                                                               //echo $display;
                                                                //$InvQty = $row["Quantity"];
                                                ?> 
                                                {
                                                    name: '<?php echo $code ?>',
                                                    y: <?php
                                                                    $view_query1 = mysqli_query($connection,"SELECT * FROM `t_stud_profile` AS STUDPROF
                                                                                                              INNER JOIN `t_stud_batch_rec` AS STUDBATCH
                                                                                                              ON STUDBATCH.batch_student = STUDPROF.stud_number 
                                                                                                              WHERE stud_course = '$courseID'
                                                                                                              and STUDBATCH.batch_year BETWEEN '$startyr' and '$endyr'");

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
                </div>
                <!--CHART FOR NUMBER OF STUDENTS PER COURSES-->
            </div>
            <div class="row">
                <!--CHART FOR NUMBER OF STUDENTS PER GENDER-->
                <div class="col-md-6">
                    <div id="gender" class="flotChart"></div>
                    <script type="text/javascript">
                            Highcharts.chart('gender', {
                            
                            chart: {
                                    plotBackgroundColor: null,
                                    plotBorderWidth: null,
                                    plotShadow: false,
                                    type: 'pie'
                                },
                                   title: {
                                    text: 'Total Population of Students By Gender as <br>per Academic Year <?php echo $acadyear;?>'

                                },
                               tooltip: {
                                   headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                   pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>Total of {point.y:.0f}</b><br/>'
                               },
                               plotOptions: {
                                   pie: {
                                            allowPointSelect: true,
                                            cursor: 'pointer',
                                            dataLabels: {
                                                enabled: false
                                        },
                                        showInLegend: true
                                    }
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
                                                            $view_query1 = mysqli_query($connection,"SELECT DISTINCT stud_number FROM `t_stud_profile` AS STUDPROF  
                                                                                                            INNER JOIN `t_stud_batch_rec` AS STUDBATCH
                                                                                                            ON STUDBATCH.batch_student = STUDPROF.stud_number
                                                                                                            WHERE stud_gender = '$gender'
                                                                                                            and STUDBATCH.batch_year = '$acadyear' ");

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
                </div>
                <!--CHART FOR NUMBER OF STUDENTS PER GENDER-->


                <!--CHART FOR NUMBER OF STUDENTS PER ACAD STATUS-->
                <div class="col-md-6">
                    <div id="acadstat" class="flotChart"></div>
                        <script type="text/javascript">
                                    Highcharts.chart('acadstat', {
                                    chart: {
                                           plotBackgroundColor: null,
                                           plotBorderWidth: null,
                                           plotShadow: false,
                                           type: 'pie'
                                       },
                                          title: {
                                           text: 'Total Population of Students By Academic Status as <br>per Academic Year <?php echo $acadyear;?>'

                                       },
                                      tooltip: {
                                          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>Total of {point.y:.0f}</b><br/>'
                                      },
                                      plotOptions: {
                                          pie: {
                                                   allowPointSelect: true,
                                                   cursor: 'pointer',
                                                   dataLabels: {
                                                       enabled: false
                                               },
                                               showInLegend: true
                                           }
                                       },

                                    series: [
                                        {
                                            name: "Academic Status",
                                            colorByPoint: true,
                                            data: [
                                                <?php
                                                   $view_query = mysqli_query($connection,"SELECT DISTINCT stud_status FROM `t_stud_profile`");
                                                       while($row = mysqli_fetch_assoc($view_query))
                                                           {   
                                                               
                                                               $acadstat = $row["stud_status"];
                                                               //echo $display;
                                                                //$InvQty = $row["Quantity"];
                                                ?> 
                                                {
                                                    name: '<?php echo $acadstat ?>',
                                                    y: <?php
                                                                    $view_query1 = mysqli_query($connection,"SELECT * FROM `t_stud_profile` AS STUDPROF  
                                                                                                            INNER JOIN `t_stud_batch_rec` AS STUDBATCH
                                                                                                            ON STUDBATCH.batch_student = STUDPROF.stud_number
                                                                                                            WHERE stud_status = '$acadstat'
                                                                                                            and STUDBATCH.batch_year = '$acadyear'");

                                                                    $total_count = mysqli_num_rows($view_query1);
                                                                    echo $total_count;
                                                       ?>,
                                                    drilldown: 'FOR<?php echo $acadstat?>',
                                                },  
                                                <?php
                                                }
                                                ?>
                                            ]
                                        }
                                    ],
                                    drilldown: {
                                       series: [
                                        //requisition types
                                        <?php
                                           $view_query = mysqli_query($connection,"SELECT DISTINCT stud_status FROM `t_stud_profile`");
                                               while($row = mysqli_fetch_assoc($view_query))
                                                   {   
                                                       
                                                       $acadstat = $row["stud_status"];
                                                       //echo $display;
                                                        //$InvQty = $row["Quantity"];
                                        ?> 
                                        {
                                       
                                          name: 'Course:',
                                          id: 'FOR<?php echo $acadstat?>',
                                          type:'pie',
                                          data: [

                                                <?php
                                                   $view_query1 = mysqli_query($connection,"SELECT DISTINCT stud_course, course_code FROM `t_stud_profile` AS STUDPROF
                                                                                                    INNER JOIN `r_courses` AS COR 
                                                                                                    ON STUDPROF.stud_course = COR.course_ID
                                                                                                    WHERE STUDPROF.stud_status = '$acadstat'");
                                                       while($row = mysqli_fetch_assoc($view_query1))
                                                           {   
                                                               $courseID = $row["stud_course"];
                                                               $code = $row["course_code"]; 
                                                               //echo $display;
                                                                //$InvQty = $row["Quantity"];
                                                ?> 
                                                {
                                                    
                                                    name: '<?php echo $code?>',
                                                    y: <?php
                                                        $view_create = mysqli_query($connection,"SELECT * FROM `t_stud_profile` AS STUDPROF  
                                                                                                            INNER JOIN `t_stud_batch_rec` AS STUDBATCH
                                                                                                            ON STUDBATCH.batch_student = STUDPROF.stud_number
                                                                                                            WHERE stud_status = '$acadstat'
                                                                                                            and stud_course = '$courseID'
                                                                                                            and STUDBATCH.batch_year = '$acadyear'");
                                                        
                                                        $total_count1 = mysqli_num_rows($view_create);
                                                        echo $total_count1;

                                                       ?>

                                                },
                                                <?php } ?>
                                          ]
                                   
                                    },
                                     <?php
                                    }
                                    ?>
                                  ]
                                }
                            });

                        </script>
                </div>
                <!--CHART FOR NUMBER OF STUDENTS PER ACAD STATUS-->
            </div>
            <div class="row" style="margin-top: 10px">
                <!--CHART FOR NUMBER OF STUDENTS PER GENDER-->
                <div class="col-md-6">
                    <div id="individual_service" class="flotChart"></div>
                    <script type="text/javascript">
                                Highcharts.chart('individual_service', {
                                chart: {
                                type: 'column'
                                },
                                title: {
                                    text: 'Individual Guidance and Counseling Services<br> Rendered as per <?php echo $acadyear;?>'

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
                                    enabled: false
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
                                        name: "Counseling Type:",
                                        colorByPoint: true,
                                        data: [
                                            <?php
                                               $view_query = mysqli_query($connection,"SELECT * FROM `r_counsel_type`");
                                                   while($row = mysqli_fetch_assoc($view_query))
                                                       {   
                                                           $ctID = $row["ct_ID"];
                                                           $ctdesc = $row["ct_desc"];
                                                           //echo $display;
                                                            //$InvQty = $row["Quantity"];
                                            ?> 
                                            {
                                                name: '<?php echo $ctdesc ?>',
                                                y: <?php
                                                                $view_query1 = mysqli_query($connection,"SELECT * FROM `t_counseling_individual` AS CI
                                                                                                          INNER JOIN `r_counsel_type` AS CT
                                                                                                          ON CI.CI_couns_type = CT.ct_ID
                                                                                                          WHERE CI_couns_type = '$ctID'");

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
                            
                </div>
                <!--CHART FOR NUMBER OF STUDENTS PER GENDER-->


                <!--CHART FOR NUMBER OF STUDENTS PER GENDER-->
                <div class="col-md-6">
                    <div id="group_service" class="flotChart"></div>
                    <script type="text/javascript">
                                Highcharts.chart('group_service', {
                                chart: {
                                type: 'column'
                                },
                                title: {
                                    text: 'Group Guidance and Counseling Services<br> Rendered as per <?php echo $acadyear;?>'

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
                                    enabled: false
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
                                        name: "Counseling Type:",
                                        colorByPoint: true,
                                        data: [
                                            <?php
                                               $view_query = mysqli_query($connection,"SELECT * FROM `r_counsel_type`");
                                                   while($row = mysqli_fetch_assoc($view_query))
                                                       {   
                                                           $ctID = $row["ct_ID"];
                                                           $ctdesc = $row["ct_desc"];
                                                           //echo $display;
                                                            //$InvQty = $row["Quantity"];
                                            ?> 
                                            {
                                                name: '<?php echo $ctdesc ?>',
                                                y: <?php
                                                                $view_query1 = mysqli_query($connection,"SELECT * FROM `t_counseling_group` AS CG
                                                                                                          INNER JOIN `r_counsel_type` AS CT
                                                                                                          ON CG.CG_couns_type = CT.ct_ID
                                                                                                          WHERE CG_couns_type = '$ctID'");

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
                            
                </div>
                <!--CHART FOR NUMBER OF STUDENTS PER GENDER-->
            </div>
        </section>
    </section>
    <!--main content end-->
</section>
<!--END CONTAINER FROM HEADER-->