<?php
    function get_json_request() {
        // Make sure that the content type of the POST request has been set to application/json
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if(strcasecmp($contentType, 'application/json') != 0) {
            die('Content type must be: application/json');
        }

        $content = trim(file_get_contents("php://input"));
        return json_decode($content, true);
    }

    function sanetize($data) {
        $data = trim($data);
        $data = preg_replace('~[\r\n]+~', '', $data); // remove new lines
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>