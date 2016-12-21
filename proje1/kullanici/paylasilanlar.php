<?php
require_once "connection.php";

    include 'paylasim/mesaj.php';

?>
    <h1>PAYLAŞTIKLARIN:</h1>
<?php
//profilde paylaşılanlara bakalım
foreach ($connection->query("SELECT * FROM paylasilan WHERE kullanici = $studentId") as $paylasilan):

    if ($_SESSION) {
        $studentId = (int)$_GET['id'];
        @$student = $connection->query("SELECT * FROM uyeler WHERE id = $studentId")->fetch();
        if (!$student) echo "okeydiğil";
    }else {
        header("Refresh: 0; url=../index.php");
    }
    ?>

    <?= $paylasilan['text'] ?>

<?php  if ($_SESSION['id'] == $student['id'] ){ ?>
    <br>    <a href="paylasilan.php?id=<?= $paylasilan['id'] ?>"> GÜNCELLE </a><br>
    <hr>
<?php } ?>
    <br><hr>
<?php endforeach;
// bir döngü ile gelen her bir öğrenciyi ekrana bastık
    ?>











