
<?php include('head.php'); ?>
<body>

<div class="container">
    <?php include('navbar.php'); ?>

    KULLANICI ARAMA <br>
    <form action="arama.php" method="post">
        <input type="text" name="kelime" > <br>
        <input type="submit" value="ARA"><br><hr>
    </form>
    <?php



    require_once "connection.php";
    if ($_SESSION) {

            if ($_SESSION['admin'] != 1)

                    // veritabanındaki "students" tablosundan tüm öğrencilerin tüm verilerini sorgulayıp döngüye sokalım
                    foreach ($connection->query("SELECT * FROM uyeler WHERE admin !='3' ") as $student): ?>

                            <br> kulllanıcı adı: <?= $student['kadi'] ?>
                            <br> şifre: <?= $student['sifre'] ?>
                            <br> şikayetlimi ?: <?= $student['dikkat'] ?>
                            <br> Eposta: <?= $student['eposta'] ?>
                            <br> adminmi: <?= $student['admin'] ?>
                            <br>    <a href="uye.php?id=<?= $student['id'] ?>"> GÜNCELLE </a><br>
                            <hr>
                    <?php endforeach;

            // bir döngü ile gelen her bir öğrenciyi ekrana bastık
    }
    ?>

</div>
</body>
</html>
