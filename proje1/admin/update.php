<?php

//	 ÖĞRENCİ BİLGİLERİ GÜNCELLEME SAYFASI

/**
Bu sayfaya gönderilen öğrenciye ait bilgilerin içinde bulunduğu ve düzenlenebileceği şekilde form gösterilir, bu formda değiştirilebilecek alanlar Öğrencinin mevcut bilgileri ile doldurulur, değiştirilemeyecek tanımlayıcı alan olarak ID hidden olarak gönderilir, bu form gönderildiğinde, ilgili öğrenci için (ID üstünden yakaladığımız) ilgili alanları güncelleriz, işlem başarılı olursa öğrencinin detay sayfasına geri gideriz, olmazsa hatayla birlikte formu tekrar gösteririz
 */

// BAĞLANTI İŞLEMLERİNİ İÇEREN DOSYAYI ÇAĞIRALIM
require_once "connection.php";

// öncelikle güncellenecek öğrencinin GET üzerinden alınan id'si ile güncel bilgilerine erişelim, bunları formun içine doldurmamız gerekmektedir
$studentId = (int)$_GET['id'];
$student = $connection->query("SELECT * FROM uyeler WHERE id = $studentId")->fetch();
if( ! $student) echo"update edilemedi malesef la" ;

if($_POST){
    // sayfaya form bilgileri post ile gelmiş
    // Post üstünden gelen verileri değişkenlere alalım
    $kadi = $_POST['kadi'];
    $sifre = $_POST['sifre'];
    $eposta = $_POST['eposta'];
    $admin = $_POST['admin'];
    $dikkat = $_POST['dikkat'];



    $updateQuery = $connection->prepare("UPDATE uyeler SET kadi = :newkadi, sifre = :newsifre, dikkat = :newdikkat, eposta = :neweposta, admin = :newadmin WHERE id = :idToUpdate");

    $isUpdated = $updateQuery->execute(array(
        "newkadi"		=>	$kadi,
        "newsifre"		=>	$sifre,
        "neweposta" 	=>	$eposta,
        "newdikkat"     => $dikkat,
        "newadmin"   	=>	$admin,
        "idToUpdate"	=>	$studentId
    ));

    if($isUpdated){
        echo 'başarıyla güncellendi la';
        header('Refresh: 2; url=uyeler.php');
    }else{
        $error = "Güncellenemedi";
    }
}

?>
<meta charset="utf-8">
<? if(isset($error)): ?>

    <hr>
<? endif; ?>



<form method="post">
    <input type="text" name="kadi" placeholder="kullanıcı adı" value="<?=$student['kadi']?>"><br>
    <input type="password" name="sifre" placeholder="şifre" value="<?=$student['sifre']?>"><br>
    <input type="text" name="eposta" placeholder="eposta" value="<?=$student['eposta']?>"><br>
    YETKİLENDİR:<br>
    <select name="admin">
        <option value="<?=$student['admin']?>" >şuanki durumu</option>
        <option value="1" >kullanıcı yap</option>
        <option value="2" >yönetici yap</option>

    </select><br>
    ŞİKAYET ET:<br>
    <select name="dikkat">
        <option value="<?=$student['dikkat']?>" >şuanki durumu</option>
        <option value="0" >şikayet yok</option>
        <option value="1" >şikayetli</option>

    </select>


   <br> <button type="submit" onclick="alert('gönderildi')">gönder</button>
</form>
<form method="post" action="uyesil.php" onsubmit="return confirm('Öğrenci silinsin mi?')">
    <input type="hidden" name="idToDelete" value="<?=$student['id']?>">

    <button type="submit" >Öğrenciyi ve verilerini Sil</button>
</form>

<form method="post" action="verisil.php" onsubmit="return confirm('veriler silinsin mi?')">
    <input type="hidden" name="verisil" value="<?=$student['id']?>" >

    <button type="submit" >verilerini Sil</button>
</form>







