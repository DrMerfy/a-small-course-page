<?php
        require '../server/checkAuthorization.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Έγγραφα μαθήματος</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../reset.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../main.css" />
    <!--Fonts & icons-->
    <link rel="shortcut icon" type="image/png" href="../images/fav-icon.png">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:400,600&amp;subset=greek" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/solid.css" integrity="sha384-uKQOWcYZKOuKmpYpvT0xCFAs/wE157X5Ua3H5onoRAOCNkJAMX/6QF0iXGGQV9cP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/fontawesome.css" integrity="sha384-HU5rcgG/yUrsDGWsVACclYdzdCcn5yU8V/3V84zSrPDHwZEdjykadlgI6RHrxGrJ" crossorigin="anonymous">

    <!--Scripts for interaction-->
    <script defer src="../scripts/bottom_arrow.js"></script>
    <script defer src="../scripts/load_documents.js"></script>
    <script defer src="../scripts/form_document.js"></script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="./start.php"><i class="fas fa-home"></i>Αρχική σελίδα</a></li>
            <li><a href="./announcement.php"><i class="fas fa-bullhorn"></i>Ανακοινώσεις</a></li>
            <li><a href="./communication.php"><i class="fas fa-comment-alt"></i>Επικοινωνία</a></li>
            <li class="selected"><a href="./documents.php"><i class="fas fa-file-alt"></i>Έγγραφα μαθήματος</a></li>
            <li><a href="./homework.php"><i class="fas fa-pencil-ruler"></i>Εργασίες</a></li>
        </ul>
    </nav>
    <main>
        <h1>Έγγραφα μαθήματος</h1>
        <div id="options">
        </div>
        <ul id="documents-list">
            <!-- async loading of data -->

            <!--This element's behaviour is also affected by the bottom_arrow.js -->
            <span id="bottom-arrow" onclick="scrollToTop()"></span>
        </ul>

        <!-- Modal form for adding/editing the announcements -->
        <div class="modal-form">
            <button aria-label="close edit form" onclick="close_form()">&times;</button>
            <form>
                <p class="bold-text">Τίτλος:</p>
                <input class="title_input" type="text">
                <p class="bold-text">Περιγραφή:</p>
                <textarea class="description_input" type="text" cols="30" rows="10"></textarea>
                <p class="bold-text">Αρχείο:</p>
                <p id="previous-file-name" class="none"></p>
                <input type="file" name="file_to_upload" class="file-upload">
                <button class="sumbit-btn" type="button" onkeyup="checkForEnterAndSumbit(event)" onclick="sumbit_form()">Αποθήκευση</button>
            </form>
        </div>
    </main>

</body>
</html>
