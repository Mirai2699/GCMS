<?php
/**
 * Created by PhpStorm.
 * User: Aravinth
 * Date: 10-09-2017
 * Time: 12:30 PM
 */
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

require_once ('../../../db_con.php');
require_once ('Spout/Autoloader/autoload.php');

if(!empty($_FILES['excelfile']['name']))
{
    // Get File extension eg. 'xlsx' to check file is excel sheet
    $pathinfo = pathinfo($_FILES['excelfile']['name']);

    // check file has extension xlsx, xls and also check
    // file is not empty
    if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls') && $_FILES['excelfile']['size'] > 0 )
    {
        $file = $_FILES['excelfile']['tmp_name'];

        // Read excel file by using ReadFactory object.
        $reader = ReaderFactory::create(Type::XLSX);

        // Open file
        $reader->open($file);
        $count = 0;

        // Number of sheet in excel file
        foreach ($reader->getSheetIterator() as $sheet)
        {

            // Number of Rows in Excel sheet
            foreach ($sheet->getRowIterator() as $row)
            {

                // It reads data after header. In the my excel sheet,
                // header is in the first row.
                if ($count > 0) {
                    //print_r($row);
                    // Data of excel sheet
                    $stud_no = $row[0];
                    $stud_lname = $row[1];
                    $stud_mname = $row[2];
                    $stud_firstname = $row[3];
                    $stud_course = $row[4];
                    $stud_yr_lvl = $row[5];
                    $stud_section = $row[6];
                    $stud_gender = $row[7];
                    $stud_bday = date_format($row[8],'Y-m-d');

                    // $stud_nf_bday = $stud_bday->format('Y-m-d');
                    $stud_birthplace = $row[9];
                    $stud_address = $row[10];
                    $stud_prov_add = $row[11];
                    $stud_tel_no = $row[12];
                    $stud_cp_no = $row[13];
                    $stud_email = $row[14];
                    $stud_status = $row[15];

                    $get_courseID = mysqli_query($connection, "SELECT * FROM `r_courses` WHERE course_code = '$stud_course'");
                    while($row = mysqli_fetch_assoc($get_courseID))
                    {
                        $stud_course_ID = $row['course_ID'];
                    }

                    //Here, You can insert data into database.
                         $qry = "INSERT INTO t_stud_profile(`stud_number`, 
                                                            `stud_lastname`, 
                                                            `stud_middlename`, 
                                                            `stud_firstname`, 
                                                            `stud_course`, 
                                                            `stud_yearlevel`, 
                                                            `stud_section`, 
                                                            `stud_gender`, 
                                                            `stud_birthdate`, 
                                                            `stud_birthplace`,
                                                            `stud_homeadd`, 
                                                            `stud_provadd`, 
                                                            `stud_telephone_no`, 
                                                            `stud_mobile_no`, 
                                                            `stud_email`, 
                                                            `stud_status`) 

                                                    VALUES ('$stud_no',
                                                            '$stud_lname',
                                                            '$stud_mname',
                                                            '$stud_firstname',
                                                            '$stud_course_ID',
                                                            '$stud_yr_lvl',
                                                            '$stud_section',
                                                            '$stud_gender',
                                                            '$stud_bday',
                                                            '$stud_birthplace', 
                                                            '$stud_address', 
                                                            '$stud_prov_add',
                                                            '$stud_tel_no', 
                                                            '$stud_cp_no', 
                                                            '$stud_email', 
                                                            '$stud_status')";
                    $res = mysqli_query($connection,$qry);
                    //echo $qry;
                }

                $count++;
            }
        }

        if($res)
        {
           // echo "Your file Uploaded Successfull";
            echo "<script type=\"text/javascript\">".
                     "alert
                     ('Your file is Uploaded Successfully!');".
                    "</script>";
            echo "<script>setTimeout(\"location.href = '../views/view_profile.php';\",0);</script>";
        }
        else
        {
            //echo "Your file Uploaded Failed";
            echo "<script type=\"text/javascript\">".
                     "alert
                     ('Failed to Upload your File!');".
                    "</script>";
            echo "<script>setTimeout(\"location.href = '../views/select_add_profile.php';\",0);</script>";
        }

        // Close excel file
        $reader->close();
    }
    else
    {
        //echo "Please Choose only Excel file";
        echo "<script type=\"text/javascript\">".
                 "alert
                 ('Please Choose only Excel file!');".
                "</script>";
        //echo "<script>setTimeout(\"location.href = '../views/select_add_profile.php';\",0);</script>";
    }
}
else
{
    //echo "File is Empty"."<br>";
    //echo "Please Choose Excel file";
    echo "<script type=\"text/javascript\">".
             "alert
             ('File is Empty; Upload an Excel File!');".
            "</script>";
    echo "<script>setTimeout(\"location.href = '../views/select_add_profile.php';\",0);</script>";

}

?>
