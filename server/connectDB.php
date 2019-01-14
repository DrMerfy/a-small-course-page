<?php
    // Establise db connection

    function connect_to_db() {
        $servername = "localhost";
        $username = "api_server";
        $password = "123412";
        $dbname = "music_site";
        
        $db = new mysqli($servername, $username, $password, $dbname);

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        return $db; 
    }
?>

