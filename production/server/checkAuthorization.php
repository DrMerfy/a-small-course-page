<?php
    // Checks if a user is logged in. If not prompts to the login page.
    session_start();

    if (isset($_SESSION['valid']) && $_SESSION['valid'] == true &&
        isset($_SESSION['username'])) {

    } else {
        // Restrict access
        // TODO
        header("Location: ../index.html");
        die();
    }
?>