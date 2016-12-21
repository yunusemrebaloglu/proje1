




    <?php

    require_once "../connection.php";

    // öncelikle güncellenecek öğrencinin GET üzerinden alınan id'si ile güncel bilgilerine erişelim, bunları formun içine doldurmamız gerekmektedir
    $paylasilan = (int)$_GET['id'];
    $paylasim = $connection->query("SELECT * FROM paylasilan WHERE id = $paylasilan ")->fetch();
    if( ! $paylasim) echo"update edilemedi malesef la" ;

    if($_POST){
        // sayfaya form bilgileri post ile gelmiş
        // Post üstünden gelen verileri değişkenlere alalım
        $text = $_POST['text'];




        $updateQuery = $connection->prepare("UPDATE paylasilan SET text = :newtext WHERE id = :idToUpdate");

        $isUpdated = $updateQuery->execute(array(
            "newtext"		=>	$text,
            "idToUpdate"	=>	$paylasilan
        ));

        if($isUpdated){
            echo 'başarıyla güncellendi la';
            header('Refresh: 2; url=../index.php');
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
        <input type="text" name="text" value="<?=$paylasim['text']?>"><br>


        <br> <button type="submit" onclick="alert('gönderildi')">gönder</button>
    </form>
    <form method="post" action="../paylasilan_sil.php" onsubmit="return confirm(' silinsin mi?')">
        <input type="hidden" name="idToDelete" value="<?=$paylasim['id']?>">
        <button type="submit" >Sil</button>
    </form>






