<?php
    require './connectDB.php';
    require './JSONTools.php';

    $db = connect_to_db();
    // $request = get_json_request();

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

    }

?>