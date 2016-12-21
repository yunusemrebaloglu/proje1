
<?php include('head.php'); ?>
<body>

<div class="container">
    <?php include('navbar.php'); ?>


    <?php


    require_once "connection.php";


    // veritabanındaki "students" tablosundan tüm öğrencilerin tüm verilerini sorgulayıp döngüye sokalım
    foreach( $connection->query("SELECT * FROM uyeler WHERE admin = '2'") as $student ): ?>
        <a href="uye.php?id=<?=$student['id']?>"><?=$student['kadi']?> <?=$student['sifre']?></a><br>
    <?php endforeach;

    // bir döngü ile gelen her bir öğrenciyi ekrana bastık

    ?>


</div>
</body>
</html>
