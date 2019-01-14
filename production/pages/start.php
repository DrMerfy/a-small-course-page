<?php
        require '../server/checkAuthorization.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Αρχική Σελίδα</title>
    <meta name="author" content="George Melissourgos">
    <link rel="stylesheet" type="text/css" media="screen" href="../reset.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../main.css" />
    <!--Fonts & icons-->
    <link rel="shortcut icon" type="image/png" href="../images/fav-icon.png">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:400,600&amp;subset=greek" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/solid.css" integrity="sha384-uKQOWcYZKOuKmpYpvT0xCFAs/wE157X5Ua3H5onoRAOCNkJAMX/6QF0iXGGQV9cP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/fontawesome.css" integrity="sha384-HU5rcgG/yUrsDGWsVACclYdzdCcn5yU8V/3V84zSrPDHwZEdjykadlgI6RHrxGrJ" crossorigin="anonymous">    
</head>

<body>
    <nav>
        <ul>
            <li class="selected"><a href="#"><i class="fas fa-home"></i>Αρχική σελίδα</a></li>
            <li><a href="./announcement.php"><i class="fas fa-bullhorn"></i>Ανακοινώσεις</a></li>
            <li><a href="./communication.php"><i class="fas fa-comment-alt"></i>Επικοινωνία</a></li>
            <li><a href="./documents.php"><i class="fas fa-file-alt"></i>Έγγραφα μαθήματος</a></li>
            <li><a href="./homework.php"><i class="fas fa-pencil-ruler"></i>Εργασίες</a></li>
        </ul>
    </nav>
    <main id="index">
        <h1>Αρχική σελίδα</h1>
        <p>Είμαι ένας ιστόχωρος για την εκμάθηση μουσικής. Ο δημιουργός μου βαριόταν να γράψει κανονικό κείμενο, ορίστε ένα ψευδολατινικό κείμενο: </p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel augue vitae mauris sodales elementum. Donec nec mauris quis mauris suscipit maximus at id massa. Cras dolor nisl, viverra a dolor et, aliquam malesuada quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam non libero vel velit volutpat viverra sit amet et elit. Fusce lacinia consectetur magna vel euismod. Suspendisse convallis sapien euismod interdum imperdiet. Sed imperdiet elit ex, finibus consequat orci interdum id. Vivamus interdum porttitor velit a vulputate. Proin rhoncus fringilla rhoncus. Mauris at ligula vel risus porta posuere. In hac habitasse platea dictumst. Aliquam quis metus vitae libero finibus fermentum eu et ante. Nullam suscipit eros ac vestibulum dapibus. Curabitur ut orci velit. Quisque pretium tincidunt orci, eu consequat libero tincidunt et.</p>
        <p>Integer viverra tristique mi vel sodales. Curabitur interdum semper diam, nec malesuada libero venenatis sit amet. Sed vel libero eget tortor dignissim vulputate. Donec augue risus, tempor in faucibus eu, auctor ut velit. Nunc maximus a dolor ultricies pharetra. Aliquam sed commodo leo. Ut non nulla fringilla, pretium nulla eget, aliquet lorem. Etiam feugiat vel elit et rhoncus. Donec sed nulla quis nulla auctor pharetra quis vitae nulla. Cras efficitur, turpis vel pharetra pellentesque, neque risus lobortis magna, at vestibulum dui lorem a justo. Phasellus a orci quis enim iaculis condimentum sed nec eros. Mauris egestas libero ligula, quis venenatis erat commodo ut.</p>
        <div class="image-holder">
            <img src="../images/index.jpg" alt="Music abstract."/>
            <!--Credits:-->
            <p>Photo by <a href="https://unsplash.com/photos/JAHdPHMoaEA?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Spencer Imbrock</a></p>
        </div>
    </main>
</body>
</html>