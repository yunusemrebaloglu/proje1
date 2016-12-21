<?php


require_once "../connection.php";

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
        <option value="2" >yönetici yap</option>

    </select><br>
    ŞİKAYET ET:<br>
    <select name="dikkat">

        <br> şikayetlimi ?: <?=$student['dikkat']?>
        <option value="<?=$student['dikkat']?>" >şuanki durumu</option>
        <option value="1" >şikayet et</option>

    </select>


    <br> <button type="submit">Öğrenci Bilgilerini Güncelle</button>
</form>








