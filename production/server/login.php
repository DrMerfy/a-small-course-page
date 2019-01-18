<?php
    // Establise db connection
    $servername = "localhost";
    $username = "api_server";
    $password = "123412";
    $dbname = "music_site";

    $db = new mysqli($servername, $username, $password, $dbname);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 

    $email = $password = ""; 

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        http_response_code(200);

        // Handling jsons
        // Make sure that the content type of the POST request has been set to application/json
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if(strcasecmp($contentType, 'application/json') != 0) {
            die('Content type must be: application/json');
        }

        $content = trim(file_get_contents("php://input"));
        $request = json_decode($content, true);

        $email = sanetize($request["email"]);
        $password = sanetize($request["password"]);

        // Compare passwords
        $result = $db->query("SELECT password FROM `users` WHERE email='$email'");
        
        if ($result->num_rows <= 0) {
            die('{"login":"fail", "error":"email unknown"}');
        }

        $known_pass = $result->fetch_assoc()["password"];

        if($password == $known_pass) {
            $_SESSION['valid'] = true;
            $_SESSION['username'] = $username;
            die('{"login":"success"}');
        }else {
            die('{"login":"fail", "error":"passwords no match"}');
        }
        http_response_code(500);
        die('{"status": "Unhandled"}');
    }

    http_response_code(501);
        die('{"status": "only POST"}');

    function sanetize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
