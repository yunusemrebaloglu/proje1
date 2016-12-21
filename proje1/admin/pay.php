<h1>PAYLAŞILANLAR</h1>
<?php
require_once "connection.php";
//profilde paylaşılanlara bakalım
foreach ($connection->query("SELECT * FROM paylasilan ") as $pay):
    ?>
   PAYLAŞAN KULLANININ İD: <?= $pay['kullanici'] ?><br>
   PAYLAŞILAN METİN <?= $pay['text'] ?>

    <a href="yorum.php?id=<?= $pay['id'] ?>"> Yorumla </a><br>
    <br><hr><br>
<?php endforeach;
// bir döngü ile gelen her bir öğrenciyi ekrana bastık
?>





















