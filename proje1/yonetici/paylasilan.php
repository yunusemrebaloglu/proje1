
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


            // GETten ID'yi integer olarak alalım
            $paylasilan = (int)$_GET['id'];

        // sorgu ile oluşan kaynağı dizi olarak alalım
        @$paylasim = $connection->query("SELECT * FROM paylasilan WHERE id = $paylasilan")->fetch();

        // kaynaktan dizi alamadıysak (öğrenci yoksa) ana sayfaya yönlendirelim
        if (!$paylasim) echo "okeydiğil";
    }
    ?>
    <meta charset="utf-8">


    <br> paylaşılan: <?=$paylasim['text']?>
    <hr>
    <form action="veri_paylasim.php" method="get">
        <input type="hidden" name="id" value="<?=$paylasim['id']?>">
        <button type="submit"> Bilgilerini Düzenle</button>
    </form>

    <hr>
    <a href="paylasilanlar.php">Listeye Geri Dön</a>

    <?php


    require_once "connection.php";


    // veritabanındaki "students" tablosundan tüm öğrencilerin tüm verilerini sorgulayıp döngüye sokalım
    foreach( $connection->query("SELECT * FROM yorum WHERE paylasim = $paylasilan") as $yorum ): ?>
        <div class="yorum">   <b>  <h5> YAZAN:</h5></b> <?=$yorum['yazan']?><br><b> <h5> YORUM </h5></b><?=$yorum['mesaj']?></a><br>
        </div>
    <?php endforeach;

    // bir döngü ile gelen her bir öğrenciyi ekrana bastık

    ?>
</div>
</body>
</html>
