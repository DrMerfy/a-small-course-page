<?php
        require '../server/checkAuthorization.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ανακοινώσεις</title>
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
</head>
<body>
    <nav>
        <ul>
            <li><a href="./start.php"><i class="fas fa-home"></i>Αρχική σελίδα</a></li>
            <li class="selected"><a href="./announcement.php"><i class="fas fa-bullhorn"></i>Ανακοινώσεις</a></li>
            <li><a href="./communication.php"><i class="fas fa-comment-alt"></i>Επικοινωνία</a></li>
            <li><a href="./documents.php"><i class="fas fa-file-alt"></i>Έγγραφα μαθήματος</a></li>
            <li><a href="./homework.php"><i class="fas fa-pencil-ruler"></i>Εργασίες</a></li>
        </ul>
    </nav>

    <main>
        <h1>Ανακοινώσεις</h1>
        <ul>
            <li class="list-box">
                <h2>Ανακοίνωση 1</h2>
                <p><span class="bold-text">Ημερομηνία: </span>26/09/2017</p>
                <p class="subject"><span class="bold-text">Θέμα: </span>Βαθμολογία εξετάσεων Σεπτεμβρίου 2017</p>
                <p>Αναρτήθηκε η βαθμολογία εξετάσεων Σεπτεμβρίου 2017. Για απορίες παρακαλώ να με επισκεφθείτε στο γραφείο μου την Δευτέρα 2/10/2017 και ώρα 11.00</p>
            </li>

            <li class="list-box">
                <h2>Ανακοίνωση 2</h2>
                <p><span class="bold-text">Ημερομηνία: </span>18/09/2017</p>
                <p class="subject"><span class="bold-text">Θέμα: </span>Παράταση παράδοσης εργασιών</p>
                <p>Η προθεσμία παράδοσης εργασιών έχει παραταθείμέχρι 22/9/2017</p>
            </li>

            <li class="list-box">
                <h2>Ανακοίνωση 3</h2>
                <p><span class="bold-text">Ημερομηνία: </span>01/06/2017</p>
                <p class="subject"><span class="bold-text">Θέμα: </span>Βαθμολογια Ιουνίου</p>
                <p>Αναρτήθηκε  η βαθμολογία. Για απορίες, μπορειτε να επισκεφθειτε τον διδάσκοντα την Τρίτη 4/7 και ώρα 10-11 στο γραφείο του.</p>
            </li>

            <li class="list-box">
                <h2>Ανακοίνωση 4</h2>
                <p><span class="bold-text">Ημερομηνία: </span>19/12/2016</p>
                <p class="subject"><span class="bold-text">Θέμα: </span>Ανακοίνωση εργασιών</p>
                <p>Αγαπητοί φοιτητές και αγαπητές φοιτήτριες. Ανακοινώθηκαν οι δύο εργασίες του μαθήματος. Καλή επιτυχία!</p>
            </li>

            <li class="list-box">
                <h2>Ανακοίνωση 5</h2>
                <p><span class="bold-text">Ημερομηνία: </span>12/10/2016</p>
                <p class="subject"><span class="bold-text">Θέμα: </span>Αναβολή διάλεξης</p>
                <p>Η διάλεξη της Παρασκευής 14/10 αναβάλλεται λόγω απουσίας μου στο εξωτερικό. Με νέα ανακοίνωση θα γίνει γνωστή η μέρα και ώρα αναπλήρωσης.</p>
            </li>

            <li class="list-box">
                <h2>Ανακοίνωση 6</h2>
                <p><span class="bold-text">Ημερομηνία: </span>27/09/2016</p>
                <p class="subject"><span class="bold-text">Θέμα: </span>Βαθμολογία εξετάσεων/εργασιών Σεπτεμβρίου 2016</p>
                <p>Αναρτήθηκε η βαθμολογία των εξετάσεων/εργασιών Σεπτεμβρίου 2016. Για διευκρινίσεις μπορείτε να επισκεφθείτε τον διδάσκοντα στο Γραφείο του (Γραφείο 20, 2ος όροφος, Εθνικής Αντιστάσεως 16, Καλαμαριά) την Πέμπτη 29/9 και ώρα 12.00.</p>
            </li>

            <li class="list-box">
                <h2>Ανακοίνωση 7</h2>
                <p><span class="bold-text">Ημερομηνία: </span>27/06/2016</p>
                <p class="subject"><span class="bold-text">Θέμα: </span>Αποτελέσματα εξετάσεων και εργασιών / Ιούνιος 2016</p>
                <p>Αναρτήθηκαν τα αποτελέσματα των εξετάσεων. Καλό καλοκαίρι!</p>
            </li>

            <li class="list-box">
                <h2>Ανακοίνωση 8</h2>
                <p><span class="bold-text">Ημερομηνία: </span>12/12/2008</p>
                <p class="subject"><span class="bold-text">Θέμα: </span>Έναρξη μαθημάτων</p>
                <p>Τα μαθήματα αρχίζουν την Δευτέρα 17/12/2008</p>
            </li>

            <li class="list-box">
                <h2>Ανακοίνωση 9</h2>
                <p><span class="bold-text">Ημερομηνία: </span>15/12/2008</p>
                <p class="subject"><span class="bold-text">Θέμα: </span>Ανάρτηση εργασίας</p>
                <p>Η 1η εργασία έχει ανακοινωθεί στην ιστοσελίδα <a href="./homework.html">«Εργασίες»</a></p>
            </li>
        </ul>

        <!--This element's behaviour is also affected by the bottom_arrow.js -->
        <span id="bottom-arrow" onclick="scrollToTop()"></span>
    </main>

</body>
</html>
