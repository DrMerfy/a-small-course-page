<?php
require './connectDB.php';
require './JSONTools.php';

$db = connect_to_db();

// Force utf-8
$db->query("SET NAMES 'utf8'");

if($_SERVER["REQUEST_METHOD"] == "GET") {
    http_response_code(501);
    die('{"error": "only post"');
}
else if($_SERVER["REQUEST_METHOD"] == "POST") {
    http_response_code(200);
    $request = get_json_request();
    $sender = sanetize($request['sender']);
    $subject = sanetize($request['subject']);
    $message = sanetize($request['message']);
    $message = "Από ".$sender."\n".$message;

    $mails = $db->query("SELECT email FROM users WHERE role='tutor'")->fetch_assoc();
    
    foreach ($mails as $mail) {
        mail($mail, $subject, $message);
    }
    die('{"sent": "ok"}');
}
else if($_SERVER["REQUEST_METHOD"] == "PUT") {
    http_response_code(501);
    die('{"error": "only post"');
}
else if($_SERVER["REQUEST_METHOD"] == "DELETE") {
    http_response_code(501);
    die('{"error": "only post"');
}

http_response_code(500);
?>