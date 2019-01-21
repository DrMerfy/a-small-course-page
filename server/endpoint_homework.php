<?php
require './connectDB.php';
require './JSONTools.php';

$db = connect_to_db();

// Force utf-8
$db->query("SET NAMES 'utf8'");

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $result = $db->query("SELECT * FROM `homework`");
    $response = '{"homework":['; 
    
    while ($row = $result->fetch_array()) {
        $no = $row['no'];
        $title = $row['title'];
        $goals = $row['goals'];
        $description = $row['description'];
        $logistics = $row['logistics'];
        $date = $row['date'];
        $location = $row['location'];
        
        $response .= '{ "no": "'.$no.'", "title": "'.$title.'", "goals": "'. $goals.'", "description": "'.$description.'", "logistics": "'. $logistics.'", "date": "'. $date.'", "location": "'.$location.'"},';
    }

    $response = rtrim($response,",");
    $response .= ']}';
    die($response);
}
else if($_SERVER["REQUEST_METHOD"] == "POST") {

    $request = get_json_request();
    $title = sanetize($request['title']);
    $goals = sanetize($request['goals']);
    $description = sanetize($request['description']);
    $logistics = sanetize($request['logistics']);
    $date = sanetize($request['date']);
    $location = sanetize($request['location']);

    $resource = $db->query("INSERT INTO `homework`(`title`, `goals`, `description`, `logistics`, `date`, `location`) VALUES ('$title', '$goals', '$description', '$logistics', '$date', '$location')");
    if ($resource) {
        create_announcement($title);
        http_response_code(201);
        $insert_res= $db->query("SELECT * FROM homework ORDER BY no DESC LIMIT 1")->fetch_assoc();
        die('{ "no": "'.$insert_res['no'].'", "title": "'.$insert_res['title'].'", "goals": "'. $insert_res['goals'].
            '", "description": "'.$insert_res['description'].'", "logistics": "'. $insert_res['logistics'].
            '", "date": "'. $insert_res['date'].'", "location": "'.$insert_res['location'].'"}');
    }
}
else if($_SERVER["REQUEST_METHOD"] == "PUT") {
    $request = get_json_request();
    $no = sanetize($request['no']);
    $title = sanetize($request['title']);
    $goals = sanetize($request['goals']);
    $description = sanetize($request['description']);
    $logistics = sanetize($request['logistics']);
    $date = sanetize($request['date']);
    $location = sanetize($request['location']);
    
    $resource = $db->query("UPDATE homework SET title='$title', goals='$goals', description='$description', logistics='$logistics', date='$date', location='$location' WHERE no=$no");
    if ($resource) {
        http_response_code(201);
        $insert_res = $db->query("SELECT * FROM homework WHERE no=$no")->fetch_assoc();
        die('{ "no": "'.$insert_res['no'].'", "title": "'.$insert_res['title'].'", "goals": "'. $insert_res['goals'].
            '", "description": "'.$insert_res['description'].'", "logistics": "'. $insert_res['logistics'].
            '", "date": "'. $insert_res['date'].'", "location": "'.$insert_res['location'].'"}');
    }
}
else if($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $request = get_json_request();
    $no = sanetize($request['no']);

    $resource = $db->query("DELETE FROM homework WHERE no=$no");
    if ($resource) {
        http_response_code(200);
        die('{"delete": "ok", "no": "'.$no.'"}');
    }
}

function create_announcement($title) {
    global $db;
    $date = date("Y-m-d"); // Don't trust the user
    $subject = "Ανακοινώθηκε η εργασία.";
    $text = "Ανακοινώθηκε η εργασία με τίτλο: $title. Μπορείτε να την δείτε εδώ:";
    $isLinked = 1;
    
    $db->query("INSERT INTO `announcements`(`date`, `subject`, `text`, `isLinked`) VALUES ('$date', '$subject', '$text', $isLinked)");
}

http_response_code(500);
?>