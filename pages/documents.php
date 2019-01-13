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
        <ul>
            <li class="list-box doc-box">
                <h2>Τίτλος εγγράφου 1</h2>
                <p><span class="bold-text">Περιγραφή: </span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, quo.</p>
                <a href="../files/file1.doc">Download</a>
            </li>
            <li class="list-box doc-box">
                <h2>Τίτλος εγγράφου 2</h2>
                <p><span class="bold-text">Περιγραφή: </span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, quo.</p>
                <a href="../files/file2.doc">Download</a>
            </li>
            <li class="list-box doc-box">
                <h2>Τίτλος εγγράφου 3</h2>
                <p><span class="bold-text">Περιγραφή: </span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, quo.</p>
                <a href="../files/file3.doc">Download</a>
            </li>
            <li class="list-box doc-box">
                <h2>Τίτλος εγγράφου 4</h2>
                <p><span class="bold-text">Περιγραφή: </span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, quo.</p>
                <a href="../files/file4.doc">Download</a>
            </li>
            <li class="list-box doc-box">
                <h2>Τίτλος εγγράφου 5</h2>
                <p><span class="bold-text">Περιγραφή: </span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, quo.</p>
                <a href="../files/file5.doc">Download</a>
            </li>
            <li class="list-box doc-box">
                <h2>Τίτλος εγγράφου 6</h2>
                <p><span class="bold-text">Περιγραφή: </span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, quo.</p>
                <a href="../files/file6.doc">Download</a>
            </li>
            <li class="list-box doc-box">
                <h2>Τίτλος εγγράφου 7</h2>
                <p><span class="bold-text">Περιγραφή: </span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, quo.</p>
                <a href="../files/file7.doc">Download</a>
            </li>
            <li class="list-box doc-box">
                <h2>Τίτλος εγγράφου 8</h2>
                <p><span class="bold-text">Περιγραφή: </span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, quo.</p>
                <a href="../files/file8.doc">Download</a>
            </li>
            <li class="list-box doc-box">
                <h2>Τίτλος εγγράφου 9</h2>
                <p><span class="bold-text">Περιγραφή: </span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, quo.</p>
                <a href="../files/file9.doc">Download</a>
            </li>

            <!--This element's behaviour is also affected by the bottom_arrow.js -->
            <span id="bottom-arrow" onclick="scrollToTop()"></span>
        </ul>
    </main>

</body>
</html>
