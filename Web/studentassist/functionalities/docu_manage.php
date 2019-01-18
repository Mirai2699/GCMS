<?php
    
    include('../../../db_con.php');
  

//Files and Documents Management


    ////////  Uploading File ///////
   if(isset($_POST['upload_file']))
    {   
        
        $file_uploadby = $_POST['file_uploadby'];
        $file_name = $_POST['file_name'];
        $file_doc_type = $_POST['file_doc_type'];
        $file_dis_type = $_POST['file_dis_type'];
        $file_path = $_POST['file_path'];

        $insert = "INSERT INTO t_files_upload (file_name, file_uploadby, file_docu_type, file_rel_type, file_filepath)     
                   VALUES ('$file_name', '$file_uploadby', '$file_doc_type', '$file_dis_type', '$file_path')";
              
        mysqli_query($connection,$insert);

         echo "<script type=\"text/javascript\">".
                  "alert
                  ('You have successfully uploaded a file!');".
                 "</script>";
         echo "<script>setTimeout(\"location.href = '../views/documents.php';\",0);</script>";
    }

?>