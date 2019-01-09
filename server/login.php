<?php
    $email = $password = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Handling jsons
        //Make sure that the content type of the POST request has been set to application/json
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if(strcasecmp($contentType, 'application/json') != 0) {
            throw new Exception('Content type must be: application/json');
        }

        $content = trim(file_get_contents("php://input"));
        $request = json_decode($content, true);

        $email = sanetize($request["email"]);
        $password = sanetize($request["password"]);

        echo "{'email': $email, 'password': $password}";
    }

    function sanetize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
