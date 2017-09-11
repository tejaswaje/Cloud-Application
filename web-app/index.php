<?php

//check if files are uploaded
if (!empty($_FILES)) {

// initialise variables
    $temp = $_FILES['file']['tmp_name'];
    $file = $_FILES['file']['name'];
    $dir_seprator = DIRECTORY_SEPARATOR;
    $folder = "uploads";
    $destination_path = dirname(__FILE__).$dir_seprator.$folder.$dir_seprator;
    $traget_path = $destination_path.$_FILES['file']['name'];
    $refresh = "<meta http-equiv=\"refresh\" content=\"0\">";
    move_uploaded_file($temp, $traget_path);
    $msg = "alert('File already Present !')";

//check if the file is already present
     if (!file_exists($file)) {
     echo "not exist";
        move_uploaded_file($temp, $traget_path);
        echo $refresh;
    } else
     echo $msg;

}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cloud Storage App</title>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="scripts/dropzone.js"></script>

// create dropzone for file upload
        <link href="style/dropzone.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <form action="index.php" class="dropzone"></form>
        <h1 align="center">Files present on Cloud</h1>
        <hr >

 // display list of files present
        <?php
        $dir_open = opendir('uploads');
        while(false !== ($filename = readdir($dir_open))){
            if($filename != "." && $filename != ".."){
                $link = "<center><font size=\"6\"> <a size='26px' href='./$filename'> $filename </a><br /></font></center>";
                echo $link;
            }
        }
        ?>
    </body>
</html>
