<?php
    require './connectDB.php';
    require './JSONTools.php';

    $db = connect_to_db();
    $email = $password = ""; 

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        http_response_code(200);

        // Handling jsons
        $request = get_json_request();

        $email = sanetize($request["email"]);
        $password = sanetize($request["password"]);

        // Compare passwords
        $result = $db->query("SELECT * FROM `users` WHERE email='$email'");
        
        if ($result->num_rows <= 0) {
            die('{"login":"fail", "error":"email unknown"}');
        }

        $result = $result->fetch_assoc();
        $known_pass = $result["password"];

        if($password == $known_pass) {
            $_SESSION['valid'] = true;
            $_SESSION['username'] = $email;
            $_SESSION['role'] = $result["role"];

            setcookie("role", $_SESSION['role'], 0, "/");
            die('{"login":"success"}');
        }else {
            die('{"login":"fail", "error":"passwords no match"}');
        }

        http_response_code(500);
        die('{"status": "Unhandled"}');
    }

    http_response_code(501);
        die('{"status": "only POST"}');
?>
