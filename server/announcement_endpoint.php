<?php
    require './connectDB.php';
    require './JSONTools.php';

    $db = connect_to_db();

    // Force utf-8
    $db->query("SET NAMES 'utf8'");

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $result = $db->query("SELECT * FROM `announcements`");
        $response = '{"announcements":['; 
        
        while ($row = $result->fetch_array()) {
            $no = $row['no'];
            $date = $row['date'];
            $subject = $row['subject'];
            $text = $row['text'];
            $isLinked = $row['isLinked'];
            
            $response .= '{ "no": "'.$no.'", "date": "'.$date.'", "subject": "'.$subject.'", "text": "'.$text.'", "isLinked": "'.$isLinked.'" },';
        }

        $response = rtrim($response,",");
        $response .= ']}';
        die($response);
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST") {
        $request = get_json_request();
        $date = date("Y-m-d"); // Don't trust the user
        $subject = sanetize($request['subject']);
        $text = sanetize($request['text']);
        $isLinked = (int)sanetize($request['isLinked']);

        $resource = $db->query("INSERT INTO `announcements`(`date`, `subject`, `text`, `isLinked`) VALUES ('$date', '$subject', '$text', $isLinked)");
        if ($resource) {
            http_response_code(201);
            $insert_res= $db->query("SELECT * FROM announcements ORDER BY no DESC LIMIT 1")->fetch_assoc();
            die('{ "no": "'.$insert_res['no'].'", "date": "'.$insert_res['date']
                .'", "subject": "'.$insert_res['subject'].'", "text": "'.$insert_res['text']
                .'", "isLinked": "'.$insert_res['isLinked'].'" }');
        }
    }
    else if($_SERVER["REQUEST_METHOD"] == "PUT") {
        $request = get_json_request();
        $no = sanetize($request['no']);
        $subject = sanetize($request['subject']);
        $text = sanetize($request['text']);
        $isLinked = (int)sanetize($request['isLinked']);
        
        $resource = $db->query("UPDATE announcements SET subject='$subject', text='$text', isLinked='$isLinked' WHERE no=$no");
        if ($resource) {
            http_response_code(201);
            $insert_res = $db->query("SELECT * FROM announcements WHERE no=$no")->fetch_assoc();
            die('{ "no": "'.$insert_res['no'].'", "date": "'.$insert_res['date']
                .'", "subject": "'.$insert_res['subject'].'", "text": "'.$insert_res['text']
                .'", "isLinked": "'.$insert_res['isLinked'].'" }');
        }
    }
    else if($_SERVER["REQUEST_METHOD"] == "DELETE") {
        $request = get_json_request();
        $no = sanetize($request['no']);

        $resource = $db->query("DELETE FROM announcements WHERE no=$no");
        if ($resource) {
            http_response_code(200);
            die('{"delete": "ok", "no": "'.$no.'"}');
        }
    }

    http_response_code(500);
?>