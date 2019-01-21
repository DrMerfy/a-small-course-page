<?php
    // Checks if a user is a tutor.

    if (isset($_SESSION['valid']) && $_SESSION['valid'] == true &&
        isset($_SESSION['role']) && $_SESSION['role'] == 'tutor') {

    } else {
        // Restrict access
        // TODO
        header("Location: ../start.php");
        die();
    }
?>