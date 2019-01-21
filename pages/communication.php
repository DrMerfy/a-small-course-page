<?php
        require '../server/checkAuthorization.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Επικοινωνία</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../reset.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../main.css" />
    <!--Fonts & icons-->
    <link rel="shortcut icon" type="image/png" href="../images/fav-icon.png">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:400,600&amp;subset=greek" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/solid.css" integrity="sha384-uKQOWcYZKOuKmpYpvT0xCFAs/wE157X5Ua3H5onoRAOCNkJAMX/6QF0iXGGQV9cP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/fontawesome.css" integrity="sha384-HU5rcgG/yUrsDGWsVACclYdzdCcn5yU8V/3V84zSrPDHwZEdjykadlgI6RHrxGrJ" crossorigin="anonymous">

    <script defer src="../scripts/get_cookies.js"></script>    
    <script defer src="../scripts/show_user_tab.js"></script>
    <script defer src="../scripts/mail_sender.js"></script>    
</head>
<body>
    <nav>
        <ul id="nav-list">
            <li><a href="./start.php"><i class="fas fa-home"></i>Αρχική σελίδα</a></li>
            <li><a href="./announcement.php"><i class="fas fa-bullhorn"></i>Ανακοινώσεις</a></li>
            <li class="selected"><a href="./communication.php"><i class="fas fa-comment-alt"></i>Επικοινωνία</a></li>
            <li><a href="./documents.php"><i class="fas fa-file-alt"></i>Έγγραφα μαθήματος</a></li>
            <li><a href="./homework.php"><i class="fas fa-pencil-ruler"></i>Εργασίες</a></li>
        </ul>
    </nav>
    <main>
        <h1>Επικοινωνία</h1>
        <div id="communication-container">
            <div class="contact-box">
                <h2>Αποστολή e-mail μέσω web φόρμας.</h2>
                <form>
                    <p>Αποστολέας:</p>
                    <input type="email" name="sender" placeholder="Διεύθυνση email">
                    <p>Θέμα:</p>
                    <input type="text" name="subject" placeholder="Θέμα">
                    <p>Κείμενο:</p>
                    <textarea name="message" cols="20" rows="10" placeholder="Μύνημα"></textarea>
                    <p id="message_sent"class="none">Το email έχει αποσταλεί.</p>
                    <input type="button" value="Αποστολή" onclick="send_mail()">
                </form>
            </div>

            <div class="contact-box">
                <h2>Αποστολή e-mail με χρήση e-mail διεύθυνσης</h2>
                <p>Εναλλακτικά μπορείτε να αποστείλετε e-mail στην παρακάτω διεύθυνση ηλεκτρονικού ταχυδρομείου:</p>
                <a href="mailto:tutor@csd.auth.test.gr">tutor@csd.auth.test.gr</a>
            </div>
        </div>
    </main>
</body>
</html>
