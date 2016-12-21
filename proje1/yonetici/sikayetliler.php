
<?php include('head.php'); ?>
<body>

<div class="container">
    <?php include('navbar.php'); ?>


    <?php


    require_once "connection.php";

    if ($_SESSION) {

            if ($_SESSION['admin'] != 1)
            // veritabanındaki "students" tablosundan tüm öğrencilerin tüm verilerini sorgulayıp döngüye sokalım
            foreach ($connection->query("SELECT * FROM uyeler WHERE dikkat = '1'") as $student): ?>
                    <a href="uye.php?id=<?= $student['id'] ?>"><?= $student['kadi'] ?> <?= $student['sifre'] ?></a>
                    <br>
            <?php endforeach;


            // bir döngü ile gelen her bir öğrenciyi ekrana bastık
    }
    ?>



</div>
</body>
</html>
