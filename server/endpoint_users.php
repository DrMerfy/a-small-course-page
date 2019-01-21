<?php
require './connectDB.php';
require './JSONTools.php';

$db = connect_to_db();

// Force utf-8
$db->query("SET NAMES 'utf8'");

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $result = $db->query("SELECT * FROM `users`");
    $response = '{"users":['; 
    
    while ($row = $result->fetch_array()) {
        $no = $row['no'];
        $name = $row['name'];
        $surname = $row['surname'];
        $email = $row['email'];
        $password = $row['password'];
        $role = $row['role'];
        
        $response .= '{ "no": "'.$no.'", "name": "'.$name.'", "surname": "'. $surname.'", "email": "'.$email.'", "password": "'. $password.'", "role": "'. $role.'"},';
    }

    $response = rtrim($response,",");
    $response .= ']}';
    die($response);
}
else if($_SERVER["REQUEST_METHOD"] == "POST") {

    $request = get_json_request();
    $name = sanetize($request['name']);
    $surname = sanetize($request['surname']);
    $email = sanetize($request['email']);
    $password = sanetize($request['password']);
    $role = sanetize($request['role']);

    if ($role != 'tutor' && $role != 'student') {
        http_response_code(400);
        die('{"error": "invalid role"}');
    }

    $resource = $db->query("INSERT INTO `users`(`name`, `surname`, `email`, `password`, `role`) VALUES ('$name', '$surname', '$email', '$password', '$role')");

    if ($resource) {
        http_response_code(201);
        $insert_res= $db->query("SELECT * FROM users ORDER BY no DESC LIMIT 1")->fetch_assoc();
        die('{ "no": "'.$insert_res['no'].'", "name": "'.$insert_res['name'].'", "surname": "'. $insert_res['surname'].
            '", "email": "'.$insert_res['email'].'", "password": "'. $insert_res['password'].
            '", "role": "'. $insert_res['role'].'"}');
    } else {
        http_response_code(400);
        die('{"error": "email already in use"}');
    }
}
else if($_SERVER["REQUEST_METHOD"] == "PUT") {
    $request = get_json_request();
    $no = sanetize($request['no']);
    $name = sanetize($request['name']);
    $surname = sanetize($request['surname']);
    $email = sanetize($request['email']);
    $password = sanetize($request['password']);
    $role = sanetize($request['role']);

    if ($role != 'tutor' && $role != 'student') {
        http_response_code(400);
        die('{"error": "invalid role"}');
    }
    
    $resource = $db->query("UPDATE users SET name='$name', surname='$surname', email='$email', password='$password', role='$role' WHERE no=$no");
    if ($resource) {
        http_response_code(201);
        $insert_res = $db->query("SELECT * FROM users WHERE no=$no")->fetch_assoc();
        die('{ "no": "'.$insert_res['no'].'", "name": "'.$insert_res['name'].'", "surname": "'. $insert_res['surname'].
            '", "email": "'.$insert_res['email'].'", "password": "'. $insert_res['password'].
            '", "role": "'. $insert_res['role'].'"}');
    } else {
        http_response_code(400);
        die('{"error": "email already in use"}');
    }
}
else if($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $request = get_json_request();
    $no = sanetize($request['no']);

    $resource = $db->query("DELETE FROM users WHERE no=$no");
    if ($resource) {
        http_response_code(200);
        die('{"delete": "ok", "no": "'.$no.'"}');
    }
}

http_response_code(500);
?>