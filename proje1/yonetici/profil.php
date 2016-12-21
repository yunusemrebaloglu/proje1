
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
            $studentId = (int)$_GET['id'];

        // sorgu ile oluşan kaynağı dizi olarak alalım
        @$student = $connection->query("SELECT * FROM uyeler WHERE id = $studentId")->fetch();

        if($_POST){
            @$dikkat = $_POST['dikkat'];
            $updateQuery = $connection->prepare("UPDATE uyeler SET dikkat = :newdikkat WHERE id = :idToUpdate");
            $isUpdated = $updateQuery->execute(array( "newdikkat"     => $dikkat,  "idToUpdate"	=>	$studentId ));
            if($isUpdated){
                echo 'şikayet edildi la';
            }else{
                $error = "şikayet edilemedi";
            }
        }


        // kaynaktan dizi alamadıysak (öğrenci yoksa) ana sayfaya yönlendirelim
        if (!$student) echo "okeydiğil";
    }else {
        header("Refresh: 0; url=../index.php");
    }
    ?>
    <meta charset="utf-8">
    <h1>
        Kullanıcı adı;	<?=$student['kadi']?> <br>
    </h1><br>
    <br> şifre: <?=$student['sifre']?>

    <br> Eposta: <?=$student['eposta']?>

    <hr>
    <?php
    if ($_SESSION['id'] == $student['id'] ){
    ?>
    <form action="kupdate.php" method="get">
        <input type="hidden" name="id" value="<?=$student['id']?>">
        <?php
        if ($_SESSION['id']== $studentId ) {
        ?>
        <button type="submit"> Bilgilerini Düzenle</button>
        <?php }else {} ?>
    </form>
<?php } ?>
    <hr>
    <?php
include 'paylasilanlar.php';
    ?>

    <?php
    require_once "connection.php";
    $studentId = (int)$_GET['id'];
    $student = $connection->query("SELECT * FROM uyeler WHERE id = $studentId")->fetch();
    if( ! $student) echo"şiko edilemedi malesef la" ;
    if($_POST){
        @$dikkat = $_POST['dikkat'];
        $updateQuery = $connection->prepare("UPDATE uyeler SET kadi = :newkadi, sifre = :newsifre, dikkat = :newdikkat, eposta = :neweposta, admin = :newadmin WHERE id = :idToUpdate");
        @$isUpdated = $updateQuery->execute(array( "newdikkat"     => $dikkat,  "idToUpdate"	=>	$studentId ));
        if($isUpdated){
            echo 'şikayet edildi la';
            header('Refresh: 2; url=uyeler.php');
        }else{
            $error = "şikayet edilemedi";
        }
    }
    ?>
    <? if(isset($error)): ?> <hr> <? endif; ?>
    <?php
    if ($_SESSION['id'] != $student['id'] ){
    ?>
    <form method="post">
        ŞİKAYET ET:<br>
        <select name="dikkat">
            <option value="<?=$student['dikkat']?>" >şuanki durumu</option>
            <option value="2" >şikayet et</option>
        </select>
        <br> <button type="submit" onclick="alert('gönderildi')">gönder</button>
    </form>



    <?php } ?>

</div>
</body>
</html>
