
<?php include('head.php'); ?>
<body>

<div class="container">
    <?php include('navbar.php'); ?>

    <?php

    // ÖĞRENCİ DETAY SAYFASI

    // Adres çubuğundan "id" değişkeni içinde gelen öğrenci id'sini $_GET üzerinden alacağız, veritabanında bu id ile kayıtlı öğrenciyi seçeceğiz ve bilgilerini ekranda göstereceğiz

    // BAĞLANTI İŞLEMLERİNİ İÇEREN DOSYAYI ÇAĞIRALIM
    require_once "connection.php";
    if ($_SESSION) {

        if ($_SESSION['admin'] != 1)
            // GETten ID'yi integer olarak alalım
            $studentId = (int)$_GET['id'];

        // sorgu ile oluşan kaynağı dizi olarak alalım
        @$student = $connection->query("SELECT * FROM uyeler WHERE id = $studentId")->fetch();

        // kaynaktan dizi alamadıysak (öğrenci yoksa) ana sayfaya yönlendirelim
        if (!$student) echo "okeydiğil";
    }
    ?>
    <meta charset="utf-8">
    <h1>
        Kullanıcı adı;	<?=$student['kadi']?> <br>
    </h1><br>
    <br> şifre: <?=$student['sifre']?>
    <br> şikayetlimi ?: <?=$student['dikkat']?>
    <br> Eposta: <?=$student['eposta']?>
    <br> adminmi: <?=$student['admin']?>
    <hr>
    <form action="veri.php" method="get">
        <input type="hidden" name="id" value="<?=$student['id']?>">
        <button type="submit"> Bilgilerini Düzenle</button>
    </form>

    <hr>
    <a href="uyeler.php">Listeye Geri Dön</a>

</div>
</body>
</html>
