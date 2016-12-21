
<?php include('head.php'); ?>
<body>

<div class="container">
    <?php include('navbar.php'); ?>

    <form action="" method="POST">
        <table cellpadding="5" cellspacing="5">
            <tr>
                <td><label for="kadi"><i>Kullanıcı Adı</i></label></td>
            </tr>
            <tr>
                <td><input type="text" name="kadi" id="kadi" /></td>
            </tr>
            <tr>
                <td><label for="sifre"><i>Şifre</i></label></td>
            </tr>
            <tr>
                <td><input type="password" name="sifre" id="sifre" /></td>
            </tr>
            <tr>
                <td><input type="submit" value="giriş" ></td>
            </tr>
        </table>
    </form>


    <?php
    include("connection.php");

    $kadi  = trim(@$_POST["kadi"]);
    $sifre  = trim(@$_POST["sifre"]);


    ob_start();


    if(!empty($kadi) && !empty($sifre)){
        $cek1 = $connection->prepare("select * from uyeler WHERE kadi =? and sifre =? ");
        $cek1->execute(array($kadi,$sifre));
        $cek = $cek1->fetch();

        if($cek){
            $_SESSION["login"]    = true;
            $_SESSION["kadi"]     = $cek["kadi"];
            $_SESSION["sifre"]    = $cek["sifre"];
            $_SESSION["admin"]    = $cek["admin"];
            $_SESSION["eposta"]   = $cek["eposta"];
            $_SESSION["dikkat"]   = $cek["dikkat"];
            $_SESSION["id"]       = $cek["id"];
            if($_SESSION["login"]){
                echo 'Hoşgeldiniz'.$_SESSION["id"];

                //  header('Refresh: 2; url=iste.php'.$_SESSION["kadi"].'');
                header('Refresh: 2; url=index.php');
            }

        }else{
            echo 'Giriş başarısız';
            header("Refresh: 2; url=giris.php");

        }

    }



    ?>




</div>
</body>
</html>

