
<?php include('head.php'); ?>
<body>


<div class="container">
    <?php include('navbar.php'); ?>

    <?php

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
            if ($_SESSION['id']== $studentId ) {?>
                <button type="submit"> Bilgilerini Düzenle</button>
            <?php }else {} ?>
        </form>
    <?php } ?>
    <hr>
    <?php
    include 'paylasilanlar.php';
    ?>


    <? if(isset($error)): ?> <hr> <? endif; ?>
    <?php
    if ($_SESSION['id'] == $student['id'] ){
      } ?>

</div>
</body>
</html>
