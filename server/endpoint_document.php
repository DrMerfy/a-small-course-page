<?php
require './connectDB.php';
require './JSONTools.php';

$db = connect_to_db();

// Force utf-8
$db->query("SET NAMES 'utf8'");

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $result = $db->query("SELECT * FROM `documents`");
    $response = '{"documents":['; 
    
    while ($row = $result->fetch_array()) {
        $no = $row['no'];
        $title = $row['title'];
        $description = $row['description'];
        $location = $row['location'];
        
        $response .= '{ "no": "'.$no.'", "title": "'.$title.'", "description": "'.$description.'", "location": "'.$location.'"},';
    }

    $response = rtrim($response,",");
    $response .= ']}';
    die($response);
}
else if($_SERVER["REQUEST_METHOD"] == "POST") {

    $request = get_json_request();
    $title = sanetize($request['title']);
    $description = sanetize($request['description']);
    $location = sanetize($request['location']);

    $resource = $db->query("INSERT INTO `documents`(`title`, `description`, `location`) VALUES ('$title', '$description', '$location')");
    
    if ($resource) {
        http_response_code(201);
        $insert_res= $db->query("SELECT * FROM documents ORDER BY no DESC LIMIT 1")->fetch_assoc();
        die('{ "no": "'.$insert_res['no'].'", "title": "'.$insert_res['title']
            .'", "description": "'.$insert_res['description'].'", "location": "'.$insert_res['location'].'" }');
    }
}
else if($_SERVER["REQUEST_METHOD"] == "PUT") {
    $request = get_json_request();
    $no = sanetize($request['no']);
    $title = sanetize($request['title']);
    $description = sanetize($request['description']);
    $location = sanetize($request['location']);
    
    $resource = $db->query("UPDATE documents SET title='$title', description='$description', location='$location' WHERE no=$no");
    if ($resource) {
        http_response_code(201);
        $insert_res = $db->query("SELECT * FROM documents WHERE no=$no")->fetch_assoc();
        die('{ "no": "'.$insert_res['no'].'", "title": "'.$insert_res['title']
            .'", "description": "'.$insert_res['description'].'", "location": "'.$insert_res['location'].'" }');
    }
}
else if($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $request = get_json_request();
    $no = sanetize($request['no']);

    $resource = $db->query("DELETE FROM documents WHERE no=$no");
    if ($resource) {
        http_response_code(200);
        die('{"delete": "ok", "no": "'.$no.'"}');
    }
}

http_response_code(500);
?>