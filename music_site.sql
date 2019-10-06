-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: webpagesdb.it.auth.gr:3306
-- Generation Time: Oct 06, 2019 at 12:56 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `no` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `isLinked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`no`, `date`, `subject`, `text`, `isLinked`) VALUES
(1, '2017-09-26', 'Βαθμολογία εξετάσεων Σεπτεμβρίου 2017', 'Αναρτήθηκε η βαθμολογία των εξετάσεων του Σεπτεμβρίου.', 1),
(2, '2017-09-18', 'Παράταση παράδοσης εργασιών', 'Η προθεσμία παράδοσης εργασιών έχει παραταθεί μέχρι 22/9/2017', 0),
(3, '2017-06-01', 'Βαθμολογια Ιουνίου', 'Αναρτήθηκε  η βαθμολογία. Για απορίες, μπορειτε να επισκεφθειτε τον διδάσκοντα την Τρίτη 4/7 και ώρα 10-11 στο γραφείο του.', 0),
(4, '2016-12-19', 'Ανακοίνωση εργασιών', 'Αγαπητοί φοιτητές και αγαπητές φοιτήτριες. Ανακοινώθηκαν οι δύο εργασίες του μαθήματος. Καλή επιτυχία!', 1),
(5, '2016-10-12', 'Αναβολή διάλεξης', 'Η διάλεξη της Παρασκευής 14/10 αναβάλλεται λόγω απουσίας μου στο εξωτερικό. Με νέα ανακοίνωση θα γίνει γνωστή η μέρα και ώρα αναπλήρωσης.', 0),
(6, '2016-09-27', 'Βαθμολογία εξετάσεων/εργασιών Σεπτεμβρίου 2016', 'Αναρτήθηκε η βαθμολογία των εξετάσεων/εργασιών Σεπτεμβρίου 2016. Για διευκρινίσεις μπορείτε να επισκεφθείτε τον διδάσκοντα στο Γραφείο του (Γραφείο 20, 2ος όροφος, Εθνικής Αντιστάσεως 16, Καλαμαριά) την Πέμπτη 29/9 και ώρα 12.00.', 0),
(7, '2016-06-27', 'Αποτελέσματα εξετάσεων και εργασιών / Ιούνιος 2016', 'Αναρτήθηκαν τα αποτελέσματα των εξετάσεων. Καλό καλοκαίρι!', 0),
(8, '2008-12-15', 'Ανάρτηση εργασίας', 'Η 1η εργασία έχει ανακοινωθεί στην ιστοσελίδα', 1),
(9, '2008-12-12', 'Έναρξη μαθημάτων', 'Τα μαθήματα αρχίζουν την Δευτέρα 17/12/2008', 0),
(15, '2019-01-16', 'Προθεσμίες υποβολής εργασιών', 'Οι προθεσμίες υποβολής των εργασιών είναι ως ακολούθως:22/1/2019: Εργασία 1 (Photoshop - Υποχρεωτική) / Εργασία 2 (GIMP/GAP - Yποχρεωτική) / Εργασία 3 (Blender - Υποχρεωτική)Καλή επιτυχία!', 0),
(16, '2019-01-16', 'Βαθμολογίες εξέτασης και εργασιών Σεπτεμβρίου 2018', 'Αγαπητοί φοιτητές και αγαπητές φοιτήτριες,Ανακοινώθηκαν τα αποτελέσματα των εξετάσεων και εργασιών Σεπτεμβρίου 2018.Η βαθμολογία θα παραδοθεί στην γραμματεία 9/10/2018.', 0),
(17, '2019-01-16', 'Προθεσμίες υποβολής εργασιών', 'Οι προθεσμίες υποβολής των εργασιών είναι ως ακολούθως:20/6/2018: Εργασία 1 (Photoshop - Υποχρεωτική) / Εργασία 2 (GIMP/GAP - Yποχρεωτική) / Εργασία 3 (Blender - Υποχρεωτική) / Προαιρετική Εργασία 111/6/2018: Προαιρετική Εργασία 2 (Αξιολόγηση) Καλή επιτυχία!', 0),
(18, '2019-01-16', 'Αποτελέσματα εξετάσεων και εργασιών', 'Αγαπητοί φοιτητές και Αγαπητές φοιτήτριες, ανακοινώθηκε η βαθμολογία σας.Όποιος/α θέλει να δει το γραπτό του/της μπορεί να έρθει στο γραφείο μου (Γραφείο 20, 2ος Όροφος, Εθνικής Αντιστάσεως 16, Καλαμαριά) 6//72018 και ώρα 11.00. Καλό καλοκαίρι.', 0),
(19, '2019-01-21', 'Ανακοινώθηκε η εργασία.', 'Ανακοινώθηκε η εργασία με τίτλο: Εργασίας στις δυναμικές ιστοσελίδες. Μπορείτε να την δείτε εδώ:', 1);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `no` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`no`, `title`, `description`, `location`) VALUES
(1, 'Από τις θεωρίες µάθησης στις µαθησιακές στρατηγικές', 'Πως οι θεωρίες αυτές επιδρούν στο σχεδιασµό µαθησιακών περιβαλλόντων µε τη χρήση υπολογιστή.', '../files/3987_InternetLE_01-pedagogical_models_and_technology.pdf'),
(8, 'Έγγραφο 2', 'Είμαι ένα άλλο έγγραφο.', '../files/5694_file1.doc'),
(9, 'Έγγραφο 3', 'Είμαι ένα ακόμη έγγραφο.', '../files/6043_file3.doc'),
(10, 'Έγγραφο 4', 'Δεν υπάρχει πρόβλημα ακόμη κι αν ανέβει έγγραφο με το ίδιο όνομα.', '../files/9616_file3.doc'),
(11, 'Γεμίζω τον χώρο.', 'Είμαι εδώ για να γεμίσω τον χώρο.', '../files/7053_file1.doc'),
(12, 'Τα VLEs.', 'Εδώ μπορείτε να βρείτε τις διαφάνειες του μαθήματος για τα VLEs.', '../files/5120_InternetLE_04-05-VLE-intro.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `no` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `goals` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `logistics` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `location` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`no`, `title`, `goals`, `description`, `logistics`, `date`, `location`) VALUES
(1, 'Εργασία 1', 'Στόχος 1, Στόχος 2, Στόχος 3', 'Κατεβάστε την εκφώνηση της εργασίας από εδώ:', 'Γραπτή αναφορά σε word, Παρουσίαση σε powerpoint', '2009-12-05', '../files/3901_ergasia1.doc'),
(2, 'Εργασία 2', 'Στόχος 1, Στόχος 2, Στόχος 3, Στόχος 4', 'Κατεβάστε την εκφώνηση της εργασίας από εδώ:', 'Γραπτή αναφορά σε word, Παρουσίαση σε powerpoint', '2009-05-10', '../files/397_ergasia2.doc'),
(3, 'Εργασία 3', 'Στόχος 1, Στόχος 2, Στόχος 3', 'Κατεβάστε την εκφώνηση της εργασίας από εδώ:', 'Γραπτή αναφορά σε word, Παρουσίαση σε powerpoint', '2009-12-05', '../files/516_ergasia3.doc'),
(4, 'Εργασία 4', 'Στόχος 1, Στόχος 2, Στόχος 3, Στόχος 4', 'Κατεβάστε την εκφώνηση της εργασίας από εδώ:', 'Γραπτή αναφορά σε word, Παρουσίαση σε powerpoint', '2009-12-05', '../files/5519_ergasia2.doc'),
(5, 'Εργασία 5', 'Στόχος 1, Στόχος 2, Στόχος 3, Στόχος 4, Στόχος 5', 'Κατεβάστε την εκφώνηση της εργασίας από εδώ:', 'Γραπτή αναφορά σε word, Παρουσίαση σε powerpoint', '2019-02-05', '../files/5532_ergasia1.doc'),
(6, 'Εργασίας στις δυναμικές ιστοσελίδες', 'html, css, javascript, php', 'Κατεβάστε την εκφώνηση της εργασίας από εδώ:', 'Source code, Γραπτή αναφορά σε word', '2019-01-31', '../files/3829_2017-18-ERGASIA_partB-HTML-PHP-MySQL1.doc');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `no` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` enum('tutor','student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`no`, `name`, `surname`, `email`, `password`, `role`) VALUES
(14, 'George', 'Melissourgos', 'geomelkon@csd.auth.gr', '123412', 'tutor'),
(30, 'John', 'Melissourgos', 'melissourgos@outlook.com', '12345', 'student'),
(31, 'Kostas', 'Malamas', 'malamas@gmail.com', 'session', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
