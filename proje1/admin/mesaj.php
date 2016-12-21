<?php

// ÖĞRENCİ EKLEME SAYFASI

/**
Sayfa ilk çalıştırıldığı zaman öğrenci ekleme için bilgilerin alındığı form gözükür. Form doldurulup aynı sayfaya POST ile bilgiler gönderildiğinde bilgiler yakalanır, veritabanına eklenir
 */

// BAĞLANTI İŞLEMLERİNİ İÇEREN DOSYAYI ÇAĞIRALIM
include 'connection.php';

// Post ile veri gelmiş mi bakalım
if($_POST){
    // Post üstünden gelen verileri değişkenlere alalım
    @$kullanici= $_POST['kullanici'];
    @$text = $_POST['text'];

    // bir ekleme sorgusu içine, bu değişkenlerle veritabanı sunucusuna talepte bulunalım

    $addQuery = $connection->prepare('INSERT INTO paylasilan (text, kullanici) VALUES (?, ?)');

    $isAdded = $addQuery->execute(array($text, $kullanici ));

    if($isAdded){
        echo 'eklendi';
    }else{
        $error = "Eklenemedi.";
    }
}

?>
<meta charset="utf-8">
    <? if(isset($error)): ?>
    <hr>
    <? endif; ?>
<div class=""
<form method="post">

    <select name="kullanici">
        <option value="<?=$_SESSION['id']?>" >
            <?= $_SESSION['kadi'] ?>, <?= $_SESSION['id'] ?> olarak paylaşıyorsunuz.
        </option>
    </select><br><br>
    <input type="text" name="text" placeholder="yazı"><br><br>
    <button type="submit">GÖNDER</button><br><br>
</form>
