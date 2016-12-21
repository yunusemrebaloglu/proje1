<?php
require_once "connection.php";
if ($_SESSION['id']== $studentId ) {
    include 'mesaj.php';
}else {}
?>
    <h1>PAYLAŞTIKLARIN:</h1>
<?php
//profilde paylaşılanlara bakalım
foreach ($connection->query("SELECT * FROM paylasilan WHERE kullanici = $studentId") as $paylasilan):
    ?>

    <?= $paylasilan['text'] ?>
    <?php if ($_SESSION['admin'] == 3) { ?>
    <br>    <a href="paylasilan.php?id=<?= $paylasilan['id'] ?>"> GÜNCELLE </a><br>
    <hr>
    <?php } ?>
    <br><hr>
<?php endforeach;

    ?>










