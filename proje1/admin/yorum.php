
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

        if ($_SESSION['admin'] == 3)
            // GETten ID'yi integer olarak alalım
            $paylasilan = (int)$_GET['id'];

        // sorgu ile oluşan kaynağı dizi olarak alalım
        $paylasim = $connection->query("SELECT * FROM paylasilan WHERE id = $paylasilan")->fetch();

        // kaynaktan dizi alamadıysak (öğrenci yoksa) ana sayfaya yönlendirelim
        if (!$paylasim) echo "okeydiğil";
    }
    ?>
    <meta charset="utf-8">
    <div class="paylasilan">

        <br> paylaşılan: <?=$paylasim['text']?>
        <hr>


        <hr>
        <a href="paylasilanlar.php">Listeye Geri Dön</a>
        <br>


        <?php
        require_once "connection.php";
        if($_POST){
            $mesaj = $_POST['mesaj'];
            $yazan = $_SESSION['kadi'];
            $paylasim= $paylasilan;


            $addQuery = $connection->prepare('INSERT INTO yorum (mesaj, yazan, paylasim) VALUES (?, ?, ?)');

            $isAdded = $addQuery->execute(array($mesaj, $yazan, $paylasim ));

            if($isAdded){
                echo 'eklendi';
                header("Refresh: 2; url=index.php");
            }else{
                echo $error = "Eklenemedi."; ;
            }
        }
        ?>

        <? if(isset($error)): ?>
            <hr>
        <? endif;   ?>

        <form method="post">

            <select name="yazan">
                <option value="<?=$_SESSION['kadi']?>" >
                    <?= $_SESSION['kadi'] ?>, olarak paylaşıyorsunuz.
                </option>
            </select><br><br>
            <select name="paylasim">
                <option value="<?=$paylasilan?>" >
                    <?= $paylasilan ?> olarak paylaşıyorsunuz.
                </option>

            </select><br><br>
            <input type="text" name="mesaj" placeholder="yorum"><br><br>
            <button type="submit">GÖNDER</button><br><br>
        </form>




        <?php


        require_once "connection.php";


        // veritabanındaki "students" tablosundan tüm öğrencilerin tüm verilerini sorgulayıp döngüye sokalım
        foreach( $connection->query("SELECT * FROM yorum WHERE paylasim = $paylasilan") as $yorum ): ?>
            <div class="yorum">   <b>  <h5> YAZAN:</h5></b> <?=$yorum['yazan']?><br><b> <h5> YORUM </h5></b><?=$yorum['mesaj']?></a><br>
            </div>
            <form method="post" action="yorumsil.php" onsubmit="return confirm(' silinsin mi?')">
                <input type="hidden" name="idToDelete" value="<?=$yorum['id']?>">
                <button type="submit" >Sil</button>
            </form>
        <?php endforeach;

        // bir döngü ile gelen her bir öğrenciyi ekrana bastık

        ?>





    </div>



</div>
</body>
</html>
