<?php include 'connection.php'; ?>
<div class="container-baş">
    <?php session_start(); ?>
    <div class="row">
        <div class="col-sm-12" >
            <div class="resim">
                <img src="../img/bayrakkenar.jpg"  width="0" height="277">
            </div>
        </div>



    </div>
</div>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">

            <?php
            if ($_SESSION){
                if ($_SESSION['admin'] == 3) {?>
                    <a class="navbar-brand" href="../admin/index.php">ANASAYFA</a>
                <?php } elseif ($_SESSION['admin'] == 2) { ?>
                    <a class="navbar-brand" href="../yonetici/index.php">ANASAYFA</a>
                <?php }elseif($_SESSION['admin']==1){ ?>
                    <a class="navbar-brand" href="index.php">ANASAYFA</a>
                <?php }}?>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">

                <li class="active"><a href="#">site hakkında</a></li>

                <?php if ($_SESSION){
                    if ($_SESSION['admin']!=1){ ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">yönetici paneli <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="uyeler.php ">yönetici işlemleri</a></li>
                        <li><a href="sikayetliler.php"> şikayetli kullanıcılar</a></li>
                    </ul>
                </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">arama paneli <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="searchkadi.php">kullanıcıadı arama</a></li>
                                <li><a href="searcheposta.php">eposta arama</a></li>
                                <li><a href="searchdikkat.php">şikayetli arama</a></li>

                            </ul>
                        </li>
                <?php }} ?>









            </ul>

            <ul class="nav navbar-nav navbar-right">
            <?php if ($_SESSION) {
                ?>

                <li>
                    <a href="">
                        <?php
                        echo 'HOŞGELDİNİZ ' . $_SESSION['kadi'];
                        ?>
                    </a>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">profil paneli <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="profil.php?id=<?= $_SESSION["id"]?>">profilim</a></li>
                        <li><a href="cikis.php">ÇIKIŞ YAP</a></li>

                    </ul>
                </li>






                <?php


                 }
            else {
                                    ?>

                <li >
    <a  href="kaydol.php">
        <span class="glyphicon glyphicon-user"></span> kaydol <span class="caret"></span>
    </a>

</li>
<li >
    <a  href="giris.php">
        <span class="glyphicon glyphicon-log-in"></span> giriş <span class="caret"></span>
    </a>

</li>
                <?php


            }
            ?>

            </ul>
        </div>
    </div>
</nav>
