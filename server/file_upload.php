<?php
    require './JSONTools.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_FILES['files'])) {
            $path = '../files/';
            $extensions = ['doc', 'docx', 'pdf', 'ppt', 'pptx'];
            $ext_tmp = explode('.',$_FILES['files']['name'][0]);
            $file_ext = strtolower(end($ext_tmp)); 
            
            if (!in_array($file_ext, $extensions)) {
                http_response_code(415);
                die('{"error": "not accepted extension"}');
            }

            $file_name = str_replace(' ', '_', sanetize($_FILES['files']['name'][0]));
            $file = $path.rand(0, 9999).'_'.$file_name;
            $file_tmp = $_FILES['files']['tmp_name'][0];

            move_uploaded_file($file_tmp, $file);
            http_response_code(201);
            die('{"location":"'.$file.'"}');
        }
    } 
?>
