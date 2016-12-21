
<?php include('head.php'); ?>
<body>

<div class="container">
    <?php include('navbar.php'); ?>


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




        $updateQuery = $connection->prepare("UPDATE uyeler SET kadi = :newkadi, sifre = :newsifre, eposta = :neweposta WHERE id = :idToUpdate");

        $isUpdated = $updateQuery->execute(array(
            "newkadi"		=>	$kadi,
            "newsifre"		=>	$sifre,
            "neweposta" 	=>	$eposta,

            "idToUpdate"	=>	$studentId
        ));

        if($isUpdated){



            echo 'İŞLEM TAMAM BİLGİLERİNİZİN GÜNCELLENMESİ İÇİN LÜTFEN TEKRAR GİRİŞ YAPINIZ';

        }else{
            $error = "Güncellenemedi";
        }
    }

    ?>
    <meta charset="utf-8">
    <? if(isset($error)): ?>

        <hr>
    <? endif; ?>
    <?php  if ($_SESSION['id'] == $student['id'] ){ ?>


    <form method="post">
        <input type="text" name="kadi" placeholder="kullanıcı adı" value="<?=$student['kadi']?>"><br>
        <input type="password" name="sifre" placeholder="şifre" value="<?=$student['sifre']?>"><br>
        <input type="text" name="eposta" placeholder="eposta" value="<?=$student['eposta']?>"><br>




        <button type="submit"> Bilgilerini Güncelle</button>
    </form>


    <?php } ?>





</div>
</body>
</html>
